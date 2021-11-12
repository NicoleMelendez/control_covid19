<?php
App::uses('ForecastState', 'Model');

/**
 * ForecastState Test Case
 */
class ForecastStateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.forecast_state',
		'app.forecast'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ForecastState = ClassRegistry::init('ForecastState');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ForecastState);

		parent::tearDown();
	}

}
