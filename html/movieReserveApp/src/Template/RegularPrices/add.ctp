<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RegularPrice $regularPrice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Regular Prices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="regularPrices form large-9 medium-8 columns content">
    <?= $this->Form->create($regularPrice) ?>
    <fieldset>
        <legend><?= __('Add Regular Price') ?></legend>
        <?php
            echo $this->Form->control('customer_type');
            echo $this->Form->control('price');
            echo $this->Form->control('is_invalid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
