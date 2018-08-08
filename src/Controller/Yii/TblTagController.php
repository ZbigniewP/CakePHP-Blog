<?php
namespace App\Controller\Yii;

use App\Controller\AppController;

/**
 * TblTag Controller
 *
 * @property \App\Model\Table\TblTagTable $TblTag
 *
 * @method \App\Model\Entity\Yii\Tag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblTagController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tblTag = $this->paginate($this->TblTag);

        $this->set(compact('tblTag'));
    }

    /**
     * View method
     *
     * @param string|null $id Tbl Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblTag = $this->TblTag->get($id, [
            'contain' => []
        ]);

        $this->set('tblTag', $tblTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblTag = $this->TblTag->newEntity();
        if ($this->request->is('post')) {
            $tblTag = $this->TblTag->patchEntity($tblTag, $this->request->getData());
            if ($this->TblTag->save($tblTag)) {
                $this->Flash->success(__('The tbl tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tbl tag could not be saved. Please, try again.'));
        }
        $this->set(compact('tblTag'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tbl Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblTag = $this->TblTag->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblTag = $this->TblTag->patchEntity($tblTag, $this->request->getData());
            if ($this->TblTag->save($tblTag)) {
                $this->Flash->success(__('The tbl tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tbl tag could not be saved. Please, try again.'));
        }
        $this->set(compact('tblTag'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tbl Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblTag = $this->TblTag->get($id);
        if ($this->TblTag->delete($tblTag)) {
            $this->Flash->success(__('The tbl tag has been deleted.'));
        } else {
            $this->Flash->error(__('The tbl tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
