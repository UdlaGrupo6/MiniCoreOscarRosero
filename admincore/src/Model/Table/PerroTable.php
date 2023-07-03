<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Perro Model
 *
 * @method \App\Model\Entity\Perro newEmptyEntity()
 * @method \App\Model\Entity\Perro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Perro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Perro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Perro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Perro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Perro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Perro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Perro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Perro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Perro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Perro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Perro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PerroTable extends Table
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

        $this->setTable('perro');
        $this->setDisplayField('perroId');
        $this->setPrimaryKey('perroId');
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
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('size')
            ->maxLength('size', 255)
            ->requirePresence('size', 'create')
            ->notEmptyString('size');

        $validator
            ->scalar('vacunas')
            ->maxLength('vacunas', 255)
            ->requirePresence('vacunas', 'create')
            ->notEmptyString('vacunas');

        $validator
            ->scalar('dieta')
            ->maxLength('dieta', 255)
            ->requirePresence('dieta', 'create')
            ->notEmptyString('dieta');

        return $validator;
    }
}
