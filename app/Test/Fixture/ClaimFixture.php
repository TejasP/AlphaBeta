<?php
/**
 * ClaimFixture
 *
 */
class ClaimFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'case_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'clm_intimate_datetime' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'case_type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'policy_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tpa_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'hospital_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'diagnostic_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'procedure_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'datetime_of_adm' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'datetime_of_disc' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'tot_amt_claimed' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'room_nursing_chrgs' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'surgery_chrgs' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'consultation_chrgs' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'investigate_chrgs' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'medicine_chrgs' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'misc_chrgs' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'pre_hosp_expenses' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'post_hosp_expenses' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'tot_claim_paid' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'reason_for_reject' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'remarks_of_tpa' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'diagn_code_level2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'diagn_code_level3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'proc_code_level2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'proc_code_level3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'medi_hist_level1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'proc_desc_level1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'proc_desc_level2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'proc_desc_level3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'medi_hist_level2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'medi_hist_level3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'reason_red_claim' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'type_claim_paym' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'hosp_is_network' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'oth_non_hosp_exp' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '16,2'),
		'datetime_of_payment' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'paym_reference' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'type_of_payment' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'updated_when' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'case_id', 'unique' => 1)
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
			'case_id' => 1,
			'clm_intimate_datetime' => '2014-01-04 08:55:32',
			'case_type' => 'Lorem ipsum dolor sit ame',
			'status' => 'Lorem ipsum dolor sit ame',
			'policy_id' => 1,
			'tpa_id' => 1,
			'hospital_id' => 1,
			'diagnostic_code' => 'Lor',
			'procedure_code' => 'Lor',
			'datetime_of_adm' => '2014-01-04 08:55:32',
			'datetime_of_disc' => '2014-01-04 08:55:32',
			'tot_amt_claimed' => 1,
			'room_nursing_chrgs' => 1,
			'surgery_chrgs' => 1,
			'consultation_chrgs' => 1,
			'investigate_chrgs' => 1,
			'medicine_chrgs' => 1,
			'misc_chrgs' => 1,
			'pre_hosp_expenses' => 1,
			'post_hosp_expenses' => 1,
			'tot_claim_paid' => 1,
			'reason_for_reject' => 'Lorem ipsum dolor sit amet',
			'remarks_of_tpa' => 'Lorem ipsum dolor sit amet',
			'diagn_code_level2' => 'Lorem ip',
			'diagn_code_level3' => 'Lorem ip',
			'proc_code_level2' => 'Lorem ip',
			'proc_code_level3' => 'Lorem ip',
			'medi_hist_level1' => 'Lorem ip',
			'proc_desc_level1' => 'Lorem ip',
			'proc_desc_level2' => 'Lorem ip',
			'proc_desc_level3' => 'Lorem ip',
			'medi_hist_level2' => 'Lorem ip',
			'medi_hist_level3' => 'Lorem ip',
			'reason_red_claim' => 'Lorem ipsum dolor sit amet',
			'type_claim_paym' => 'Lorem ip',
			'hosp_is_network' => 'Lorem ipsum dolor sit ame',
			'oth_non_hosp_exp' => 1,
			'datetime_of_payment' => '2014-01-04 08:55:32',
			'paym_reference' => 'Lorem ipsum dolor sit a',
			'type_of_payment' => 'Lorem ip',
			'created_by' => 'Lorem ips',
			'created_when' => '2014-01-04 08:55:32',
			'updated_by' => 'Lorem ips',
			'updated_when' => '2014-01-04 08:55:32'
		),
	);

}
