<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPostsTag $dataPostsTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Post Tag'), ['action' => 'edit', $dataPostsTag->post_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Post Tag'), ['action' => 'delete', $dataPostsTag->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $dataPostsTag->post_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posts Tag'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="symfonyDemoPostTag view large-9 medium-8 columns content">
    <h3><?= h($dataPostsTag->post_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Symfony Post') ?></th>
            <td><?= $dataPostsTag->has('symfony_post') ? $this->Html->link($dataPostsTag->symfony_post->title, ['controller' => 'SymfonyPost', 'action' => 'view', $dataPostsTag->symfony_post->id]) : $dataPostsTag->post_id ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag Id') ?></th>
            <td><?= $this->Number->format($dataPostsTag->tag_id) ?></td>
        </tr>
    </table>
</div>
