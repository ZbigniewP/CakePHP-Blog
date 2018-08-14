<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TblComment Entity
 *
 * @property int $id
 * @property int $type
 * @property string $content
 * @property int $status
 * @property int $create_time
 * @property string $author
 * @property string $email
 * @property string $url
 * @property int $post_id
 *
 * @property \App\Model\Entity\TblPost $tbl_post
 */
class TblComment extends Entity
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
		'author' => true,
		'content' => true,
		'create_time' => true,
		'email' => true,
		'post_id' => true,
		'status' => true,
		'type' => true,
		'url' => true,

		'tbl_post' => true
	];
}
