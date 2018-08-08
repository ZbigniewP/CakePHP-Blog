<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yii\Comment[]|\Cake\Collection\CollectionInterface $tblComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tbl Comment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblComment index large-9 medium-8 columns content">
    <h3><?= __('Tbl Comment') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('post_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblComment as $tblComment): ?>
            <tr>
                <td><?= $this->Number->format($tblComment->id) ?></td>
                <td><?= $this->Number->format($tblComment->type) ?></td>
                <td><?= $this->Number->format($tblComment->status) ?></td>
                <td><?= $this->Number->format($tblComment->create_time) ?></td>
                <td><?= h($tblComment->author) ?></td>
                <td><?= h($tblComment->email) ?></td>
                <td><?= h($tblComment->url) ?></td>
                <td><?= $this->Number->format($tblComment->post_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblComment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblComment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblComment->id)]) ?>
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
