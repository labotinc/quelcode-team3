<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RegularPrices Controller
 *
 * @property \App\Model\Table\RegularPricesTable $RegularPrices
 *
 * @method \App\Model\Entity\RegularPrice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegularPricesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $regularPrices = $this->paginate($this->RegularPrices);

        $this->set(compact('regularPrices'));
    }

    /**
     * View method
     *
     * @param string|null $id Regular Price id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $regularPrice = $this->RegularPrices->get($id, [
            'contain' => ['Reservations'],
        ]);

        $this->set('regularPrice', $regularPrice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $regularPrice = $this->RegularPrices->newEntity();
        if ($this->request->is('post')) {
            $regularPrice = $this->RegularPrices->patchEntity($regularPrice, $this->request->getData());
            if ($this->RegularPrices->save($regularPrice)) {
                $this->Flash->success(__('The regular price has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regular price could not be saved. Please, try again.'));
        }
        $this->set(compact('regularPrice'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Regular Price id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $regularPrice = $this->RegularPrices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $regularPrice = $this->RegularPrices->patchEntity($regularPrice, $this->request->getData());
            if ($this->RegularPrices->save($regularPrice)) {
                $this->Flash->success(__('The regular price has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regular price could not be saved. Please, try again.'));
        }
        $this->set(compact('regularPrice'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Regular Price id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $regularPrice = $this->RegularPrices->get($id);
        if ($this->RegularPrices->delete($regularPrice)) {
            $this->Flash->success(__('The regular price has been deleted.'));
        } else {
            $this->Flash->error(__('The regular price could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
