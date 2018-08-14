<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YiiComment $dataComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $data->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Comment'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="tblComment view large-9 medium-8 columns content">
	<h3><?= h($data->id) ?></h3>
	<table class="vertical-table">
		<tr>
			<th scope="row"><?= __('Author') ?></th>
			<td><?= h($data->author) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Email') ?></th>
			<td><?= h($data->email) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Url') ?></th>
			<td><?= h($data->url) ?></td>
		</tr>
		<!-- <tr>
			<th scope="row"><?= __('Id') ?></th>
			<td><?= $this->Number->format($data->id) ?></td>
		</tr> -->
		<tr>
			<th scope="row"><?= __('Type') ?></th>
			<td><?= $this->Number->format($data->type) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Status') ?></th>
			<td><?= $data->status
			// $this->Number->format($data->status) 
			?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Create Time') ?></th>
			<td><?= date('Y-m-d H:i', $data->create_time) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Post') ?></th>
			<td><?= $data->has('tbl_post') ? $this->Html->link($data->tbl_post->title, ['controller' => 'YiiPost', 'action' => 'view', $data->tbl_post->id]) : $this->Number->format($data->post_id) ?></td>
		</tr>
	</table>
	<div class="row">
		<h4><?= h($data->tbl_post->title) ?></h4>
		<?= $this->Markdown->parse($data->tbl_post->content) ?>
	</div>
	<div class="row">
		<h4><?= __('Content') ?></h4>
		<?= $this->Markdown->parse($data->content) ?>
	</div>
</div>
