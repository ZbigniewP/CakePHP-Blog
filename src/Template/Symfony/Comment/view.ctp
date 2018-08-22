<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\Comment $data
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $data->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="SymfonyComment view large-9 medium-8 columns content">
	<h3><?= h($data->id) ?></h3>
	<table class="vertical-table">
		<tr>
			<th scope="row"><?= __('Symfony Post') ?></th>
			<td><?= $data->has('post') ? $this->Html->link($data->post->title, ['controller' => 'SymfonyPost', 'action' => 'view', $data->post->id]) : $this->Number->format($data->post_id) ?></td>
		</tr>
		<!-- <tr>
			<th scope="row"><?= __('Id') ?></th>
			<td><?= $this->Number->format($data->id) ?></td>
		</tr> -->
		<tr>
			<th scope="row"><?= __('Author') ?></th>
			<!-- <td><?= $this->Number->format($data->author_id) ?></td> -->
			<td><?= $data->has('user') ? $this->Html->link($data->user->full_name, ['controller' => 'SymfonyUser', 'action' => 'view', $data->user->id]) : $this->Number->format($data->author_id) ?></td>
				
		</tr>
		<tr>
			<th scope="row"><?= __('Status') ?></th>
			<td><?= $this->Number->format($data->status) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Published') ?></th>
			<td><?= h($data->publishedAt) ?></td>
		</tr>
	</table>
</div>
