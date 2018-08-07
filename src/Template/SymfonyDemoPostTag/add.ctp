<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyDemoPostTag $symfonyDemoPostTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo Post Tag'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo Post'), ['controller' => 'SymfonyDemoPost', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Symfony Demo Post'), ['controller' => 'SymfonyDemoPost', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="symfonyDemoPostTag form large-9 medium-8 columns content">
    <?= $this->Form->create($symfonyDemoPostTag) ?>
    <fieldset>
        <legend><?= __('Add Symfony Demo Post Tag') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
