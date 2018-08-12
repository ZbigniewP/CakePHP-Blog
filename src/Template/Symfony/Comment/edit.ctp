<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\Comment $symfonyDemoComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $symfonyDemoComment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoComment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo Comment'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="symfonyDemoComment form large-9 medium-8 columns content">
    <?= $this->Form->create($symfonyDemoComment) ?>
    <fieldset>
        <legend><?= __('Edit Symfony Demo Comment') ?></legend>
        <?php
            echo $this->Form->control('post_id', ['options' => $dataPost]);
            echo $this->Form->control('author_id');
            echo $this->Form->control('publishedAt');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
