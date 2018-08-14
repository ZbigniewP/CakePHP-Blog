<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yii\User $tblUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblUser form large-9 medium-8 columns content">
    <?= $this->Form->create($tblUser) ?>
    <fieldset>
        <legend><?= __('Add Tbl User') ?></legend>
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
