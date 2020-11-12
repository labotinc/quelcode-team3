<main class="reservation-detail">
  <section class="reservation-detail-wrapper">
    <ul class="reservation-detail-list">
      <li><?= $movie->title ?></li>
      <li><?= $movie_time ?></li>
      <li>座席：<?= $reservation_detail->seat_number ?></li>
      <li>￥<?= $regular_price->price ?></li>
    </ul>
    <p class="cancel"><?= $this->Html->link('キャンセル', ['action' => 'cancel', '_full' => true, '?' => ['schedule_id' => $reservation_detail->schedule_id, 'reservation_id' => $reservation_detail->id]]) ?></p>
    <p class="confirm"><?= $this->Html->link('決定', ['action' => '#', '_full' => true, '?' => ['regular_price_id' => $regular_price->id]]) ?></p>
  </section>
</main>
