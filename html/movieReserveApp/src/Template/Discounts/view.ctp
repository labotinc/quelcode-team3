<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Discount $discount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Discount'), ['action' => 'edit', $discount->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Discount'), ['action' => 'delete', $discount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $discount->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Discounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Discount'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="discounts view large-9 medium-8 columns content">
    <h3><?= h($discount->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($discount->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($discount->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($discount->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($discount->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($discount->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($discount->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Invalid') ?></th>
            <td><?= $discount->is_invalid ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Reservations') ?></h4>
        <?php if (!empty($discount->reservations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Schedule Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Regular Price Id') ?></th>
                <th scope="col"><?= __('Discount Id') ?></th>
                <th scope="col"><?= __('Seat Number') ?></th>
                <th scope="col"><?= __('Purchased Price') ?></th>
                <th scope="col"><?= __('Is Confirmed') ?></th>
                <th scope="col"><?= __('Expire At') ?></th>
                <th scope="col"><?= __('Is Cancelled') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($discount->reservations as $reservations): ?>
            <tr>
                <td><?= h($reservations->id) ?></td>
                <td><?= h($reservations->schedule_id) ?></td>
                <td><?= h($reservations->user_id) ?></td>
                <td><?= h($reservations->regular_price_id) ?></td>
                <td><?= h($reservations->discount_id) ?></td>
                <td><?= h($reservations->seat_number) ?></td>
                <td><?= h($reservations->purchased_price) ?></td>
                <td><?= h($reservations->is_confirmed) ?></td>
                <td><?= h($reservations->expire_at) ?></td>
                <td><?= h($reservations->is_cancelled) ?></td>
                <td><?= h($reservations->is_deleted) ?></td>
                <td><?= h($reservations->created) ?></td>
                <td><?= h($reservations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
