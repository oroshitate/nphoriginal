<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NetflixItem Entity
 *
 * @property int $id
 * @property string $title
 * @property string $released_t
 * @property string $duration
 * @property string $genre
 * @property string $tag
 * @property string $story
 * @property string $actors
 * @property string $directors
 * @property string $creators
 * @property \Cake\I18n\FrozenTime $created_t
 */
class NetflixItem extends Entity
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
        'title' => true,
        'released_t' => true,
        'duration' => true,
        'genre' => true,
        'tag' => true,
        'story' => true,
        'actors' => true,
        'directors' => true,
        'creators' => true,
        'created_t' => true
    ];
}
