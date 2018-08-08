<?php
namespace App\Controller;

use App\Model\Entity\Post;
use App\Model\Table\PostsTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;

// use App\Controller\AppController;

class BlogDemoController extends AppController
{
	public $paginate = [
		'contain' => ['Categories', 'Users'],
		'limit' => 5
	];

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow();
	}
	
	public function index()
	{
		$blogdemo = [];//$this->paginate($this->Posts);

		$this->set(compact('blogdemo'));
		$this->set('_serialize', ['blogdemo']);
	}
	
	public function view()
	{

	}
	
	public function category()
	{

	}
}

