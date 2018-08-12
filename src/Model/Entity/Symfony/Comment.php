<?php
namespace App\Model\Entity\Symfony;

use Cake\ORM\Entity;

/**
 * SymfonyDemoComment Entity
 *
 * @property int $id
 * @property int $post_id
 * @property int $author_id
 * @property string|resource $content
 * @property \Cake\I18n\FrozenTime $publishedAt
 * @property int $status
 *
 * @property \App\Model\Entity\Symfony\Post $symfony_demo_post
 * @property \App\Model\Entity\Symfony\User $symfony_demo_user
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
        'post_id' => true,
        'author_id' => true,
        'content' => true,
        'publishedAt' => true,
        'status' => true,
        'symfony_demo_post' => true,
        'symfony_demo_user' => true
    ];
}
