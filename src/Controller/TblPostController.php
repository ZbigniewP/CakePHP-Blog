<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TblPost Controller
 *
 * @property \App\Model\Table\TblPostTable $TblPost
 *
 * @method \App\Model\Entity\TblPost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblPostController extends AppController
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
            'contain' => ['TblComment', 'TblUser']
        ];
        $tblPost = $this->paginate($this->TblPost);

        $this->set(compact('tblPost'));
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
        $tblPost = $this->TblPost->get($id, [
            // 'contain' => ['Pages', 'TblUser']
            'contain' => ['TblComment', 'TblUser']
        ]);

        $this->set('tblPost', $tblPost);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblPost = $this->TblPost->newEntity();
        if ($this->request->is('post')) {
            $tblPost = $this->TblPost->patchEntity($tblPost, $this->request->getData());
            if ($this->TblPost->save($tblPost)) {
                $this->Flash->success(__('The tbl post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tbl post could not be saved. Please, try again.'));
        }
        // $pages = $this->TblPost->Pages->find('list', ['limit' => 200]);
        $pages = $this->TblPost->TblComment->find('list', ['limit' => 200]);
        $tblUser = $this->TblPost->TblUser->find('list', ['limit' => 200]);
        $this->set(compact('tblPost', 'pages', 'tblUser'));
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
        $tblPost = $this->TblPost->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblPost = $this->TblPost->patchEntity($tblPost, $this->request->getData());
            if ($this->TblPost->save($tblPost)) {
                $this->Flash->success(__('The tbl post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tbl post could not be saved. Please, try again.'));
        }
        // $pages = $this->TblPost->Pages->find('list', ['limit' => 200]);
        $pages = $this->TblPost->TblComment->find('list', ['limit' => 200]);
        $tblUser = $this->TblPost->TblUser->find('list', ['limit' => 200]);
        $this->set(compact('tblPost', 'pages', 'tblUser'));
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
        $tblPost = $this->TblPost->get($id);
        if ($this->TblPost->delete($tblPost)) {
            $this->Flash->success(__('The tbl post has been deleted.'));
        } else {
            $this->Flash->error(__('The tbl post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
