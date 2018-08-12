<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyPostTag Controller
 *
 * @property \App\Model\Table\Symfony\PostTagTable $SymfonyPostTag
 *
 * @method \App\Model\Entity\Symfony\PostTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyPostTagController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SymfonyPost', 'SymfonyDemoTag']
        ];
        $symfonyDemoPostTag = $this->paginate($this->SymfonyPostTag);

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
        $symfonyDemoPostTag = $this->SymfonyPostTag->get($id, [
            'contain' => ['SymfonyPost', 'SymfonyDemoTag']
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
        $symfonyDemoPostTag = $this->SymfonyPostTag->newEntity();
        if ($this->request->is('post')) {
            $symfonyDemoPostTag = $this->SymfonyPostTag->patchEntity($symfonyDemoPostTag, $this->request->getData());
            if ($this->SymfonyPostTag->save($symfonyDemoPostTag)) {
                $this->Flash->success(__('The symfony demo post tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post tag could not be saved. Please, try again.'));
        }
        $symfonyDemoPost = $this->SymfonyPostTag->SymfonyPost->find('list', ['limit' => 200]);
        $symfonyDemoTag = $this->SymfonyPostTag->SymfonyDemoTag->find('list', ['limit' => 200]);
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
        $symfonyDemoPostTag = $this->SymfonyPostTag->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symfonyDemoPostTag = $this->SymfonyPostTag->patchEntity($symfonyDemoPostTag, $this->request->getData());
            if ($this->SymfonyPostTag->save($symfonyDemoPostTag)) {
                $this->Flash->success(__('The symfony demo post tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post tag could not be saved. Please, try again.'));
        }
        $symfonyDemoPost = $this->SymfonyPostTag->SymfonyPost->find('list', ['limit' => 200]);
        $symfonyDemoTag = $this->SymfonyPostTag->SymfonyDemoTag->find('list', ['limit' => 200]);
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
        $symfonyDemoPostTag = $this->SymfonyPostTag->get($id);
        if ($this->SymfonyPostTag->delete($symfonyDemoPostTag)) {
            $this->Flash->success(__('The symfony demo post tag has been deleted.'));
        } else {
            $this->Flash->error(__('The symfony demo post tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
