<?php
App::uses('AppModel', 'Model');
/**
 * PreAuth Model
 *
 */
class PreAuth extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'pre_auth';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'case_id';

}
