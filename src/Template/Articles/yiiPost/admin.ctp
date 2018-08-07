<div class="col-md-8 columns content">
<h1>Manage posts</h1>

<p><?= $this->Html->link('Add a new post', ['controller' => 'Admin', 'action' => 'add'], ['class' => 'btn btn-primary']) ?></p>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Category</th>
			<th>Publication date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($module as $data): ?>
<?php
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// exit();
?>
			<tr>
				<td><?= $data->id ?></td>
				<td><?= isset($data->title)?$data->title:$data->name ?></td>
				<td nowrap><?= isset($data->tags)?$data->tags:$data->category->name ?></td>
				<td align="right" nowrap><?= isset($data->update_time)?strftime('%c', $data->update_time):$data->created ?></td>
				<td align="right" nowrap width="180px"><span class="btn-group">
<?php
echo $this->Html->link(
	'<span class="glyphicon glyphicon-eye-close"></span>',
	['controller' => 'Posts', 'action' => 'view', 'slug' => $data->slug],
	['title' => 'View', 'class' => 'btn btn-default', 'escapeTitle' => false]
),
	$this->Html->link(
	'<span class="glyphicon glyphicon-edit"></span>',
	['controller' => 'Admin', 'action' => 'edit', 'id' => $data->id],
	['title' => 'Edit', 'class' => 'btn btn-primary', 'escapeTitle' => false]
),
	$this->Form->postLink(
	__('<span class="glyphicon glyphicon-trash"></span>'),
	['controller' => 'Admin', 'action' => 'delete', $data->id],
	['title' => 'Delete', 'class' => 'btn btn-danger', 'escapeTitle' => false, 'confirm' => __('Are you sure  ?')]
);
?>
					</span>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php if ($this->Paginator->counter() !== '1 of 1'): ?>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->prev('«') ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next('»') ?>
		</ul>
	</div>
<?php endif; ?>
</div>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $data->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]
			)
			?></li>
		<li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
	</ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
	<?= $this->Form->create($data) ?>
	<fieldset>
		<legend><?= __('Edit Post') ?></legend>
		<?php
		echo $this->Form->control('name');
		echo $this->Form->control('tags');
		echo $this->Form->control('content');
		echo $this->Form->control('status', ['options' => $status]);
		echo $this->Form->control('username', ['options' => $users]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>