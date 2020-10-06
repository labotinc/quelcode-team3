<?php
namespace App\Controller;

use App\Controller\AppController;

class IndexController extends AppController {

  public function initialize() {
    $this->viewBuilder()->setLayout('index');
  }

  public function index() {
    // ビューに渡す変数
    $title = 'QUEL CINNEMAS';
    $login = 'ログイン';

    // 変数をセットしビューに渡す
    $this->set(compact('title', 'login'));
  }
}
