<?php
App::uses('Emailtemplate', 'Model');

/**
 * Emailtemplate Test Case
 */
class EmailtemplateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.emailtemplate',
		'app.emailshedule'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Emailtemplate = ClassRegistry::init('Emailtemplate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Emailtemplate);

		parent::tearDown();
	}

}
