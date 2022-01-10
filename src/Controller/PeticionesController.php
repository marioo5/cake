<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
/**
 * Peticiones Controller
 *
 * @property \App\Model\Table\PeticionesTable $Peticiones
 * @method \App\Model\Entity\Peticione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PeticionesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $id = $this->Authentication->getResult()->getData()->id;
        $this->paginate = [
            'contain' => ['Categorias'], 
        ];
        $peticiones = $this->paginate($this->Peticiones->find()->where(['users_id'=>$id]));

        $this->set(compact('peticiones'));
    }

    /**
     * Admin method
     */

    public function admin(){
        $this->paginate = [
            'contain' => ['Categorias'], 
        ];

        $peticiones = $this->Peticiones;
        $peticiones = $this->paginate($peticiones);
        $this->set(compact('peticiones'));
    }

    /**
     * Change state method
     * 
     * Chenge the state pending to accept
     */

    public function change($id = null){
        $peticione = $this->Peticiones->get($id, [
            'contain' => ['Users'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $peticione = $this->Peticiones->patchEntity($peticione, $this->request->getData()->estado);
            if ($this->Peticiones->save($peticione)) {
                $this->Flash->success(__('The peticione has been saved.'));

                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('The peticione could not be saved. Please, try again.'));
        }

    }

    /**
     * View method
     *
     * @param string|null $id Peticione id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peticione = $this->Peticiones->get($id, [
            'contain' => ['Categorias', 'Users'],
        ]);

        $this->set(compact('peticione'));
    }

    public function beforeFilter(EventInterface $event){

        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['view']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peticione = $this->Peticiones->newEmptyEntity();
        if ($this->request->is('post')) {
            $peticione = $this->Peticiones->patchEntity($peticione, $this->request->getData());
            if ($this->Peticiones->save($peticione)) {
                $this->Flash->success(__('The peticione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The peticione could not be saved. Please, try again.'));
        }
        $categorias = $this->Peticiones->Categorias->find('list', ['limit' => 200])->all();
        $users = $this->Peticiones->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('peticione', 'categorias', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Peticione id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peticione = $this->Peticiones->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peticione = $this->Peticiones->patchEntity($peticione, $this->request->getData());
            if ($this->Peticiones->save($peticione)) {
                $this->Flash->success(__('The peticione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The peticione could not be saved. Please, try again.'));
        }
        $categorias = $this->Peticiones->Categorias->find('list', ['limit' => 200])->all();
        $users = $this->Peticiones->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('peticione', 'categorias', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Peticione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peticione = $this->Peticiones->get($id);
        if ($this->Peticiones->delete($peticione)) {
            $this->Flash->success(__('The peticione has been deleted.'));
        } else {
            $this->Flash->error(__('The peticione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
