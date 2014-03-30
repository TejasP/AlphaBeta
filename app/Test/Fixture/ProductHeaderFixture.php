<?php
/**
 * ProductHeaderFixture
 *
 */
class ProductHeaderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'prod_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'prod_cat_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'prod_desc' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'prod_company' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'prod_price' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'prod_id' => 1,
			'prod_cat_id' => 1,
			'prod_desc' => 'Lorem ipsum dolor sit amet',
			'prod_company' => 'Lorem ipsum dolor sit amet',
			'prod_price' => 1
		),
	);

}
