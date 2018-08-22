<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TblTag Controller
 *
 * @property \App\Model\Table\TblTagTable $dataTag
 *
 * @method \App\Model\Entity\TblTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblTagController extends AppController
{
	public function initialize()
	{
		$this->viewBuilder()->setLayout('bootstrap');
		$this->viewBuilder()->setTemplatePath('Yii/TblTag');
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$dataTag = $this->paginate($this->TblTag);
		$this->set(compact('dataTag'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Tbl Tag id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$data = $this->TblTag->get($id, ['contain' => []]);

		$this->set('data', $data);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$data  = $this->TblTag->newEntity();
		if ($this->request->is('post')) {
			$data  = $this->TblTag->patchEntity($data , $this->request->getData());
			if ($this->TblTag->save($data )) {
				$this->Flash->success(__('The tag has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tag could not be saved. Please, try again.'));
		}
		$this->set(compact('data'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Tbl Tag id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$data  = $this->TblTag->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data  = $this->TblTag->patchEntity($data , $this->request->getData());
			if ($this->TblTag->save($data )) {
				$this->Flash->success(__('The tag has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tag could not be saved. Please, try again.'));
		}
		$this->set(compact('data'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Tbl Tag id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$data  = $this->TblTag->get($id);
		if ($this->TblTag->delete($data )) {
			$this->Flash->success(__('The tag has been deleted.'));
		} else {
			$this->Flash->error(__('The tag could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
