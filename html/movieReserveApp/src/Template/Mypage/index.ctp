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
        <td class="mypage-top-link-button"><?= $this->Html->link('詳細', ['controller' => 'Mypage', 'action' => 'reserve_details', '_full' => true]) ?></td>
      </tr>
      <tr>
        <th>決済情報</th>
        <!-- TODO: 後でactionを適切なものに置き換える -->
        <td class="mypage-top-link-button"><?= $this->Html->link('登録する', ['controller' => 'CreditCards', 'action' => 'add', '_full' => true]) ?></td>
      </tr>
    </table>
  </div>
  <!-- TODO: 後でactionを適切なものに置き換える -->
  <p class="mypage-top-account-delete-link"><?= $this->Html->link('アカウントを削除', ['controller' => 'Users', 'action' => 'delete', '_full' => true]) ?></p>
</main>
