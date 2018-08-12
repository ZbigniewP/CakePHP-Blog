<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\Post $symfonyDemoPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $symfonyDemoPost->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoPost->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo Post'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo User'), ['controller' => 'SymfonyUser', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo User'), ['controller' => 'SymfonyUser', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="symfonyDemoPost form large-9 medium-8 columns content">
    <?= $this->Form->create($symfonyDemoPost) ?>
    <fieldset>
        <legend><?= __('Edit Symfony Demo Post') ?></legend>
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