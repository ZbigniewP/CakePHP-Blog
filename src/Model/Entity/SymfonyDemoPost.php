<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SymfonyDemoPost Entity
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $slug
 * @property string $summary
 * @property string|resource $content
 * @property \Cake\I18n\FrozenTime $publishedAt
 * @property int $status
 * @property \Cake\I18n\FrozenTime $updatedAt
 *
 * @property \App\Model\Entity\SymfonyDemoUser $symfony_demo_user
 */
class SymfonyDemoPost extends Entity
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
        'title' => true,
        'slug' => true,
        'summary' => true,
        'content' => true,
        'publishedAt' => true,
        'status' => true,
        'updatedAt' => true,
        'symfony_demo_user' => true
    ];
}