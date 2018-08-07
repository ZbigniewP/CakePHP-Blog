<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TblPost Entity
 *
 * @property int $id
 * @property int $page_id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $author_id
 *
 * @property \App\Model\Entity\Page $page
 * @property \App\Model\Entity\TblUser $tbl_user
 */
class TblPost extends Entity
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
        'page_id' => true,
        'title' => true,
        'content' => true,
        'tags' => true,
        'status' => true,
        'create_time' => true,
        'update_time' => true,
        'author_id' => true,
        'page' => true,
        'tbl_user' => true
    ];
}
