<?php

namespace App\Controller;

use App\Model\Table\YiiPostTable;
// use App\Model\Table\YiiTagTable;
use App\Model\Entity\YiiPost;

use Cake\Http\Response;
use Cake\Network\Exception\NotFoundException;

/**
 * Class PostController
 * @package App\Controller
 * @property YiiPostTable $Post
 */
class YiiBlogController extends AppController
{

	// public $paginate = ['limit' => 5];
	public $paginate = [
		'contain' => ['YiiUser', 'YiiComment'],
		'limit' => 5
	];

	/**
	 * Initialize
	 * @return void
	 */
	public function initialize()
	{
		parent::initialize();
		$this->loadModel('YiiPost');
		// $this->viewBuilder()->setLayout('yiipost');
		$this->layout='column2';
		// $this->layout='main';
	}

	public function index()
	{
		$dataProvider = $this->paginate($this->YiiPost
			->find()
			->where('status='.YiiPost::STATUS_PUBLISHED));

		$this->set(compact('dataProvider'));
		$this->set('_serialize', ['dataProvider']);
// $this->set('dataProvider', $dataProvider);
// echo "<pre>";
// print_r($dataProvider);
// echo "</pre>";
// exit();
		$this->render('/Yii/Post/index');
		// $this->render('/Yii/TblPost/index');

		// $criteria = new CDbCriteria(array(
		// 	'condition' => 'status=' . Post::STATUS_PUBLISHED,
		// 	'order' => 'update_time DESC',
		// 	'with' => 'commentCount',
		// ));
		// if (isset($_GET['tag']))
		// 	$criteria->addSearchCondition('tags', $_GET['tag']);

		// $dataProvider = new CActiveDataProvider('Post', array(
		// 	'pagination' => array(
		// 		'pageSize' => Yii::app()->params['postsPerPage'],
		// 	),
		// 	'criteria' => $criteria,
		// ));

		// $this->render('index', array(
		// 	'dataProvider' => $dataProvider,
		// ));
	}

	public function view($tag = null)
	{
		$errors = [];

		$comment = $this->YiiPost->YiiComment->newEntity();
		if ($this->request->is(['post'])) {
			// $comment = $this->YiiPost->YiiComment->patchEntity($comment, $this->request->getData());
			// if ($this->YiiPost->YiiComment->save($comment)) {
			// }
			$this->Flash->error(__('The post could not be saved. Please, try again.'));
		}
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// exit();
		if(isset($_GET['tag'])) {
			// $data = $this->YiiPost->find()->where(['tags LIKE' => $tag])->contain(['YiiComment', 'YiiUser'])->first();//'YiiTag',
			// $data = $this->YiiPost->find()->where(['tags LIKE' => '%'.$tag.'%'])->first();
			// $data = $this->YiiPost->find()->contain(['YiiComment', 'YiiUser']);//->first()->like('Post.tags', $tag)
			// $this->set(compact('data', 'errors'));
			// $this->set('_serialize', ['data']);
// *  $settings = [ 'Articles' => [ 'finder' => 'popular' ] ];
// *  $results = $paginator->paginate($table, $settings);

// * $query = $this->Articles->find('popular')->matching('Tags', function ($q) {return $q->where(['name' => 'CakePHP'])});
// * $results = $paginator->paginate($query);

// * $articles = $paginator->paginate($articlesQuery, ['scope' => 'articles']);
// * $tags = $paginator->paginate($tagsQuery, ['scope' => 'tags']);

			// $module = $this->paginate($this->YiiPost->find()->where(['tags LIKE' => '%'.$tag.'%']));
			// $comment = $this->YiiPost->YiiComment;
			$data = $this->paginate($this->YiiPost->find()->contain(['YiiComment', 'YiiUser']));
		} else {
			// $data = $this->paginate($this->YiiPost->find()->contain(['YiiUser']));//->first()'YiiTag',,'YiiComment'
			// $module = $this->YiiPost->find()->like('Post.tags', $tag)->contain(['YiiComment', 'YiiUser'])->first();
			$data = $this->YiiPost->get($_GET['id'], ['contain' => ['YiiComment', 'YiiUser']] );
			// ->where(['title' => $_GET['title']])
			// ->all()
			// ->toList();
		}
		// $this->set(compact('data', 'comment', 'errors'));
		// $this->set('_serialize', ['data']);
		$this->set('data', $data);
$this->layout='column2';
// $this->render('view', 'yii');
// $this->render('index', 'column1');
$this->render('/Yii/Post/view');
// $this->render('index', 'main');
// $post = $this->loadModel();
// $comment = $this->newComment($post);

		// $this->render('view', 'dev_error');
	}

