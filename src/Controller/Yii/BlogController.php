<?php

namespace App\Controller\Yii;

use App\Model\Entity\Yii\Post;
use App\Model\Table\Yii\PostTable;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;

// use App\Controller\AppController;

class BlogController extends AppController
{
	public $paginate = [
		'contain' => ['Tag', 'User'],
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

		// $this->set(compact('Post'));
		// $this->set('_serialize', ['Post']);

		// $this->paginate = ['contain' => ['User']];
        $posts = $this->paginate($this->Post);

		$this->set(compact('posts'));
		$this->set('_serialize', ['posts']);
	}

	public function view($slug = null)
	{
		$errors = [];

		$comment = $this->Post->Comment->newEntity();
		$this->Post->Comment->_connection = 'db_yii';

		if ($this->request->is(['post'])) {
			$comment = $this->Post->Comment->patchEntity($comment, $this->request->getData());
			if ($this->Post->Comment->save($comment)) {
			}
		}

		$post = $this->Post->find()->where(['Post.id' => $slug])->contain(['User','Comment'])->first();//'YiiTag',

		$this->set(compact('post', 'comment', 'errors'));
		$this->set('_serialize', ['post']);
	}

	// public function category($slug)
	// {
	// 	$posts = $this->paginate($this->Post->find()->where(['YiiTag.name' => $slug]));

	// 	$this->set(compact('posts'));
	// 	$this->set('_serialize', ['posts']);
	// 	$this->render('index');
	// }
}