<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yii\Lookup $tblLookup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lookup'), ['action' => 'edit', $tblLookup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tbl Lookup'), ['action' => 'delete', $tblLookup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblLookup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lookup'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lookup'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblLookup view large-9 medium-8 columns content">
    <h3><?= h($tblLookup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($tblLookup->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tblLookup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($tblLookup->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tblLookup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($tblLookup->position) ?></td>
        </tr>
    </table>
</div>
