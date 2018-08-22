<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblPost $dataPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?></li>
		<li><?= $this->Html->link(__('List Post'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'TblUser', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'TblUser', 'action' => 'add']) ?></li>
	</ul>
</nav>
<div class="tblPost form large-9 medium-8 columns content">
	<?= $this->Form->create($data) ?>
	<fieldset>
		<legend><?= __('Edit Post') ?></legend>
		<?php
			// echo $this->Form->control('create_time');
			// echo $this->Form->control('page_id');
			// echo $this->Form->control('update_time');
			echo $this->Form->control('status', ['options' => $postStatus]);
			echo $this->Form->control('tags', ['options' => $tags]);
			echo $this->Form->control('author_id', ['options' => $postUser]);
			echo $this->Form->control('title');
			echo $this->Form->control('content');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
