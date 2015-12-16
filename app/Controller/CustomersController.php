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


	public function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('add');
	}


	public function isAuthorized($user)
	{
		//permisos para SALE USER - FINANCE USER
		if ($user['role'] == 'sale' || $user['role'] == 'finance') {
			if (in_array($this->action, array('edit', 'index', 'view','add'))) {
				return true;
			}else{
				//if ($this->Auth->user('id')) {
					$this->Flash->error('You can not access here!');
					$this->redirect($this->Auth->redirect());
				//}
			}
		}
		//permisos para SALEMANAGER
		if ($user['role'] == 'salemanager') {
			if (in_array($this->action, array('edit', 'index', 'view','add','delete'))) {
				return true;
			}else{
				//if ($this->Auth->user('id')) {
					$this->Flash->error('You can not access here!');
					$this->redirect($this->Auth->redirect());
				//}
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

		if ($this->Auth->user('role')=='sale') {
			$this->Paginator->settings = array(
        		'conditions' => array('Customer.user_id ' => $this->Auth->user('id'))
    		);
		}


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
			$this->Flash->error(__('The customer does not exist. What are you doing ?...'));
			return $this->redirect(array('action'=>'index'));
		}


		switch ($this->Auth->user('role')) {
			case 'admin'://si es admin directamente busco el cliente
				$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
				$datas = $this->Customer->find('first', $options);
				break;
			case 'sale': // si es usuario SALE busco que el cliente a ver le esté asignado a dicho usuario
				$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id, 'Customer.user_id'=>$this->Auth->user('id')));
				$datas = $this->Customer->find('first', $options);
				if (empty($datas)) {// si no puede ver dicho cliente, WRONG
					$this->Flash->error(__('You have not Permission on this action.'));
					return $this->redirect(array('action'=>'index'));
				}
				break;

			default: // si es FINANCE o SALEMANAGER le muestro todos los clientes que pertenecen a usuarios de su mismo dealership
				$datas = $this->Customer->query('SELECT Customer.id FROM customers Customer, users User WHERE Customer.id ='.$id.' AND User.id = Customer.user_id AND User.dealership_id='.$this->Auth->user('dealership_id'));
				if (empty($datas)) { // si no puede ver dicho cliente, WRONG
					$this->Flash->error(__('You have not Permission on this action.'));
					return $this->redirect(array('action'=>'index'));
				}else {
					//echo "string";
				}
				break;

		}

		$this->set('customer', $this->Customer->findById($datas[0]['Customer']['id']));
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


		switch ($this->Auth->user('role')) {
			case 'sale':
				// si el usuario es de tipo SALE o FINANCE entonces al momento de agregar un Customer, estará asociado a él mismo (sale logueado)
				$options = array('conditions' => array('User.id'=>$this->Auth->user('id')));
				$users = $this->Customer->User->find('list', $options);
				break;

				case 'finance':
					// si el usuario es de tipo SALE o FINANCE entonces al momento de agregar un Customer, estará asociado a él mismo (sale logueado)
					$options = array('conditions' => array('User.id'=>$this->Auth->user('id')));
					$users = $this->Customer->User->find('list', $options);
					break;

			case 'saleman':
				//solamente muestro los usuarios que pertenecen al dealership del usuario logeado y que no sean ADMIN
				$options = array('conditions' => array('User.dealership_id'=>$this->Auth->user('dealership_id'),'NOT'=>array('User.role'=>'admin')));
				$users = $this->Customer->User->find('list', $options);
				break;

			case 'admin':
				// si el usuario es ADMIN puede ver todos los usuarios para asociarlos al Customer
				$users = $this->Customer->User->find('list');
				break;

			default:
				# code...
				break;
		}

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
		// Pregunta si existe el cliente, entonces puede continuar
		if (!$this->Customer->exists($id)) {
			$this->Flash->error(__('The customer does not exist. What are you doing ?...'));
			return $this->redirect(array('action'=>'index'));
		}
		// en caso de querer guardar los cambios de un cliente
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Customer->save($this->request->data)) {
				$this->Flash->success(__('Good! The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
		}
			// si quiere ver los datos de un cliente para editarlo
			else {
				switch ($this->Auth->user('role')) {
					case 'admin'://si es admin directamente busco el cliente
						$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
						$this->request->data = $this->Customer->find('first', $options);
						break;
					case 'sale': // si es usuario SALE busco que el cliente a editar le esté asignado a dicho usuario
						$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id, 'Customer.user_id'=>$this->Auth->user('id')));
						$datas = $this->Customer->find('first', $options);
						if (!empty($datas)) { //si lo encontró, OK
							$this->request->data = $datas;
						}else{ // si no puede editar dicho cliente, WRONG
							$this->Flash->error(__('You have not Permission on this action.'));
							return $this->redirect(array('action'=>'index'));
						}
						break;

					default: // si es FINANCE o SALEMANAGER le muestro todos los clientes que pertenecen a usuarios de su mismo dealership
						$datas = $this->Customer->query('SELECT * FROM customers Customer, users User WHERE Customer.id ='.$id.' AND User.id = Customer.user_id AND User.dealership_id='.$this->Auth->user('dealership_id'));
						if (!empty($datas)) { //si lo encontró, OK
							$this->request->data = $datas[0];
						}else{ // si no puede editar dicho cliente, WRONG
							$this->Flash->error(__('You have not Permission on this action.'));
							return $this->redirect(array('action'=>'index'));
						}
						break;

				}


				$statuscustomers = $this->Customer->Statuscustomer->find('list');
				$leadsources = $this->Customer->Leadsource->find('list');
				$financingsources = $this->Customer->Financingsource->find('list');


				switch ($this->Auth->user('role')) {
					case 'sale':
						// si el usuario es de tipo SALE entonces al momento de editar un Customer, estará asociado a él mismo (sale logueado)
						$options = array('conditions' => array('User.id'=>$this->Auth->user('id')));
						$users = $this->Customer->User->find('list', $options);
						break;

					case 'admin':
						// si el usuario es ADMIN puede ver todos los usuarios para asociarlos al Customer
						$users = $this->Customer->User->find('list');
						break;

					case 'finance' || 'saleman':
						//solamente muestro los usuarios que pertenecen al dealership del usuario logeado y que no sean ADMIN
						$options = array('conditions' => array('User.dealership_id'=>$this->Auth->user('dealership_id'),'NOT'=>array('User.role'=>'admin')));
						$users = $this->Customer->User->find('list', $options);
						break;
					default:
						# code...
						break;
				}

				$citis = $this->Customer->Citi->find('list');
				$this->set(compact('statuscustomers', 'leadsources', 'financingsources', 'users', 'citis'));

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
