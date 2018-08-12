<?php
namespace App\Controller;

// use App\Controller\AppController;

use App\Model\Entity\Symfony\Post;
use App\Model\Table\Symfony\PostTable;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;
/**
 * SymfonyPost Controller
 *
 * @property \App\Model\Table\Symfony\PostTable $SymfonyPost
 *
 * @method \App\Model\Entity\Symfony\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyPostController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = ['contain' => ['User']];
        $post = $this->paginate($this->Post);

        $this->set(compact('post'));
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
        $post = $this->SymfonyPost->get($id, ['contain' => ['User']]);

        $this->set('post', $post);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->SymfonyPost->newEntity();
        if ($this->request->is('post')) {
            $post = $this->SymfonyPost->patchEntity($post, $this->request->getData());
            if ($this->SymfonyPost->save($post)) {
                $this->Flash->success(__('The symfony demo post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post could not be saved. Please, try again.'));
        }
        $user = $this->SymfonyPost->User->find('list', ['limit' => 200]);
        $this->set(compact('post', 'user'));
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
        $post = $this->SymfonyPost->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->SymfonyPost->patchEntity($post, $this->request->getData());
            if ($this->SymfonyPost->save($post)) {
                $this->Flash->success(__('The symfony demo post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post could not be saved. Please, try again.'));
        }
        $user = $this->SymfonyPost->User->find('list', ['limit' => 200]);
        $this->set(compact('post', 'user'));
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
        $post = $this->SymfonyPost->get($id);
        if ($this->SymfonyPost->delete($post)) {
            $this->Flash->success(__('The symfony demo post has been deleted.'));
        } else {
            $this->Flash->error(__('The symfony demo post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
