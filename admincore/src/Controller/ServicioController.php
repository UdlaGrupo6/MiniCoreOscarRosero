<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Servicio Controller
 *
 * @property \App\Model\Table\ServicioTable $Servicio
 * @method \App\Model\Entity\Servicio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicioController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $servicio = $this->paginate($this->Servicio);

        $this->set(compact('servicio'));
    }

    /**
     * View method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicio = $this->Servicio->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('servicio'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicio = $this->Servicio->newEmptyEntity();
        if ($this->request->is('post')) {
            $servicio = $this->Servicio->patchEntity($servicio, $this->request->getData());

            if (!$servicio->getErrors) {
                $image = $this->request->getData('image_file');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT . 'img' . DS . $name;

                if ($name)
                    $image->moveTo($targetPath);
                $servicio->image = $name;
            }




            if ($this->Servicio->save($servicio)) {
                $this->Flash->success(__('The servicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The servicio could not be saved. Please, try again.'));
        }
        $this->set(compact('servicio'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicio = $this->Servicio->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicio = $this->Servicio->patchEntity($servicio, $this->request->getData());
            if ($this->Servicio->save($servicio)) {
                $this->Flash->success(__('The servicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The servicio could not be saved. Please, try again.'));
        }
        $this->set(compact('servicio'));
    }


    /*public function countServicesInRange()
    {
        // Obtener las fechas de inicio y fin del rango
        $start_date = $this->request->getQuery('start_date');
        $end_date = $this->request->getQuery('end_date');

        // Consultar la base de datos para contar los servicios en el rango de fechas
        $serviceCount = $this->Service->find()
            ->where(['fecha_inicio >=' => $start_date, 'fecha_fin <=' => $end_date])
            ->count();

        // Pasar el contador a la vista
        $this->set('serviceCount', $serviceCount);
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicio = $this->Servicio->get($id);
        if ($this->Servicio->delete($servicio)) {
            $this->Flash->success(__('The servicio has been deleted.'));
        } else {
            $this->Flash->error(__('The servicio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
