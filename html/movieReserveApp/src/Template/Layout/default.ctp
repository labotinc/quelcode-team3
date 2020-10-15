<!DOCTYPE html>
<html lang="ja">
<head>
  <?php echo $this->Html->charset() ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo h($title) ?></title>
  <?php
    echo $this->Html->css('ress.css');
    echo $this->Html->css('common.css');
    echo $this->Html->css('index.css');
    echo $this->Html->css('slideshow.css');
    echo $this->Html->css('mypage.css');
    echo $this->Html->css('schedule.css');
  ?>
</head>

<body>
  <header class="page-header">
    <h1 class="logo"><a href=""><span class="logo-1">QUEL</span><span class="logo-2">CINNEMAS</span></a></h1>
    <nav>
      <ul class="main-nav">
        <li><a href="#">トップ</a></li>
        <li><a href="#">上映スケジュール</a></li>
        <li><a href="#">料金・割引</a></li>
      </ul>
    </nav>
      <p class="login_button"><a href="#"><?php echo h($login) ?></a></p>
  </header>

  <?php echo $this->fetch('content') ?>

  <footer class="page-footer">
    <h3 class="logo-2">QUEL CINNEMAS</h3>
    <ul class="bottom-nav">
      <li><a href="#">トップ</a></li>
      <li><a href="#">上映スケジュール</a></li>
      <li><a href="#">料金・割引</a></li>
    </ul>
  </footer>

  <?php echo $this->Html->script('slideshow'); ?>

</body>
</html>
