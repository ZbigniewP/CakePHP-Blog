<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yii\User $tblUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tbl User'), ['action' => 'edit', $tblUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tbl User'), ['action' => 'delete', $tblUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tbl User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tbl User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblUser view large-9 medium-8 columns content">
    <h3><?= h($tblUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($tblUser->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($tblUser->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($tblUser->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tblUser->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Profile') ?></h4>
        <?= $this->Text->autoParagraph(h($tblUser->profile)); ?>
    </div>
</div>
