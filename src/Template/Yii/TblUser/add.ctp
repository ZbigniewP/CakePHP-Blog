<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YiiUser $dataUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="tblUser form large-9 medium-8 columns content">
	<?= $this->Form->create($data) ?>
	<fieldset>
		<legend><?= __('Add User') ?></legend>
		<?php
			echo $this->Form->control('username');
			echo $this->Form->control('password');
			echo $this->Form->control('email');
			echo $this->Form->control('profile');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
