<?php
App::uses('AppController', 'Controller');
/**
 * Emailshedules Controller
 *
 * @property Emailshedule $Emailshedule
 * @property PaginatorComponent $Paginator
 */
class EmailshedulesController extends AppController {

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
		$this->Emailshedule->recursive = 0;
		$this->set('emailshedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Emailshedule->exists($id)) {
			throw new NotFoundException(__('Invalid emailshedule'));
		}
		$options = array('conditions' => array('Emailshedule.' . $this->Emailshedule->primaryKey => $id));
		$this->set('emailshedule', $this->Emailshedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Emailshedule->create();
			if ($this->Emailshedule->save($this->request->data)) {
				$this->Flash->success(__('The emailshedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The emailshedule could not be saved. Please, try again.'));
			}
		}
		$emailtemplates = $this->Emailshedule->Emailtemplate->find('list');
		$this->set(compact('emailtemplates'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Emailshedule->exists($id)) {
			throw new NotFoundException(__('Invalid emailshedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Emailshedule->save($this->request->data)) {
				$this->Flash->success(__('The emailshedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The emailshedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Emailshedule.' . $this->Emailshedule->primaryKey => $id));
			$this->request->data = $this->Emailshedule->find('first', $options);
		}
		$emailtemplates = $this->Emailshedule->Emailtemplate->find('list');
		$this->set(compact('emailtemplates'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Emailshedule->id = $id;
		if (!$this->Emailshedule->exists()) {
			throw new NotFoundException(__('Invalid emailshedule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Emailshedule->delete()) {
			$this->Flash->success(__('The emailshedule has been deleted.'));
		} else {
			$this->Flash->error(__('The emailshedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
