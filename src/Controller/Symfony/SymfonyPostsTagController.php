<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyPostsTag Controller
 *
 * @property \App\Model\Table\Symfony\PostTagTable $dataPostsTag
 *
 * @method \App\Model\Entity\SymfonyPostsTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyPostsTagController extends AppController
{
	public function initialize()
	{
		$this->layout = 'start';
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index()
	{
		$this->paginate = ['limit' => 10, 'contain' => ['SymfonyPost', 'SymfonyTags']];
		$dataPostsTag = $this->paginate($this->SymfonyPostsTag);

		$this->set(compact('dataPostsTag'));

		$this->render('/Symfony/PostsTag/index');
	}

	/**
	 * View method
	 *
	 * @param string|null $id Symfony Demo Post Tag id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{

		// $data = $this->SymfonyPostsTag->get($id, ['contain' => ['SymfonyPost', 'SymfonyTags']]);
		$data = $this->SymfonyPostsTag->find()
			->contain(['SymfonyPost', 'SymfonyTags'])
			->where(['post_id' => $id])
			->all()
			->toList();

		$this->set('data', $data[0]);
		// $this->set(compact('data'));

		$this->render('/Symfony/PostsTag/view');
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$dataPostsTag = $this->SymfonyPostsTag->newEntity();
		if ($this->request->is('post')) {
			$dataPostsTag = $this->SymfonyPostsTag->patchEntity($dataPostsTag, $this->request->getData());
			if ($this->SymfonyPostsTag->save($dataPostsTag)) {
				$this->Flash->success(__('The symfony demo post tag has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo post tag could not be saved. Please, try again.'));
		}
		$dataPost = $this->SymfonyPostsTag->SymfonyPost->find('list', ['limit' => 30]);
		$dataTags = $this->SymfonyPostsTag->SymfonyTags->find('list', ['limit' => 30]);

		$this->set(compact('dataPostsTag', 'dataPost', 'dataTags'));

		$this->render('/Symfony/PostsTag/add');
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Symfony Demo Post Tag id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$data = $this->SymfonyPostsTag->find()
			->contain(['SymfonyPost', 'SymfonyTags'])
			->where(['post_id' => $id])
			->all()
			->toList();
		$dataPostsTag = $data[0];
		// $dataPostsTag = $this->SymfonyPostsTag->get($id, ['contain' => []]);
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$dataPostsTag = $this->SymfonyPostsTag->patchEntity($dataPostsTag, $this->request->getData());
			if ($this->SymfonyPostsTag->save($dataPostsTag)) {
				$this->Flash->success(__('The symfony demo post tag has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The symfony demo post tag could not be saved. Please, try again.'));
		}
		$dataPost = $this->SymfonyPostsTag->SymfonyPost->find('list', ['limit' => 30]);
		$dataTags = $this->SymfonyPostsTag->SymfonyTags->find('list', ['limit' => 30]);
		$this->set(compact('dataPostsTag', 'dataPost', 'dataTags'));

		$this->render('/Symfony/PostsTag/edit');
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Symfony Demo Post Tag id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$data = $this->SymfonyPostsTag->get($id);
		if ($this->SymfonyPostsTag->delete($data)) {
			$this->Flash->success(__('The symfony demo post tag has been deleted.'));
		} else {
			$this->Flash->error(__('The symfony demo post tag could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
