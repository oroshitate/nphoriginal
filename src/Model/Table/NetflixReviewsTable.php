<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NetflixReviews Model
 *
 * @property \App\Model\Table\ReviewsTable|\Cake\ORM\Association\HasMany $Reviews
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\NetflixItemsTable|\Cake\ORM\Association\BelongsTo $NetflixItems
 *
 * @method \App\Model\Entity\NetflixReview get($primaryKey, $options = [])
 * @method \App\Model\Entity\NetflixReview newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NetflixReview[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NetflixReview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixReview|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixReview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixReview[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixReview findOrCreate($search, callable $callback = null, $options = [])
 */
class NetflixReviewsTable extends Table
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

        $this->setTable('netflix_reviews');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Reviews', [
            'foreignKey' => 'review_id'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('NetflixItems', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
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
            ->numeric('rate')
            ->requirePresence('rate', 'create')
            ->notEmpty('rate');

        $validator
            ->scalar('review')
            ->maxLength('review', 500)
            ->allowEmpty('review');

        $validator
            ->dateTime('created_t')
            ->allowEmpty('created_t');

        $validator
            ->dateTime('deleted_t')
            ->allowEmpty('deleted_t');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['item_id'], 'NetflixItems'));

        return $rules;
    }
}
