<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HuluReview Entity
 *
 * @property int $id
 * @property int $user_id
 * @property float $rate
 * @property string $review
 * @property int $item_id
 * @property \Cake\I18n\FrozenTime $created_t
 * @property \Cake\I18n\FrozenTime $deleted_t
 *
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\HuluItem $hulu_item
 */
class HuluReview extends Entity
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
        'user_id' => true,
        'rate' => true,
        'review' => true,
        'item_id' => true,
        'created_t' => true,
        'deleted_t' => true,
        'reviews' => true,
        'user' => true,
        'hulu_item' => true
    ];
}
