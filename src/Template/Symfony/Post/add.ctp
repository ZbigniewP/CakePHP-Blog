<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPost $dataPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'SymfonyUser', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'SymfonyUser', 'action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="symfonyDemoPost form large-9 medium-8 columns content">
	<?= $this->Form->create($data) ?>
	<fieldset>
		<legend><?= __('Add Post') ?></legend>
		<?php
			echo $this->Form->control('author_id', ['options' => $user]);
			echo $this->Form->control('title');
			echo $this->Form->control('slug');
			echo $this->Form->control('summary');
			echo $this->Form->control('publishedAt');
			echo $this->Form->control('status');
			echo $this->Form->control('updatedAt', ['empty' => true]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
