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
		'case_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'covered_by_another_mediclaim' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'date_of_commencement' => array('type' => 'date', 'null' => false, 'default' => null),
		'company_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'policy_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sum_insured' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'hosp_in_last_4yrs' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'hospitalized_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'diaginosis_datail' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'prev_covered_mediclaim' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'prev_covered_company' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'covered_by_another_mediclaim' => 'Lorem ipsum dolor sit ame',
			'date_of_commencement' => '2014-01-11',
			'company_name' => 'Lorem ipsum dolor sit amet',
			'policy_id' => 'Lorem ips',
			'sum_insured' => 1,
			'hosp_in_last_4yrs' => 'Lorem ipsum dolor sit ame',
			'hospitalized_date' => '2014-01-11',
			'diaginosis_datail' => 'Lorem ipsum dolor sit amet',
			'prev_covered_mediclaim' => 'Lorem ipsum dolor sit ame',
			'prev_covered_company' => 'Lorem ipsum dolor sit amet',
			'created_by' => 'Lorem ips',
			'created_when' => '2014-01-11 10:43:23',
			'updated_by' => 'Lorem ips',
			'updated_when' => '2014-01-11 10:43:23'
		),
	);

}
