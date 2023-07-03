<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Perro Controller
 *
 * @property \App\Model\Table\PerroTable $Perro
 * @method \App\Model\Entity\Perro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PerroController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $perro = $this->paginate($this->Perro);

        $this->set(compact('perro'));
    }

    /**
     * View method
     *
     * @param string|null $id Perro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $perro = $this->Perro->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('perro'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $perro = $this->Perro->newEmptyEntity();
        if ($this->request->is('post')) {
            $perro = $this->Perro->patchEntity($perro, $this->request->getData());
            if ($this->Perro->save($perro)) {
                $this->Flash->success(__('The perro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perro could not be saved. Please, try again.'));
        }
        $this->set(compact('perro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Perro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $perro = $this->Perro->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $perro = $this->Perro->patchEntity($perro, $this->request->getData());
            if ($this->Perro->save($perro)) {
                $this->Flash->success(__('The perro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perro could not be saved. Please, try again.'));
        }
        $this->set(compact('perro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Perro id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $perro = $this->Perro->get($id);
        if ($this->Perro->delete($perro)) {
            $this->Flash->success(__('The perro has been deleted.'));
        } else {
            $this->Flash->error(__('The perro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
