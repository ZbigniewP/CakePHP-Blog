<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyDemoUser Controller
 *
 * @property \App\Model\Table\SymfonyDemoUserTable $SymfonyDemoUser
 *
 * @method \App\Model\Entity\SymfonyDemoUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyDemoUserController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $symfonyDemoUser = $this->paginate($this->SymfonyDemoUser);

        $this->set(compact('symfonyDemoUser'));
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
        $symfonyDemoUser = $this->SymfonyDemoUser->get($id, [
            'contain' => []
        ]);

        $this->set('symfonyDemoUser', $symfonyDemoUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $symfonyDemoUser = $this->SymfonyDemoUser->newEntity();
        if ($this->request->is('post')) {
            $symfonyDemoUser = $this->SymfonyDemoUser->patchEntity($symfonyDemoUser, $this->request->getData());
            if ($this->SymfonyDemoUser->save($symfonyDemoUser)) {
                $this->Flash->success(__('The symfony demo user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo user could not be saved. Please, try again.'));
        }
        $this->set(compact('symfonyDemoUser'));
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
        $symfonyDemoUser = $this->SymfonyDemoUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symfonyDemoUser = $this->SymfonyDemoUser->patchEntity($symfonyDemoUser, $this->request->getData());
            if ($this->SymfonyDemoUser->save($symfonyDemoUser)) {
                $this->Flash->success(__('The symfony demo user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo user could not be saved. Please, try again.'));
        }
        $this->set(compact('symfonyDemoUser'));
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
        $symfonyDemoUser = $this->SymfonyDemoUser->get($id);
        if ($this->SymfonyDemoUser->delete($symfonyDemoUser)) {
            $this->Flash->success(__('The symfony demo user has been deleted.'));
        } else {
            $this->Flash->error(__('The symfony demo user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
