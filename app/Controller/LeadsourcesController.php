<?php
App::uses('AppController', 'Controller');
/**
 * Leadsources Controller
 *
 * @property Leadsource $Leadsource
 * @property PaginatorComponent $Paginator
 */
class LeadsourcesController extends AppController {

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
		//permisos para SALEMANAGER - FINANCE USER
		if ($user['role'] == 'salemanager') {
			if (in_array($this->action, array('edit', 'index', 'view','add','delete'))) {
				return true;
			}
			}else{
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
		$this->Leadsource->recursive = 0;
		$this->set('leadsources', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Leadsource->exists($id)) {
			throw new NotFoundException(__('Invalid leadsource'));
		}
		$options = array('conditions' => array('Leadsource.' . $this->Leadsource->primaryKey => $id));
		$this->set('leadsource', $this->Leadsource->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Leadsource->create();
			if ($this->Leadsource->save($this->request->data)) {
				$this->Flash->success(__('The leadsource has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The leadsource could not be saved. Please, try again.'));
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
		if (!$this->Leadsource->exists($id)) {
			throw new NotFoundException(__('Invalid leadsource'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Leadsource->save($this->request->data)) {
				$this->Flash->success(__('The leadsource has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The leadsource could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Leadsource.' . $this->Leadsource->primaryKey => $id));
			$this->request->data = $this->Leadsource->find('first', $options);
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
		$this->Leadsource->id = $id;
		if (!$this->Leadsource->exists()) {
			throw new NotFoundException(__('Invalid leadsource'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Leadsource->delete()) {
			$this->Flash->success(__('The leadsource has been deleted.'));
		} else {
			$this->Flash->error(__('The leadsource could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
