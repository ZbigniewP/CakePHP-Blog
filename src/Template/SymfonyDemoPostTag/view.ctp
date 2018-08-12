<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyPostTag $symfonyDemoPostTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Symfony Demo Post Tag'), ['action' => 'edit', $symfonyDemoPostTag->post_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Symfony Demo Post Tag'), ['action' => 'delete', $symfonyDemoPostTag->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoPostTag->post_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Symfony Demo Post Tag'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symfony Demo Post Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Symfony Demo Post'), ['controller' => 'SymfonyPost', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symfony Demo Post'), ['controller' => 'SymfonyPost', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="symfonyDemoPostTag view large-9 medium-8 columns content">
    <h3><?= h($symfonyDemoPostTag->post_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Symfony Demo Post') ?></th>
            <td><?= $symfonyDemoPostTag->has('symfony_demo_post') ? $this->Html->link($symfonyDemoPostTag->symfony_demo_post->title, ['controller' => 'SymfonyPost', 'action' => 'view', $symfonyDemoPostTag->symfony_demo_post->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag Id') ?></th>
            <td><?= $this->Number->format($symfonyDemoPostTag->tag_id) ?></td>
        </tr>
    </table>
</div>
