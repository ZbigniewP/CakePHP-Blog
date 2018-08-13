<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyUser $SymfonyUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></li>
		<li><?= $this->Html->link(__('List Comment'), ['controller' => 'SymfonyComment','action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="symfony-user form large-9 medium-8 columns content">
	<?= $this->Form->create($user) ?>
	<fieldset>
		<legend><?= __('Edit User') ?></legend>
		<?php
			echo $this->Form->control('fullName');
			echo $this->Form->control('username');
			echo $this->Form->control('email');
			echo $this->Form->control('password');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
