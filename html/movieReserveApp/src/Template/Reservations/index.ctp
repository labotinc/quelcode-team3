<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regular Prices'), ['controller' => 'RegularPrices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Regular Price'), ['controller' => 'RegularPrices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Discounts'), ['controller' => 'Discounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Discount'), ['controller' => 'Discounts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservations index large-9 medium-8 columns content">
    <h3><?= __('Reservations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('regular_price_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seat_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('purchased_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_confirmed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expire_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_cancelled') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?= $this->Number->format($reservation->id) ?></td>
                <td><?= $reservation->has('schedule') ? $this->Html->link($reservation->schedule->id, ['controller' => 'Schedules', 'action' => 'view', $reservation->schedule->id]) : '' ?></td>
                <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
                <td><?= $reservation->has('regular_price') ? $this->Html->link($reservation->regular_price->id, ['controller' => 'RegularPrices', 'action' => 'view', $reservation->regular_price->id]) : '' ?></td>
                <td><?= $reservation->has('discount') ? $this->Html->link($reservation->discount->name, ['controller' => 'Discounts', 'action' => 'view', $reservation->discount->id]) : '' ?></td>
                <td><?= h($reservation->seat_number) ?></td>
                <td><?= $this->Number->format($reservation->purchased_price) ?></td>
                <td><?= h($reservation->is_confirmed) ?></td>
                <td><?= h($reservation->expire_at) ?></td>
                <td><?= h($reservation->is_cancelled) ?></td>
                <td><?= h($reservation->is_deleted) ?></td>
                <td><?= h($reservation->created) ?></td>
                <td><?= h($reservation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
