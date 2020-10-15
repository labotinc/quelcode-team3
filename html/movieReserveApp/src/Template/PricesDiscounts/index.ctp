<main class="prices-discounts-main">
  <div class="prices-discounts-wrapper">
    <div class="regular-prices-wrapper">
      <h1 class="regular-prices">基本料金</h1>
      <?php foreach ($regular_prices as $regular_price) : ?>
        <div class="regular-price">
          <p><?= htmlspecialchars($regular_price->customer_type) ?></p>
          <p><?= number_format($regular_price->price) ?>円</p>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="discounts-wrapper">
      <h1 class="discounts">お得な割引サービス</h1>
      <?php foreach ($discounts as $discount) : ?>
        <div class="discount">
          <div>
            <h2><?= $discount->name ?></h2>
            <p class="discount-details"><?= $discount->description ?></p>
          </div>
          <div class="discounted-price">
            <p><?= number_format($discount->price) ?>円</p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>
