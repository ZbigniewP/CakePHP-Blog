<?php
namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{
	public function index()
	{
		$posts = $this->paginate($this->Articles);
// pr($posts);exit;
		$this->set(compact('posts'));
		$this->set('_serialize', ['posts']);

// $this->theme = 'yiiDEMO';
// $this->title = 'Blog yii';

		// $this->layout = 'column1';
		// $this->layout = 'column2';
		// $this->layout = 'bootstrap';

		// $this->render('/Layout/admin');
		// $this->render('/Layout/default');
		// $this->render('/Layout/error');

		// $this->render('/Layout/blueprint');
		// $this->render('/Layout/column1');
		// $this->render('/Layout/column2');

		// $this->render('/Pages/home');
		// $this->render('/Posts/index');

		// $this->render('/Admin/index');
	}
}

