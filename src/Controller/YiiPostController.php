<?php

namespace App\Controller;

use App\Model\Table\Yii\PostTable;
// use App\Model\Table\Yii\TagTable;
use App\Model\Entity\Yii\Post;

// use App\Model\Table\Yii\CommenTable;
// use App\Model\Entity\Yii\Comment;
use Cake\Http\Response;
use Cake\Network\Exception\NotFoundException;

/**
 * Class YiiPostController
 * @package App\Controller
 * @property Yii\PostTable $yiiPost
 */
class YiiPostController extends AppController
{

	// public $paginate = ['limit' => 5];
	public $paginate = [
		'contain' => ['User', 'Comment'],
		// 'contain' => ['Tag', 'User'],
		// 'contain' => ['User'],
		'limit' => 5
	];

	/**
	 * Initialize
	 * @return void
	 */
	public function initialize()
	{
		parent::initialize();
		$this->loadModel('Post');
		// $this->viewBuilder()->setLayout('yiipost');
		$this->layout='column2';
		// $this->layout='main';
	}

	public function index()
	{
		$dataProvider = $this->paginate($this->Post->find()->where('status='.Post::STATUS_PUBLISHED));

		$this->set(compact('dataProvider'));
		$this->set('_serialize', ['dataProvider']);
		$this->render('index');

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

		$comment = $this->Post->Comment->newEntity();
		if ($this->request->is(['post'])) {
			// $comment = $this->Post->Comment->patchEntity($comment, $this->request->getData());
			// if ($this->Post->Comment->save($comment)) {
			// }
			$this->Flash->error(__('The post could not be saved. Please, try again.'));
		}
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// exit();
		if(isset($_GET['tag'])) {
			// $data = $this->Post->find()->where(['tags LIKE' => $tag])->contain(['User','Comment'])->first();//'Tag',
			// $data = $this->Post->find()->where(['tags LIKE' => '%'.$tag.'%'])->first();
			// $data = $this->Post->find()->where(['tags LIKE' => '%'.$tag.'%'])->first();
			// $data = $this->Post->find()->contain(['User','Comment']);//->first()->like('Post.tags', $tag)
			// $this->set(compact('data', 'errors'));
			// $this->set('_serialize', ['data']);
// *  $settings = [
// *    'Articles' => [
// *      'finder' => 'popular'
// *    ]
// *  ];
// *  $results = $paginator->paginate($table, $settings);

// * $query = $this->Articles->find('popular')->matching('Tags', function ($q) {
// *   return $q->where(['name' => 'CakePHP'])
// * });
// * $results = $paginator->paginate($query);

// * $articles = $paginator->paginate($articlesQuery, ['scope' => 'articles']);
// * $tags = $paginator->paginate($tagsQuery, ['scope' => 'tags']);

			// $module = $this->paginate($this->Post->find()->where(['tags LIKE' => '%'.$tag.'%']));
			// $comment = $this->Post->Comment;
			$dataProvider = $this->paginate($this->Post->find()->contain(['User']));
			$this->set(compact('dataProvider', 'comment', 'errors'));
			$this->set('_serialize', ['dataProvider']);
			// $this->render('index');
		} else {
			$dataProvider = $this->paginate($this->Post->find()->contain(['User']));//->first()'Tag',,'Comment'
			// $module = $this->Post->find()->like('YiiPost.tags', $tag)->contain(['User','Comment'])->first();
			$this->set(compact('dataProvider', 'comment', 'errors'));
			$this->set('_serialize', ['dataProvider']);
			// $this->render('index');
		}
$this->layout='column2';
// $this->render('view', 'yii');
// $this->render('index', 'column1');
$this->render('index');
// $this->render('index', 'main');
// $post = $this->loadModel();
// $comment = $this->newComment($post);

		// $this->render('view', 'dev_error');
		
	}

	public function category($tag)
	{
		$module = $this->paginate($this->Post->find()->where(['tags LIKE' => $tag]));
		// $module = $this->paginate($this->Post->find()->like('YiiPost.tags', $tag));
		$this->set(compact('module'));
		$this->set('_serialize', ['module']);
		$this->render('comments.index','comments');
	}

	/**
	 * Index method
	 *
	 * @return Response|void
	 */
	public function admin()
	{
		$module = $this->paginate($this->Post->find()->contain(['Lookup']));
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
		$post = $this->Post->newEntity();
		if ($this->request->is(['patch', 'post', 'put'])) {
			$post = $this->Posts->patchEntity($post, $this->request->getData());
			// if ($this->Posts->save($post)) {
			// 	$this->Flash->success(__('The post has been saved.'));

			// 	return $this->redirect(['action' => 'index']);
			// }
			$this->Flash->error(__('The post could not be saved. Please, try again.'));
		}
		$tags = $this->Post->Tag->find('list');
		$status = $this->Post->Lookup->find('list');
		$users = $this->Post->User->find('list');

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
		$post = $this->Post->get($id, ['contain' => ['Tag']]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$post = $this->Posts->patchEntity($post, $this->request->getData());
			// if ($this->Posts->save($post)) {
			// 	$this->Flash->success(__('The post has been saved.'));

			// 	return $this->redirect(['action' => 'index']);
			// }
			$this->Flash->error(__('The post could not be saved. Please, try again.'));
		}
		$tags = $this->Post->Tag->find('list');
		$status = $this->Post->Lookup->find('list');
		$users = $this->Post->User->find('list');

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
		$post = $this->Posts->get($id);
		if ($this->Posts->delete($post)) {
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
	// 		return $this->redirect(['controller' => 'yiipost', 'action' => 'login']);
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
		$comment = $this->Post->Comment->newEntity();
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'comment-form') {
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if (isset($_POST['Comment'])) {
			$comment->attributes = $_POST['Comment'];
			if ($post->addComment($comment)) {
				if ($comment->status == Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted', 'Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}
}
