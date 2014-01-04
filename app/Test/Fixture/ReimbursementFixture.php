<?php
/**
 * ReimbursementFixture
 *
 */
class ReimbursementFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'reimbursement';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'case_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'case_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'case_id' => 1
		),
	);

}
