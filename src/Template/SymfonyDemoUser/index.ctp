<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyDemoUser[]|\Cake\Collection\CollectionInterface $symfonyDemoUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="symfonyDemoUser index large-9 medium-8 columns content">
    <h3><?= __('Symfony Demo User') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fullName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($symfonyDemoUser as $symfonyDemoUser): ?>
            <tr>
                <td><?= $this->Number->format($symfonyDemoUser->id) ?></td>
                <td><?= h($symfonyDemoUser->fullName) ?></td>
                <td><?= h($symfonyDemoUser->username) ?></td>
                <td><?= h($symfonyDemoUser->email) ?></td>
                <td><?= h($symfonyDemoUser->password) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $symfonyDemoUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $symfonyDemoUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $symfonyDemoUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoUser->id)]) ?>
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
