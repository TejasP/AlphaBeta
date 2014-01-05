<?php
App::uses('AuthComponent', 'Controller/Component');
;
App::import('Vendor','PHPExcel',array('file' => 'excel/PHPExcel.php'));
App::import('Vendor','PHPExcelWriter',array('file' => 'excel/PHPExcel/Writer/Excel5.php'));
App::import('Vendor','MyReadFilter',array('file'=>'excel/MyReadFilter.php'));

class UploadController extends AppController {
	public $helpers = array('Html', 'Form', 'Session','Excel');
	var $uses = array('Claims','ClaimsHistory','Policy','Provider','InsuranceHistory','Organization','Person');
	
	public function index() {
		$this->layout = 'Demo';
		//$this->loadAndReadFile('./file.xls');
		$this->loadAndReadFile('./Health_Claims_SampleDataMasked_1.xls');
		
	}
	
	public function loadAndReadFile($fileName)
	{
		$sheetname = 'Claims_Masked_1';		
		$inputFileName = $fileName;
		$filterSubset = new MyReadFilter(1,1000);
		
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader->setReadDataOnly(true);
		$objReader->setLoadSheetsOnly($sheetname);
		
		$objReader->setReadFilter($filterSubset);
		
		$filter=$objReader->getReadFilter();
		
		
		$objPHPExcel = $objReader->load($inputFileName);
		
		
	//	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		
		$policy = array('Policy' =>array());
		$person = array('Person' =>array());
		$claims = array('Claims' =>array());
		
		$claimsHistory = array('ClaimsHistory'=>array());
		//For Each row
		for($i=2;$i<5;$i++){
		//For Each column
		 for($x = "A"; ; $x++) {
			$cellHeading = $x.'1';
			$cellHeadingValue = $objPHPExcel->getActiveSheet()->getCell($cellHeading)->getValue();
					$cellNUmber= $x.$i;
					$cellValue = $objPHPExcel->getActiveSheet()->getCell($cellNUmber)->getValue();
				if($cellHeadingValue=='Date_of_Birth'){
					$policy['Person']['date_of_birth'] =  date('Y-m-d h:i:s',strtotime($cellValue));
					echo $cellHeadingValue.'</BR>';					
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Date_Policy_Start'){
					$policy['Policy']['policy_start_datetime'] = date('Y-m-d h:i:s',strtotime($cellValue));
					echo $cellHeadingValue.'</BR>';					
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Date_Policy_End'){
					$policy['Policy']['policy_end_datetime'] = date('Y-m-d h:i:s',strtotime($cellValue));
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Txt_Gender'){
					$person['Person']['gender'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Sum_Insured'){
					$claims['Claims']['sum_insured'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Txt_Diagnosis_Code_Level_I'){
					$claims['Claims']['diagnostic_code'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Txt_Procedure_Code_Level_I'){
					$claims['Claims']['procedure_code'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Date_of_Admission'){
					$claims['Claims']['datetime_of_adm'] =  date('Y-m-d h:i:s',strtotime($cellValue));
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Date_of_Discharge'){
					$claims['Claims']['datetime_of_disc'] =  date('Y-m-d h:i:s',strtotime($cellValue));
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
		 		if($cellHeadingValue=='Num_Total_Amount_Claimed'){
					$claims['Claims']['tot_amt_claimed'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Room_Nursing_Charges'){
					$claims['Claims']['room_nursing_chrgs'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Surgery_Charges'){
					$claims['Claims']['surgery_chrgs'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Consultation_Charges'){
					$claims['Claims']['consultation_chrgs'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Investigation_Charges'){
					$claims['Claims']['investigate_chrgs'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Medicine_Charges'){
					$claims['Claims']['medicine_chrgs'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Miscellaneous_Charges'){
					$claims['Claims']['misc_chrgs'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Pre_Hospitalisation_Expenses_included_under_150035'){
					$claims['Claims']['pre_hosp_expenses'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Post_Hospitalisation_Expenses_included_under_150035'){
					$claims['Claims']['post_hosp_expenses'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}
				if($cellHeadingValue=='Num_Total_Claim_Paid'){
					$claims['Claims']['tot_claim_paid'] = $cellValue;
					echo $cellHeadingValue.'</BR>';
					echo $cellValue.'</BR>';
				}	
				if( $x == "BF") break;
			}
		}

		
			/* $case = array('Claims' => array(
						'tot_amt_claimed' => 5000,
						'clm_intimate_datetime' => date('Y-m-d H:i:s')),
		 				'ClaimsHistory'=> array(
		 				'case_id'=>25,
		 				'description'=>'First Test',
		 				'created_by'=>'Tejas',
		 				'created_when'=>date('Y-m-d H:i:s'),
		 				'updated_by'=>'Tejas',
		 				'updated_when'=>date('Y-m-d H:i:s'))			
			); 
		
	
		$claimsHistory = array ('ClaimsHistory'=> array(
						'case_id'=>4,
						'description'=>'First Test',
						'created_by'=>'Tejas',
						'created_when'=>date('Y-m-d H:i:s'),
						'updated_by'=>'Tejas',
						'updated_when'=>date('Y-m-d H:i:s')
				)
			); */
		

		/*$id= $this->Claims->create();
		$this->ClaimsHistory->create();
		if ($this->Claims->saveAll($case))
		{
			echo 'Saved Claims'; // Message, redirect etc
		}
		
	 	 $this->ClaimsHistory->create();
		if($this->ClaimsHistory->saveAll($claimsHistory)){
			echo 'Saved ClaimsHistory';
		}  */
		echo 'Array Formatted';
		 if($this->Person->saveAll($person)){
			echo 'Saved Person';
		} 
		if($this->Policy->saveAll($policy)){
			echo 'Saved Policy';
		}
		if($this->Claims->saveAll($claims)){
			echo 'Saved Claims';
		}
		echo 'done';
		echo $this->ClaimsHistory->find('count');
		
		return $colValue;

	}
	
}