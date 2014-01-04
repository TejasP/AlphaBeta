<?php
App::uses('PreAuth', 'Model');

/**
 * PreAuth Test Case
 *
 */
class PreAuthTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pre_auth'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PreAuth = ClassRegistry::init('PreAuth');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PreAuth);

		parent::tearDown();
	}

}
