<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regular Prices'), ['controller' => 'RegularPrices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Regular Price'), ['controller' => 'RegularPrices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Discounts'), ['controller' => 'Discounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Discount'), ['controller' => 'Discounts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservations view large-9 medium-8 columns content">
    <h3><?= h($reservation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Schedule') ?></th>
            <td><?= $reservation->has('schedule') ? $this->Html->link($reservation->schedule->id, ['controller' => 'Schedules', 'action' => 'view', $reservation->schedule->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Regular Price') ?></th>
            <td><?= $reservation->has('regular_price') ? $this->Html->link($reservation->regular_price->id, ['controller' => 'RegularPrices', 'action' => 'view', $reservation->regular_price->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= $reservation->has('discount') ? $this->Html->link($reservation->discount->name, ['controller' => 'Discounts', 'action' => 'view', $reservation->discount->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seat Number') ?></th>
            <td><?= h($reservation->seat_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reservation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchased Price') ?></th>
            <td><?= $this->Number->format($reservation->purchased_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expire At') ?></th>
            <td><?= h($reservation->expire_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reservation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reservation->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Confirmed') ?></th>
            <td><?= $reservation->is_confirmed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Cancelled') ?></th>
            <td><?= $reservation->is_cancelled ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $reservation->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
