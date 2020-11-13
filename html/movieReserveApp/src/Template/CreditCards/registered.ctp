<main class="card-registered-main">
    <section class="creditcard-registration-main">
      <h1>決済情報</h1>
      <div class="creditcard-registration-wrapper card-registered-wrapper">
        <p>決済情報の登録が完了しました。</p>
        <div class="back-to-mypage">
            <?= $this->Html->link('マイページに戻る', [
                'controller' => 'Mypage',
                'action' => 'index',
                '_full' => true
            ])
            ?>
        </div>
      </div>
    </section>
</main>
