<main>
    <!-- ここから上映スケジュール ナビゲーション -->
    <section class="schedule-section-1">
        <h2 class="schedule-h2-1">上映スケジュール</h2>
        <ul class="schedule-dates">
            <? foreach ($dates as $index => $date): ?>
            <!-- 選択した日。背景は黄色 -->
            <? if($page == $index) : ?>
            <!-- 割引日でないなら -->
            <? if (empty($date["event"])): ?>
            <li class="current-day"><a href="schedules?page=<?= $index ?>"><?= $date["date"] ?>(<?= $date["week"] ?>)</a></li>
            <!-- 割引日なら -->
            <? else: ?>
            <li class="current-day"><span class="css-br"><a href="schedules?page=<?= $index ?>"><?= $date["date"] ?>(<?= $date["week"] ?>)</a></span><a href="schedules?page=<?= $index ?>  " class="discount-day"><?= $date["event"] ?></a></li>
            <? endif; ?>
            <!-- 選択していない日。背景は黄色ではない -->
            <? else: ?>
            <!-- 割引日でないなら -->
            <? if (empty($date["event"])): ?>
            <li><a href="schedules?page=<?= $index ?>"><?= $date["date"] ?>(<?= $date["week"] ?>)</a></li>
            <!-- 割引日なら -->
            <? else: ?>
            <li><span class="css-br"><a href="schedules?page=<?= $index ?>"><?= $date["date"] ?>(<?= $date["week"] ?>)</a></span><a href="schedules?page=<?= $index ?>  " class="discount-day"><?= $date["event"] ?></a></li>
            <? endif; ?>
            <? endif; ?>
            <? endforeach ?>
        </ul>
    </section>
    <!-- ここまで上映スケジュール ナビゲーション -->

    <!-- ここから各映画の上映スケジュール -->
    <section class="schedule-section-2">
        <!-- 上映日 -->
        <h2 class="schedule-h2-2">
            <? echo $dates[$page]["date"] ?>(
            <? echo $dates[$page]["week"] ?>)</h2>
        <!-- 映画タイトル、上映時間など -->
        <? foreach ($movies as $movie): ?>
        <div class="schedule-details">
            <div class="schedule-screen">
                <h3><?= $movie->title; ?></h3>
                <ul class="schedule-time">
                    <li>[ 上映時間：<?= ToMin(date("H:i:s", strtotime($movie->screen_time))) ?>分 ]</li>
                    <li><?= date("n月j日", strtotime($movie->last_screened_on)) ?>(<?= ToDay($movie->last_screened_on) ?>)終了予定</li>
                </ul>
            </div>
            <ul class="schedule-each">
                <!-- 映画のポスター画像 -->
                <li>
                    <?= $this->Html->image("movies_small/$movie->thumbnail_file_name.png") ?>
                </li>
                <? foreach ($movie->schedules as $schedule): ?>
                <li>
                    <!-- 映画の開始時間、終了時間、予約購入ボタン -->
                    <p class="schedule-screen-time">
                        <span class="schedule-movie-start"><?= date("G:i", strtotime($schedule->start_at)) ?></span><span class="schedule-movie-end">〜<?= date("G:i", strtotime($schedule->end_at)) ?></span>
                    </p>
                    <?php if ($schedule->start_at > $current_time) : ?>
                        <p class="schedule-reserve-button">
                            <?php
                            echo $this->Html->link(__('予約購入'), [
                                'controller' => 'Reservations',
                                'action' => 'add',
                                'schedule_id' => $schedule->id
                            ])
                            ?>
                        </p>
                    <?php else : ?>
                        <p class="not-on-sale">販売終了</p>
                    <?php endif;  ?>
                </li>
                <? endforeach;?>
            </ul>
        </div>
        <? endforeach; ?>
    </section>
    <!-- ここまで各映画の上映スケジュール -->
</main>

<!-- 曜日を取得 -->
<?php
function ToDay($date)
{
    $date_num = date('w', strtotime($date));
    $week = ['日', '月', '火', '水', '木', '金', '土'];
    return $week[$date_num];
}
?>

<!-- 時間を分に変換 -->
<?php
function ToMin($time)
{
    $toArry = explode(":", $time);
    $hour = $toArry[0] * 60;
    $sec = round($toArry[2] / 60, 2);
    $mins = $hour + $toArry[1] + $sec;
    return $mins;
}
?>