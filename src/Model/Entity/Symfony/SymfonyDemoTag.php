<?php
namespace App\Model\Entity\Symfony;

use Cake\ORM\Entity;

/**
 * SymfonyTags Entity
 *
 * @property int $id
 * @property string $name
 * @property int $frequency
 */
class SymfonyTags extends Entity
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
        'name' => true,
        'frequency' => true
    ];
}
