<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyDemoUser $symfonyDemoUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo User'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="symfonyDemoUser form large-9 medium-8 columns content">
    <?= $this->Form->create($symfonyDemoUser) ?>
    <fieldset>
        <legend><?= __('Add Symfony Demo User') ?></legend>
        <?php
            echo $this->Form->control('fullName');
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
