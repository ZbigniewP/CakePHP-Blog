<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TblUser Controller
 *
 * @property \App\Model\Table\TblUserTable $TblUser
 *
 * @method \App\Model\Entity\TblUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblUserController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tblUser = $this->paginate($this->TblUser);

        $this->set(compact('tblUser'));
    }

    /**
     * View method
     *
     * @param string|null $id Tbl User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblUser = $this->TblUser->get($id, [
            'contain' => []
        ]);

        $this->set('tblUser', $tblUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblUser = $this->TblUser->newEntity();
        if ($this->request->is('post')) {
            $tblUser = $this->TblUser->patchEntity($tblUser, $this->request->getData());
            if ($this->TblUser->save($tblUser)) {
                $this->Flash->success(__('The tbl user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tbl user could not be saved. Please, try again.'));
        }
        $this->set(compact('tblUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tbl User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblUser = $this->TblUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblUser = $this->TblUser->patchEntity($tblUser, $this->request->getData());
            if ($this->TblUser->save($tblUser)) {
                $this->Flash->success(__('The tbl user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tbl user could not be saved. Please, try again.'));
        }
        $this->set(compact('tblUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tbl User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblUser = $this->TblUser->get($id);
        if ($this->TblUser->delete($tblUser)) {
            $this->Flash->success(__('The tbl user has been deleted.'));
        } else {
            $this->Flash->error(__('The tbl user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
