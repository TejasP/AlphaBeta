<?php
App::uses('AppModel', 'Model');
/**
 * InsuranceHistory Model
 *
 * @property Policy $Policy
 */
class InsuranceHistory extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'insurance_history';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'case_id';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
/*		'covered_by_another_mediclaim' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date_of_commencement' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created_by' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created_when' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'updated_by' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'updated_when' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
*/	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Claim' => array(
			'className' => 'Claim',
			'foreignKey' => 'case_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave($options = array()) {
		$nowDate = date('Y-m-d H:i:s');
		if (!$this->exists()) {
			$this->data['InsuranceHistory']['created_by'] = 'createduser';
			$this->data['InsuranceHistory']['created_when'] = $nowDate;
		}

		$this->data['InsuranceHistory']['updated_by'] = 'updateuser';
		$this->data['InsuranceHistory']['updated_when'] = $nowDate;
			
		return true;
	}
}
