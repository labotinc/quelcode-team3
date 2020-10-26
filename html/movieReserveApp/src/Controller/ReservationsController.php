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

  public function initialize()
  {
    parent::initialize();

    $title = 'QUEL CINNEMAS';
    $login = 'ログイン';

    $this->set(compact('title', 'login'));
  }
  public function index()
  {
    $this->paginate = [
      'contain' => ['Schedules', 'Users', 'RegularPrices', 'Discounts'],
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
      'contain' => ['Schedules', 'Users', 'RegularPrices', 'Discounts'],
    ]);

    $this->set('reservation', $reservation);
  }

  /**
   * Add method
   *
   * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
   */
  public function add()
  {
    $schedule_id = $this->request->query['schedule_id'];
    $reservation = $this->Reservations->newEntity();
    if ($this->request->is('post')) {
      $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
      if ($this->Reservations->save($reservation)) {
        $this->Flash->success(__('The reservation has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
    }
    $current_time = new DateTime();
    $allCancelled = $this->Reservations->find('all', [
      'conditions' => array(
        'expire_at <' => $current_time,
        'is_cancelled' => false
      )
    ]);
    foreach ($allCancelled as $cancelled) {
      $cancelled->is_cancelled = true;
      $this->Reservations->save($cancelled);
    }
    // 座席予約をしようとしている上映回に紐づく予約情報をDBから取得
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
    $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];
    $columns_length = sizeof($columns);
    $rows = 8;

    $this->set(compact(
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
