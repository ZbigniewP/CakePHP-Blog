<?php
namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * SymfonyComment Entity
 *
 * @property int $id
 * @property int $post_id
 * @property int $author_id
 * @property string|resource $content
 * @property \Cake\I18n\FrozenTime $publishedAt
 * @property int $status
 *
 * @property \App\Model\Entity\SymfonyPost $symfony_post
 * @property \App\Model\Entity\SymfonyUser $symfony_user
 */
class SymfonyComment extends Entity
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
        'author_id' => true,
        'content' => true,
        'post_id' => true,
        'publishedAt' => true,
        // 'status' => true,
        'symfony_post' => true,
        'symfony_user' => true
    ];
}
