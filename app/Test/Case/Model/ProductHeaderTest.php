<?php
App::uses('ProductHeader', 'Model');

/**
 * ProductHeader Test Case
 *
 */
class ProductHeaderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_header'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductHeader = ClassRegistry::init('ProductHeader');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductHeader);

		parent::tearDown();
	}

}
