<?php
/**
 * PersonFixture
 *
 */
class PersonFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'person';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'person_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'orig_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'full_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'updated_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'person_id', 'unique' => 1)
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
			'person_id' => 1,
			'orig_id' => 1,
			'role_id' => 1,
			'full_name' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'created_by' => 'Lorem ips',
			'created_when' => '2014-01-04 08:58:44',
			'updated_by' => 'Lorem ips',
			'updated_when' => '2014-01-04 08:58:44'
		),
	);

}
