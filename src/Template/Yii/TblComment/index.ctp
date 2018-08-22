<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YiiComment[]|\Cake\Collection\CollectionInterface $dataComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Comments'), ['controller' => 'TblComment','action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Lookup'), ['controller' => 'TblLookup', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'TblPost', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Tags'), ['controller' => 'TblTag', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'TblUser', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?></li>
	</ul>
</nav>
<div class="tblComment index large-9 medium-8 columns content">
	<h3><?= __('Comments') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
				<!-- <th scope="col"><?= $this->Paginator->sort('type') ?></th> -->
				<th scope="col"><?= $this->Paginator->sort('status') ?></th>
				<th scope="col"><?= $this->Paginator->sort('create_time') ?></th>
				<th scope="col"><?= $this->Paginator->sort('author') ?></th>
				<!-- <th scope="col"><?= $this->Paginator->sort('email') ?></th> -->
				<!-- <th scope="col"><?= $this->Paginator->sort('url') ?></th> -->
				<th scope="col"><?= $this->Paginator->sort('post_id') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dataComment as $data): ?>
			<tr>
				<!-- <td><?= $this->Number->format($data->id) ?></td> -->
				<!-- <td><?= $this->Number->format($data->type) ?></td> -->
				<td><?= $data->has('status_type') ? $this->Html->link($data->status_type->name, ['controller' => 'TblLookup', 'action' => 'view', $data->status_type->id]) :$this->Number->format($data->status) ?></td>
				<td><?= date('Y-m-d H:i', $data->create_time) ?></td>
				<td><?= h($data->author) ?></td>
				<!-- <td><?= h($data->email) ?></td> -->
				<!-- <td><?= h($data->url) ?></td> -->
				<td><?= $data->has('post') ? $this->Html->link($data->post->title, ['controller' => 'TblPost', 'action' => 'view', $data->post->id]) : $this->Number->format($data->post_id) ?></td>
				<td class="actions">
					<?= $this->Html->link(__('View'), ['action' => 'view', $data->id]) ?>
					<?= $this->Html->link(__('Edit'), ['action' => 'edit', $data->id]) ?>
					<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->first('<< ' . __('first')) ?>
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
			<?= $this->Paginator->last(__('last') . ' >>') ?>
		</ul>
		<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
	</div>
</div>
