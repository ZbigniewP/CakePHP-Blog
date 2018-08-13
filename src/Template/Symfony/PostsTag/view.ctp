<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPostsTag $data
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Edit Post Tag'), ['action' => 'edit', $data->post_id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Post Tag'), ['action' => 'delete', $data->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->post_id)]) ?> </li>
		<li><?= $this->Html->link(__('List Posts Tag'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post Tag'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="symfonyDemoPostTag view large-9 medium-8 columns content">
	<h3><?= h($data->post_id) ?></h3>
	<table class="vertical-table">
		<tr>
			<th scope="row"><?= __('Post') ?></th>
			<td><?= $data->has('symfony_post') ? $this->Html->link($data->symfony_post->title, ['controller' => 'SymfonyPost', 'action' => 'view', $data->symfony_post->id]) : $data->post_id ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Tag') ?></th>
			<!-- <td><?= $this->Number->format($data->tag_id) ?></td> -->
			<td><?= $data->has('symfony_tag') ? $this->Html->link($data->symfony_tag->name, ['controller' => 'SymfonyTags', 'action' => 'view', $data->tag_id]) : $data->tag_id ?></td>
		</tr>
	</table>
</div>
