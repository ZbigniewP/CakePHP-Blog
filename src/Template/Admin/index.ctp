<h1>Manage posts</h1>

<p><?= $this->Html->link('Add a new post', ['controller' => 'Admin', 'action' => 'add'], ['class' => 'btn btn-primary']) ?></p>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th width="50%">Name</th>
			<th>Category</th>
			<th>Publication date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post): ?>
			<tr>
				<td><?= $post->id ?></td>
				<td><?= isset($post->title)?$post->title:$post->name ?></td>
				<td nowrap><?= isset($post->tags)?$post->tags:$post->category->name ?></td>
				<td align="right" nowrap><?= isset($post->update_time)?strftime('%c', $post->update_time):$post->created ?></td>
				<td align="right" nowrap width="180px"><span class="btn-group">
<?php
echo $this->Html->link(
	'<span class="glyphicon glyphicon-eye-close"></span>',
	['controller' => 'Posts', 'action' => 'view', 'slug' => $post->slug],
	['title' => 'View', 'class' => 'btn btn-default', 'escapeTitle' => false]
),
	$this->Html->link(
	'<span class="glyphicon glyphicon-edit"></span>',
	['controller' => 'Admin', 'action' => 'edit', 'id' => $post->id],
	['title' => 'Edit', 'class' => 'btn btn-primary', 'escapeTitle' => false]
),
	$this->Form->postLink(
	__('<span class="glyphicon glyphicon-trash"></span>'),
	['controller' => 'Admin', 'action' => 'delete', $post->id],
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
