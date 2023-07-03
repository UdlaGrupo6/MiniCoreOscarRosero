<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cita Model
 *
 * @method \App\Model\Entity\Citum newEmptyEntity()
 * @method \App\Model\Entity\Citum newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Citum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Citum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Citum findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Citum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Citum[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Citum|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Citum saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Citum[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Citum[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Citum[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Citum[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CitaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cita');
        $this->setDisplayField('citasId');
        $this->setPrimaryKey('citasId');
        $this->belongsTo('Servicio', [
            'foreignKey' => 'servicioId',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmptyTime('hora');

        $validator
            ->integer('servicioId')
            ->requirePresence('servicioId', 'create')
            ->notEmptyString('servicioId');

        return $validator;
    }
}
