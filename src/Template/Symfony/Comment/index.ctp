<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\Comment[]|\Cake\Collection\CollectionInterface $symfonyDemoComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo Comment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="symfonyDemoComment index large-9 medium-8 columns content">
    <h3><?= __('Symfony Demo Comment') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('post_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publishedAt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($symfonyDemoComment as $symfonyDemoComment): ?>
            <tr>
                <td><?= $this->Number->format($symfonyDemoComment->id) ?></td>
                <td><?= $symfonyDemoComment->has('symfony_demo_post') ? $this->Html->link($symfonyDemoComment->symfony_demo_post->title, ['controller' => 'SymfonyPost', 'action' => 'view', $symfonyDemoComment->symfony_demo_post->id]) : '' ?></td>
                <td><?= $this->Number->format($symfonyDemoComment->author_id) ?></td>
                <td><?= h($symfonyDemoComment->publishedAt) ?></td>
                <td><?= $this->Number->format($symfonyDemoComment->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $symfonyDemoComment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $symfonyDemoComment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $symfonyDemoComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoComment->id)]) ?>
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
