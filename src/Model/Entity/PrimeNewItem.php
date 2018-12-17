<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrimeNewItem Entity
 *
 * @property int $id
 * @property string $title
 * @property string $duration
 * @property string $content
 * @property string $story
 * @property string $actors
 * @property string $released_t
 * @property \Cake\I18n\FrozenTime $created_t
 */
class PrimeNewItem extends Entity
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
        'duration' => true,
        'content' => true,
        'story' => true,
        'actors' => true,
        'released_t' => true,
        'created_t' => true
    ];
}
