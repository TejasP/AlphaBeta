<?php
App::uses('ClaimsHistory', 'Model');

/**
 * ClaimsHistory Test Case
 *
 */
class ClaimsHistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.claims_history'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ClaimsHistory = ClassRegistry::init('ClaimsHistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClaimsHistory);

		parent::tearDown();
	}

}
