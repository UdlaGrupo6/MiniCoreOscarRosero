<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Habitacion Model
 *
 * @method \App\Model\Entity\Habitacion newEmptyEntity()
 * @method \App\Model\Entity\Habitacion newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Habitacion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Habitacion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Habitacion findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Habitacion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Habitacion[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Habitacion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Habitacion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Habitacion[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Habitacion[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Habitacion[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Habitacion[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HabitacionTable extends Table
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

        $this->setTable('habitacion');
        $this->setDisplayField('habitacionId');
        $this->setPrimaryKey('habitacionId');
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
            ->requirePresence('numero', 'create')
            ->notEmptyString('numero');

        $validator
            ->integer('clienteId')
            ->requirePresence('clienteId', 'create')
            ->notEmptyString('clienteId');

        return $validator;
    }
}
