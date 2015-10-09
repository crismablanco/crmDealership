<?php
App::uses('AppController', 'Controller');
/**
 * Emailtemplates Controller
 *
 * @property Emailtemplate $Emailtemplate
 * @property PaginatorComponent $Paginator
 */
class EmailtemplatesController extends AppController {

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
		$this->Emailtemplate->recursive = 0;
		$this->set('emailtemplates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Emailtemplate->exists($id)) {
			throw new NotFoundException(__('Invalid emailtemplate'));
		}
		$options = array('conditions' => array('Emailtemplate.' . $this->Emailtemplate->primaryKey => $id));
		$this->set('emailtemplate', $this->Emailtemplate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Emailtemplate->create();
			if ($this->Emailtemplate->save($this->request->data)) {
				$this->Flash->success(__('The emailtemplate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The emailtemplate could not be saved. Please, try again.'));
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
		if (!$this->Emailtemplate->exists($id)) {
			throw new NotFoundException(__('Invalid emailtemplate'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Emailtemplate->save($this->request->data)) {
				$this->Flash->success(__('The emailtemplate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The emailtemplate could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Emailtemplate.' . $this->Emailtemplate->primaryKey => $id));
			$this->request->data = $this->Emailtemplate->find('first', $options);
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
		$this->Emailtemplate->id = $id;
		if (!$this->Emailtemplate->exists()) {
			throw new NotFoundException(__('Invalid emailtemplate'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Emailtemplate->delete()) {
			$this->Flash->success(__('The emailtemplate has been deleted.'));
		} else {
			$this->Flash->error(__('The emailtemplate could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
