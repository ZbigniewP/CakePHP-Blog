<div class="portlet">
	<div class="portlet-decoration">
		<div class="portlet-title">Menu</div>
	</div>
	<div class="portlet-content">
		<ul>
			<li><?= $this->Html->link('Create New Post', '/yiipost/create') ?></li>
			<li><?= $this->Html->link('Manage Posts', '/yiipost/admin') ?></li>
			<li><?= $this->Html->link('Approve Comments', '/yiicomments/index') . ' (' . $pendingComments . ')'; ?></li>
			<li><?= $this->Html->link('Logout', '/yiipost/logout') ?></li>
		</ul>
	</div>
</div>