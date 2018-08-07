<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyDemoComment Controller
 *
 * @property \App\Model\Table\SymfonyDemoCommentTable $SymfonyDemoComment
 *
 * @method \App\Model\Entity\SymfonyDemoComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyDemoCommentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SymfonyDemoPost', 'SymfonyDemoUser']
        ];
        $symfonyDemoComment = $this->paginate($this->SymfonyDemoComment);

        $this->set(compact('symfonyDemoComment'));
    }

    /**
     * View method
     *
     * @param string|null $id Symfony Demo Comment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $symfonyDemoComment = $this->SymfonyDemoComment->get($id, [
            'contain' => ['SymfonyDemoPost', 'SymfonyDemoUser']
        ]);

        $this->set('symfonyDemoComment', $symfonyDemoComment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $symfonyDemoComment = $this->SymfonyDemoComment->newEntity();
        if ($this->request->is('post')) {
            $symfonyDemoComment = $this->SymfonyDemoComment->patchEntity($symfonyDemoComment, $this->request->getData());
            if ($this->SymfonyDemoComment->save($symfonyDemoComment)) {
                $this->Flash->success(__('The symfony demo comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo comment could not be saved. Please, try again.'));
        }
        $symfonyDemoPost = $this->SymfonyDemoComment->SymfonyDemoPost->find('list', ['limit' => 200]);
        $symfonyDemoUser = $this->SymfonyDemoComment->SymfonyDemoUser->find('list', ['limit' => 200]);
        $this->set(compact('symfonyDemoComment', 'symfonyDemoPost', 'symfonyDemoUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Symfony Demo Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $symfonyDemoComment = $this->SymfonyDemoComment->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symfonyDemoComment = $this->SymfonyDemoComment->patchEntity($symfonyDemoComment, $this->request->getData());
            if ($this->SymfonyDemoComment->save($symfonyDemoComment)) {
                $this->Flash->success(__('The symfony demo comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo comment could not be saved. Please, try again.'));
        }
        $symfonyDemoPost = $this->SymfonyDemoComment->SymfonyDemoPost->find('list', ['limit' => 200]);
        $symfonyDemoUser = $this->SymfonyDemoComment->SymfonyDemoUser->find('list', ['limit' => 200]);
        $this->set(compact('symfonyDemoComment', 'symfonyDemoPost', 'symfonyDemoUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Symfony Demo Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $symfonyDemoComment = $this->SymfonyDemoComment->get($id);
        if ($this->SymfonyDemoComment->delete($symfonyDemoComment)) {
            $this->Flash->success(__('The symfony demo comment has been deleted.'));
        } else {
            $this->Flash->error(__('The symfony demo comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
