<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyDemoTag Controller
 *
 * @property \App\Model\Table\SymfonyDemoTagTable $SymfonyDemoTag
 *
 * @method \App\Model\Entity\SymfonyDemoTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SymfonyDemoTagController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $symfonyDemoTag = $this->paginate($this->SymfonyDemoTag);

        $this->set(compact('symfonyDemoTag'));
    }

    /**
     * View method
     *
     * @param string|null $id Symfony Demo Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $symfonyDemoTag = $this->SymfonyDemoTag->get($id, [
            'contain' => []
        ]);

        $this->set('symfonyDemoTag', $symfonyDemoTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $symfonyDemoTag = $this->SymfonyDemoTag->newEntity();
        if ($this->request->is('post')) {
            $symfonyDemoTag = $this->SymfonyDemoTag->patchEntity($symfonyDemoTag, $this->request->getData());
            if ($this->SymfonyDemoTag->save($symfonyDemoTag)) {
                $this->Flash->success(__('The symfony demo tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo tag could not be saved. Please, try again.'));
        }
        $this->set(compact('symfonyDemoTag'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Symfony Demo Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $symfonyDemoTag = $this->SymfonyDemoTag->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symfonyDemoTag = $this->SymfonyDemoTag->patchEntity($symfonyDemoTag, $this->request->getData());
            if ($this->SymfonyDemoTag->save($symfonyDemoTag)) {
                $this->Flash->success(__('The symfony demo tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo tag could not be saved. Please, try again.'));
        }
        $this->set(compact('symfonyDemoTag'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Symfony Demo Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $symfonyDemoTag = $this->SymfonyDemoTag->get($id);
        if ($this->SymfonyDemoTag->delete($symfonyDemoTag)) {
            $this->Flash->success(__('The symfony demo tag has been deleted.'));
        } else {
            $this->Flash->error(__('The symfony demo tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
