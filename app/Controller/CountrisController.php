<?php
App::uses('AppController', 'Controller');
/**
 * Countris Controller
 *
 * @property Countri $Countri
 * @property PaginatorComponent $Paginator
 */
class CountrisController extends AppController {

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
		$this->Countri->recursive = 0;
		$this->set('countris', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Countri->exists($id)) {
			throw new NotFoundException(__('Invalid countri'));
		}
		$options = array('conditions' => array('Countri.' . $this->Countri->primaryKey => $id));
		$this->set('countri', $this->Countri->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Countri->create();
			if ($this->Countri->save($this->request->data)) {
				$this->Flash->success(__('The countri has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The countri could not be saved. Please, try again.'));
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
		if (!$this->Countri->exists($id)) {
			throw new NotFoundException(__('Invalid countri'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Countri->save($this->request->data)) {
				$this->Flash->success(__('The countri has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The countri could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Countri.' . $this->Countri->primaryKey => $id));
			$this->request->data = $this->Countri->find('first', $options);
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
		$this->Countri->id = $id;
		if (!$this->Countri->exists()) {
			throw new NotFoundException(__('Invalid countri'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Countri->delete()) {
			$this->Flash->success(__('The countri has been deleted.'));
		} else {
			$this->Flash->error(__('The countri could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
