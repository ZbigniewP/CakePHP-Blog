<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YiiComment $dataComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Form->postLink( __('Delete'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?></li>
		<li><?= $this->Html->link(__('List Comment'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="tblComment form large-9 medium-8 columns content">
	<?= $this->Form->create($data) ?>
	<fieldset>
		<legend><?= __('Edit Comment') ?></legend>
		<?php
			echo $this->Form->control('type');
			echo $this->Form->control('content');
			echo $this->Form->control('status', ['options' => $status]);
			echo $this->Form->control('create_time');
			echo $this->Form->control('author');
			echo $this->Form->control('email');
			echo $this->Form->control('url');
			echo $this->Form->control('post_id', ['options' => $dataPost]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
