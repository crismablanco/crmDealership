<?php
App::uses('Financingsource', 'Model');

/**
 * Financingsource Test Case
 */
class FinancingsourceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.financingsource',
		'app.customer',
		'app.customerstatu',
		'app.leadsource',
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
		$this->Financingsource = ClassRegistry::init('Financingsource');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Financingsource);

		parent::tearDown();
	}

}
