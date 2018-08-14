<?php

namespace App\View\Cell;

// use App\Model\Table\YiiTagTable;
// use App\Model\Table\YiiPostTable;
// use App\Model\Table\YiiCommentTable;
// use App\Model\Entity\YiiComment;

use Cake\View\Cell;

/**
 * Class UserMenuCell
 * @package App\View\Cell
 * @property YiiTagTable YiiTag
 * @property YiiPostTable YiiPost
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
		$this->loadModel('YiiTag');
        // $this->loadModel('YiiPost');
        $this->loadModel('YiiComment');

		$tags = $this->Tag->find();
        // $posts = $this->YiiPost->find()->order(['id' => 'desc'])->limit(5);
        $pendingComments = $this->YiiComment->find()->where('status='.YiiComment::STATUS_PENDING)->count();

        // $this->set(compact('pendingComments', 'posts','tags'));
        $this->set(compact('pendingComments', 'tags'));

        // $this->pendingCommentCount;
        // $pendingCommentCount='Count';
        // $this->set(compact('pendingCommentCount'));
	}
}
