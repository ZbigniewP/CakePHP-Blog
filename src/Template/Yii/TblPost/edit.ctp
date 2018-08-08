<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yii\Post $tblPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tblPost->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tblPost->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tbl Post'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tbl User'), ['controller' => 'TblUser', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tbl User'), ['controller' => 'TblUser', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblPost form large-9 medium-8 columns content">
    <?= $this->Form->create($tblPost) ?>
    <fieldset>
        <legend><?= __('Edit Tbl Post') ?></legend>
        <?php
            echo $this->Form->control('page_id');
            echo $this->Form->control('title');
            echo $this->Form->control('content');
            echo $this->Form->control('tags');
            echo $this->Form->control('status');
            echo $this->Form->control('create_time');
            echo $this->Form->control('update_time');
            echo $this->Form->control('author_id', ['options' => $tblUser]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
