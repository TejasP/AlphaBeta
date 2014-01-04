<?php
/**
 * ProviderFixture
 *
 */
class ProviderFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'provider';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'provider_type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'provider_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'provider_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'provider_pan' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'provider_addr' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'provider_pin' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'provider_type' => 'Lorem ipsum dolor sit ame',
			'provider_id' => 1,
			'provider_name' => 'Lorem ipsum dolor sit amet',
			'provider_pan' => 'Lorem ipsum dolor ',
			'provider_addr' => 'Lorem ipsum dolor sit amet',
			'provider_pin' => 'Lorem ip',
			'created_by' => 'Lorem ips',
			'created_when' => '2014-01-04 08:59:59',
			'updated_by' => 'Lorem ips',
			'updated_when' => '2014-01-04 08:59:59'
		),
	);

}
