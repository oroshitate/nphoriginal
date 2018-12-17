<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NetflixGitemmaster Entity
 *
 * @property int $id
 * @property string $genre
 * @property \Cake\I18n\FrozenTime $created_t
 */
class NetflixGitemmaster extends Entity
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
        'genre' => true,
        'created_t' => true
    ];
}
