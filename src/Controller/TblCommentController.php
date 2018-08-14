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
	public function initialize()
	{
		$this->viewBuilder()->setLayout('start');
		$this->viewBuilder()->setTemplatePath('Yii/TblComment');
	}

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$this->paginate = ['contain' => ['TblPost']];
		$dataComment = $this->paginate($this->TblComment);
// pr($dataComment);exit;
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
		$data = $this->TblComment->get($id, ['contain' => ['TblPost']]);

		$status = $this->TblComment->TblLookup
			->find('list', ['keyField' => 'code', 'valueField' => 'name'])
			->where(['type' => 'CommentStatus', 'code' => $data->status])
			->toList();
		$data->status = $status[0];

		$this->set('data', $data);
		
// 		$status = $this->TblLookup->find()
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

		$dataPost = $this->TblComment->TblPost->find('list', ['limit' => 30]);
		// $author = $this->TblComment->TblUser->find('list', ['limit' => 30]);
		$status = $this->TblComment->TblLookup
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
		$dataPost = $this->TblComment->TblPost->find('list', ['limit' => 30]);
		$status = $this->TblComment->TblLookup
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
