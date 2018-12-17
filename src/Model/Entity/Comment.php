<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property int $thread_id
 * @property string $user_id
 * @property string $comment
 * @property int $resid
 * @property \Cake\I18n\FrozenTime $created_t
 * @property \Cake\I18n\FrozenTime $deleted_t
 *
 * @property \App\Model\Entity\Thread $thread
 * @property \App\Model\Entity\User $user
 */
class Comment extends Entity
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
        'thread_id' => true,
        'user_id' => true,
        'comment' => true,
        'resid' => true,
        'created_t' => true,
        'deleted_t' => true,
        'thread' => true,
        'user' => true
    ];
}
