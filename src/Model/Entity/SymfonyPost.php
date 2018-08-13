<?php
namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;
/**
 * Symfony\Post Entity
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
 * @property \App\Model\Entity\SymfonyUser $symfony_user
 */
class SymfonyPost extends Entity
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
		'content' => true,
		'summary' => true,
		'title' => true,
		'slug' => true,
		'status' => true,

		'publishedAt' => true,
		'updatedAt' => true,
		'symfony_user' => true
	];
}
