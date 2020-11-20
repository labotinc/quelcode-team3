<?php

namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * Payments Controller
 *
 *
 *
 */
class PaymentsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('CreditCards');
        $this->loadModel('RegularPrices');
        $this->loadModel('Reservations');
    }

    private function getValidReservation($reservation_id)
    {
        try {
            $reservation = $this->Reservations->get($reservation_id);
        } catch (Exception $e) {
            return null;
        }

        if ($reservation->is_confirmed || $reservation->is_canceled || $reservation->is_deleted) {
            return null;
        } else {
            return $reservation;
        }
    }

    private function getValidRegularPrice($regular_price_id)
    {
        try {
            $regular_price = $this->RegularPrices->get($regular_price_id);
        } catch (Exception $e) {
            return null;
        }

        if ($regular_price->is_invalid) {
            return null;
        } else {
            return $regular_price;
        }
    }

    public function methodselect($reservation_id = null)
    {
        // 正規料金idをクエリパラメータで、予約idを引数で受け取る。セットされていない場合トップページに戻る
        $regular_price_id = $this->request->getQuery('regular_price_id');
        if (!isset($reservation_id) || !isset($regular_price_id)) {
            return $this->redirect([
                'controller' => 'Index',
                'action' => 'index'
            ]);
        }

        // 存在する予約IDか調べる
        $reservation = $this->getValidReservation($reservation_id);
        if (!isset($reservation)) {
            $this->Flash->error('お支払済みか、有効でない予約IDです');
            return $this->redirect([
                'controller' => 'Schedules',
                'action' => 'index'
            ]);
        }

        $user_id = $this->Auth->user()['id'];
        $creditcard = $this->CreditCards->find('all', [
            'conditions' => ['user_id' => $user_id]
        ])->first();

        $this->set(compact('regular_price_id', 'reservation_id', 'creditcard'));

        if ($this->request->is('post')) {
            return $this->redirect([
                'action' => 'confirm',
                $reservation_id,
                '?' => ['regular_price_id' => $regular_price_id]
            ]);
        }
    }

    public function confirm($reservation_id = null)
    {
        // 正規料金idをクエリパラメータで、予約idを引数で受け取る。セットされていない場合トップページに戻る
        $regular_price_id = $this->request->getQuery('regular_price_id');
        if (!isset($reservation_id) || !isset($regular_price_id)) {
            return $this->redirect([
                'controller' => 'Index',
                'action' => 'index'
            ]);
        }

        // 存在する予約IDか調べる
        $reservation = $this->getValidReservation($reservation_id);
        if (!isset($reservation)) {
            $this->Flash->error('お支払済みか、有効でない予約IDです');
            return $this->redirect([
                'controller' => 'Schedules',
                'action' => 'index'
            ]);
        }

        // 存在する料金か調べる
        $regular_price = $this->getValidRegularPrice($regular_price_id);
        if (!isset($regular_price)) {
            $this->Flash->error('料金IDが無効です');
            return $this->redirect([
                'controller' => 'Schedules',
                'action' => 'index'
            ]);
        }

        $this->set(compact('regular_price', 'reservation_id'));

        if (!$this->request->is('post')) {
            return;
        }

        // 予約情報更新処理
        $reservation->regular_price_id = $regular_price_id;
        $reservation->purchased_price = $regular_price->price;
        $reservation->is_confirmed = 1;

        if ($this->Reservations->save($reservation)) {
            return $this->redirect(['action' => 'completed']);
        } else {
            $this->Flash->error('予約に失敗しました');
            return $this->redirect([
                'controller' => 'Schedules',
                'action' => 'index'
            ]);
        }
    }

    public function completed()
    {
    }
}
