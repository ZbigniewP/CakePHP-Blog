<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyDemoPostTag Controller
 *
 * @property \App\Model\Table\SymfonyDemoPostTagTable $SymfonyDemoPostTag
 *
 * @method \App\Model\Entity\SymfonyDemoPostTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyDemoPostTagController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SymfonyDemoPost', 'SymfonyDemoTag']
        ];
        $symfonyDemoPostTag = $this->paginate($this->SymfonyDemoPostTag);

        $this->set(compact('symfonyDemoPostTag'));
    }

    /**
     * View method
     *
     * @param string|null $id Symfony Demo Post Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $symfonyDemoPostTag = $this->SymfonyDemoPostTag->get($id, [
            'contain' => ['SymfonyDemoPost', 'SymfonyDemoTag']
        ]);

        $this->set('symfonyDemoPostTag', $symfonyDemoPostTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $symfonyDemoPostTag = $this->SymfonyDemoPostTag->newEntity();
        if ($this->request->is('post')) {
            $symfonyDemoPostTag = $this->SymfonyDemoPostTag->patchEntity($symfonyDemoPostTag, $this->request->getData());
            if ($this->SymfonyDemoPostTag->save($symfonyDemoPostTag)) {
                $this->Flash->success(__('The symfony demo post tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post tag could not be saved. Please, try again.'));
        }
        $symfonyDemoPost = $this->SymfonyDemoPostTag->SymfonyDemoPost->find('list', ['limit' => 200]);
        $symfonyDemoTag = $this->SymfonyDemoPostTag->SymfonyDemoTag->find('list', ['limit' => 200]);
        $this->set(compact('symfonyDemoPostTag', 'symfonyDemoPost', 'symfonyDemoTag'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Symfony Demo Post Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $symfonyDemoPostTag = $this->SymfonyDemoPostTag->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symfonyDemoPostTag = $this->SymfonyDemoPostTag->patchEntity($symfonyDemoPostTag, $this->request->getData());
            if ($this->SymfonyDemoPostTag->save($symfonyDemoPostTag)) {
                $this->Flash->success(__('The symfony demo post tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post tag could not be saved. Please, try again.'));
        }
        $symfonyDemoPost = $this->SymfonyDemoPostTag->SymfonyDemoPost->find('list', ['limit' => 200]);
        $symfonyDemoTag = $this->SymfonyDemoPostTag->SymfonyDemoTag->find('list', ['limit' => 200]);
        $this->set(compact('symfonyDemoPostTag', 'symfonyDemoPost', 'symfonyDemoTag'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Symfony Demo Post Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $symfonyDemoPostTag = $this->SymfonyDemoPostTag->get($id);
        if ($this->SymfonyDemoPostTag->delete($symfonyDemoPostTag)) {
            $this->Flash->success(__('The symfony demo post tag has been deleted.'));
        } else {
            $this->Flash->error(__('The symfony demo post tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
