<?php

namespace App\View\Cell;

use App\Model\Table\Yii\CommentTable;
use App\Model\Table\Yii\PostTable;
use App\Model\Table\Yii\TagTable;

use Cake\View\Cell;

/**
 * Class RecentCommentsCell
 * @package App\View\Cell
 * @property TagTable Categories
 * @property PostTable Posts
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
		$this->loadModel('Tag');
		$this->loadModel('Post');
		
		// $categories = $this->Tag->find();
		$categories = $this->Tag->find();
		// $posts = $this->Post->find()->order(['id' => 'desc'])->limit(5);
		// $posts = $this->Post->Comment->find()->order(['id' => 'desc'])->limit(5);
		$posts = [];
		$this->set(compact('categories', 'posts'));
	}
}
// $this->widget('RecentComments', array('maxComments' => Yii::app()->params['recentCommentCount']));