<?php
App::uses('Citi', 'Model');

/**
 * Citi Test Case
 */
class CitiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.citi',
		'app.state',
		'app.customer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Citi = ClassRegistry::init('Citi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Citi);

		parent::tearDown();
	}

}
