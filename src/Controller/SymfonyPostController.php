<?php
namespace App\Controller;

// use App\Controller\AppController;

use App\Model\Entity\Symfony\Post;
use App\Model\Table\Symfony\PostTable;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;
/**
 * SymfonyPost Controller
 *
 * @property \App\Model\Table\Symfony\PostTable $SymfonyPost
 *
 * @method \App\Model\Entity\Symfony\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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
			'contain' => []
        ];
		$dataPost = $this->paginate($this->Post);
		// $dataPost = $this->Post->find();

		$this->set(compact('dataPost'));
		$this->set('_serialize', ['dataPost']);

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
		$dataPost = $this->SymfonyPost->get($id, ['contain' => ['User']]);

		$this->set('data', $dataPost);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$dataPost = $this->SymfonyPost->newEntity();
		if ($this->request->is('post')) {
			$dataPost = $this->SymfonyPost->patchEntity($dataPost, $this->request->getData());
			if ($this->SymfonyPost->save($dataPost)) {
				$this->Flash->success(__('The symfony demo post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo post could not be saved. Please, try again.'));
		}
		$user = $this->SymfonyPost->User->find('list', ['limit' => 200]);
		$this->set(compact('post', 'user'));
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
		$user = $this->SymfonyPost->User->find('list', ['limit' => 200]);
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
