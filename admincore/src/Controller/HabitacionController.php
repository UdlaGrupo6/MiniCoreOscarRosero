<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Habitacion Controller
 *
 * @property \App\Model\Table\HabitacionTable $Habitacion
 * @method \App\Model\Entity\Habitacion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HabitacionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $habitacion = $this->paginate($this->Habitacion);

        $this->set(compact('habitacion'));
    }

    /**
     * View method
     *
     * @param string|null $id Habitacion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $habitacion = $this->Habitacion->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('habitacion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $habitacion = $this->Habitacion->newEmptyEntity();
        if ($this->request->is('post')) {
            $habitacion = $this->Habitacion->patchEntity($habitacion, $this->request->getData());
            if ($this->Habitacion->save($habitacion)) {
                $this->Flash->success(__('The habitacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The habitacion could not be saved. Please, try again.'));
        }
        $this->set(compact('habitacion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Habitacion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $habitacion = $this->Habitacion->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $habitacion = $this->Habitacion->patchEntity($habitacion, $this->request->getData());
            if ($this->Habitacion->save($habitacion)) {
                $this->Flash->success(__('The habitacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The habitacion could not be saved. Please, try again.'));
        }
        $this->set(compact('habitacion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Habitacion id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $habitacion = $this->Habitacion->get($id);
        if ($this->Habitacion->delete($habitacion)) {
            $this->Flash->success(__('The habitacion has been deleted.'));
        } else {
            $this->Flash->error(__('The habitacion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
