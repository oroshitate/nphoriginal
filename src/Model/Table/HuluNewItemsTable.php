<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HuluNewItems Model
 *
 * @method \App\Model\Entity\HuluNewItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\HuluNewItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HuluNewItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HuluNewItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HuluNewItem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HuluNewItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HuluNewItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HuluNewItem findOrCreate($search, callable $callback = null, $options = [])
 */
class HuluNewItemsTable extends Table
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

        $this->setTable('hulu_new_items');
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
            ->scalar('category')
            ->maxLength('category', 32)
            ->requirePresence('category', 'create')
            ->notEmpty('category');

        $validator
            ->scalar('format')
            ->maxLength('format', 32)
            ->allowEmpty('format');

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
