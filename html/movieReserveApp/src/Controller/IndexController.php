<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class IndexController extends AppController
{

  public function initialize()
  {
    parent::initialize();
  }
  public function beforeFilter(Event $event)
  {
    $this->Auth->allow();
  }

  public function index()
  {
  }

}
