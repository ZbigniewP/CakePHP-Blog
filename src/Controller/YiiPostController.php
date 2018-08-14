<?php
namespace App\Controller;

use App\Controller\AppController;
// use App\Model\Entity\TblPost;
// use App\Model\Table\TblPostTable;
// use Cake\Datasource\Exception\RecordNotFoundException;
// use Cake\Event\Event;
// use Cake\Http\Response;
/**
 * TblPost Controller
 *
 * @property \App\Model\Table\TblPostTable $dataPost
 *
 * @method \App\Model\Entity\TblPost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class YiiPostController extends AppController
{
	public $paginate = [
		// 'contain' => ['TblComment', 'TblUser'],
		'contain' => ['YiiComment', 'YiiUser'],
		'limit' => 5
	];

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
		// $dataPost = $this->paginate($this->TblPost);
		$dataPost = $this->paginate($this->YiiPost);

		$this->set(compact('dataPost'));
		$this->render('/Yii/TblPost/index');
	}

	/**
	 * View method
	 *
	 * @param string|null $id Tbl Post id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		// $data = $this->TblPost->get($id, ['contain' => ['TblComment', 'TblUser']]);
		$data = $this->YiiPost->get($id, ['contain' => ['YiiComment', 'YiiUser']]);

		$this->set('data', $data);
		$this->render('/Yii/TblPost/view');
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$data = $this->TblPost->newEntity();
		if ($this->request->is('post')) {
			$data = $this->TblPost->patchEntity($data, $this->request->getData());
			if ($this->TblPost->save($data)) {
				$this->Flash->success(__('The tbl post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl post could not be saved. Please, try again.'));
		}
		// $pages = $this->TblPost->Pages->find('list', ['limit' => 30]);
		$pages = $this->TblPost->TblComment->find('list', ['limit' => 30]);
		$tblUser = $this->TblPost->TblUser->find('list', ['limit' => 30]);
		$this->set(compact('data', 'pages', 'tblUser'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Tbl Post id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		// $data = $this->TblPost->get($id, ['contain' => []]);
		$data = $this->YiiPost->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			// $data = $this->TblPost->patchEntity($data, $this->request->getData());
			$data = $this->YiiPost->patchEntity($data, $this->request->getData());
			// if ($this->TblPost->save($data)) {
			if ($this->YiiPost->save($data)) {
				$this->Flash->success(__('The tbl post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl post could not be saved. Please, try again.'));
		}
		// $pages = $this->TblPost->Pages->find('list', ['limit' => 30]);
		// $pages = $this->TblPost->TblComment->find('list', ['limit' => 30]);
		// $postUser = $this->TblPost->TblUser->find('list', ['limit' => 30]);
		$comments = $this->YiiPost->YiiComment->find('list', ['limit' => 30]);
		$postUser = $this->YiiPost->YiiUser->find('list', ['limit' => 30]);
		$postStatus = $this->YiiPost->YiiLookup->find('list', ['limit' => 30]);
		$this->set(compact('data', 'comments', 'postStatus', 'postUser'));

		$this->render('/Yii/TblPost/edit');
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Tbl Post id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$data = $this->TblPost->get($id);
		if ($this->TblPost->delete($data)) {
			$this->Flash->success(__('The tbl post has been deleted.'));
		} else {
			$this->Flash->error(__('The tbl post could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
