<?php
App::uses('Statuscustomer', 'Model');

/**
 * Statuscustomer Test Case
 */
class StatuscustomerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.statuscustomer',
		'app.customer',
		'app.leadsource',
		'app.financingsource',
		'app.user',
		'app.dealership',
		'app.sale',
		'app.citi',
		'app.state',
		'app.countri'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Statuscustomer = ClassRegistry::init('Statuscustomer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Statuscustomer);

		parent::tearDown();
	}

}
