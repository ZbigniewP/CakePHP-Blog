<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yii\Lookup $tblLookup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lookup'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblLookup form large-9 medium-8 columns content">
    <?= $this->Form->create($tblLookup) ?>
    <fieldset>
        <legend><?= __('Add Tbl Lookup') ?></legend>
        <?php
            echo $this->Form->control('position');
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
