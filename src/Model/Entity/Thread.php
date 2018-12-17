<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Thread Entity
 *
 * @property int $id
 * @property string $title
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created_t
 * @property \Cake\I18n\FrozenTime $deleted_t
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Comment[] $comments
 */
class Thread extends Entity
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
        'user_id' => true,
        'created_t' => true,
        'deleted_t' => true,
        'user' => true,
        'comments' => true
    ];

    /**
     * スレッドコメント数の取得
     * @return $comments_count スレッドコメント数
     */
    public function getCommentcount(){
        $thread_id = $this->id;

        $Comments = TableRegistry::get('Comments');
        $comments_count = $Comments->find()
          ->where(['thread_id' => $thread_id])
          ->count();
        $this->count = $comments_count;

        return $this;
    }
}
