<?php

namespace App\View\Cell;

use App\Model\Table\Yii\TagTable;
use App\Model\Table\Yii\PostTable;
use App\Model\Table\Yii\CommentTable;
// use App\Model\Entity\Yii\Comment;

use Cake\View\Cell;

/**
 * Class TagCloudCell
 * @package App\View\Cell
 * @property TagTable Tags
 * @property PostTable Posts
 */
class TagCloudCell extends Cell
{
	public $title = 'Tags';
	public $maxTags = 20;
	
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
		// $this->loadModel('Post');
		// $this->loadModel('Comment');

		$tags = $this->Tag->find();
		// $tags = Tag::model()->findTagWeights($this->maxTags);
		$tags = $this->Tag->findTagWeights($this->maxTags);

		// $posts = $this->YiiPost->find()->order(['id' => 'desc'])->limit(5);
		// $pendingComments = $this->Comment->find()->where('status='.Comment::STATUS_PENDING)->count();

		// $this->set(compact('pendingComments', 'posts','tags'));
		$this->set(compact('tags'));

		// $this->pendingCommentCount;
		// $pendingCommentCount='Count';
		// $this->set(compact('pendingCommentCount'));
	}
}
// $this->widget('TagCloud', array('maxTags' => Yii::app()->params['tagCloudCount']));

// $cell = $this->cell('Taxonomy.TagCloud::smallList', ['limit' => 10]);
// $cell = $this->cell('TagCloud::smallList', ['limit' => 10]);
// $cell = $this->cell('Taxonomy.TagCloud');

// `cell('TagCloud::smallList', ['a1' => 'v1', 'a2' => 'v2'])` maps to `View\Cell\TagCloud::smallList(v1, v2)`