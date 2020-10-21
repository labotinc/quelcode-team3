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
      <ul class="seats-columns colum-A">
        <li>A</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-B">
        <li>B</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-C">
        <li>C</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-D">
        <li>D</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-E">
        <li>E</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-F">
        <li>F</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-G">
        <li>G</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-H">
        <li>H</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-I">
        <li>I</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-J">
        <li>J</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
      <ul class="seats-columns colum-K">
        <li>K</li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
        <li class="available"></li>
      </ul>
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
        'controller' => 'Index',
        'action' => 'index'
      ])
      ?>
    </div>
  </div>
</main>