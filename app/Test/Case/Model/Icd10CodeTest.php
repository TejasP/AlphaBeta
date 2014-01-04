<?php
App::uses('Icd10Code', 'Model');

/**
 * Icd10Code Test Case
 *
 */
class Icd10CodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.icd10_code'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Icd10Code = ClassRegistry::init('Icd10Code');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Icd10Code);

		parent::tearDown();
	}

}
