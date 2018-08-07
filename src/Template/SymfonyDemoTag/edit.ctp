<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SymfonyDemoTag $symfonyDemoTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $symfonyDemoTag->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $symfonyDemoTag->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Symfony Demo Tag'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="symfonyDemoTag form large-9 medium-8 columns content">
    <?= $this->Form->create($symfonyDemoTag) ?>
    <fieldset>
        <legend><?= __('Edit Symfony Demo Tag') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('frequency');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
