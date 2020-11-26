<main class="cancelled-main">
    <div class="my-reservations-outer">
        <p class="cancelled-message">予約をキャンセルしました</p>
        <div class="reservations-to-mypage-button cancelled-to-mypage">
            <?= $this->Html->link('戻る', [
                'controller' => 'Mypage',
                'action' => 'index'
            ]);
            ?>
        </div>
    </div>
</main>
