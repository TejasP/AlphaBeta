<?php
/**
 * OrganizationFixture
 *
 */
class OrganizationFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'organization';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'orig_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'orig_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'key_person' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pin_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'updated_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'orig_id', 'unique' => 1)
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
			'orig_id' => 1,
			'orig_name' => 'Lorem ipsum dolor sit amet',
			'key_person' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'pin_code' => 'Lorem ipsum dolor sit amet',
			'created_by' => 'Lorem ips',
			'created_when' => '2014-01-04 08:51:24',
			'updated_by' => 'Lorem ips',
			'updated_when' => '2014-01-04 08:51:24'
		),
	);

}
