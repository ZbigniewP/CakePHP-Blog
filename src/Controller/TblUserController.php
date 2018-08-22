<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TblUser Controller
 *
 * @property \App\Model\Table\YiiUserTable $dataUser
 *
 * @method \App\Model\Entity\YiiUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblUserController extends AppController
{
	public function initialize()
	{
		$this->viewBuilder()->setLayout('bootstrap');
		$this->viewBuilder()->setTemplatePath('Yii/TblUser');
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$dataUser = $this->paginate($this->TblUser);
		$this->set(compact('dataUser'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Tbl User id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$data = $this->TblUser->get($id, ['contain' => []]);
		$this->set('data', $data);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$data = $this->TblUser->newEntity();
		if ($this->request->is('post')) {
			$data = $this->TblUser->patchEntity($data, $this->request->getData());
			if ($this->TblUser->save($data)) {
				$this->Flash->success(__('The tbl user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl user could not be saved. Please, try again.'));
		}

		$this->set(compact('data'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Tbl User id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$data = $this->TblUser->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->TblUser->patchEntity($data, $this->request->getData());
			if ($this->TblUser->save($data)) {
				$this->Flash->success(__('The tbl user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl user could not be saved. Please, try again.'));
		}
		$this->set(compact('data'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Tbl User id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$data = $this->TblUser->get($id);
		if ($this->TblUser->delete($data)) {
			$this->Flash->success(__('The tbl user has been deleted.'));
		} else {
			$this->Flash->error(__('The tbl user could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
