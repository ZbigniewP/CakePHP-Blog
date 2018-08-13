<?php
namespace App\Model\Entity\Symfony;

use Cake\ORM\Entity;

/**
 * SymfonyPostTag Entity
 *
 * @property int $post_id
 * @property int $tag_id
 *
 * @property \App\Model\Entity\SymfonyPost $symfony_post
 * @property \App\Model\Entity\Symfony\SymfonyTags $symfony_demo_tag
 */
class SymfonyPostTag extends Entity
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
        'symfony_demo_post' => true,
        'symfony_demo_tag' => true
    ];
}
