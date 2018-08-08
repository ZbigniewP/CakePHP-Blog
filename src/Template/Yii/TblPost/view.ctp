<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yii\Post $tblPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tbl Post'), ['action' => 'edit', $tblPost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tbl Post'), ['action' => 'delete', $tblPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblPost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tbl Post'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tbl Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tbl User'), ['controller' => 'TblUser', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tbl User'), ['controller' => 'TblUser', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblPost view large-9 medium-8 columns content">
    <h3><?= h($tblPost->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($tblPost->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tbl User') ?></th>
            <td><?= $tblPost->has('tbl_user') ? $this->Html->link($tblPost->tbl_user->id, ['controller' => 'TblUser', 'action' => 'view', $tblPost->tbl_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tblPost->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Id') ?></th>
            <td><?= $this->Number->format($tblPost->page_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($tblPost->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Time') ?></th>
            <td><?= $this->Number->format($tblPost->create_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Time') ?></th>
            <td><?= $this->Number->format($tblPost->update_time) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($tblPost->content)); ?>
    </div>
    <div class="row">
        <h4><?= __('Tags') ?></h4>
        <?= $this->Text->autoParagraph(h($tblPost->tags)); ?>
    </div>
</div>
