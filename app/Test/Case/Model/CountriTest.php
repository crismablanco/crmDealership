<?php
App::uses('Countri', 'Model');

/**
 * Countri Test Case
 */
class CountriTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.countri',
		'app.state'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Countri = ClassRegistry::init('Countri');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Countri);

		parent::tearDown();
	}

}
