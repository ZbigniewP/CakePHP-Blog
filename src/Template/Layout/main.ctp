<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;
$this_menu = [
	'items' => [
		['label' => 'Home', 'url' => ['']],
		['label' => 'Pages', 'url' => ['controller' => 'Pages', 'action' => 'display']],//, 'home'
		['label' => 'Cake', 'url' => '/blog'],
		['label' => 'Yii', 'url' => '/yii'],
		['label' => 'Symfony', 'url' => '/symfony'],
		['label' => 'Admin', 'url' => ['controller' => 'Admin', 'action' => 'index']],
		['label' => 'Login', 'url' => ['controller' => 'Users', 'action' => 'login'], 'visible' => $this->request->session()->read('Auth.User')],
		// ['label' => 'Logout (app()->user->name)', 'url' => ['controller' => 'Admin', 'action' => 'logout'], 'visible' => !$this->request->session()->read('Auth.User')]
	],
];

// $this->Breadcrumbs->add([
// 	['title' => 'Home','url'=>'/'], 
// 	['title' => 'aaa','url'=>'/'], 
// 	['title' => 'bbb','url'=>'/']
// ]);
// // 'title', 'url', 'options'
// $this->Breadcrumbs->add('Home', $url = null,$options = []);
// 'wrapper' => '<ul{{attrs}}>{{content}}</ul>'
// $this->Breadcrumbs->defaultConfig['template']['wrapper']='<div class="breadcrumbs"><ul{{attrs}}>{{content}}</ul></div>';
// 'templateVars'=>['wrapper' => ],

// $this->beginContent('/layouts/main');
// $this->dispatchEvent('View.beforeRender', ['/layout/main']);
// $this->renderLayout($content, 'main');

// echo "<pre>";
// print_r($this->content);
// echo "</pre>";
// exit();

// $this->renderLayout();

// $this->dispatchEvent('View.afterRender', ['/layout/main']);
// $this->endContent() 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<?= $this->Html->meta('icon') ?>
	<!-- blueprint CSS framework -->
	<?= $this->Html->css('yii/screen.css',['media' => 'screen, projection']) ?>
	<?= $this->Html->css('yii/print.css',['media' => 'print']) ?>
	<!--[if lt IE 8]>
	<?= $this->Html->css('yii/ie.css',['media' => 'screen, projection']) ?>
	<![endif]-->
	<?= $this->Html->css(['yii/main.css','yii/form.css']) ?>
	
	<title><?= $this->fetch('title'); ?> | MyDomain.com</title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?= $this->fetch('title'); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<ul>
		<?php foreach($this_menu['items'] as  $_key => $_val): ?>
			<li><?= $this->Html->link($_val['label'], $_val['url']) ?></li>
		<?php endforeach; ?>
		</ul>
	</div><!-- mainmenu -->
	<div class="breadcrumbs">
		<?= $this->Breadcrumbs->render(['class'=>'breadcrumbs']) ?><!-- breadcrumbs -->
	</div>
	<?= $this->Flash->render() ?>
	<?= $this->fetch('content'); ?>
	
	<div id="footer">
		Copyright &copy; <?php echo date('Y')?> by My Company.<br />
		All Rights Reserved.<br />
		<?php echo 'CakePHP '.Configure::version() ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>