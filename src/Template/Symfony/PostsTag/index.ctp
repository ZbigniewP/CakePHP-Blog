<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPostsTag[]|\Cake\Collection\CollectionInterface $dataPostsTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Comment'), ['controller' => 'SymfonyComment','action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts Tag'), ['controller' => 'SymfonyPostsTag', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Tags'), ['controller' => 'SymfonyTags', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'SymfonyUser', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post Tag'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?></li>
	</ul>
</nav>
<div class="symfonyDemoPostTag index large-9 medium-8 columns content">
	<h3><?= __('Symfony Post Tag') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th scope="col"><?= $this->Paginator->sort('post_id') ?></th>
				<th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dataPostsTag as $dataPostsTag): ?>
			<tr>
				<td><?= $dataPostsTag->has('symfony_post') ? $this->Html->link($dataPostsTag->symfony_post->title, ['controller' => 'SymfonyPost', 'action' => 'view', $dataPostsTag->post_id]) : $dataPostsTag->post_id ?></td>
				<td><?= $dataPostsTag->has('symfony_tag') ? $this->Html->link($dataPostsTag->symfony_tag->name, ['controller' => 'SymfonyTags', 'action' => 'view', $dataPostsTag->tag_id]) : $dataPostsTag->tag_id ?></td>
				<!-- <td><?= $this->Number->format($dataPostsTag->tag_id) ?></td> -->
				<td class="actions">
					<?= $this->Html->link(__('View'), ['action' => 'view', $dataPostsTag->tag_id]) ?>
					<?= $this->Html->link(__('Edit'), ['action' => 'edit', $dataPostsTag->post_id]) ?>
					<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dataPostsTag->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $dataPostsTag->post_id)]) ?>
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
