<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrimeItem Entity
 *
 * @property int $id
 * @property string $title
 * @property string $released_t
 * @property string $duration
 * @property string $content
 * @property string $genre
 * @property string $story
 * @property string $actors
 * @property \Cake\I18n\FrozenTime $created_t
 */
class PrimeItem extends Entity
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
        'content' => true,
        'genre' => true,
        'story' => true,
        'actors' => true,
        'created_t' => true
    ];
}
