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

    public function methodselect($reservation_id = null)
    {
        $regular_price_id = $this->request->getQuery('regular_price_id');
        if (!isset($reservation_id) || !isset($regular_price_id)) {
            return $this->redirect([
                'controller' => 'Index',
                'action' => 'index'
            ]);
        }

        try {
            $reservation = $this->Reservations->get($reservation_id);
        } catch (Exception $e) {
            $this->Flash->error('無効な予約IDです');
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

        if($this->request->is('post')){
            return $this->redirect([
                'action' => 'confirm',
                $reservation_id,
                '?' => ['regular_price_id' => $regular_price_id]
            ]);
        }
    }

    public function confirm($reservation_id = null)
    {
        $regular_price_id = $this->request->getQuery('regular_price_id');
        if (!isset($reservation_id) || !isset($regular_price_id)) {
            return $this->redirect([
                'controller' => 'Index',
                'action' => 'index'
            ]);
        }

        try {
            $reservation = $this->Reservations->get($reservation_id);
        } catch (Exception $e) {
            $this->Flash->error('無効な予約IDです');
            return $this->redirect([
                'controller' => 'Schedules',
                'action' => 'index'
            ]);
        }

        try {
            $regular_price = $this->RegularPrices->get($regular_price_id);
        } catch (Exception $e) {
            $this->Flash->error('無効な料金です');
            return $this->redirect([
                'controller' => 'Schedules',
                'action' => 'index'
            ]);
        }

        $this->set(compact('regular_price', 'reservation_id'));

        if (!$this->request->is('post')) {
            return;
        }

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
