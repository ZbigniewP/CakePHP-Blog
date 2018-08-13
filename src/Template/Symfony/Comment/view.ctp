<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\Comment $SymfonyComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $SymfonyComment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $SymfonyComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $SymfonyComment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comment'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="SymfonyComment view large-9 medium-8 columns content">
    <h3><?= h($SymfonyComment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Symfony Post') ?></th>
            <td><?= $SymfonyComment->has('symfony_post') ? $this->Html->link($SymfonyComment->symfony_post->title, ['controller' => 'SymfonyPost', 'action' => 'view', $SymfonyComment->symfony_post->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($SymfonyComment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author Id') ?></th>
            <td><?= $this->Number->format($SymfonyComment->author_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($SymfonyComment->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PublishedAt') ?></th>
            <td><?= h($SymfonyComment->publishedAt) ?></td>
        </tr>
    </table>
</div>
