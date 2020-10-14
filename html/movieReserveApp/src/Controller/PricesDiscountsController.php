<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 *
 *
 */
class PricesDiscountsController extends AppController
{
  /**
   * Index method
   *
   * @return \Cake\Http\Response|null
   */
  public function initialize()
  {
    $this->loadModel('RegularPrices');
  }
  public function index()
  {
    $title = 'QUEL CINNEMAS';
    $login = 'ログイン';

    $regular_prices = $this->RegularPrices->find('all', [
      'conditions'=>['is_invalid' === 0],
      'order'=>['price'=>('desc')]
    ]);
    $this->set(compact('title', 'login', 'regular_prices'));
  }

}
