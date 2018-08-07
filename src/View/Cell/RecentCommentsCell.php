<?php

namespace App\View\Cell;

use App\Model\Table\Yii\CommentsTable;
use App\Model\Table\Yii\PostsTable;
use App\Model\Table\Yii\TagsTable;

use Cake\View\Cell;

/**
 * Class RecentCommentsCell
 * @package App\View\Cell
 * @property YiiTagsTable Categories
 * @property YiiPostsTable Posts
 */
class RecentCommentsCell extends Cell
{
	/**
	 * List of valid options that can be passed into this
	 * cell's constructor.
	 * @var array
	 */
	protected $_validCellOptions = [];

	/**
	 * Default display method.
	 * @return void
	 */
	public function display()
	{
		$this->loadModel('YiiTags');
		$this->loadModel('YiiPosts');
		
		// $categories = $this->YiiTags->find();
		$categories = $this->YiiTags->find();
		// $posts = $this->YiiPosts->find()->order(['id' => 'desc'])->limit(5);
		// $posts = $this->YiiPost->YiiComments->find()->order(['id' => 'desc'])->limit(5);
		$posts = [];
		$this->set(compact('categories', 'posts'));
	}
}
// $this->widget('RecentComments', array('maxComments' => Yii::app()->params['recentCommentCount']));