<main class="payment-main">
  <h2 class="payment-title">決済概要</h2>
  <div class="payment-container">
    <?= $this->Form->create(null) ?>
    <div class="payment-details-container">
      <p class="payment-details-name">チケット金額</p>
      <p class="payment-details-price"><?= $this->Number->currency($regular_price->price, 'JPY') ?></p>
    </div>
    <hr class="payment-divider">
    <div class="payment-details-container">
      <p class="payment-details-name">小計</p>
      <p class="payment-details-price"><?= $this->Number->currency($regular_price->price, 'JPY') ?></p>
    </div>
    <div class="payment-form-button-container">
      <?= $this->Html->link(
        __('キャンセル'),
        [
          '_full' => true,
          'action' => 'methodselect',
          $reservation_id,
          '?' => ['regular_price_id' => $regular_price->id]
        ],
        [
          'class' => 'payment-form-cancel-button',
        ]
      ); ?>
      <input class="payment-form-submit-button" type="submit" value="決済">
    </div>
    <?= $this->Form->end() ?>
  </div>
</main>
