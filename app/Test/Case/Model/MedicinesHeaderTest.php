<?php
App::uses('MedicinesHeader', 'Model');

/**
 * MedicinesHeader Test Case
 *
 */
class MedicinesHeaderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medicines_header'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MedicinesHeader = ClassRegistry::init('MedicinesHeader');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MedicinesHeader);

		parent::tearDown();
	}

}
