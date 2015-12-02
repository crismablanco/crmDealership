<?php
App::uses('AppController', 'Controller');
/**
 * Financingsources Controller
 *
 * @property Financingsource $Financingsource
 * @property PaginatorComponent $Paginator
 */
class FinancingsourcesController extends AppController {

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
		if ($user['role'] == 'salemanager' || $user['role'] == 'finance') {
			if (in_array($this->action, array('edit', 'index', 'view','add','delete'))) {
				return true;
			}else{
				
					$this->Flash->error('You can not access here!');
					$this->redirect($this->Auth->redirect());
			}
		}

		return parent::isAuthorized($user);
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Financingsource->recursive = 0;
		$this->set('financingsources', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Financingsource->exists($id)) {
			throw new NotFoundException(__('Invalid financingsource'));
		}
		$options = array('conditions' => array('Financingsource.' . $this->Financingsource->primaryKey => $id));
		$this->set('financingsource', $this->Financingsource->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Financingsource->create();
			if ($this->Financingsource->save($this->request->data)) {
				$this->Flash->success(__('The financingsource has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The financingsource could not be saved. Please, try again.'));
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
		if (!$this->Financingsource->exists($id)) {
			throw new NotFoundException(__('Invalid financingsource'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Financingsource->save($this->request->data)) {
				$this->Flash->success(__('The financingsource has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The financingsource could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Financingsource.' . $this->Financingsource->primaryKey => $id));
			$this->request->data = $this->Financingsource->find('first', $options);
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
		$this->Financingsource->id = $id;
		if (!$this->Financingsource->exists()) {
			throw new NotFoundException(__('Invalid financingsource'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Financingsource->delete()) {
			$this->Flash->success(__('The financingsource has been deleted.'));
		} else {
			$this->Flash->error(__('The financingsource could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
