<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yii\Tag $tblTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tblTag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tbl Tag'), ['action' => 'delete', $tblTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblTag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tag'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblTag view large-9 medium-8 columns content">
    <h3><?= h($tblTag->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tblTag->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tblTag->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequency') ?></th>
            <td><?= $this->Number->format($tblTag->frequency) ?></td>
        </tr>
    </table>
</div>
