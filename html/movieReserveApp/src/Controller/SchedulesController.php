<?php

namespace App\Controller;

use App\Controller\AppController;
use DateTime;

/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules
 *
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchedulesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Movies');
        $this->loadModel('Schedules');
        $this->loadComponent('Discount');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $page = intval($this->request->getQuery('page'));

        if ($page < 0 || $page > 6) {
            $page = 0;
        }

        // 上部の日付、曜日、割引情報作成
        $dates = [];
        $week = array("日", "月", "火", "水", "木", "金", "土");
        for ($i = 0; $i < 7; $i++) {
            $date = new DateTime();
            $date->modify("+{$i} day");
            $event = $this->Discount->returnEventName($date);
            array_push($dates, ['date' => $date->format('m月d日'), 'week' => $week[$date->format('w')], 'event' => $event]);
        }

        // 映画情報の作成
        $targetDay = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $page, date('Y')));
        $movies = $this->Movies->find(
            'all',
            [
                'conditions' => [
                    'last_screened_on >=' => $targetDay,
                ]
            ]
        )->contain('Schedules', function ($q) use ($targetDay) {
            return $q->where(function ($exp) use ($targetDay) {
                return $exp->between('start_at', $targetDay . ' 00:00:00', $targetDay . ' 23:59:59');
            });
        });

        $this->set(compact('dates'));
        $this->set(compact('movies'));
        $this->set(compact('page'));

        $title = 'QUEL CINNEMAS';
        $login = 'ログイン';
        $this->set(compact('title', 'login'));

    }

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => ['Movies', 'Reservations'],
        ]);

        $this->set('schedule', $schedule);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schedule = $this->Schedules->newEntity();
        if ($this->request->is('post')) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
        }
        $movies = $this->Schedules->Movies->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'movies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
        }
        $movies = $this->Schedules->Movies->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'movies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schedule = $this->Schedules->get($id);
        if ($this->Schedules->delete($schedule)) {
            $this->Flash->success(__('The schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
