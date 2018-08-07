<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblComment $tblComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tblComment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tblComment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tbl Comment'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblComment form large-9 medium-8 columns content">
    <?= $this->Form->create($tblComment) ?>
    <fieldset>
        <legend><?= __('Edit Tbl Comment') ?></legend>
        <?php
            echo $this->Form->control('type');
            echo $this->Form->control('content');
            echo $this->Form->control('status');
            echo $this->Form->control('create_time');
            echo $this->Form->control('author');
            echo $this->Form->control('email');
            echo $this->Form->control('url');
            echo $this->Form->control('post_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>