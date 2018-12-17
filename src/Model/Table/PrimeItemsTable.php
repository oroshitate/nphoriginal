<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrimeItems Model
 * @property \App\Model\Table\PrimeReviewsTable|\Cake\ORM\Association\HasMany $PrimeReviews
 *
 * @method \App\Model\Entity\PrimeItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrimeItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrimeItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrimeItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrimeItem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrimeItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrimeItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrimeItem findOrCreate($search, callable $callback = null, $options = [])
 */
class PrimeItemsTable extends Table
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

        $this->setTable('prime_items');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('PrimeReviews', [
            'foreignKey' => 'item_id'
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
            ->scalar('title')
            ->maxLength('title', 64)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('released_t')
            ->maxLength('released_t', 64)
            ->requirePresence('released_t', 'create')
            ->notEmpty('released_t');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 64)
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');

        $validator
            ->scalar('content')
            ->maxLength('content', 64)
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 64)
            ->allowEmpty('genre');

        $validator
            ->scalar('story')
            ->maxLength('story', 500)
            ->requirePresence('story', 'create')
            ->notEmpty('story');

        $validator
            ->scalar('actors')
            ->maxLength('actors', 64)
            ->allowEmpty('actors');

        $validator
            ->dateTime('created_t')
            ->requirePresence('created_t', 'create')
            ->notEmpty('created_t');

        return $validator;
    }
}
