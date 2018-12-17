<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrimeReviews Model
 * @property \App\Model\Table\ReviewsTable|\Cake\ORM\Association\HasMany $Reviews
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\HuluItemsTable|\Cake\ORM\Association\BelongsTo $NetflixItems
 *
 * @method \App\Model\Entity\PrimeReview get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrimeReview newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrimeReview[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrimeReview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrimeReview|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrimeReview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrimeReview[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrimeReview findOrCreate($search, callable $callback = null, $options = [])
 */
class PrimeReviewsTable extends Table
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

        $this->setTable('prime_reviews');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Reviews', [
            'foreignKey' => 'review_id'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('PrimeItems', [
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
            ->allowEmpty('rate');

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
        $rules->add($rules->existsIn(['item_id'], 'PrimeItems'));

        return $rules;
    }
}
