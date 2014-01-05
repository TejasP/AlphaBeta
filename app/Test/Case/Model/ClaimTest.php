<?php
App::uses('Claim', 'Model');

/**
 * Claim Test Case
 *
 */
class ClaimTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.claim'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Claim = ClassRegistry::init('Claim');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Claim);

		parent::tearDown();
	}

}
