<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TblComment Controller
 *
 * @property \App\Model\Table\TblCommentTable $dataComment
 *
 * @method \App\Model\Entity\TblComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblCommentController extends AppController
{
	public $paginate = [
		// 'contain' => ['post', 'statusType', 'user'],
		'contain' => ['post', 'statusType'],
		'limit' => 5
	];

	public function initialize()
	{
		parent::initialize();
		$this->loadModel('TblComment');
		// $this->viewBuilder()->setLayout('bootstrap');
		$this->layout = 'column2';
		$this->viewBuilder()->setTemplatePath('Yii/TblComment');
	}

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$dataComment = $this->paginate($this->TblComment);

		$this->set(compact('dataComment'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Tbl Comment id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		// $data = $this->TblComment->get($id, ['contain' => ['post' => ['author', 'statusType'], 'statusType']]);
		$data = $this->TblComment->get($id, ['contain'=>['post'=>['author']]]);

		$statusComm = $this->TblComment->statusType
			->find('list', ['keyField' => 'code', 'valueField' => 'name'])
			->where(['type' => 'CommentStatus', 'code' => $data->status])
			->toList();

		$statusPost = $this->TblComment->statusType
			->find('list', ['keyField' => 'code', 'valueField' => 'name'])
			->where(['type' => 'PostStatus', 'code' => $data->post->status])
			->toList();
			
		$data->status = $statusComm[0];
		$data->post->status = $statusPost[0];

		$this->set('data', $data);
		
// 		$status = $this->statusType->find()
// 			// ->contain()
// 			// ->where(['type' => 'CommentStatus'])
// 			->all()
// 			->toArray();
// pr($status);exit;
// $this->set(compact('data'));
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$data = $this->TblComment->newEntity();
		if ($this->request->is('post')) {
			$data = $this->TblComment->patchEntity($data, $this->request->getData());
			if ($this->TblComment->save($data)) {
				$this->Flash->success(__('The tbl comment has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl comment could not be saved. Please, try again.'));
		}

		$dataPost = $this->TblComment->post->find('list', ['limit' => 30]);
		// $author = $this->TblComment->TblUser->find('list', ['limit' => 30]);
		$status = $this->TblComment->statusType
			->find('list', ['keyField' => 'code', 'valueField' => 'name'])
			->where(['type' => 'CommentStatus']);
		// $this->set(compact('data', 'dataPost', 'status','author'));
		$this->set(compact('data', 'dataPost', 'status'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Tbl Comment id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$data = $this->TblComment->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->TblComment->patchEntity($data, $this->request->getData());
			if ($this->TblComment->save($data)) {
				$this->Flash->success(__('The tbl comment has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl comment could not be saved. Please, try again.'));
		}
		$dataPost = $this->TblComment->post->find('list', ['limit' => 30]);
		$status = $this->TblComment->statusType
			->find('list', ['keyField' => 'code', 'valueField' => 'name'])
			->where(['type' => 'CommentStatus']);
		$this->set(compact('data', 'dataPost', 'status'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Tbl Comment id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$data = $this->TblComment->get($id);
		if ($this->TblComment->delete($data)) {
			$this->Flash->success(__('The tbl comment has been deleted.'));
		} else {
			$this->Flash->error(__('The tbl comment could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
