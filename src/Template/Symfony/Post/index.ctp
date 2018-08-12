<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\Post[]|\Cake\Collection\CollectionInterface $data
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo Post'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo User'), ['controller' => 'SymfonyUser', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo User'), ['controller' => 'SymfonyUser', 'action' => 'add']) ?></li>
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
            <?php foreach ($dataPost as $data): ?>
            <tr>
                <td><?= $this->Number->format($data->id) ?></td>
                <td><?= $data->has('symfony_demo_user') ? $this->Html->link($data->symfony_demo_user->id, ['controller' => 'SymfonyUser', 'action' => 'view', $data->symfony_demo_user->id]) : '' ?></td>
                <td><?= h($data->title) ?></td>
                <td><?= h($data->slug) ?></td>
                <td><?= h($data->summary) ?></td>
                <td><?= h($data->publishedAt) ?></td>
                <td><?= $this->Number->format($data->status) ?></td>
                <td><?= h($data->updatedAt) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $data->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $data->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?>
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
