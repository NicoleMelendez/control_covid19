<?php
App::uses('Alert', 'Model');

/**
 * Alert Test Case
 */
class AlertTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.alert',
		'app.recommendation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Alert = ClassRegistry::init('Alert');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Alert);

		parent::tearDown();
	}

}
