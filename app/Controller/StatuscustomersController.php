<?php
App::uses('AppController', 'Controller');
/**
 * Statuscustomers Controller
 *
 * @property Statuscustomer $Statuscustomer
 * @property PaginatorComponent $Paginator
 */
class StatuscustomersController extends AppController {

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
		$this->Statuscustomer->recursive = 0;
		$this->set('statuscustomers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Statuscustomer->exists($id)) {
			throw new NotFoundException(__('Invalid statuscustomer'));
		}
		$options = array('conditions' => array('Statuscustomer.' . $this->Statuscustomer->primaryKey => $id));
		$this->set('statuscustomer', $this->Statuscustomer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Statuscustomer->create();
			if ($this->Statuscustomer->save($this->request->data)) {
				$this->Flash->success(__('The statuscustomer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The statuscustomer could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Statuscustomer->exists($id)) {
			throw new NotFoundException(__('Invalid statuscustomer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Statuscustomer->save($this->request->data)) {
				$this->Flash->success(__('The statuscustomer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The statuscustomer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Statuscustomer.' . $this->Statuscustomer->primaryKey => $id));
			$this->request->data = $this->Statuscustomer->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Statuscustomer->id = $id;
		if (!$this->Statuscustomer->exists()) {
			throw new NotFoundException(__('Invalid statuscustomer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Statuscustomer->delete()) {
			$this->Flash->success(__('The statuscustomer has been deleted.'));
		} else {
			$this->Flash->error(__('The statuscustomer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
