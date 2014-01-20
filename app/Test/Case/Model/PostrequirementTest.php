<?php
App::uses('Postrequirement', 'Model');

/**
 * Postrequirement Test Case
 *
 */
class PostrequirementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.postrequirement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Postrequirement = ClassRegistry::init('Postrequirement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Postrequirement);

		parent::tearDown();
	}

}
