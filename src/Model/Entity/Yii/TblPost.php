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
 * @property \App\Model\Entity\Articles $articles
 * @property \App\Model\Entity\TblUser $tbl_user
 */
class TblPost extends Entity
{
	const STATUS_DRAFT = 1;
	const STATUS_PUBLISHED = 2;
	const STATUS_ARCHIVED = 3;

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
		'*' => true,
		'id' => false
	];
	// protected $_accessible = [
	// 	'author_id' => true,
	// 	'content' => true,
	// 	'create_time' => true,
	// 	'page_id' => true,
	// 	'status' => true,
	// 	'tags' => true,
	// 	'title' => true,
	// 	'update_time' => true,

	// 	'articles' => true,
	// 	'tbl_user' => true
	// ];

}
