<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblPost[]|\Cake\Collection\CollectionInterface $tblPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tbl Post'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tbl User'), ['controller' => 'TblUser', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tbl User'), ['controller' => 'TblUser', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblPost index large-9 medium-8 columns content">
    <h3><?= __('Tbl Post') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblPost as $tblPost): ?>
            <tr>
                <td><?= $this->Number->format($tblPost->id) ?></td>
                <td><?= $this->Number->format($tblPost->page_id) ?></td>
                <td><?= h($tblPost->title) ?></td>
                <td><?= $this->Number->format($tblPost->status) ?></td>
                <td><?= $this->Number->format($tblPost->create_time) ?></td>
                <td><?= $this->Number->format($tblPost->update_time) ?></td>
                <td><?= $tblPost->has('tbl_user') ? $this->Html->link($tblPost->tbl_user->id, ['controller' => 'TblUser', 'action' => 'view', $tblPost->tbl_user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblPost->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblPost->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblPost->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
