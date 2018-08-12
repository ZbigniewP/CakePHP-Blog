<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\Post $dataPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Symfony Demo Post'), ['action' => 'edit', $dataPost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Symfony Demo Post'), ['action' => 'delete', $dataPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dataPost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Symfony Demo Post'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symfony Demo Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Symfony Demo User'), ['controller' => 'SymfonyUser', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symfony Demo User'), ['controller' => 'SymfonyUser', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="symfonyDemoPost view large-9 medium-8 columns content">
    <h3><?= h($dataPost->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Symfony Demo User') ?></th>
            <td><?= $dataPost->has('symfony_demo_user') ? $this->Html->link($dataPost->symfony_demo_user->id, ['controller' => 'SymfonyUser', 'action' => 'view', $dataPost->symfony_demo_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($dataPost->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($dataPost->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Summary') ?></th>
            <td><?= h($dataPost->summary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dataPost->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($dataPost->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PublishedAt') ?></th>
            <td><?= h($dataPost->publishedAt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UpdatedAt') ?></th>
            <td><?= h($dataPost->updatedAt) ?></td>
        </tr>
    </table>
</div>
