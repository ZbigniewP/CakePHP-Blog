<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyDemoUser $symfonyDemoUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Symfony Demo User'), ['action' => 'edit', $symfonyDemoUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Symfony Demo User'), ['action' => 'delete', $symfonyDemoUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Symfony Demo User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symfony Demo User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="symfonyDemoUser view large-9 medium-8 columns content">
    <h3><?= h($symfonyDemoUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('FullName') ?></th>
            <td><?= h($symfonyDemoUser->fullName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($symfonyDemoUser->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($symfonyDemoUser->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($symfonyDemoUser->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($symfonyDemoUser->id) ?></td>
        </tr>
    </table>
</div>
