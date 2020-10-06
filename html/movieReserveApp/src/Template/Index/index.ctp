<main class="wrapper">
  <div class="slideshow-container">
    <div class="mySlides fade">
      <?= $this->Html->image('movies_slideshow/2020-05-22 16.13.13@2x.png', ['style' => 'width:100%']); ?>
    </div>
    
    <div class="mySlides fade">
      <?= $this->Html->image('movies_slideshow/2020-05-22 16.19.57@2x.png', ['style' => 'width:100%']); ?>
    </div>
    
    <div class="mySlides fade">
      <?= $this->Html->image('movies_slideshow/2020-05-22 16.27.06@2x.png', ['style' => 'width:100%']); ?>
    </div>
  </div>
  
  <div class="dots">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>

  <section>
    <h2>上映映画一覧</h2>
      <ul class="movie_pics">
        <li><?= $this->Html->image("movies/2020-05-22 16.13.13.png"); ?></li>
        <li><?= $this->Html->image("movies/2020-05-22 16.19.57.png"); ?></li>
        <li><?= $this->Html->image("movies/2020-05-22 16.27.06.png"); ?></li>
      </ul>
    <p class="details_button"><a href="#">詳しく見る</a></p>
  </section>

  <section>
    <h2>お得な割引</h2>
    <p class="details_button"><a href="#">詳しく見る</a></p>
  </section>
</main>
