<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPostTag[]|\Cake\Collection\CollectionInterface $symfonyDemoPostTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo Post Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo Post'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="symfonyDemoPostTag index large-9 medium-8 columns content">
    <h3><?= __('Symfony Demo Post Tag') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('post_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($symfonyDemoPostTag as $symfonyDemoPostTag): ?>
            <tr>
                <td><?= $symfonyDemoPostTag->has('symfony_demo_post') ? $this->Html->link($symfonyDemoPostTag->symfony_demo_post->title, ['controller' => 'SymfonyPost', 'action' => 'view', $symfonyDemoPostTag->symfony_demo_post->id]) : '' ?></td>
                <td><?= $this->Number->format($symfonyDemoPostTag->tag_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $symfonyDemoPostTag->post_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $symfonyDemoPostTag->post_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $symfonyDemoPostTag->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoPostTag->post_id)]) ?>
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
