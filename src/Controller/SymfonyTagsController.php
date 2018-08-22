<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyTags Controller
 *
 * @property \App\Model\Table\SymfonyTagsTable $dataTags
 *
 * @method \App\Model\Entity\SymfonyTags[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyTagsController extends AppController
{
	public function initialize()
	{
		// $this->layout = 'bootstrap';
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$dataTags = $this->paginate($this->SymfonyTags);

		$this->set(compact('dataTags'));
		$this->render('/Symfony/Tag/index');
	}

	/**
	 * View method
	 *
	 * @param string|null $id Symfony Demo Tag id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$data = $this->SymfonyTags->get($id, ['contain' => []]);

		$this->set('data', $data);
		$this->render('/Symfony/Tag/view');
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$data = $this->SymfonyTags->newEntity();
		if ($this->request->is('post')) {
			$data = $this->SymfonyTags->patchEntity($data, $this->request->getData());
			if ($this->SymfonyTags->save($data)) {
				$this->Flash->success(__('The symfony demo tag has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo tag could not be saved. Please, try again.'));
		}
		$this->set(compact('data'));
		$this->render('/Symfony/Tag/add');
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Symfony Demo Tag id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$data = $this->SymfonyTags->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->SymfonyTags->patchEntity($data, $this->request->getData());
			if ($this->SymfonyTags->save($data)) {
				$this->Flash->success(__('The symfony demo tag has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo tag could not be saved. Please, try again.'));
		}
		$this->set(compact('data'));
		$this->render('/Symfony/Tag/edit');
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Symfony Demo Tag id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$data = $this->SymfonyTags->get($id);
		if ($this->SymfonyTags->delete($data)) {
			$this->Flash->success(__('The symfony demo tag has been deleted.'));
		} else {
			$this->Flash->error(__('The symfony demo tag could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
