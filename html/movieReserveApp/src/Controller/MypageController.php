<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\CreditCard;
use Cake\Event\Event;

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
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('CreditCards');

    }

    public function beforeFilter(Event $event)
    {
    }

    public function index()
    {
        $user_id = $this->Auth->user('id');
        $getCreditCard = $this->CreditCards->find('all')
            ->where([
                'user_id' => $user_id,
                'is_deleted' => false
            ]);
        $cardInfo = $getCreditCard->first();
        $hiddenCardNumber = substr($cardInfo['number'], 4, 4);
        $this->set(compact('hiddenCardNumber', 'cardInfo'));
    }


}
