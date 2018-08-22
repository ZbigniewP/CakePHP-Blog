<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPost[]|\Cake\Collection\CollectionInterface $data
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
		<li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'SymfonyUser', 'action' => 'add']) ?> </li>

	</ul>
</nav>
<div class="symfonyDemoPost index large-9 medium-8 columns content">
	<h3><?= __('Symfony Post') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
				<th scope="col"><?= $this->Paginator->sort('title') ?></th>
				<th scope="col"><?= $this->Paginator->sort('author_id') ?></th>
				<!-- <th scope="col"><?= $this->Paginator->sort('slug') ?></th> -->
				<!-- <th scope="col"><?= $this->Paginator->sort('summary') ?></th> -->
				<th scope="col"><?= $this->Paginator->sort('published_at') ?></th>
				<!-- <th scope="col"><?= $this->Paginator->sort('updatedAt') ?></th> -->
				<!-- <th scope="col"><?= $this->Paginator->sort('status') ?></th> -->
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dataPost as $data): ?>
			<tr>
				<!-- <td><?= $this->Number->format($data->id) ?></td> -->
				<td colspan="3">
				<div><?= h($data->title) ?></div>
				<?= $data->has('author') ? $this->Html->link($data->author->full_name, ['controller' => 'SymfonyUser', 'action' => 'view', $data->author_id]) : '' ?>
				<!-- </td> -->
				<!-- <td><?= h($data->slug) ?></td> -->
				<!-- <td><?= h($data->summary) ?></td> -->
				<!-- <td> -->
				<span class="right"><?= h($data->published_at) ?></span>
				</td>
				<!-- <td><?= h($data->updatedAt) ?></td> -->
				<!-- <td><?= $this->Number->format($data->status) ?></td> -->
				<!-- <td><?= $data->has('statusType') ? $this->Html->link($data->statusType->name, ['controller' => 'TblLookup', 'action' => 'view', $data->statusType->id]) : $this->Number->format($data->status) ?></td> -->
				<td class="actions">
					<?= $this->Html->link(__('View'), ['action' => 'view', $data->id]) ?>
					<?= $this->Html->link(__('Edit'), ['action' => 'edit', $data->id], ['class' => 'btn btn-primary']) ?>
					<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $data->id], ['class' => 'btn btn-danger', 'title'=> __('Are you sure  ?'),'confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?>
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
