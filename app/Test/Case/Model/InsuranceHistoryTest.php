<?php
App::uses('InsuranceHistory', 'Model');

/**
 * InsuranceHistory Test Case
 *
 */
class InsuranceHistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.insurance_history',
		'app.policy',
		'app.person',
		'app.orig',
		'app.role',
		'app.tpa',
		'app.claim'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InsuranceHistory = ClassRegistry::init('InsuranceHistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InsuranceHistory);

		parent::tearDown();
	}

}
