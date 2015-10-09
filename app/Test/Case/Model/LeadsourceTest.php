<?php
App::uses('Leadsource', 'Model');

/**
 * Leadsource Test Case
 */
class LeadsourceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.leadsource',
		'app.customer',
		'app.customerstatu',
		'app.financingsource',
		'app.user',
		'app.citi',
		'app.state',
		'app.sale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Leadsource = ClassRegistry::init('Leadsource');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Leadsource);

		parent::tearDown();
	}

}
