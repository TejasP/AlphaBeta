<?php

class Claim extends AppModel {
	public $validate = array(
		'policynumber' => array(
		'rule' => 'notEmpty'
		),
		'tpa_id_no' => array(
		'rule' => 'notEmpty'
		),
		'holderfname' => array(
		'rule' => 'notEmpty'
		),
		'holdermname' => array(
		'rule' => 'notEmpty'
		),
		'holderlname' => array(
		'rule' => 'notEmpty'
		)
	);
}