<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\Comment $data
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?></li>
	</ul>
</nav>
<div class="SymfonyComment form large-9 medium-8 columns content">
	<?= $this->Form->create($data) ?>
	<fieldset>
		<legend><?= __('Add Comment') ?></legend>
		<?php
			echo $this->Form->control('post_id', ['options' => $post]);
			echo $this->Form->control('author_id', ['options' => $user]);
			// echo $this->Form->control('author_id');
			echo $this->Form->control('publishedAt');
			echo $this->Form->control('status');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
