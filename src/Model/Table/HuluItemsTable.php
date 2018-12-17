<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HuluItems Model
 * @property \App\Model\Table\HuluReviewsTable|\Cake\ORM\Association\HasMany $HuluReviews
 *
 * @method \App\Model\Entity\HuluItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\HuluItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HuluItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HuluItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HuluItem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HuluItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HuluItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HuluItem findOrCreate($search, callable $callback = null, $options = [])
 */
class HuluItemsTable extends Table
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

        $this->setTable('hulu_items');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('HuluReviews', [
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
            ->scalar('genre')
            ->maxLength('genre', 64)
            ->allowEmpty('genre');

        $validator
            ->scalar('story')
            ->maxLength('story', 750)
            ->requirePresence('story', 'create')
            ->notEmpty('story');

        $validator
            ->scalar('actors')
            ->maxLength('actors', 256)
            ->allowEmpty('actors');

        $validator
            ->scalar('directors')
            ->maxLength('directors', 64)
            ->allowEmpty('directors');

        $validator
            ->scalar('producers')
            ->maxLength('producers', 64)
            ->allowEmpty('producers');

        $validator
            ->scalar('writers')
            ->maxLength('writers', 64)
            ->allowEmpty('writers');

        $validator
            ->scalar('channel')
            ->maxLength('channel', 64)
            ->allowEmpty('channel');

        $validator
            ->dateTime('created_t')
            ->requirePresence('created_t', 'create')
            ->notEmpty('created_t');

        return $validator;
    }
}
