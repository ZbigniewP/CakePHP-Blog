<?php

namespace App\Controller;

use App\Model\Entity\Yii\Post;
use App\Model\Table\Yii\PostTable;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;

// use App\Controller\AppController;

class YiiController extends AppController
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
		// $posts = [];//$this->paginate($this->Post);

		// $this->set(compact('Post'));
		// $this->set('_serialize', ['Post']);

		// $this->paginate = ['contain' => ['User']];
		$posts = $this->paginate($this->Post);

		$this->set(compact('Post'));
		$this->set('_serialize', ['Post']);
	}

	public function view($slug = null)
	{
		$errors = [];

		$comment = $this->Post->Comments->newEntity();
		$this->Post->Comments->_connection = 'db_yii';

		if ($this->request->is(['post'])) {
			$comment = $this->Post->Comments->patchEntity($comment, $this->request->getData());
			if ($this->Post->Comments->save($comment)) {
			}
		}

		$posts = $this->Post->find()->where(['Post.id' => $slug])->contain(['User', 'Comment'])->first();//'Tag',

		$this->set(compact('post', 'comment', 'errors'));
		$this->set('_serialize', ['post']);
	}

	// public function category($slug)
	// {
	// 	$posts = $this->paginate($this->Post->find()->where(['Tag.name' => $slug]));

	// 	$this->set(compact('posts'));
	// 	$this->set('_serialize', ['posts']);
	// 	$this->render('index');
	// }
	public function blog()
	{
		$posts = $this->paginate($this->Post);

		$this->set(compact('Post'));
		$this->set('_serialize', ['Post']);
	}
}