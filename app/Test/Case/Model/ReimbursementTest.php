<?php
App::uses('Reimbursement', 'Model');

/**
 * Reimbursement Test Case
 *
 */
class ReimbursementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reimbursement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reimbursement = ClassRegistry::init('Reimbursement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reimbursement);

		parent::tearDown();
	}

}
