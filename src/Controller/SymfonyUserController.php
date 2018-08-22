<?php
namespace App\Controller;

use App\Controller\AppController;
// use App\Model\Entity\SymfonyUser;
// use App\Model\Table\SymfonyUserTable;
/**
 * SymfonyUser Controller
 *
 * @property \App\Model\Table\SymfonyUserTable $SymfonyUser
 *
 * @method \App\Model\Entity\SymfonyUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyUserController extends AppController
{
	public function initialize()
	{
		// $this->viewBuilder()->setLayout('bootstrap');
		$this->viewBuilder()->setTemplatePath('Symfony/User');
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{

		// $this->paginate = ['contain' => []];
		$users = $this->paginate($this->SymfonyUser);

		$this->set(compact('users'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Symfony Demo User id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$user = $this->SymfonyUser->get($id, ['contain' => []]);

		$this->set('data', $user);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$user = $this->SymfonyUser->newEntity();
		if ($this->request->is('post')) {
			$user = $this->SymfonyUser->patchEntity($user, $this->request->getData());
			if ($this->SymfonyUser->save($user)) {
				$this->Flash->success(__('The symfony demo user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo user could not be saved. Please, try again.'));
		}
		$this->set(compact('user'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Symfony Demo User id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$user = $this->SymfonyUser->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->SymfonyUser->patchEntity($user, $this->request->getData());
			if ($this->SymfonyUser->save($user)) {
				$this->Flash->success(__('The symfony demo user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo user could not be saved. Please, try again.'));
		}
		$this->set(compact('user'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Symfony Demo User id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$data = $this->SymfonyUser->get($id);
		if ($this->SymfonyUser->delete($data)) {
			$this->Flash->success(__('The symfony demo user has been deleted.'));
		} else {
			$this->Flash->error(__('The symfony demo user could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
