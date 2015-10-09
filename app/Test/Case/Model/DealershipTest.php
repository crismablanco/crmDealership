<?php
App::uses('Dealership', 'Model');

/**
 * Dealership Test Case
 */
class DealershipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dealership',
		'app.citi',
		'app.state',
		'app.countri',
		'app.customer',
		'app.statuscustomer',
		'app.leadsource',
		'app.financingsource',
		'app.user',
		'app.sale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dealership = ClassRegistry::init('Dealership');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dealership);

		parent::tearDown();
	}

}
