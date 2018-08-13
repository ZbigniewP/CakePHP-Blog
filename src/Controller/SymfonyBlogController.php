<?php
namespace App\Controller;

use App\Model\Entity\SymfonyPost;
use App\Model\Table\SymfonyPostsTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;

// use App\Controller\AppController;

class SymfonyBlogController extends AppController
{
	public $paginate = [
		'contain' => ['SymfonyComment', 'SymfonyUser'],
		'limit' => 5
	];

	public function beforeFilter(Event $event)
	{
		// parent::beforeFilter($event);
		// $this->Auth->allow();
	}
	
	public function index()
	{
		$dataPost = [];//$this->paginate($this->Posts);

		$this->set(compact('dataPost'));
		$this->set('_serialize', ['dataPost']);

		$this->render('//Symfony/Blog/index');
	}
	
	public function view()
	{

	}
	
	public function category()
	{

	}
}

