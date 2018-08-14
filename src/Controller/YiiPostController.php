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
		// $dataPost = $this->TblPost->get($id, ['contain' => ['TblComment', 'TblUser']]);
		$dataPost = $this->YiiPost->get($id, ['contain' => ['YiiComment', 'YiiUser']]);

		$this->set('dataPost', $dataPost);
		$this->render('/Yii/TblPost/view');
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$dataPost = $this->TblPost->newEntity();
		if ($this->request->is('post')) {
			$dataPost = $this->TblPost->patchEntity($dataPost, $this->request->getData());
			if ($this->TblPost->save($dataPost)) {
				$this->Flash->success(__('The tbl post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl post could not be saved. Please, try again.'));
		}
		// $pages = $this->TblPost->Pages->find('list', ['limit' => 200]);
		$pages = $this->TblPost->TblComment->find('list', ['limit' => 200]);
		$tblUser = $this->TblPost->TblUser->find('list', ['limit' => 200]);
		$this->set(compact('dataPost', 'pages', 'tblUser'));
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
		$dataPost = $this->TblPost->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$dataPost = $this->TblPost->patchEntity($dataPost, $this->request->getData());
			if ($this->TblPost->save($dataPost)) {
				$this->Flash->success(__('The tbl post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl post could not be saved. Please, try again.'));
		}
		// $pages = $this->TblPost->Pages->find('list', ['limit' => 200]);
		$pages = $this->TblPost->TblComment->find('list', ['limit' => 200]);
		$tblUser = $this->TblPost->TblUser->find('list', ['limit' => 200]);
		$this->set(compact('dataPost', 'pages', 'tblUser'));
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
		$dataPost = $this->TblPost->get($id);
		if ($this->TblPost->delete($dataPost)) {
			$this->Flash->success(__('The tbl post has been deleted.'));
		} else {
			$this->Flash->error(__('The tbl post could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
