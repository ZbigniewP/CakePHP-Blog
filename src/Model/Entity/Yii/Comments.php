<?php

namespace App\Model\Entity\Yii;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property string $username
 * @property string $mail
 * @property string $content
 * @property int $post_id
 * @property FrozenTime $created
 *
 * @property Post $post
 */
class Comments extends Entity
{
	const STATUS_PENDING=1;
	const STATUS_APPROVED=2;
	
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
		'id' => false,
	];

// public $pendingCommentCount = 'Count';
// public static function model(){

// self::$pendingCommentCount = 'Count';
// return self::patchEntity();
// }
}