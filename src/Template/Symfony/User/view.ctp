<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyUser $SymfonyUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $data->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Comment'), ['controller' => 'SymfonyComment','action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="symfony-user view large-9 medium-8 columns content">
	<h3><?= h($data->id) ?></h3>
	<table class="vertical-table">
		<tr>
			<th scope="row"><?= __('FullName') ?></th>
			<td><?= h($data->fullName) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Username') ?></th>
			<td><?= h($data->username) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Email') ?></th>
			<td><?= h($data->email) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Password') ?></th>
			<td><?= h($data->password) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Id') ?></th>
			<td><?= $this->Number->format($data->id) ?></td>
		</tr>
	</table>
</div>
