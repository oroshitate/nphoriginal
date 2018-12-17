<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Review Entity
 *
 * @property int $id
 * @property string $service
 * @property int $review_id
 * @property \Cake\I18n\FrozenTime $created_t
 * @property \Cake\I18n\FrozenTime $deleted_t
 *
 * @property \App\Model\Entity\Review[] $reviews
 */
class Review extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'service' => true,
        'review_id' => true,
        'created_t' => true,
        'deleted_t' => true,
        'reviews' => true
    ];

    /**
     * 投稿者及び作品タイトルの取得
     * @return $review_list レビューリスト
     */
    public function getReviewlist(){
        $review_id = $this->review_id;
        $service = $this->service;

        if($service=='netflix'){
            $this->NetflixReviews = TableRegistry::get('NetflixReviews');
            $review = $this->NetflixReviews->find()
              ->select(['user_id','item_id','review','rate'])
              ->where(['id' => $review_id])
              ->toList();

            $this->user_id = $review[0]['user_id'];
            $this->item_id = $review[0]['item_id'];
            $this->review = $review[0]['review'];
            $this->rate = $review[0]['rate'];

            $this->Users = TableRegistry::get('Users');
            $user = $this->Users->find()
              ->select(['name'])
              ->where(['id' => $this->user_id])
              ->toList();
            $this->name = $user[0]['name'];

            $this->NetflixItems = TableRegistry::get('NetflixItems');
            $item = $this->NetflixItems->find()
              ->select(['title'])
              ->where(['id' => $this->item_id])
              ->toList();
            $this->title = $item[0]['title'];
        }elseif ($service=="hulu") {
            $this->HuluReviews = TableRegistry::get('HuluReviews');
            $review = $this->HuluReviews->find()
              ->select(['user_id','item_id','review','rate'])
              ->where(['id' => $review_id])
              ->toList();

            $this->user_id = $review[0]['user_id'];
            $this->item_id = $review[0]['item_id'];
            $this->review = $review[0]['review'];
            $this->rate = $review[0]['rate'];

            $this->Users = TableRegistry::get('Users');
            $user = $this->Users->find()
              ->select(['name'])
              ->where(['id' => $this->user_id])
              ->toList();
            $this->name = $user[0]['name'];

            $this->HuluItems = TableRegistry::get('HuluItems');
            $item = $this->HuluItems->find()
              ->select(['title'])
              ->where(['id' => $this->item_id])
              ->toList();
            $this->title = $item[0]['title'];
        }else{
            $this->PrimeReviews = TableRegistry::get('PrimeReviews');
            $review = $this->PrimeReviews->find()
              ->select(['user_id','item_id','review','rate'])
              ->where(['id' => $review_id])
              ->toList();

            $this->user_id = $review[0]['user_id'];
            $this->item_id = $review[0]['item_id'];
            $this->review = $review[0]['review'];
            $this->rate = $review[0]['rate'];

            $this->Users = TableRegistry::get('Users');
            $user = $this->Users->find()
              ->select(['name'])
              ->where(['id' => $this->user_id])
              ->toList();
            $this->name = $user[0]['name'];

            $this->PrimeItems = TableRegistry::get('PrimeItems');
            $item = $this->PrimeItems->find()
              ->select(['title'])
              ->where(['id' => $this->item_id])
              ->toList();
            $this->title = $item[0]['title'];
        }

        return $this;
    }
}
