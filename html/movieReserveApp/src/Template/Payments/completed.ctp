<main>
  <div class="payment-container completed">
    <p class="payment-completed-message">決済が完了しました。</p>
    <?= $this->Html->link(
      __('戻る'),
      [
        'controller' => 'schedules',
        'action' => 'index'
      ],
      [
        'class' => 'payment-completed-button',
      ]
    ) ?>
  </div>
</main>
