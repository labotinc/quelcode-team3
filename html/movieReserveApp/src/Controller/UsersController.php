<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\UnauthorizedException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'add', 'welcome']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['CreditCards', 'Reservations'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // 入力データに問題がなければDBへの挿入を行う
            if (empty($user->hasErrors())) {
                if ($this->Users->save($user)) {
                    return $this->redirect(['action' => 'welcome']);
                }
                $this->Flash->error(__('会員登録が正常に行えませんでした。'));
            }
        }
        $this->set(compact('user'));
    }

    public function welcome()
    {
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $user_data = $this->Users->find()->where(['email' => $this->request->getData('email')])->first();
                $reg_str = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
                //以下エラーメッセージ
                if ($this->request->getData('email') === '') {
                    $this->set('mail_vacant', '空白になっています。');
                } elseif (preg_match($reg_str, $this->request->getData('email')) === false) {
                    $this->set('mail_format', 'メールアドレスが間違っているようです。');
                } elseif ($this->request->getData('email') !== $user_data['email']) {
                    // エラー文はヘッダー、フッター完成後に位置調整必要
                    $this->set('mail_error', 'メールアドレスが間違っているようです。');
                } elseif ($this->request->getData('password') === '') {
                    $this->set('password_vacant', '空白になっています。');
                } else {
                    $this->set('pass_error', 'パスワードが間違っているようです。');
                }
            }
        };
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
