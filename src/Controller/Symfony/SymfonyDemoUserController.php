<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Symfony\User Controller
 *
 * @property \App\Model\Table\Symfony\UserTable $Symfony\User
 *
 * @method \App\Model\Entity\Symfony\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyUserController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $SymfonyUser = $this->paginate($this->SymfonyUser);

        $this->set(compact('SymfonyUser'));
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
        $SymfonyUser = $this->SymfonyUser->get($id, [
            'contain' => []
        ]);

        $this->set('SymfonyUser', $SymfonyUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $SymfonyUser = $this->SymfonyUser->newEntity();
        if ($this->request->is('post')) {
            $SymfonyUser = $this->SymfonyUser->patchEntity($SymfonyUser, $this->request->getData());
            if ($this->SymfonyUser->save($SymfonyUser)) {
                $this->Flash->success(__('The symfony demo user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo user could not be saved. Please, try again.'));
        }
        $this->set(compact('Symfony\User'));
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
        $SymfonyUser = $this->SymfonyUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $SymfonyUser = $this->SymfonyUser->patchEntity($SymfonyUser, $this->request->getData());
            if ($this->SymfonyUser->save($SymfonyUser)) {
                $this->Flash->success(__('The symfony demo user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo user could not be saved. Please, try again.'));
        }
        $this->set(compact('SymfonyUser'));
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
        $SymfonyUser = $this->SymfonyUser->get($id);
        if ($this->SymfonyUser->delete($SymfonyUser)) {
            $this->Flash->success(__('The symfony demo user has been deleted.'));
        } else {
            $this->Flash->error(__('The symfony demo user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
