<?php
/**
 * PostrequirementFixture
 *
 */
class PostrequirementFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ItemId' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'ItemDescription' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Quantity' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'UsersId' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'RequiredBy' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			
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
			'ItemId' => 1,
			'ItemDescription' => 'Lorem ipsum dolor sit amet',
			'Quantity' => 1,
			'UsersId' => 1,
			'RequiredBy' => '2014-01-20'
		),
	);

}
