<?php
/**
 * PolicyFixture
 *
 */
class PolicyFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'policy';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'policy_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'person_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tpa_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'policy_start_datetime' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'policy_end_datetime' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'premium_amt' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'sum_insured' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'bonus_sum_insured' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'created_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'updated_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'id' => 1,
			'policy_id' => 1,
			'person_id' => 1,
			'tpa_id' => 1,
			'policy_start_datetime' => '2014-01-04 08:23:27',
			'policy_end_datetime' => '2014-01-04 08:23:27',
			'premium_amt' => 1,
			'sum_insured' => 1,
			'bonus_sum_insured' => 1,
			'created_by' => 'Lorem ips',
			'created_when' => '2014-01-04 08:23:27',
			'updated_by' => 'Lorem ips',
			'updated_when' => '2014-01-04 08:23:27'
		),
	);

}
