<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\ServicioTable;

/**
 * Cita Controller
 *
 * @property \App\Model\Table\CitaTable $Cita
 * @method \App\Model\Entity\Citum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CitaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cita = $this->paginate($this->Cita);

        $cita = $this->Cita->find('all')->contain('Servicio');

        $this->set(compact('cita'));
    }

    /**
     * View method
     *
     * @param string|null $id Citum id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $citum = $this->Cita->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('citum'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicioTable = new ServicioTable();
        $nombresServicios = $servicioTable->find('list')->toArray();
        $this->set('nombresServicios', $nombresServicios);


        $citum = $this->Cita->newEmptyEntity();
        if ($this->request->is('post')) {
            $citum = $this->Cita->patchEntity($citum, $this->request->getData());
            if ($this->Cita->save($citum)) {
                $this->Flash->success(__('The citum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The citum could not be saved. Please, try again.'));
        }
        $this->set(compact('citum'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Citum id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $citum = $this->Cita->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $citum = $this->Cita->patchEntity($citum, $this->request->getData());
            if ($this->Cita->save($citum)) {
                $this->Flash->success(__('The citum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The citum could not be saved. Please, try again.'));
        }
        $this->set(compact('citum'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Citum id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $citum = $this->Cita->get($id);
        if ($this->Cita->delete($citum)) {
            $this->Flash->success(__('The citum has been deleted.'));
        } else {
            $this->Flash->error(__('The citum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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


    public function rango()
    {
        $citas = [];
        $serviciosRepetidos = [];

        if ($this->request->is('post')) {
            $inicio = $this->request->getData('fecha_inicio');
            $fin = $this->request->getData('fecha_fin');

            $citas = $this->Cita->find('all')->contain('Servicio')
                ->where(['fecha >=' => $inicio, 'fecha <=' => $fin])
                ->toArray();

            foreach ($citas as $citum) {
                $servicioId = $citum->servicio->servicioId;
                $nombreServicio = $citum->servicio->service;

                if (isset($serviciosRepetidos[$servicioId])) {
                    $serviciosRepetidos[$servicioId]['cantidad']++;
                } else {
                    $serviciosRepetidos[$servicioId] = [
                        'nombre' => $nombreServicio,
                        'cantidad' => 1
                    ];
                }
            }
        }

        $this->set('citas', $citas);
        $this->set('serviciosRepetidos', $serviciosRepetidos);
    }
}
