<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * YiiTag Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $post_count
 *
 * @property YiiPost[] $posts
 */
class YiiTag extends Entity
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
		'*' => true,
		'id' => false
	];
	
	public static function string2array($tags)
	{
		return preg_split('/\s*,\s*/', trim($tags), -1, PREG_SPLIT_NO_EMPTY);
	}

	public static function array2string($tags)
	{
		return implode(', ', $tags);
	}
}