<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mypage Controller
 *
 *
 * @method \App\Model\Entity\Mypage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MypageController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $title = 'QUEL CINNEMAS';
        $login = 'ログイン';

        $this->set(compact('title', 'login'));
    }


}
