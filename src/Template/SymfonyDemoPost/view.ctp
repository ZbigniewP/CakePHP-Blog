<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyDemoPost $symfonyDemoPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Symfony Demo Post'), ['action' => 'edit', $symfonyDemoPost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Symfony Demo Post'), ['action' => 'delete', $symfonyDemoPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoPost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Symfony Demo Post'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symfony Demo Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Symfony Demo User'), ['controller' => 'SymfonyDemoUser', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symfony Demo User'), ['controller' => 'SymfonyDemoUser', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="symfonyDemoPost view large-9 medium-8 columns content">
    <h3><?= h($symfonyDemoPost->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Symfony Demo User') ?></th>
            <td><?= $symfonyDemoPost->has('symfony_demo_user') ? $this->Html->link($symfonyDemoPost->symfony_demo_user->id, ['controller' => 'SymfonyDemoUser', 'action' => 'view', $symfonyDemoPost->symfony_demo_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($symfonyDemoPost->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($symfonyDemoPost->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Summary') ?></th>
            <td><?= h($symfonyDemoPost->summary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($symfonyDemoPost->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($symfonyDemoPost->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PublishedAt') ?></th>
            <td><?= h($symfonyDemoPost->publishedAt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UpdatedAt') ?></th>
            <td><?= h($symfonyDemoPost->updatedAt) ?></td>
        </tr>
    </table>
</div>
