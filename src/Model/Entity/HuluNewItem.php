<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HuluNewItem Entity
 *
 * @property int $id
 * @property string $title
 * @property string $duration
 * @property string $category
 * @property string $format
 * @property string $released_t
 * @property \Cake\I18n\FrozenTime $created_t
 */
class HuluNewItem extends Entity
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
        'category' => true,
        'format' => true,
        'released_t' => true,
        'created_t' => true
    ];
}
