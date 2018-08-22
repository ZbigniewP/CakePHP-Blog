<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyTags[]|\Cake\Collection\CollectionInterface $dataTags
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Comments'), ['controller' => 'SymfonyComment','action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts Tag'), ['controller' => 'SymfonyPostsTag', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Tags'), ['controller' => 'SymfonyTags', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'SymfonyUser', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?></li>
	</ul>
</nav>
<div class="SymfonyTags index large-9 medium-8 columns content">
	<h3><?= __('Symfony Tag') ?></h3>
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
			<?php foreach ($dataTags as $dataTags): ?>
			<tr>
				<!-- <td><?= $this->Number->format($dataTags->id) ?></td> -->
				<td><?= h($dataTags->name) ?></td>
				<td><?= $this->Number->format($dataTags->frequency) ?></td>
				<td class="actions">
					<?= $this->Html->link(__('View'), ['action' => 'view', $dataTags->id]) ?>
					<?= $this->Html->link(__('Edit'), ['action' => 'edit', $dataTags->id]) ?>
					<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dataTags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dataTags->id)]) ?>
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
