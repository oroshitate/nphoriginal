<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created_t
 * @property \Cake\I18n\FrozenTime $deleted_t
 *
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\HuluReview[] $hulu_reviews
 * @property \App\Model\Entity\NetflixReview[] $netflix_reviews
 * @property \App\Model\Entity\PrimeReview[] $prime_reviews
 * @property \App\Model\Entity\Thread[] $threads
 */
class User extends Entity
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
        'name' => true,
        'created_t' => true,
        'deleted_t' => true,
        'comments' => true,
        'hulu_reviews' => true,
        'netflix_reviews' => true,
        'prime_reviews' => true,
        'threads' => true
    ];
}
