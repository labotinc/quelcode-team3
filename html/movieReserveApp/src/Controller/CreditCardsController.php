<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Form\CreditCardForm;

/**
 * CreditCards Controller
 *
 * @property \App\Model\Table\CreditCardsTable $CreditCards
 *
 * @method \App\Model\Entity\CreditCard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CreditCardsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }



    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $creditCards = $this->paginate($this->CreditCards);

        $this->set(compact('creditCards'));
    }

    /**
     * View method
     *
     * @param string|null $id Credit Card id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $creditCard = $this->CreditCards->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('creditCard', $creditCard);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $creditcard_form = new CreditCardForm();
        $creditCard = $this->CreditCards->newEntity();
        if ($this->request->is('post')) {
            $creditCard = $this->CreditCards->patchEntity($creditCard, $this->request->getData());
            //FormクラスのエラーとModelのバリデーションエラーがない場合
            if ($creditcard_form->validate($this->request->getData()) && empty($creditCard->getErrors())) {
                if ($this->CreditCards->save($creditCard)) {
                    return $this->redirect(['controller' => 'Mypage', 'action' => 'index']);
                } else {
                    $this->Flash->error(__('クレジットカードの登録に失敗しました.'));
                }
            } else {
                //セキュリティーコードのエラーをセット
                if (!empty($creditcard_form->getErrors()['security_code'])) {
                    $securityCodeError = $creditcard_form->getErrors()['security_code'];
                    $creditCard->setErrors([
                        'security_code' => $securityCodeError,
                    ]);
                }
                //プライバシーポリシーのエラーをセット
                if (!empty($creditcard_form->getErrors()['privacy_policy'])) {
                    $privacyPolicyError = $creditcard_form->getErrors()['privacy_policy'];
                    $creditCard->setErrors([
                        'privacy_policy' => $privacyPolicyError
                    ]);
                }
            }
        }
        $this->set(compact('creditCard'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Credit Card id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $creditCard = $this->CreditCards->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $creditCard = $this->CreditCards->patchEntity($creditCard, $this->request->getData());
            if ($this->CreditCards->save($creditCard)) {
                $this->Flash->success(__('The credit card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The credit card could not be saved. Please, try again.'));
        }
        $users = $this->CreditCards->Users->find('list', ['limit' => 200]);
        $this->set(compact('creditCard', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Credit Card id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $creditCard = $this->CreditCards->get($id);
        if ($this->CreditCards->delete($creditCard)) {
            $this->Flash->success(__('The credit card has been deleted.'));
        } else {
            $this->Flash->error(__('The credit card could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
