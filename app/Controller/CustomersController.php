<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 * @property PaginatorComponent $Paginator
 */
class CustomersController extends AppController {

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
		$this->Customer->recursive = 0;
		$this->set('customers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
		$this->set('customer', $this->Customer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				$this->Flash->success(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
		}
		$statuscustomers = $this->Customer->Statuscustomer->find('list');
		$leadsources = $this->Customer->Leadsource->find('list');
		$financingsources = $this->Customer->Financingsource->find('list');
		$users = $this->Customer->User->find('list');
		$citis = $this->Customer->Citi->find('list');
		$this->set(compact('statuscustomers', 'leadsources', 'financingsources', 'users', 'citis'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Customer->save($this->request->data)) {
				$this->Flash->success(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
			$this->request->data = $this->Customer->find('first', $options);
		}
		$statuscustomers = $this->Customer->Statuscustomer->find('list');
		$leadsources = $this->Customer->Leadsource->find('list');
		$financingsources = $this->Customer->Financingsource->find('list');
		$users = $this->Customer->User->find('list');
		$citis = $this->Customer->Citi->find('list');
		$this->set(compact('statuscustomers', 'leadsources', 'financingsources', 'users', 'citis'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Customer->delete()) {
			$this->Flash->success(__('The customer has been deleted.'));
		} else {
			$this->Flash->error(__('The customer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function searchjson()
	{
		$term = null;
		if (!empty($this->request->query['term'])) {
			$term = $this->request->query['term'];
			$terms = explode(' ', trim($term));
			$terms = array_diff($terms, array(''));
			foreach ($terms as $term) {
				$conditions[] = array('Customer.first_name LIKE '=>'"%'.$term.'%"');
			}
			$customers = $this->Customer->find('all', array('recursive'=>-1,'fields'=>array('Customer.id','Customer.first_name', 'Customer.last_name'),'conditions'=>$conditions, 'limit'=>20));
		}
		echo json_encode($customers);
		$this->autoRender = false;
	}
}
