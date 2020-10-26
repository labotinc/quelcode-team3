<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
    parent::initialize();
    $this->loadModel('RegularPrices');
    $this->loadModel('Discounts');
  }

  public function beforeFilter(Event $event)
  {
    $this->Auth->allow(['index']);
  }

  public function index()
  {
    $regular_prices = $this->RegularPrices->find('all', [
      'conditions' => ['is_invalid' => false],
      'order' => ['price' => ('desc')]
    ]);
    $discounts = $this->Discounts->find('all', [
      'conditions' => ['is_invalid' => false],
    ]);
    $this->set(compact('regular_prices', 'discounts'));
  }
}
