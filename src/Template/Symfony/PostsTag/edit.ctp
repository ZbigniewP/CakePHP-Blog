<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPostsTag $dataPostsTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dataPostsTag->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $dataPostsTag->post_id)]) ?></li>
		<li><?= $this->Html->link(__('List Posts Tag'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?></li>
	</ul>
</nav>
<div class="symfonyDemoPostTag form large-9 medium-8 columns content">
	<?= $this->Form->create($dataPostsTag) ?>
	<fieldset>
		<legend><?= __('Edit Post Tag') ?></legend>
		<?php
		// echo $this->Form->control('post_id');
		// echo $this->Form->control('tag_id');
		echo $this->Form->control('post_id', ['options' => $dataPost]);
		echo $this->Form->control('tag_id', ['options' => $dataTags]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
