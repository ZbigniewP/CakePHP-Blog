<h1><?=__('Manage posts') ?></h1>

<p><?= $this->Html->link(__('Add a new post'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?></p>
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col"><?= __('id') ?></th>
			<th scope="col"><?= $this->Paginator->sort('title') ?></th>
			<th scope="col"><?= $this->Paginator->sort('category') ?></th>
			<th scope="col"><?= $this->Paginator->sort('created') ?></th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $data) : ?>
			<tr>
				<td><?= $data->id ?></td>
				<td><?= $data->has('title') ? $data->title : $data->name ?></td>
				<td nowrap><?= $data->has('tags') ? $data->tags : $data->has('category') ? $data->category->name : '' ?></td>
				<td align="right" nowrap><?= $data->has('update_time') ? strftime('%c', $data->update_time) : $data->created ?></td>
				<td align="right" nowrap width="180px"><span class="btn-group">
<?= $this->Html->link(
	'<span class="glyphicon glyphicon-eye-close"></span><span class="hidden">' . __('View') . '</span>',
	['action' => 'view', 'slug' => $data->slug],
	['title' => __('View'), 'class' => 'btn btn-default', 'escapeTitle' => false]
) . PHP_EOL,
	$this->Html->link(
	'<span class="glyphicon glyphicon-edit"></span><span class="hidden">' . __('Edit') . '</span>',
	['action' => 'edit', 'id' => $data->id],
	['title' => __('Edit'), 'class' => 'btn btn-primary', 'escapeTitle' => false]
) . PHP_EOL,
	$this->Form->postLink(
	'<span class="glyphicon glyphicon-trash"></span><span class="hidden">' . __('Delete') . '</span>',
	['action' => 'delete', $data->id],
	['title' => __('Delete'), 'class' => 'btn btn-danger', 'escapeTitle' => false, 'confirm' => __('Are you sure  ?')]
) . PHP_EOL;
?>
					</span>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php if (isset($this->Paginator) && $this->Paginator->counter() !== '1 of 1') : ?>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->prev('«') ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next('»') ?>
		</ul>
	</div>
<?php endif; ?>
