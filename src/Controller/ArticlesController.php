<?php
namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{

    public function index()
    {
        // $this->render('/Layout/error');
        // $this->render('/Layout/admin');
        // $this->render('/Layout/default');
        // $this->render('/Pages/home');
        $this->render('/Posts/index');

        // $this->render('/Layout/main');
        // $this->render('/Layout/column1');
        // $this->render('/Layout/column2');
    }
}

