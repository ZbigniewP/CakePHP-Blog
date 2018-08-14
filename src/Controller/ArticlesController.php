<?php
namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{

	public function index()
	{
// $this->theme = 'yiiDEMO';
// $this->title = 'Blog yii';
		$this->layout = 'column1';
		// $this->layout = 'column2';

		// $this->render('/Layout/admin');
		// $this->render('/Layout/default');
		// $this->render('/Layout/error');

		// $this->render('/Layout/main');
		// $this->render('/Layout/column1');
		// $this->render('/Layout/column2');

		// $this->render('/Pages/home');
		// $this->render('/Posts/index');

		$this->render('/Admin/index');
	}
}

