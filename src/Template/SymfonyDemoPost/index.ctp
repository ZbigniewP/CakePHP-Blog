<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPost[]|\Cake\Collection\CollectionInterface $symfonyDemoPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo Post'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo User'), ['controller' => 'Symfony\User', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo User'), ['controller' => 'Symfony\User', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="symfonyDemoPost index large-9 medium-8 columns content">
    <h3><?= __('Symfony Demo Post') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('summary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publishedAt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedAt') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($symfonyDemoPost as $symfonyDemoPost): ?>
            <tr>
                <td><?= $this->Number->format($symfonyDemoPost->id) ?></td>
                <td><?= $symfonyDemoPost->has('symfony_demo_user') ? $this->Html->link($symfonyDemoPost->symfony_demo_user->id, ['controller' => 'Symfony\User', 'action' => 'view', $symfonyDemoPost->symfony_demo_user->id]) : '' ?></td>
                <td><?= h($symfonyDemoPost->title) ?></td>
                <td><?= h($symfonyDemoPost->slug) ?></td>
                <td><?= h($symfonyDemoPost->summary) ?></td>
                <td><?= h($symfonyDemoPost->publishedAt) ?></td>
                <td><?= $this->Number->format($symfonyDemoPost->status) ?></td>
                <td><?= h($symfonyDemoPost->updatedAt) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $symfonyDemoPost->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $symfonyDemoPost->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $symfonyDemoPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoPost->id)]) ?>
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
