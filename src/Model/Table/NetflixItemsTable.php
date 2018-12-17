<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NetflixItems Model
 * @property \App\Model\Table\NetflixReviewsTable|\Cake\ORM\Association\HasMany $NetflixReviews
 *
 * @method \App\Model\Entity\NetflixItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\NetflixItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NetflixItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NetflixItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixItem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NetflixItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NetflixItem findOrCreate($search, callable $callback = null, $options = [])
 */
class NetflixItemsTable extends Table
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

        $this->setTable('netflix_items');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('NetflixReviews', [
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
            ->allowEmpty('duration');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 256)
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->scalar('tag')
            ->maxLength('tag', 64)
            ->allowEmpty('tag');

        $validator
            ->scalar('story')
            ->maxLength('story', 500)
            ->requirePresence('story', 'create')
            ->notEmpty('story');

        $validator
            ->scalar('actors')
            ->maxLength('actors', 128)
            ->requirePresence('actors', 'create')
            ->notEmpty('actors');

        $validator
            ->scalar('directors')
            ->maxLength('directors', 64)
            ->allowEmpty('directors');

        $validator
            ->scalar('creators')
            ->maxLength('creators', 64)
            ->allowEmpty('creators');

        $validator
            ->dateTime('created_t')
            ->allowEmpty('created_t');

        return $validator;
    }
}
