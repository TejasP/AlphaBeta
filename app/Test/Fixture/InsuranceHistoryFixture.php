<?php
/**
 * InsuranceHistoryFixture
 *
 */
class InsuranceHistoryFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'insurance_history';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'policy_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'created_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'updated_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'policy_id', 'unique' => 1)
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
			'policy_id' => 1,
			'created_by' => 'Lorem ips',
			'created_when' => '2014-01-04 08:57:48',
			'updated_by' => 'Lorem ips',
			'updated_when' => '2014-01-04 08:57:48'
		),
	);

}
