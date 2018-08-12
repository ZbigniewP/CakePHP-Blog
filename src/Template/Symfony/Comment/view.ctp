<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\Comment $symfonyDemoComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Symfony Demo Comment'), ['action' => 'edit', $symfonyDemoComment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Symfony Demo Comment'), ['action' => 'delete', $symfonyDemoComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoComment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Symfony Demo Comment'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symfony Demo Comment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="symfonyDemoComment view large-9 medium-8 columns content">
    <h3><?= h($symfonyDemoComment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Symfony Demo Post') ?></th>
            <td><?= $symfonyDemoComment->has('symfony_demo_post') ? $this->Html->link($symfonyDemoComment->symfony_demo_post->title, ['controller' => 'SymfonyPost', 'action' => 'view', $symfonyDemoComment->symfony_demo_post->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($symfonyDemoComment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author Id') ?></th>
            <td><?= $this->Number->format($symfonyDemoComment->author_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($symfonyDemoComment->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PublishedAt') ?></th>
            <td><?= h($symfonyDemoComment->publishedAt) ?></td>
        </tr>
    </table>
</div>
