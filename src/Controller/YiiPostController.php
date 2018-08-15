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
		'contain' => ['TblComment', 'TblUser', 'TblLookup'],
		// 'contain' => ['YiiComment', 'YiiUser'],
		'limit' => 5
	];

	public function initialize()
	{
		$this->viewBuilder()->setLayout('start');
		$this->viewBuilder()->setTemplatePath('Yii/TblPost');
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
		$data = $this->YiiPost->get($id, ['contain' => ['TblComment', 'TblUser']]);
		$status = $this->YiiPost->TblLookup
			->find('list', ['keyField' => 'code', 'valueField' => 'name'])
			->where(['type' => 'PostStatus', 'code' => $data->status])
			// ->order('name')
			->toList();
		$data->status = $status[0];

		$this->set('data', $data);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$data = $this->YiiPost->newEntity();
		if ($this->request->is('post')) {
			$data = $this->YiiPost->patchEntity($data, $this->request->getData());
			if ($this->YiiPost->save($data)) {
				$this->Flash->success(__('The tbl post has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tbl post could not be saved. Please, try again.'));
		}
		// $pages = $this->TblPost->Pages->find('list', ['limit' => 30]);
		// $comments = $this->YiiPost->TblComment->find('list', ['limit' => 30])->order('create_time');
		$tags = $this->YiiPost->TblTag->find('list', ['limit' => 30])->order('name');
		$postUser = $this->YiiPost->TblUser->find('list', ['limit' => 30])->order('username');
		$postStatus = $this->YiiPost->TblLookup
			->find('list', ['keyField' => 'code', 'valueField' => 'name'])
			->where(['type' => 'PostStatus'])
			->order('name')
			->toList();

		$this->set(compact('data', 'postUser', 'postStatus','tags'));//'pages',
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
		// $pages = $this->TblPost->Articles->find('list', ['limit' => 30]);
		$comments = $this->YiiPost->TblComment->find('list', ['limit' => 30])->order('create_time');
		$postUser = $this->YiiPost->TblUser->find('list', ['limit' => 30])->order('username');
		$postStatus = $this->YiiPost->TblLookup->find('list', ['limit' => 30])->order('name');
		$this->set(compact('data', 'comments', 'postStatus', 'postUser'));
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
		$data = $this->YiiPost->get($id);
		if ($this->YiiPost->delete($data)) {
			$this->Flash->success(__('The tbl post has been deleted.'));
		} else {
			$this->Flash->error(__('The tbl post could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
