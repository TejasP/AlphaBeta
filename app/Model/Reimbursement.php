<?php
App::uses('AppModel', 'Model');
/**
 * Reimbursement Model
 *
 */
class Reimbursement extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'reimbursement';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'case_id';

}
