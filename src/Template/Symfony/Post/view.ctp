<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPost $dataPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $data->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'SymfonyUser', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'SymfonyUser', 'action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="symfonyDemoPost view large-9 medium-8 columns content">
	<h3><?= h($data->title) ?></h3>
	<table class="vertical-table">
		<tr>
			<th scope="row"><?= __('Author') ?></th>
			<td><?= $data->has('symfony_user') ? $this->Html->link($data->symfony_user->fullName, ['controller' => 'SymfonyUser', 'action' => 'view', $data->symfony_user->id]) : $this->Number->format($data->author_id) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Title') ?></th>
			<td><?= h($data->title) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Slug') ?></th>
			<td><?= h($data->slug) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Summary') ?></th>
			<td><?= h($data->summary) ?></td>
		</tr>
		<!-- <tr>
			<th scope="row"><?= __('Id') ?></th>
			<td><?= $this->Number->format($data->id) ?></td>
		</tr> -->
		<tr>
			<th scope="row"><?= __('Status') ?></th>
			<td><?= $this->Number->format($data->status) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('PublishedAt') ?></th>
			<td><?= h($data->publishedAt) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('UpdatedAt') ?></th>
			<td><?= h($data->updatedAt) ?></td>
		</tr>
	</table>
	<div class="row">
		<h4><?= __('Content') ?></h4>
		<?= $this->Markdown->parse($data->content) ?>
	</div>
	<div class="row">
		<h4><?= __('Tags') ?></h4>
		<?= $this->Text->autoParagraph(h($data->tags)); ?>
	</div>
</div>
