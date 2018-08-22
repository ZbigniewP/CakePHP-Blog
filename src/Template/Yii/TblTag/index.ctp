<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblTag[]|\Cake\Collection\CollectionInterface $dataTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Comments'), ['controller' => 'TblComment','action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Lookup'), ['controller' => 'TblLookup', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'TblPost', 'action' => 'index']) ?></li>
		<li class="active"><?= $this->Html->link(__('List Tags'), ['controller' => 'TblTag', 'action' => 'index'],['class'=>'active']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'TblUser', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?></li>
	</ul>
</nav>
<div class="tblTag index large-9 medium-8 columns content">
	<h3><?= __('Yii Tags') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
				<th scope="col"><?= $this->Paginator->sort('name') ?></th>
				<th scope="col"><?= $this->Paginator->sort('frequency') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dataTag as $data): ?>
			<tr>
				<!-- <td><?= $this->Number->format($data->id) ?></td> -->
				<td><?= h($data->name) ?></td>
				<td><?= $this->Number->format($data->frequency) ?></td>
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
