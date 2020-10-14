<main>
  <div class="prices-discounts-wrapper">
    <h1>基本料金</h1>
    <div class="regular-prices-wrapper">
      <?php foreach ($regular_prices as $regular_price) : ?>
        <div class="regular-price">
          <p><?= htmlspecialchars($regular_price->customer_type) ?></p>
          <p><?= number_format($regular_price->price) ?>円</p>
        </div>
      <?php endforeach; ?>
    </div>
    <h1>お得な割引サービス</h1>
    <div class="discounts-wrapper">
      <div class="discount">
        <h2>複数人予約割引</h2>
        <div>
          <p>同じ映画を３名以上で鑑賞すると入場料が1200円</p>
          <p>0,000円</p>
        </div>
      </div>
    </div>
  </div>
</main>