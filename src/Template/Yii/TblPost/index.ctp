<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblPost[]|\Cake\Collection\CollectionInterface $dataPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('New Tbl Post'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Tbl User'), ['controller' => 'TblUser', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Tbl User'), ['controller' => 'TblUser', 'action' => 'add']) ?></li>
	</ul>
</nav>
<div class="tblPost index large-9 medium-8 columns content">
	<h3><?= __('Tbl Post') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
				<!-- <th scope="col"><?= $this->Paginator->sort('page_id') ?></th> -->
				<th scope="col"><?= $this->Paginator->sort('title') ?></th>
				<th scope="col"><?= $this->Paginator->sort('status') ?></th>
				<th scope="col"><?= $this->Paginator->sort('create_time') ?></th>
				<th scope="col"><?= $this->Paginator->sort('update_time') ?></th>
				<th scope="col"><?= $this->Paginator->sort('author_id') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dataPost as $data): ?>
			<tr>
				<!-- <td><?= $this->Number->format($data->id) ?></td> -->
				<!-- <td><?= $this->Number->format($data->page_id) ?></td> -->
				<td><?= h($data->title) ?></td>
				<td><?= $this->Number->format($data->status) ?></td>
				<td><?= h($data->create_time) ?></td>
				<td><?= h($data->update_time) ?></td>
				<td><?= $data->has('yii_user') ? $this->Html->link($data->yii_user->username, ['controller' => 'TblUser', 'action' => 'view', $data->yii_user->id]) : $data->author_id ?></td>
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
