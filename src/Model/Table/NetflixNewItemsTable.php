<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NetflixNewItems Model
 *
 * @method \App\Model\Entity\NetflixNewItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\NetflixNewItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NetflixNewItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NetflixNewItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixNewItem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixNewItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixNewItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixNewItem findOrCreate($search, callable $callback = null, $options = [])
 */
class NetflixNewItemsTable extends Table
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

        $this->setTable('netflix_new_items');
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
            ->scalar('distribution')
            ->maxLength('distribution', 64)
            ->allowEmpty('distribution');

        $validator
            ->scalar('released_t')
            ->maxLength('released_t', 64)
            ->requirePresence('released_t', 'create')
            ->notEmpty('released_t');

        $validator
            ->dateTime('created_t')
            ->allowEmpty('created_t');

        return $validator;
    }
}
