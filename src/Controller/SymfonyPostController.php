<?php
namespace App\Controller;

// use App\Controller\AppController;

use App\Model\Entity\SymfonyPost;
use App\Model\Table\SymfonyPostTable;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;
/**
 * Symfony\Post Controller
 *
 * @property \App\Model\Table\SymfonyPostTable $SymfonyPost
 *
 * @method \App\Model\Entity\SymfonyPost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyPostController extends AppController
{
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$this->paginate = [
			// 'contain' => ['Pages', 'TblUser']
			// 'contain' => ['Comment', 'User']
			'contain' => ['SymfonyUser'],
			'limit' => 10
		];
		// $users = $this->paginate($this->SymfonyUser);

		$dataPost = $this->paginate($this->SymfonyPost);

		$this->set(compact('dataPost'));
		$this->set('_serialize', ['dataPost']);
// echo "<pre>";
// print_r($dataPost);
// echo "</pre>";
// exit();
		$this->render('//Symfony/Post/index');
	}

	/**
	 * View method
	 *
	 * @param string|null $id Symfony Demo Post id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$dataPost = $this->SymfonyPost->get($id, ['contain' => ['SymfonyUser']]);

		$this->set('data', $dataPost);

		$this->render('//Symfony/Post/view');
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$data = $this->SymfonyPost->newEntity();
		if ($this->request->is('post')) {
			$data = $this->SymfonyPost->patchEntity($data, $this->request->getData());
			if ($this->SymfonyPost->save($data)) {
				$this->Flash->success(__('The symfony demo post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo post could not be saved. Please, try again.'));
		}
		$user = $this->SymfonyPost->SymfonyUser->find('list', ['limit' => 30]);
		$this->set(compact('data', 'user'));

		$this->render('//Symfony/Post/add');
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Symfony Demo Post id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$dataPost = $this->SymfonyPost->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$dataPost = $this->SymfonyPost->patchEntity($dataPost, $this->request->getData());
			if ($this->SymfonyPost->save($dataPost)) {
				$this->Flash->success(__('The symfony demo post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo post could not be saved. Please, try again.'));
		}
		$user = $this->SymfonyPost->SymfonyUser->find('list', ['limit' => 30]);
		$this->set(compact('post', 'user'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Symfony Demo Post id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$dataPost = $this->SymfonyPost->get($id);
		if ($this->SymfonyPost->delete($dataPost)) {
			$this->Flash->success(__('The symfony demo post has been deleted.'));
		} else {
			$this->Flash->error(__('The symfony demo post could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
