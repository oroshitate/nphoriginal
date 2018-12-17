<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CommentsTable|\Cake\ORM\Association\HasMany $Comments
 * @property \App\Model\Table\HuluReviewsTable|\Cake\ORM\Association\HasMany $HuluReviews
 * @property \App\Model\Table\NetflixReviewsTable|\Cake\ORM\Association\HasMany $NetflixReviews
 * @property \App\Model\Table\PrimeReviewsTable|\Cake\ORM\Association\HasMany $PrimeReviews
 * @property \App\Model\Table\ThreadsTable|\Cake\ORM\Association\HasMany $Threads
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Comments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('HuluReviews', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('NetflixReviews', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('PrimeReviews', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Threads', [
            'foreignKey' => 'user_id'
        ]);
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
            ->scalar('name')
            ->maxLength('name', 32)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->dateTime('created_t')
            ->allowEmpty('created_t');

        $validator
            ->dateTime('deleted_t')
            ->allowEmpty('deleted_t');

        return $validator;
    }
}
