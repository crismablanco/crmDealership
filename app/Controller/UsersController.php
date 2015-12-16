<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
		if ($user['role'] == 'salemanager') {
			if (in_array($this->action, array('edit', 'index','view','login','logout','delete','add'))) {
				return true;
			}
		}else{
			if ($user['role'] == 'sale' || $user['role'] == 'finance') {
				if (in_array($this->action, array('edit', 'index','view','login','logout'))) {

					return true;
				}else{
					//if ($this->Auth->user('id')) {
						$this->Flash->error('You can not access here!');
						$this->redirect($this->Auth->redirect());
					//}
				}
			}
		}
		return parent::isAuthorized($user);
	}

	public function login()
	{
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Wrong user or password!'));
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//si es SALE o FINANCE solo se ve a sí mismo en el listado
		if ($this->Auth->user('role')=='sale' || $this->Auth->user('role')=='finance') {
			$this->Paginator->settings = array(
        		'conditions' => array('User.id ' => $this->Auth->user('id'))
    		);
		}

		//si es salemanager debo mostrarle solamente los que pertenecen a su mismo dealership
		if ($this->Auth->user('role')=='salemanager') {
			$this->Paginator->settings = array(
        		'conditions' => array('User.dealership_id ' => $this->Auth->user('dealership_id'), 'User.role !='=>'admin')
    		);
		}

		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			$this->Flash->error(__('The user does not exist. What are you doing ?...'));
			return $this->redirect(array('action'=>'index'));
		}

		switch ($this->Auth->user('role')) {
			case 'admin'://si es admin directamente busco el usuario
				break;

			case 'sale': // si es usuario SALE busco que el usuario a ver sea justamente él mismo
				if ($this->Auth->user('id')!=$id) {// si no es él mismo, WRONG
					$this->Flash->error(__('You have not Permission on this action.'));
					return $this->redirect(array('action'=>'index'));
				}
				break;

			case 'finance': // si es usuario FINANCE busco que el usuario a ver sea justamente él mismo
				if ($this->Auth->user('id')!=$id) {// si no es él mismo, WRONG
					$this->Flash->error(__('You have not Permission on this action.'));
					return $this->redirect(array('action'=>'index'));
				}
				break;


			case 'salemanager': // si es SALEMANAGER le muestro todos los usuario que pertenecen a su mismo dealership
				$datas = $this->User->query('SELECT User.id FROM users User WHERE User.id='.$id.' and User.dealership_id='.$this->Auth->user('dealership_id'));
				if (empty($datas)) { // si no puede ver dicho cliente, WRONG
					$this->Flash->error(__('You have not Permission on this action.'));
					return $this->redirect(array('action'=>'index'));
				}
				break;
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		if ($this->Auth->user('role')=='salemanager') {
			$dealerships = $this->User->Dealership->find('list', array(
					'conditions' => array('Dealership.id' => $this->Auth->user('dealership_id'))
			));
		}else {
			$dealerships = $this->User->Dealership->find('list');
		}
		$this->set(compact('dealerships'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}

		if ($this->Auth->user('role')=='salemanager' || $this->Auth->user('role')=='finance' || $this->Auth->user('role')=='sale') {
			$dealerships = $this->User->Dealership->find('list', array(
					'conditions' => array('Dealership.id' => $this->Auth->user('dealership_id'))
			));
		}else {
			$dealerships = $this->User->Dealership->find('list');
		}

		$this->set(compact('dealerships'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
