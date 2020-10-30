<?php

namespace App\Controller;

use App\Controller\AppController;
use DateTime;
use Exception;

/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 *
 * @method \App\Model\Entity\Reservation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservationsController extends AppController
{
  /**
   * Index method
   *
   * @return \Cake\Http\Response|null
   */
  
  public function index()
  {
    $this->paginate = [
      'contain' => ['Schedules', 'Users'],
    ];
    $reservations = $this->paginate($this->Reservations);

    $this->set(compact('reservations'));
  }

  /**
   * View method
   *
   * @param string|null $id Reservation id.
   * @return \Cake\Http\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function view($id = null)
  {
    $reservation = $this->Reservations->get($id, [
      'contain' => ['Schedules', 'Users'],
    ]);

    $this->set('reservation', $reservation);
  }

  /**
   * Add method
   *
   * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
   */
  public function add() {
    // 仮予約作成の際必要となるユーザIDとスケジュールIDを取得
    $user_id = $this->Auth->user('id');
    $schedule_id = $this->request->query['schedule_id'];

    // 有効期限切れの予約情報を取得する処理
    $current_time = new DateTime();
    $allCancelled = $this->Reservations->find('all', [
      'conditions' => array(
        'expire_at <' => $current_time,
        'is_cancelled' => false,
      )
    ]);
    // 座席予約画面が呼び出された直後に、有効期限切れの予約情報のキャンセルフラグを「1」とする処理
    foreach ($allCancelled as $cancelled) {
      $cancelled->is_cancelled = true;
      $this->Reservations->save($cancelled);
    }
    // 座席予約画面が呼び出された直後に、座席予約をしようとしている上映回に紐づく予約情報をDBから取得
    $reservations = $this->Reservations->find()
      ->select('seat_number')
      ->where([
        'schedule_id' => $schedule_id,
        'is_cancelled' => false,
        'is_deleted' => false
      ]);
    // 配列$reservedSeatsを初期化
    $reservedSeats = [];
    // 上映回に紐づく有効な予約情報が存在する場合は座席番号を取得し配列$reservedSeatsに代入
    if ($reservations) {
      foreach ($reservations as $eachReservation) {
        $reservedSeats[] = $eachReservation['seat_number'];
      }
    }

    $reservation = $this->Reservations->newEntity();
    if ($this->request->is('post')) {
      $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
      $reservation->expire_at = new DateTime('+1 hours');
      // 座席選択中に他ユーザによって座席が選択された場合は以降の処理に移らない（同一上映回で同じ座席への重複が発生するのを防ぐ）
      if (in_array($reservation->seat_number, $reservedSeats)) {
        // 「決定ボタン」押下前に他ユーザによって選択中の座席予約がされた場合のメッセージ
        $this->Flash->error(__('申し訳ございませんが、別の座席をお選びください。'));
        // 選択可能な座席の場合は処理を進める
      } else {
        if ($this->Reservations->save($reservation)) {
          // 処理が成功した際は新規作成したデータのIDをクエリパラメータとして渡し、予約詳細入力画面に遷移する
          return $this->redirect(['action' => 'details', 'id' => $reservation->id]);
        } else {
          // DBへのデータ挿入失敗時のエラーメッセージ
          $this->Flash->error(__('予約処理が正常に行われませんでした。座席選択後「決定」ボタンを押してください。'));
        }
      }
    }

    // メンテナンス性を考慮し映画館の縦/横の列数を変数で定義
    $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];
    $columns_length = sizeof($columns);
    $rows = 8;

    // 定義した変数をviewに渡す
    $this->set(compact(
      'user_id',
      'schedule_id',
      'reservation',
      'columns',
      'columns_length',
      'rows',
      'reservedSeats',
    ));
  }

  /**
   * Edit method
   *
   * @param string|null $id Reservation id.
   * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function edit($id = null)
  {
    $reservation = $this->Reservations->get($id, [
      'contain' => [],
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
      if ($this->Reservations->save($reservation)) {
        $this->Flash->success(__('The reservation has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
    }
    $schedules = $this->Reservations->Schedules->find('list', ['limit' => 200]);
    $users = $this->Reservations->Users->find('list', ['limit' => 200]);
    $regularPrices = $this->Reservations->RegularPrices->find('list', ['limit' => 200]);
    $discounts = $this->Reservations->Discounts->find('list', ['limit' => 200]);
    $this->set(compact('reservation', 'schedules', 'users', 'regularPrices', 'discounts'));
  }

  /**
   * Delete method
   *
   * @param string|null $id Reservation id.
   * @return \Cake\Http\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $reservation = $this->Reservations->get($id);
    if ($this->Reservations->delete($reservation)) {
      $this->Flash->success(__('The reservation has been deleted.'));
    } else {
      $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
