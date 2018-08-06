<?php

namespace App\Controller;

use App\Model\Entity\YiiPost;
use App\Model\Table\YiiPostTable;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;

// use App\Controller\AppController;

class XXXBlogyiiController extends AppController
{
	public $paginate = [
		'contain' => ['YiiTags', 'YiiUsers'],
		// 'contain' => ['YiiUsers'],
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

		// $this->paginate = ['contain' => ['YiiUsers']];
        $posts = $this->paginate($this->YiiPost);

		$this->set(compact('yiiPost'));
		$this->set('_serialize', ['yiiPost']);
	}

	public function view($slug = null)
	{
		$errors = [];

		$comment = $this->YiiPost->YiiComments->newEntity();
		$this->YiiPost->YiiComments->_connection = 'db_yii';

		if ($this->request->is(['post'])) {
			$comment = $this->YiiPost->YiiComments->patchEntity($comment, $this->request->getData());
			if ($this->YiiPost->YiiComments->save($comment)) {
			}
		}

		$posts = $this->YiiPost->find()->where(['YiiPost.id' => $slug])->contain(['YiiUsers','YiiComments'])->first();//'YiiTags',

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