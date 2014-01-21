<?php
App::uses('AppModel', 'Model');
App::uses('CakeTime', 'Utility');
/**
 * Claim Model
 *
 * @property Policy $Policy
 * @property Tpa $Tpa
 * @property Hospital $Hospital
 */
class Claim extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'case_id';
	
	public $hasOne = array(
			'InsuranceHistory' => array(
					'className' => 'InsuranceHistory',
					'foreignKey' => 'case_id'
			)
	);
	

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'policy_id' => array(
			'rule' => 'notEmpty',
			'message' => 'please enter policy id here'
		),
		'datetime_of_adm' => array(
			'date' => array(
					'rule' => array('date', 'ymd'),
					'message' => 'You must provide a datetime_of_adm in YYYY-MM-DD format.',
					'allowEmpty' => false
			),
			'future' => array(
					'rule' => array('checkFutureDate'),
					'message' => 'The datetime_of_adm must be not be in the past'
			)
		),
		'datetime_of_disc' => array(
			'date' => array(
				'rule' => array('date', 'ymd'),
				'message' => 'You must provide a datetime_of_disc in YYYY-MM-DD format.',
				'allowEmpty' => false
			),
			'future' => array(
				'rule' => array('checkFutureDate'),
				'message' => 'The datetime_of_adm must be not be in the past'
			)
		)
	);
			
/*	'clm_intimate_datetime' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'case_type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'policy_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'policy id is needed',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tpa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'hospital_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'diagnostic_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'procedure_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'datetime_of_adm' => array(
//			'rule' => array('date', 'ymd'),
	//		'message' => 'Please enter date of admission',
			//'allowEmpty' => false,
			//'required' => true,
		//	'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			'date' => array(
					'rule' => array('date', 'ymd'),
					'message' => 'You must provide a datetime_of_adm in YYYY-MM-DD format.',
					'allowEmpty' => false
			),
			'future' => array(
					'rule' => array('checkFutureDate'),
					'message' => 'The datetime_of_adm must be not be in the past'
			)
		),
		'datetime_of_disc' => array(
			'rule' => array('date', 'ymd'),
			'message' => 'Please enter date of discharge',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
	);
*/
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Policy' => array(
			'className' => 'Policy',
			'foreignKey' => 'policy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
/*		),
		'Tpa' => array(
			'className' => 'Tpa',
			'foreignKey' => 'tpa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Hospital' => array(
			'className' => 'Hospital',
			'foreignKey' => 'hospital_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
*/		)
	);
	
	
	/**
	 * checkFutureDate
	 * Custom Validation Rule: Ensures a selected date is either the
	 * present day or in the future.
	 *
	 * @param array $check Contains the value passed from the view to be validated
	 * @return bool False if in the past, True otherwise
	 */
	public function checkFutureDate($check) {
/*		$value = array_values($check);
		
		debug("validating:" + CakeTime::fromString($value));
		debug("value:" + CakeTime::fromString($value['0']));
		debug("date:" + CakeTime::fromString(date('Y-m-d')));
		
		return CakeTime::fromString($value['0']) >= CakeTime::fromString(date('Y-m-d'));
*/		return true;
	}
	
	public function beforeSave($options = array()) {
		$nowDate = date('Y-m-d H:i:s');
	    if (!$this->exists()) {
	    	$this->data['Claim']['created_by'] = 'createduser';
	    	$this->data['Claim']['created_when'] = $nowDate;
	    }

	    $this->data['Claim']['updated_by'] = 'updateuser';
		$this->data['Claim']['updated_when'] = $nowDate;
		
	    return true;
	}
}
