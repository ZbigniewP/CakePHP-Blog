<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TblLookup Controller
 *
 * @property \App\Model\Table\TblLookupTable $TblLookup
 *
 * @method \App\Model\Entity\TblLookup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblLookupController extends AppController
{
	public $paginate = [
		// 'contain' => ['comments', 'TblPost'],
		// 'limit' => 5,
		// 'sort' => ['type','position'],
		// 'group' => 'type'
	];

	public function initialize()
	{
		// $this->viewBuilder()->setLayout('bootstrap');
		$this->layout = 'column2';
		$this->viewBuilder()->setTemplatePath('Yii/TblLookup');
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$tblLookup = $this->paginate($this->TblLookup);
		$this->set(compact('tblLookup'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Tbl Lookup id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$tblLookup = $this->TblLookup->get($id, [
			'contain' => []
		]);

		$this->set('tblLookup', $tblLookup);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$tblLookup = $this->TblLookup->newEntity();
		if ($this->request->is('post')) {
			$tblLookup = $this->TblLookup->patchEntity($tblLookup, $this->request->getData());
			if ($this->TblLookup->save($tblLookup)) {
				$this->Flash->success(__('The tbl lookup has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl lookup could not be saved. Please, try again.'));
		}
		$this->set(compact('tblLookup'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Tbl Lookup id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$tblLookup = $this->TblLookup->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$tblLookup = $this->TblLookup->patchEntity($tblLookup, $this->request->getData());
			if ($this->TblLookup->save($tblLookup)) {
				$this->Flash->success(__('The tbl lookup has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl lookup could not be saved. Please, try again.'));
		}
		$this->set(compact('tblLookup'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Tbl Lookup id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$tblLookup = $this->TblLookup->get($id);
		if ($this->TblLookup->delete($tblLookup)) {
			$this->Flash->success(__('The tbl lookup has been deleted.'));
		} else {
			$this->Flash->error(__('The tbl lookup could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
