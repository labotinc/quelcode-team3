<main>
  <h1 class="seat-reservation">座席予約</h1>
  <div class="seats-outer-wrapper">
    <div class="seats-inner-wrapper">
      <ul class="seats-rows rows-left">
        <!-- メンテナンス性を考慮し繰り返し処理で列番号を描画 -->
        <?php
        for ($i = 1; $i <= $rows; $i++) {
          echo "<li>{$i}</li>";
        }
        ?>
      </ul>
      <?php
      // 縦の列数だけ繰り返し処理で描画を行う
      for ($i = 0; $i < $columns_length; $i++) {
        $column = $columns[$i];
        echo "<ul class='seats-columns'>";
        echo "<li>{$column}</li>";
        // 横の列数だけ繰り返し処理で描画を行う
        for ($j = 1; $j <= $rows; $j++) {
          $seat_id = $column . $j;
          // 描画する席が予約済みの場合はクラス「unavailable」を付与し表示を変える
          if (in_array($seat_id, $reservedSeats)) {
            echo "<li class='unavailable' id='{$seat_id}'>";
          } else {
            echo "<li class='available' id='{$seat_id}'>";
          }
        }
        echo "</ul>";
      }
      ?>
      <ul class="seats-rows rows-right">
        <?php
        for ($i = 1; $i <= $rows; $i++) {
          echo "<li>{$i}</li>";
        }
        ?>
      </ul>
    </div>
    <?=
      $this->Form->create($reservation, [
        'type' => 'post',
        'url' => ['controller' => 'Reservations', 'action' => 'add'],
        'novalidate' => true,
      ]);
    ?>
    <?php
    echo $this->Form->control('seat_number');
    echo $this->Form->hidden('schedule_id', ['value' => $schedule_id]);
    ?>
    <?php
    echo $this->form->submit(__('決定'), [
      'class' => 'seats-reservation-btn'
    ]);
    echo $this->Form->end();
    ?>
  </div>
  <a href="#" id="confirm-btn">confirm</a>
</main>