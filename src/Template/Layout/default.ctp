<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Test | Admin panel</title>

	<?= $this->Html->css(['base', 'style', 'home']) ?>

	<style>
		/* body {padding-top: 50px;}
		.sidebar {margin-top: 50px;} */
		.paginator li {padding-left: 0;}
		header.row {margin-bottom: 0;}
		#footer {margin-bottom: 30px; text-align:center;font-size:80%;color: #777;}
	</style>
</head>

<body>

	<header class="row">
		<div class="container">
			<nav class="top-bar expanded" data-topbar="" role="navigation">
				<ul class="title-area large-3 medium-4 columns">
					<li class="name"><h1><?= $this->Html->link('Blog', ['controller' => 'Admin'], ['class' => 'navbar-brand']) ?></h1></li>
				</ul>
			<nav class="top-bar-section">
				<ul class="right">
					<li><?= $this->Html->link('Pages', '/pages') ?></li>
					<!-- <li><?= $this->Html->link('Pages', ['controller' => 'pages', 'action' => 'display']) ?></li> -->

					<li><?= $this->Html->link('Yii', '/yii') ?></li>
					<li><?= $this->Html->link('Symfony', '/symfony') ?></li>
					<li><?= $this->Html->link('SymfonyBlog', '/symfonyBlog') ?></li>
				<?php if ($this->request->session()->read('Auth.User')): ?>
					<li><?= $this->Html->link('Admin', ['controller' => 'admin', 'action' => 'index']) ?></li>
					<li><?= $this->Html->link('Admin Yii', ['controller' => 'YiiAdmin', 'action' => 'admin']) ?></li>
					<li><?= $this->Html->link('Back to front', '/blog') ?></li>
					<li><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?></li>
				<?php else: ?>
					<li><?= $this->Html->link('Login', ['controller' => 'users', 'action' => 'login']) ?></li>
				<?php endif; ?>
				</ul>
			</nav>
			</nav>
		</div>
	</header>

	<div class="row">
		<div class="container"><div class="columns large-12">
			<?= $this->Breadcrumbs->render(['class'=>'breadcrumbs']) ?><!-- breadcrumbs -->
			<?= $this->Flash->render(); ?><!-- messages -->
			<?= $this->fetch('content'); ?><!-- content -->
		</div>
	</div></div>

	<div class="row"><hr /><div class="columns large-12">
		<div id="footer">
			Copyright &copy; <?= date('Y')?> by My Company.<br />
			All Rights Reserved.
			<?php echo 'CakePHP '. Configure::version() ?>
		</div><!-- footer -->
	</div></div>

</body>
</html>
