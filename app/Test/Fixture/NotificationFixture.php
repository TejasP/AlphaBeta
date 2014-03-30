<?php
/**
 * NotificationFixture
 *
 */
class NotificationFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'notification';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'quote_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'initiated_by' => array('type' => 'integer', 'null' => false, 'default' => null),
		'initiated_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'notification_for' => array('type' => 'integer', 'null' => false, 'default' => null),
		'comments' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'quote_id' => 1,
			'initiated_by' => 1,
			'initiated_time' => '2014-03-30 16:35:58',
			'notification_for' => 1,
			'comments' => 'Lorem ipsum dolor sit amet'
		),
	);

}
