<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NetflixTitemmasters Model
 *
 * @method \App\Model\Entity\NetflixTitemmaster get($primaryKey, $options = [])
 * @method \App\Model\Entity\NetflixTitemmaster newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NetflixTitemmaster[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NetflixTitemmaster|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixTitemmaster|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixTitemmaster patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixTitemmaster[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixTitemmaster findOrCreate($search, callable $callback = null, $options = [])
 */
class NetflixTitemmastersTable extends Table
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

        $this->setTable('netflix_titemmasters');
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
            ->scalar('tag')
            ->maxLength('tag', 32)
            ->requirePresence('tag', 'create')
            ->notEmpty('tag');

        $validator
            ->dateTime('created_t')
            ->allowEmpty('created_t');

        return $validator;
    }
}
