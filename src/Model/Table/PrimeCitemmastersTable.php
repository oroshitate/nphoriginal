<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrimeCitemmasters Model
 *
 * @method \App\Model\Entity\PrimeCitemmaster get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrimeCitemmaster newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrimeCitemmaster[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrimeCitemmaster|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrimeCitemmaster|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrimeCitemmaster patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrimeCitemmaster[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrimeCitemmaster findOrCreate($search, callable $callback = null, $options = [])
 */
class PrimeCitemmastersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('prime_citemmasters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('content')
            ->maxLength('content', 32)
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->dateTime('created_t')
            ->requirePresence('created_t', 'create')
            ->notEmpty('created_t');

        return $validator;
    }
}
