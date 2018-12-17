<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrimeNewItems Model
 *
 * @method \App\Model\Entity\PrimeNewItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrimeNewItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrimeNewItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrimeNewItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrimeNewItem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrimeNewItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrimeNewItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrimeNewItem findOrCreate($search, callable $callback = null, $options = [])
 */
class PrimeNewItemsTable extends Table
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

        $this->setTable('prime_new_items');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 64)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 32)
            ->allowEmpty('duration');

        $validator
            ->scalar('content')
            ->maxLength('content', 32)
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->scalar('story')
            ->maxLength('story', 750)
            ->allowEmpty('story');

        $validator
            ->scalar('actors')
            ->maxLength('actors', 64)
            ->allowEmpty('actors');

        $validator
            ->scalar('released_t')
            ->maxLength('released_t', 64)
            ->requirePresence('released_t', 'create')
            ->notEmpty('released_t');

        $validator
            ->dateTime('created_t')
            ->requirePresence('created_t', 'create')
            ->notEmpty('created_t');

        return $validator;
    }
}
