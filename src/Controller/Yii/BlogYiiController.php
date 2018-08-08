<?php

namespace App\Controller\Yii;

use App\Model\Entity\Yii\Post;
use App\Model\Table\Yii\PostTable;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;

// use App\Controller\AppController;

class BlogyiiController extends AppController
{
	public $paginate = [
		'contain' => ['Tags', 'User'],
		// 'contain' => ['User'],
		'limit' => 5
	];

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow();
	}

	public function index()
	{
		// $posts = [];//$this->paginate($this->Posts);

		// $this->set(compact('yiiPost'));
		// $this->set('_serialize', ['yiiPost']);

		// $this->paginate = ['contain' => ['Users']];
        $posts = $this->paginate($this->Post);

		$this->set(compact('posts'));
		$this->set('_serialize', ['posts']);
	}

	public function view($slug = null)
	{
		$errors = [];

		$comment = $this->YiiPost->YiiComment->newEntity();
		$this->YiiPost->YiiComment->_connection = 'db_yii';

		if ($this->request->is(['post'])) {
			$comment = $this->YiiPost->YiiComment->patchEntity($comment, $this->request->getData());
			if ($this->YiiPost->YiiComment->save($comment)) {
			}
		}

		$posts = $this->YiiPost->find()->where(['YiiPost.id' => $slug])->contain(['Users','YiiComment'])->first();//'YiiTags',

		$this->set(compact('post', 'comment', 'errors'));
		$this->set('_serialize', ['post']);
	}

	// public function category($slug)
	// {
	// 	$posts = $this->paginate($this->YiiPost->find()->where(['YiiTags.name' => $slug]));

	// 	$this->set(compact('posts'));
	// 	$this->set('_serialize', ['posts']);
	// 	$this->render('index');
	// }
}