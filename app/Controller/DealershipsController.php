<?php
App::uses('AppController', 'Controller');
/**
 * Dealerships Controller
 *
 * @property Dealership $Dealership
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class DealershipsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash');


		public function beforeFilter()
		{
			parent::beforeFilter();
			//$this->Auth->allow('add');
		}


		public function isAuthorized($user)
		{
			if ($user['role'] != 'admin') {
						$this->Flash->error('You can not access here!');
						$this->redirect($this->Auth->redirect());
			}

			return parent::isAuthorized($user);
		}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Dealership->recursive = 0;
		$this->set('dealerships', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dealership->exists($id)) {
			throw new NotFoundException(__('Invalid dealership'));
		}
		$options = array('conditions' => array('Dealership.' . $this->Dealership->primaryKey => $id));
		$this->set('dealership', $this->Dealership->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dealership->create();
			if ($this->Dealership->save($this->request->data)) {
				$this->Flash->success(__('The dealership has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dealership could not be saved. Please, try again.'));
			}
		}
		$citis = $this->Dealership->Citi->find('list');
		$this->set(compact('citis'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dealership->exists($id)) {
			throw new NotFoundException(__('Invalid dealership'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dealership->save($this->request->data)) {
				$this->Flash->success(__('The dealership has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dealership could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Dealership.' . $this->Dealership->primaryKey => $id));
			$this->request->data = $this->Dealership->find('first', $options);
		}
		$citis = $this->Dealership->Citi->find('list');
		$this->set(compact('citis'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dealership->id = $id;
		if (!$this->Dealership->exists()) {
			throw new NotFoundException(__('Invalid dealership'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dealership->delete()) {
			$this->Flash->success(__('The dealership has been deleted.'));
		} else {
			$this->Flash->error(__('The dealership could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
