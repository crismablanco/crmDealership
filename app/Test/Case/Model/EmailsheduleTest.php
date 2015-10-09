<?php
App::uses('Emailshedule', 'Model');

/**
 * Emailshedule Test Case
 */
class EmailsheduleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.emailshedule',
		'app.emailtemplate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Emailshedule = ClassRegistry::init('Emailshedule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Emailshedule);

		parent::tearDown();
	}

}
