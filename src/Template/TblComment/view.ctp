<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblComment $tblComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tbl Comment'), ['action' => 'edit', $tblComment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tbl Comment'), ['action' => 'delete', $tblComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblComment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tbl Comment'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tbl Comment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblComment view large-9 medium-8 columns content">
    <h3><?= h($tblComment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($tblComment->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($tblComment->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($tblComment->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tblComment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($tblComment->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($tblComment->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Time') ?></th>
            <td><?= $this->Number->format($tblComment->create_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Post Id') ?></th>
            <td><?= $this->Number->format($tblComment->post_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($tblComment->content)); ?>
    </div>
</div>
