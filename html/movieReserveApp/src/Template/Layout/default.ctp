<!DOCTYPE html>
<html lang="ja">

<head>
  <?php echo $this->Html->charset() ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QEUL CINNEMAS</title>
  <?php
  echo $this->Html->css('ress.css');
  echo $this->Html->css('common.css');
  echo $this->Html->css('index.css');
  echo $this->Html->css('slideshow.css');
  echo $this->Html->css('mypage.css');
  echo $this->Html->css('schedule.css');
  echo $this->Html->css('user.css');
  echo $this->Html->css('prices-discounts.css');
  echo $this->Html->css('reservations.css');
  ?>
</head>

<body>
  <header class="page-header">
    <h1 class="logo"><span class="logo-1">QUEL</span><span class="logo-2">CINNEMAS</span></h1>
    <nav>
      <ul class="main-nav">
        <li>
          <?php echo $this->Html->link(__('トップ'), [
            'controller' => 'Index',
            'action' => 'index'
          ])
          ?>
        </li>
        <li>
          <?php echo $this->Html->link(__('上映スケジュール'), [
            'controller' => 'Schedules',
            'action' => 'index'
          ])
          ?>
        </li>
        <li>
          <?php echo $this->Html->link(__('料金・割引'), [
            'controller' => 'PricesDiscounts',
            'action' => 'index'
          ])
          ?>
        </li>
      </ul>
    </nav>
    <p class="login_button">
      <?php
      if (!isset($authuser)) {
        $login = 'ログイン';
      } else {
        $login = 'マイページ';
      }
      echo $this->Html->link(__($login), [
        'controller' => 'Mypage',
        'action' => 'index'
      ])
      ?>
    </p>
  </header>

  <?= $this->Flash->render() ?>
  <?php echo $this->fetch('content') ?>

  <footer class="page-footer">
    <h3 class="logo-2">QUEL CINNEMAS</h3>
    <ul class="bottom-nav">
      <li>
        <?php echo $this->Html->link(__('トップ'), [
          'controller' => 'Index',
          'action' => 'index'
        ])
        ?>
      </li>
      <li>
        <?php echo $this->Html->link(__('上映スケジュール'), [
          'controller' => 'Schedules',
          'action' => 'index'
        ])
        ?>
      </li>
      <li>
        <?php echo $this->Html->link(__('料金・割引'), [
          'controller' => 'PricesDiscounts',
          'action' => 'index'
        ])
        ?>
      </li>
    </ul>
  </footer>

  <?php echo $this->Html->script('jquery.min'); ?>
  <?php echo $this->Html->script('slideshow'); ?>
  <?php echo $this->Html->script('reservations'); ?>
</body>

</html>
