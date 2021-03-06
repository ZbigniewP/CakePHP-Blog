<?php

namespace App\View\Cell;

// use App\Model\Table\YiiTagTable;
// use App\Model\Table\YiiPostTable;
// use App\Model\Table\YiiCommentTable;
// use App\Model\Entity\YiiComment;

use Cake\View\Cell;

/**
 * Class TagCloudCell
 * @package App\View\Cell
 * @property YiiTagTable YiiTag
 * @property YiiPostTable YiiPost
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
		$this->loadModel('YiiTag');
		// $this->loadModel('YiiPost');
		// $this->loadModel('YiiComment');

		$tags = $this->YiiTag->find();
		// $tags = Tag::model()->findTagWeights($this->maxTags);
		$tags = $this->YiiTag->findTagWeights($this->maxTags);

		// $posts = $this->YiiPost->find()->order(['id' => 'desc'])->limit(5);
		// $pendingComments = $this->YiiComment->find()->where('status='.YiiComment::STATUS_PENDING)->count();

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