<main class="mypage-top-container">
    <h2 class="mypage-top-header">予約詳細</h2>
    <div class="my-reservations-outer">
        <!-- 有効な予約情報があるかないかと表示分けを行う -->
        <?php if (empty($reservations)) : ?>
            <p class="no-reservations">現在予約はありません</p>
        <?php else : ?>
            <div class="my-reservations-inner">
                <!-- 有効な予約情報があればそれぞれ表示する -->
                <?php foreach ($reservations as $reservation) : ?>
                    <div class="reservations-descriptions">
                        <div class="reservations-more-details">
                            <div class="reservations-poster">
                                <? $poster = $reservation['Movies']['thumbnail_file_name'] ?>
                                <?= $this->Html->image("movies_small/$poster.png") ?>
                            </div>
                            <div class="reservations-details">
                                <div class="reservations-title">
                                    <?= $reservation['Movies']['title'] ?>
                                </div>
                                <div class="reservations-date">
                                    <span class="reservations-space"><?= date("m月d日", strtotime($reservation['Schedules']['start_at'])) ?>(<?= ToDay($reservation['Schedules']['start_at']) ?>)&nbsp;<?= $reservation['Schedules']['start_at']->format('H:i') ?>〜<?php echo $reservation['Schedules']['end_at']->format('H:i') ?></span><?php echo $reservation->seat_number ?>
                                </div>
                                <div class="reservations-price">
                                    <?= '&yen' . number_format($reservation->purchased_price) ?>
                                </div>
                            </div>
                        </div>
                        <!-- キャンセルボタン -->
                        <div class="reservations-cancel" id="openModal">
                            <p class="reservations-cancel-button open-modal" id="<?php echo $reservation->id; ?>">キャンセル</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <!-- マイページに戻るボタン -->
        <div class="reservations-to-mypage-button">
            <?= $this->Html->link('マイページに戻る', [
                'controller' => 'Mypage',
                'action' => 'index',
                '_full' => true
            ])
            ?>
        </div>
    </div>
    <!-- モーダルエリアここから -->
    <section id="modalArea" class="modalArea">
        <div id="modalBg" class="modalBg"></div>
        <div class="modalWrapper">
            <div class="modalContents">
                <p class="modal-message">本当にこの予約をキャンセルしますか？</p>
                <div class="modal-inner-wrapper">
                    <p class="abort">戻る</p>
                    <?= $this->Form->create($reservation, [
                        'type' => 'post', 
                        'url' => [
                            'action' => 'cancel',
                        ],
                    ]); ?>
                    <div class="deletion-confirmed">
                        <?= $this->Form->hidden('reservation_id', ['id'=>'reservation_id']) ?>
                        <?= $this->Form->button(__('削除')) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <div id="closeModal" class="closeModal">
                ×
            </div>
        </div>
    </section>
    <!-- モーダルエリアここまで -->
</main>

<!-- 曜日を取得する関数 -->
<?php
function ToDay($date)
{
    $date_num = date('w', strtotime($date));
    $week = ['日', '月', '火', '水', '木', '金', '土'];
    return $week[$date_num];
}
?>
