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
		'covered_by_another_mediclaim' => array(
				'rule' => 'notEmpty',
				'message' => 'please select the checkbox - covered_by_another_mediclaim'
		),
		'date_of_commencement' => array(
				'date' => array(
						'rule' => array('date', 'ymd'),
						'message' => 'You must provide a date_of_commencement in YYYY-MM-DD format.',
						'allowEmpty' => false
				)
		)
/*			,
		'date_of_commencement' => array(
				'date' => array(
						'rule' => array('date', 'ymd'),
						'message' => 'You must provide a date_of_commencement in YYYY-MM-DD format.',
						'allowEmpty' => false
				)
		),
		'company_name' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter company_name'
		),
		'policy_id' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter policy_id'
		),
		'sum_insured' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter sum_insured'
		),
		'hosp_in_last_4yrs' => array(
				'rule' => 'notEmpty',
				'message' => 'please select checkbox hosp_in_last_4yrs'
		),
		'diaginosis_datail' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter diaginosis_datail'
		),
		'prev_covered_mediclaim' => array(
				'rule' => 'notEmpty',
				'message' => 'please select checkbox prev_covered_mediclaim'
		),
		'prev_covered_company' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter prev_covered_company'
		)	
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
