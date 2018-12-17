<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NetflixGitemmasters Model
 *
 * @method \App\Model\Entity\NetflixGitemmaster get($primaryKey, $options = [])
 * @method \App\Model\Entity\NetflixGitemmaster newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NetflixGitemmaster[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NetflixGitemmaster|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixGitemmaster|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixGitemmaster patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixGitemmaster[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixGitemmaster findOrCreate($search, callable $callback = null, $options = [])
 */
class NetflixGitemmastersTable extends Table
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

        $this->setTable('netflix_gitemmasters');
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
            ->scalar('genre')
            ->maxLength('genre', 32)
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->dateTime('created_t')
            ->allowEmpty('created_t');

        return $validator;
    }
}
