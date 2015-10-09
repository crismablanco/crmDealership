<?php 

/**
* 
*/
class CustomersController extends AppController
{
	public $helpers= array('Html', 'Form', 'Time');
	public $components = array('Flash');

	public function index(){
		$this->set('customers', $this->Customer->find('all'));
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException('Wrong data!');
		}
		$customer = $this->Customer->findById($id);
		if (!$customer) {
			throw new NotFoundException('Customer does not exist!');
		}
		$this->set('customer',$customer);
	}

	public function add(){
		if ($this->request->is('post')) {
			$this->Customer->create();

			if ($this->Customer->save($this->request->data)) {
				$this->Flash->success('Customer created successfully!');
				return $this->redirect(array('action'=>'index'));
			}
			$this->Flash->set('Customer NOT created!');
		}
	}

	public function edit($id = null)
	{
		if (!$id) {
			throw new NotFoundException("Wrong Data!");
		}
		$customer = $this->Customer->findById($id);
		if (!$customer) {
			throw new NotFoundException("Customer does not exist!");
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Customer->id = $id;
			if ($this->Customer->save($this->request->data)) {
				$this->Flash->success('Customer successfully edited.');
				return $this->redirect(array('action'=>'index'));
			}
			$this->Flash->error("Customer not edited.");
		}

		if (!$this->request->data) {
			$this->request->data = $customer;
		}
		$this->set('customer',$customer);

	}


	public function delete($id)
	{
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("IMPOSSIBLE TO CONTINUE");
		}
		if ($this->Customer->delete($id)) {
			$this->Flash->success('Customer deleted successfully!');
			return $this->redirect(array('action'=>'index'));
		}
	}









	public function test()
	{
		$this->Flash->information('nooooooooooo');
	}
}

 ?>