<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symfony\SymfonyTags $dataTags
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="SymfonyTags form large-9 medium-8 columns content">
    <?= $this->Form->create($dataTags) ?>
    <fieldset>
        <legend><?= __('Add Tag') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('frequency');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
