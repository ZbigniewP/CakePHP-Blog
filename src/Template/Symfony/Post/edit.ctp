<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPost $dataPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Form->postLink(__('Delete'),['action' => 'delete', $dataPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dataPost->id)]) ?></li>
		<li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'SymfonyUser', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'SymfonyUser', 'action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="symfonyDemoPost form large-9 medium-8 columns content">
	<?= $this->Form->create($dataPost) ?>
	<fieldset>
		<legend><?= __('Edit Post') ?></legend>
		<?php
			echo $this->Form->control('author_id', ['options' => $user]);
			echo $this->Form->control('title');
			echo $this->Form->control('slug');
			echo $this->Form->control('summary');
			echo $this->Form->control('content');
			echo $this->Form->control('published_at');
			echo $this->Form->control('status');
			echo $this->Form->control('updated_at', ['empty' => true]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
