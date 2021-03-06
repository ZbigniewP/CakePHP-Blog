<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyTags $data
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $data->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]
			)
		?></li>
		<li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="SymfonyTags form large-9 medium-8 columns content">
	<?= $this->Form->create($data) ?>
	<fieldset>
		<legend><?= __('Edit Tag') ?></legend>
		<?php
			echo $this->Form->control('name');
			echo $this->Form->control('frequency');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
