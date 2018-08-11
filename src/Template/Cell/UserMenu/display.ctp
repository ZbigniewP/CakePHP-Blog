<div class="portlet">
	<div class="portlet-decoration">
		<div class="portlet-title">Menu</div>
	</div>
	<div class="portlet-content">
		<ul>
			<li><?= $this->Html->link('Create New Post', '/yii/post/create') ?></li>
			<li><?= $this->Html->link('Manage Posts', '/yii/post/admin') ?></li>
			<li><?= $this->Html->link('Approve Comments', '/yii/comment/index') . ' (' . $pendingComments . ')'; ?></li>
			<li><?= $this->Html->link('Logout', '/yii/post/logout') ?></li>
		</ul>
	</div>
</div>