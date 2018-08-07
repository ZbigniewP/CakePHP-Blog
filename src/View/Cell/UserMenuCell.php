<?php

namespace App\View\Cell;

use App\Model\Table\Yii\TagsTable;
use App\Model\Table\Yii\PostsTable;
use App\Model\Table\Yii\CommentsTable;
use App\Model\Entity\Yii\Comments;

use Cake\View\Cell;

/**
 * Class UserMenuCell
 * @package App\View\Cell
 * @property YiiTagsTable Tags
 * @property YiiPostsTable Posts
 */
class UserMenuCell extends Cell
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
        // $this->loadModel('YiiPosts');
        $this->loadModel('YiiComments');

		$tags = $this->YiiTags->find();
        // $posts = $this->YiiPosts->find()->order(['id' => 'desc'])->limit(5);
        $pendingComments = $this->YiiComments->find()->where('status='.YiiComments::STATUS_PENDING)->count();

        // $this->set(compact('pendingComments', 'posts','tags'));
        $this->set(compact('pendingComments', 'tags'));

        // $this->pendingCommentCount;
        // $pendingCommentCount='Count';
        // $this->set(compact('pendingCommentCount'));
	}
}
