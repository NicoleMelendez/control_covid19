<?php
App::uses('Recommendation', 'Model');

/**
 * Recommendation Test Case
 */
class RecommendationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.recommendation',
		'app.alert'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Recommendation = ClassRegistry::init('Recommendation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Recommendation);

		parent::tearDown();
	}

}
