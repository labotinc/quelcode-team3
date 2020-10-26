<main class="mypage-top-container">
  <h2 class="mypage-top-header">予約詳細</h2>
  <div class="reservations-top-table-container">
    <!-- 予約表示 -->
    <?php foreach($reservations as $reservation): ?>
      <? if (empty($reservation->seat_number)): ?>
        <div class="reservations-descriptions-no-reserve">
          <p>現在予約はありません</p>
      <? else: ?>
        <div class="reservations-descriptions">
          <div class="reservations-more-details">
            <div class="reservations-poster">
              <? $poster = $reservation['Movies']['thumbnail_file_name'] ?>
              <?= $this->Html->image("movies_small/$poster.png") ?>
            </div>
            <div class="reservations-details">
              <div class="reservations-title">
                <?= $reservation['Movies']['title'] ?>
              </div>
              <div class="reservations-date">
                <span class="reservations-space"><?= date("n月j日", strtotime($reservation['Schedules']['start_at'])) ?>(<?= ToDay($reservation['Schedules']['start_at']->format('m-d')) ?>)</span>
                <span class="reservations-space"><?= $reservation['Schedules']['start_at']->format('G:i') ?>〜<?php echo $reservation['Schedules']['end_at']->format('G:i') ?></span><?php echo $reservation->seat_number ?>
              </div>
              <div class="reservations-price">
                <?= '&yen'.number_format($reservation->purchased_price) ?>
              </div>
            </div>
          </div>
          <!-- キャンセルボタン -->
          <div class="reservations-cancel">
            <p class="reservations-cancel-button"><?= $this->Html->link('キャンセル', ['controller' => 'Cancel', 'action' => '', '_full' => true]) ?></p>
          </div>
      <? endif; ?>
        </div>
    <?php endforeach ?>
    <!-- マイページに戻るボタン -->
    <div class="reservations-to-mypage-button">
      <?= $this->Html->link('マイページに戻る', ['controller' => 'Mypage', 'action' => 'index', '_full' => true]) ?>
    </div>
  </div>
</main>

<!-- 曜日を取得する関数 -->
<?php
  function ToDay($date) {
    $date_num = date('w', strtotime($date));
    $week = ['日', '月', '火', '水', '木', '金', '土'];
    return $week[$date_num];
  }
?>
