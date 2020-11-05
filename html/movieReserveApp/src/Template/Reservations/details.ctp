<main class="reservation-detail">
  <section class="reservation-detail-wrapper">
    <ul class="reservation-detail-list">
      <li><?= $movie->title ?></li>
      <li><?= $movie_time ?></li>
      <li>座席：<?= $reservation_detail->seat_number ?></li>
      <li>￥<?= $regular_price->price ?></li>
    </ul>
    <?=
      $this->Form->create(null, [
        'type' => 'post',
        'url' => [
          'action' => 'details'
        ],
        'novalidate' => true,
      ]);
    ?>
    <?php
    echo $this->form->submit(__('キャンセル'), [
      'class' => 'reservation-detail-cancel',
      'name' => 'cansel'
    ]);
    echo $this->form->submit(__('決定'), [
      'class' => 'reservation-detail-decision',
      'name' => 'decision'
    ]);

    ?>
  </section>
</main>
