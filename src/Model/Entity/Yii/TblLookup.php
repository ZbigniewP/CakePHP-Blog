<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TblLookup Entity
 *
 * @property int $id
 * @property int $position
 * @property string $code
 * @property string $name
 * @property string $type
 */
class TblLookup extends Entity
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
        'position' => true,
        'code' => true,
        'name' => true,
        'type' => true
    ];
}
