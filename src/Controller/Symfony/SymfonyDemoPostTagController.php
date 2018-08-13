<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SymfonyPostTag Controller
 *
 * @property \App\Model\Table\Symfony\PostTagTable $SymfonyPostTag
 *
 * @method \App\Model\Entity\SymfonyPostTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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
            'contain' => ['SymfonyPost', 'SymfonyTags']
        ];
        $dataPostTag = $this->paginate($this->SymfonyPostTag);

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
        $dataPostTag = $this->SymfonyPostTag->get($id, [
            'contain' => ['SymfonyPost', 'SymfonyTags']
        ]);

        $this->set('symfonyDemoPostTag', $dataPostTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataPostTag = $this->SymfonyPostTag->newEntity();
        if ($this->request->is('post')) {
            $dataPostTag = $this->SymfonyPostTag->patchEntity($dataPostTag, $this->request->getData());
            if ($this->SymfonyPostTag->save($dataPostTag)) {
                $this->Flash->success(__('The symfony demo post tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post tag could not be saved. Please, try again.'));
        }
        $dataPost = $this->SymfonyPostTag->SymfonyPost->find('list', ['limit' => 200]);
        $dataTags = $this->SymfonyPostTag->SymfonyTags->find('list', ['limit' => 200]);
        $this->set(compact('symfonyDemoPostTag', 'symfonyDemoPost', 'SymfonyTags'));
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
        $dataPostTag = $this->SymfonyPostTag->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataPostTag = $this->SymfonyPostTag->patchEntity($dataPostTag, $this->request->getData());
            if ($this->SymfonyPostTag->save($dataPostTag)) {
                $this->Flash->success(__('The symfony demo post tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The symfony demo post tag could not be saved. Please, try again.'));
        }
        $dataPost = $this->SymfonyPostTag->SymfonyPost->find('list', ['limit' => 200]);
        $dataTags = $this->SymfonyPostTag->SymfonyTags->find('list', ['limit' => 200]);
        $this->set(compact('symfonyDemoPostTag', 'symfonyDemoPost', 'SymfonyTags'));
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
        $dataPostTag = $this->SymfonyPostTag->get($id);
        if ($this->SymfonyPostTag->delete($dataPostTag)) {
            $this->Flash->success(__('The symfony demo post tag has been deleted.'));
        } else {
            $this->Flash->error(__('The symfony demo post tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