	public function category($tag)
	{
		$module = $this->paginate($this->YiiPost->find()->where(['tags LIKE' => $tag]));
		// $module = $this->paginate($this->YiiPost->find()->like('Post.tags', $tag));
		$this->set(compact('module'));
		$this->set('_serialize', ['module']);
		$this->render('comments.index','comments');
		// $this->render('/Yii/Post/view');
	}

	/**
	 * Index method
	 *
	 * @return Response|void
	 */
	public function admin()
	{
		$module = $this->paginate($this->YiiPost->find()->contain(['YiiLookup']));
		$this->set(compact('module'));
		$this->set('_serialize', ['module']);
	}
	public function author(){
		// return $this->Flash->error(__(print_r($_GET)));
		return $this->redirect(['action' => 'view']);
	} 

	/**
	 * Add method
	 *
	 * @return Response|null Redirects on successful add, renders view otherwise.
	 */
	public function create()
	{
		$post = $this->YiiPost->newEntity();
		if ($this->request->is(['patch', 'post', 'put'])) {
			$post = $this->YiiPosts->patchEntity($post, $this->request->getData());
			if ($this->YiiPosts->save($post)) {
				$this->Flash->success(__('The post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The post could not be saved. Please, try again.'));
		}

		$tags = $this->YiiPost->Tags->find('list');
		$status = $this->YiiPost->Lookup->find('list');
		$users = $this->YiiPost->Users->find('list');

		$this->set(compact('post', 'status', 'tags', 'users'));
		$this->set('_serialize', ['post', 'status', 'tags', 'users']);
		$this->render('index');
	}

	/**
	 * Edit method
	 *
	 * @param int $id Admin id.
	 * @return Response|null Redirects on successful edit, renders view otherwise.
	 * @throws NotFoundException When record not found.
	 */
	public function update($id)
	{
		$post = $this->YiiPost->get($id, ['contain' => ['YiiTag']]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$post = $this->YiiPosts->patchEntity($post, $this->request->getData());
			if ($this->YiiPosts->save($post)) {
				$this->Flash->success(__('The post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The post could not be saved. Please, try again.'));
		}
		$tags = $this->YiiPost->Tags->find('list');
		$status = $this->YiiPost->Lookup->find('list');
		$users = $this->YiiPost->Users->find('list');

		$this->set(compact('post', 'status', 'tags', 'users'));
		$this->set('_serialize', ['post', 'status', 'tags', 'users']);

		$this->render('update', array('model' => $model));
	}

	/**
	 * Delete method
	 *
	 * @param int $id Admin id.
	 * @return Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id)
	{
		$this->request->allowMethod(['delete', 'post']);
		$post = $this->YiiPosts->get($id);
		if ($this->YiiPosts->delete($post)) {
			$this->Flash->success(__('The post has been deleted.'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'admin']);
	}
	
	// /**
	//  * Login
	//  * @return Response|null
	//  */
	// public function login()
	// {
	// 	if ($this->request->is('post')) {
	// 		$user = $this->Auth->identify();
	// 		if ($user) {
	// 			$this->Auth->setUser($user);
	// 			return $this->redirect($this->Auth->redirectUrl());
	// 		}
	// 		$this->Flash->error(__('Invalid username or password, try again'));
	// 		return $this->redirect(['controller' => 'post', 'action' => 'login']);
	// 'authError' => __d('cake', 'You are not authorized to access that location.')
	// 	}
	// }

	// /**
	//  * logout
	//  * @return Response|null
	//  */
	// public function logout()
	// {
	// 	return $this->redirect($this->Auth->logout());
	// }
		/**
	 * Creates a new comment.
	 * This method attempts to create a new comment based on the user input.
	 * If the comment is successfully created, the browser will be redirected
	 * to show the created comment.
	 * @param Post the post that the new comment belongs to
	 * @return Comment the comment instance
	 */
	protected function newComment($post)
	{
		// $comment = new Comment;
		$comment = $this->YiiPost->YiiComment->newEntity();
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'comment-form') {
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if (isset($_POST['Comment'])) {
			$comment->attributes = $_POST['Comment'];
			if ($post->addComment($comment)) {
				if ($comment->status == YiiComment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted', 'Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}
}
