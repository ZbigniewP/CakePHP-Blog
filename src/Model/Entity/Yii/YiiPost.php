<?php

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;
use Cake\Routing\Router;
// use Cake\View\Helper\UrlHelper;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $content
 * @property int $category_id
 * @property int $user_id
 * @property FrozenTime $created
 *
 * @property YiiTags $category
 * @property YiiUser $user
 * @property YiiComments[] $comments
 */
class YiiPost extends Entity
{
	const STATUS_DRAFT = 1;
	const STATUS_PUBLISHED = 2;
	const STATUS_ARCHIVED = 3;

	private $_oldTags;
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

    // public function getAlias()
    // {
	// 	// exit($alias);
	// 	// return $this->alias;
	// }

	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Router::url(['controller' => 'YiiPost', 'action' => 'view', 'id' => $this->id, 'title' => $this->title],true);
	}

	/**
	 * @return array a list of links that point to the post list filtered by every tag of this post
	 */
	public function getTagLinks()
	{
		// $links[] = $this->Html->link($tag, ['yii/post/index', 'tag' => $tag]);
		foreach (YiiTag::string2array($this->tags) as $tag)
			$links[] = ['label' => $tag, 'url' => Router::url(['controller' => 'YiiPost', 'action' => 'index', 'tag' => $tag],true)];
		return $links;
	}
}