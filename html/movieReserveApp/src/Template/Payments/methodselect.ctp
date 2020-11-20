<main class="payment-main">
  <h2 class="payment-title">決済方法</h2>
  <div class="payment-container">
    <?= $this->Form->create(null, ['class' => 'payment-form']) ?>
    <? if(isset($creditcard)): ?>
    <p>ご登録のクレジットカード</p>
    <div class="payment-creditcard-container">
      <input type="radio" name="creditcard" id="creditcard" checked>
      <label for="creditcard">
        <span class="outer"><span class="inner"></span></span>
        <div class="payment-creditcard-description">
          <p class="payment-creditcard-name"><?= $creditcard->holder_name ?></p>
          <p class="payment-creditcard-detail">visa <?= substr($creditcard->number, -4) ?> - 有効期限<?= $creditcard->expire_on ?></p>
        </div>
      </label>
    </div>
    <? else: ?>
    <p>クレジットカードが登録されていません</p>
    <?= $this->Html->link(
      __('クレジットカードを登録する'),
      [
        '_full' => true,
        'controller' => 'CreditCards',
        'action' => 'add'
      ],
      [
        'class' => 'payment-creditcard-add-button'
      ]
    ) ?>
    <? endif; ?>
    <input type="hidden" name="price_id" value="<?= h($regular_price_id); ?>">
    <div class="payment-form-button-container">
      <?= $this->Html->link(
        __('キャンセル'),
        [
          '_full' => true,
          'controller' => 'reservations',
          'action' => 'details',
          '?' => ['id' => $reservation_id]
        ],
        [
          'class' => 'payment-form-cancel-button'
        ]
      );
      ?>
      <? if(isset($creditcard)): ?>
      <input class="payment-form-submit-button" type="submit" value="決定">
      <? else: ?>
      <input class="payment-form-submit-button" type="submit" value="決定" disabled>
      <? endif; ?>
    </div>
    <?= $this->Form->end() ?>
  </div>
</main>
