<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyDemoPost Controller
 *
 * @property \App\Model\Table\SymfonyDemoPostTable $SymfonyDemoPost
 *
 * @method \App\Model\Entity\SymfonyDemoPost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyDemoPostController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SymfonyDemoUser']
        ];
        $symfonyDemoPost = $this->paginate($this->SymfonyDemoPost);

        $this->set(compact('symfonyDemoPost'));
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
        $symfonyDemoPost = $this->SymfonyDemoPost->get($id, [
            'contain' => ['SymfonyDemoUser']
        ]);

        $this->set('symfonyDemoPost', $symfonyDemoPost);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $symfonyDemoPost = $this->SymfonyDemoPost->newEntity();
        if ($this->request->is('post')) {
            $symfonyDemoPost = $this->SymfonyDemoPost->patchEntity($symfonyDemoPost, $this->request->getData());
            if ($this->SymfonyDemoPost->save($symfonyDemoPost)) {
                $this->Flash->success(__('The symfony demo post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post could not be saved. Please, try again.'));
        }
        $symfonyDemoUser = $this->SymfonyDemoPost->SymfonyDemoUser->find('list', ['limit' => 200]);
        $this->set(compact('symfonyDemoPost', 'symfonyDemoUser'));
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
        $symfonyDemoPost = $this->SymfonyDemoPost->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symfonyDemoPost = $this->SymfonyDemoPost->patchEntity($symfonyDemoPost, $this->request->getData());
            if ($this->SymfonyDemoPost->save($symfonyDemoPost)) {
                $this->Flash->success(__('The symfony demo post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post could not be saved. Please, try again.'));
        }
        $symfonyDemoUser = $this->SymfonyDemoPost->SymfonyDemoUser->find('list', ['limit' => 200]);
        $this->set(compact('symfonyDemoPost', 'symfonyDemoUser'));
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
        $symfonyDemoPost = $this->SymfonyDemoPost->get($id);
        if ($this->SymfonyDemoPost->delete($symfonyDemoPost)) {
            $this->Flash->success(__('The symfony demo post has been deleted.'));
        } else {
            $this->Flash->error(__('The symfony demo post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
