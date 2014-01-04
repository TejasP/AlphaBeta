<?php
/**
 * ClaimsHistoryFixture
 *
 */
class ClaimsHistoryFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'claims_history';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'case_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'updated_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'case_id' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'created_by' => 'Lorem ips',
			'created_when' => '2014-01-04 08:56:30',
			'updated_by' => 'Lorem ips',
			'updated_when' => '2014-01-04 08:56:30'
		),
	);

}
