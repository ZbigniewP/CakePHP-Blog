<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyDemoTag $symfonyDemoTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Symfony Demo Tag'), ['action' => 'edit', $symfonyDemoTag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Symfony Demo Tag'), ['action' => 'delete', $symfonyDemoTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoTag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Symfony Demo Tag'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symfony Demo Tag'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="symfonyDemoTag view large-9 medium-8 columns content">
    <h3><?= h($symfonyDemoTag->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($symfonyDemoTag->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($symfonyDemoTag->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequency') ?></th>
            <td><?= $this->Number->format($symfonyDemoTag->frequency) ?></td>
        </tr>
    </table>
</div>
