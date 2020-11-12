<main class="mypage-top-container">
  <h2 class="mypage-top-header">マイページ</h2>
  <div class="mypage-top-table-container">
    <table class="mypage-top-table">
      <tr>
        <th>ポイント</th>
        <td>0 pt</td>
      </tr>
      <tr>
        <th>予約確認</th>
        <!-- TODO: 後でactionを適切なものに置き換える -->
        <td class="mypage-top-link-button"><?= $this->Html->link('詳細', ['controller' => 'Reservations', 'action' => 'detail', '_full' => true]) ?></td>
      </tr>
      <tr>
        <th>決済情報</th>
        <!-- TODO: 後でactionを適切なものに置き換える -->
        <?php if ($hiddenCardNumber) : ?>
          <td class="mypage-top-link-button"><span>************<?= $hiddenCardNumber; ?></span><?= $this->Html->link('変更', ['controller' => 'CreditCards', 'action' => 'modify', '_full' => true]) ?></td>
        <?php else : ?>
          <td class="mypage-top-link-button"><?= $this->Html->link('登録する', ['controller' => 'CreditCards', 'action' => 'add', '_full' => true]) ?></td>
        <?php endif; ?>
      </tr>
    </table>
  </div>
  <!-- TODO: 後でactionを適切なものに置き換える -->
  <p class="mypage-top-account-delete-link"><?= $this->Html->link('アカウントを削除', ['controller' => 'Users', 'action' => 'delete', '_full' => true]) ?></p>
</main>
