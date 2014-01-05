<?php

class Upload extends AppModel {
	public $useTable = array('Claims','ClaimHistory');
	
	public function CreateAndSave($data){
	echo $data;
		/* 
		$this->Case->Save($this->$case); */
	}
	
}