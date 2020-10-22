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
      $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];
      $columns_length = sizeof($columns);
      $rows = 8;

      for ($i = 0; $i < $columns_length; $i++) {
        $column = $columns[$i];
        echo "<ul class='seats-columns column-{$column}'>";
        echo "<li>{$column}</li>";
        for ($j = 1; $j <= $rows; $j++) {
          $seat_id = $column . $j;
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