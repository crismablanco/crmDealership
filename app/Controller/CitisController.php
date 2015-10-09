<?php
App::uses('AppController', 'Controller');
/**
 * Citis Controller
 *
 * @property Citi $Citi
 * @property PaginatorComponent $Paginator
 */
class CitisController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Citi->recursive = 0;
		$this->set('citis', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Citi->exists($id)) {
			throw new NotFoundException(__('Invalid citi'));
		}
		$options = array('conditions' => array('Citi.' . $this->Citi->primaryKey => $id));
		$this->set('citi', $this->Citi->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Citi->create();
			if ($this->Citi->save($this->request->data)) {
				$this->Flash->success(__('The citi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The citi could not be saved. Please, try again.'));
			}
		}
		$states = $this->Citi->State->find('list');
		$this->set(compact('states'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Citi->exists($id)) {
			throw new NotFoundException(__('Invalid citi'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Citi->save($this->request->data)) {
				$this->Flash->success(__('The citi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The citi could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Citi.' . $this->Citi->primaryKey => $id));
			$this->request->data = $this->Citi->find('first', $options);
		}
		$states = $this->Citi->State->find('list');
		$this->set(compact('states'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Citi->id = $id;
		if (!$this->Citi->exists()) {
			throw new NotFoundException(__('Invalid citi'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Citi->delete()) {
			$this->Flash->success(__('The citi has been deleted.'));
		} else {
			$this->Flash->error(__('The citi could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
