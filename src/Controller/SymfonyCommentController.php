<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyComment Controller
 *
 * @property \App\Model\Table\SymfonyCommentTable $data
 *
 * @method \App\Model\Entity\Symfony\Comment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyCommentController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$this->paginate = ['contain' => ['SymfonyPost', 'SymfonyUser']];
		$dataComment = $this->paginate($this->SymfonyComment);

		$this->set(compact('dataComment'));

		$this->render('//Symfony/Comment/index');
	}

	/**
	 * View method
	 *
	 * @param string|null $id Symfony Demo Comment id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$data = $this->SymfonyComment->get($id, ['contain' => ['SymfonyPost', 'SymfonyUser']]);

		$this->set('data', $data);

		$this->render('//Symfony/Comment/view');
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$data = $this->SymfonyComment->newEntity();
		if ($this->request->is('post')) {
			$data = $this->SymfonyComment->patchEntity($data, $this->request->getData());
			if ($this->SymfonyComment->save($data)) {
				$this->Flash->success(__('The symfony demo comment has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo comment could not be saved. Please, try again.'));
		}
		
		$post = $this->SymfonyComment->SymfonyPost->find('list', ['limit' => 30]);
		$user = $this->SymfonyComment->SymfonyUser->find('list', ['limit' => 30]);

		$this->set(compact('data', 'post', 'user'));

		$this->render('//Symfony/Comment/add');
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Symfony Demo Comment id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$data = $this->SymfonyComment->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->SymfonyComment->patchEntity($data, $this->request->getData());
			if ($this->SymfonyComment->save($data)) {
				$this->Flash->success(__('The symfony demo comment has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo comment could not be saved. Please, try again.'));
		}
		$post = $this->SymfonyComment->SymfonyPost->find('list', ['limit' => 30]);
		$user = $this->SymfonyComment->SymfonyUser->find('list', ['limit' => 30]);
		$this->set(compact('data', 'post', 'user'));

		$this->render('//Symfony/Comment/edit');
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Symfony Demo Comment id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$data = $this->SymfonyComment->get($id);
		if ($this->SymfonyComment->delete($data)) {
			$this->Flash->success(__('The symfony demo comment has been deleted.'));
		} else {
			$this->Flash->error(__('The symfony demo comment could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
