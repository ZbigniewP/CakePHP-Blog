<?php

namespace App\View\Cell;

use App\Model\Table\Yii\TagTable;
use App\Model\Table\Yii\PostTable;
use App\Model\Table\Yii\CommentTable;
use App\Model\Entity\Yii\Comment;

use Cake\View\Cell;

/**
 * Class UserMenuCell
 * @package App\View\Cell
 * @property TagTable Tags
 * @property PostTable Post
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
		$this->loadModel('Tag');
        // $this->loadModel('Post');
        $this->loadModel('Comment');

		$tags = $this->Tag->find();
        // $posts = $this->YiiPost->find()->order(['id' => 'desc'])->limit(5);
        $pendingComments = $this->Comment->find()->where('status='.Comment::STATUS_PENDING)->count();

        // $this->set(compact('pendingComments', 'posts','tags'));
        $this->set(compact('pendingComments', 'tags'));

        // $this->pendingCommentCount;
        // $pendingCommentCount='Count';
        // $this->set(compact('pendingCommentCount'));
	}
}
