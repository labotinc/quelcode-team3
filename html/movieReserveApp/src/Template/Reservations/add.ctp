<main>
  <h1 class="seat-reservation">座席予約</h1>
  <div class="seats-outer-wrapper">
    <div class="seats-inner-wrapper">
      <ul class="seats-rows rows-left">
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li>5</li>
        <li>6</li>
        <li>7</li>
        <li>8</li>
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
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li>5</li>
        <li>6</li>
        <li>7</li>
        <li>8</li>
      </ul>
    </div>
    <div class="seats-reservation-btn">
      <?php echo $this->Html->link(__('決定'), [
        'controller' => 'Reservations',
        'action' => 'book-seats'
      ])
      ?>
    </div>
  </div>
</main>

<?php
print_r($reservedSeats);

?>