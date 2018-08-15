<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblPost $data
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $data->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Post'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List User'), ['controller' => 'TblUser', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'TblUser', 'action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="tblPost view large-9 medium-8 columns content">
	<h3><?= h($data->title) ?></h3>
	<table class="vertical-table">
		<tr>
			<th scope="row"><?= __('Title') ?></th>
			<td><?= h($data->title) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Author') ?></th>
			<td><?= $data->has('tbl_user') ? $this->Html->link($data->tbl_user->username, ['controller' => 'TblUser', 'action' => 'view', $data->tbl_user->id]) : $this->Number->format($data->author_id) ?></td>
		</tr>
		<!-- <tr>
			<th scope="row"><?= __('Id') ?></th>
			<td><?= $this->Number->format($data->id) ?></td>
		</tr> -->
		<!-- <tr>
			<th scope="row"><?= __('Page Id') ?></th>
			<td><?= $this->Number->format($data->page_id) ?></td>
		</tr> -->
		<tr>
			<th scope="row"><?= __('Status') ?></th>
			<td><?= h($data->status) ?></td>
			<!-- <td><?= $this->Number->format($data->status) ?></td> -->
		</tr>
		<tr>
			<th scope="row"><?= __('Create Time') ?></th>
			<td><?= date('Y-m-d H:i', $data->create_time) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Update Time') ?></th>
			<td><?= date('Y-m-d H:i', $data->update_time) ?></td>
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
	<div class="row">
		<h4><?= __('Comments') ?>
		<?= count($data->tbl_comment); ?></h4>
	</div>
</div>
