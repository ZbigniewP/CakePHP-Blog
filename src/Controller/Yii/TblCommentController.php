<?php
namespace App\Controller\Yii;

use App\Controller\AppController;

/**
 * TblComment Controller
 *
 * @property \App\Model\Table\TblCommentTable $TblComment
 *
 * @method \App\Model\Entity\YiiComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblCommentController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$this->paginate = [
			'contain' => ['TblPost']
		];
		$tblComment = $this->paginate($this->TblComment);

		$this->set(compact('tblComment'));
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
		$tblComment = $this->TblComment->get($id, [
			'contain' => ['TblPost']
		]);

		$this->set('tblComment', $tblComment);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$tblComment = $this->TblComment->newEntity();
		if ($this->request->is('post')) {
			$tblComment = $this->TblComment->patchEntity($tblComment, $this->request->getData());
			if ($this->TblComment->save($tblComment)) {
				$this->Flash->success(__('The tbl comment has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl comment could not be saved. Please, try again.'));
		}
		$dataPost = $this->TblComment->TblPost->find('list', ['limit' => 200]);
		$this->set(compact('tblComment', 'dataPost'));
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
		$tblComment = $this->TblComment->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$tblComment = $this->TblComment->patchEntity($tblComment, $this->request->getData());
			if ($this->TblComment->save($tblComment)) {
				$this->Flash->success(__('The tbl comment has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl comment could not be saved. Please, try again.'));
		}
		$dataPost = $this->TblComment->TblPost->find('list', ['limit' => 200]);
		$this->set(compact('tblComment', 'dataPost'));
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
		$tblComment = $this->TblComment->get($id);
		if ($this->TblComment->delete($tblComment)) {
			$this->Flash->success(__('The tbl comment has been deleted.'));
		} else {
			$this->Flash->error(__('The tbl comment could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
