<?php

namespace App\View\Cell;

use App\Model\Table\Yii\TagsTable;
use App\Model\Table\Yii\PostsTable;
use App\Model\Table\Yii\CommentsTable;
// use App\Model\Entity\Yii\Comments;

use Cake\View\Cell;

/**
 * Class TagCloudCell
 * @package App\View\Cell
 * @property YiiTagsTable Tags
 * @property YiiPostsTable Posts
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
		$this->loadModel('YiiTags');
		// $this->loadModel('YiiPosts');
		// $this->loadModel('YiiComments');

		$tags = $this->YiiTags->find();
		// $tags = Tag::model()->findTagWeights($this->maxTags);
		// $tags = $this->YiiTags->findTagWeights($this->maxTags);

		// $posts = $this->YiiPosts->find()->order(['id' => 'desc'])->limit(5);
		// $pendingComments = $this->YiiComments->find()->where('status='.YiiComments::STATUS_PENDING)->count();

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