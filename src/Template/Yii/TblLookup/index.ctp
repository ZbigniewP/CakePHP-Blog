<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblLookup[]|\Cake\Collection\CollectionInterface $tblLookup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Comments'), ['controller' => 'TblComment','action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Lookup'), ['controller' => 'TblLookup', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'YiiPost', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Tags'), ['controller' => 'TblTag', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'TblUser', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Lookup'), ['action' => 'add']) ?></li>
	</ul>
</nav>
<div class="tblLookup index large-9 medium-8 columns content">
	<h3><?= __('Yii Lookup') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th>
				<th scope="col"><?= $this->Paginator->sort('position') ?></th> -->
				<th scope="col"><?= $this->Paginator->sort('code') ?></th>
				<th scope="col"><?= $this->Paginator->sort('name') ?></th>
				<th scope="col"><?= $this->Paginator->sort('type') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tblLookup as $tblLookup): ?>
			<tr>
				<!-- <td><?= $this->Number->format($tblLookup->id) ?></td>
				<td><?= $this->Number->format($tblLookup->position) ?></td> -->
				<td><?= h($tblLookup->code) ?></td>
				<td><?= h($tblLookup->name) ?></td>
				<td><?= h($tblLookup->type) ?></td>
				<td class="actions">
					<?= $this->Html->link(__('View'), ['action' => 'view', $tblLookup->id]) ?>
					<?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblLookup->id]) ?>
					<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblLookup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblLookup->id)]) ?>
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
