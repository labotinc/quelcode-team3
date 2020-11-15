<main class="reservation-detail">
  <section class="reservation-detail-wrapper">
    <ul class="reservation-detail-list">
      <li><?= $movie->title ?></li>
      <li><?= $movie_time ?></li>
      <li>座席：<?= substr_replace($reservation_detail->seat_number, '-', 1, 0) ?></li>
      <li>￥<?= number_format($regular_price->price) ?></li>
    </ul>
    <p class="cancel"><?= $this->Html->link('キャンセル', ['action' => 'cancel', '_full' => true, '?' => ['schedule_id' => $reservation_detail->schedule_id, 'reservation_id' => $reservation_detail->id]]) ?></p>
    <p class="confirm"><?= $this->Html->link('決定', ['action' => '#', '_full' => true, '?' => ['regular＿price_id' => $regular_price->id]]) ?></p>
  </section>
</main>
