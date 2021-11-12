<?php
App::uses('Forecast', 'Model');

/**
 * Forecast Test Case
 */
class ForecastTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.forecast',
		'app.forecast_state',
		'app.patient',
		'app.department',
		'app.state',
		'app.case'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Forecast = ClassRegistry::init('Forecast');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Forecast);

		parent::tearDown();
	}

}
