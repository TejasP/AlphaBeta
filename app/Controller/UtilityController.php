<?php

App::uses('AppNoAuthController', 'Controller');
App::uses('ConnectionManager', 'Model');
App::uses('Sanitize','Utility');

class UtilityController extends AppNoAuthController {
	public $uses = array('Providers','Providers_new');
	
public function  cleanDuplicateElements($tableName){
	
	$db = ConnectionManager::getDataSource('default');
	$response;
	
	if (!$db->isConnected()) {
		$response = "Error";
	} else {
			
		/* $myData = $db->query($sql_query_1);
		 $response = $db->rawQuery($sql_query);
		var_dump ($myData); */
	
	
	$sql_query = "SHOW COLUMNS from emediplus_db.".$tableName.";";
	$sql_query_0 = "SELECT COUNT(*) from emediplus_db.".$tableName;
	
	
	$myData = $db->query($sql_query_0);
	$count = $myData[0][0]["COUNT(*)"];
	$count_out = 1000;
	$count_in = 1000;
	// First get one row from db 
	
			for($j=1;$j<=$count_out;$j++)
			{
			$sql_query_out =  "SELECT * from emediplus_db.".$tableName." Where id =".$j;
			$response_out = $db->rawQuery($sql_query_out);
			$myData_out = $db->query($sql_query_out);
					echo "Processing for :".$j."</BR>";
					
					for($i=$j+1;$i<=$count_in;$i++){
						$sql_query_in = "SELECT * from emediplus_db.".$tableName." Where id =".$i;
						$response = $db->rawQuery($sql_query_in);
						$myData_in = $db->query($sql_query_in);
						
						// check for cols
						if($myData_out[0]['Providers']['provider_name']==$myData_in[0]['Providers']['provider_name']){
							// data
							echo "</BR> OUT :".$myData_out[0]['Providers']['provider_name'];
							echo "</BR>  IN : ".$myData_in[0]['Providers']['provider_name'];
							
							// data is same check furhter
							echo $myData_out[0]['Providers']['provider_name']." : data same as :".$myData_in[0]['Providers']['provider_name'];
						}
					}
			}
	}
	
	// Code to check duplicates in table. First get all the column names
		$this->autoRender = false;
		$this->response->type('json');
		$json = json_encode($response);
		$this->response->body($json);
	}
	
	
	public function createandpopulateDB(){
		
		$db = ConnectionManager::getDataSource('default');
		$response;
		
		if (!$db->isConnected()) {
			$response = "Error";
		} else {
			$sql_query = "SELECT DISTINCT `provider_name` , `url`, `provider_type`, `provider_name`, `website`, `mobile`, `phone`, `contact_person`, `area`, `address`, `city`, `pin_code`, `landmark`, `working_hours`, `listed_categories` FROM  `providers` group by provider_name, area, address having count(*) > 1  order by id asc";
			
			 $myData = $db->fetchAll($sql_query);
			// var_dump($myData);
			 $count = count($myData);
			 echo ($count);
			 
			 for($j=4001;$j<=4044;$j++)
			 {
			 	$this->Providers_new->create();
			 	$data = array(
			 			'Providers_new' => array(
			 					'url' => $myData[$j]['providers']['url'],
			 					'provider_type' => $myData[$j]['providers']['provider_type'],
			 					'provider_name'=>$myData[$j]['providers']['provider_name'],
			 					'website'=>$myData[$j]['providers']['website'],
			 					'mobile'=>$myData[$j]['providers']['mobile'],
			 					'phone'=>$myData[$j]['providers']['phone'],
			 					'contact_person'=>$myData[$j]['providers']['contact_person'],
			 					'area'=>$myData[$j]['providers']['area'],
			 					'address'=>$myData[$j]['providers']['address'],
			 					'city'=>$myData[$j]['providers']['city'],
			 					'pin_code'=>$myData[$j]['providers']['pin_code'],
			 					'landmark'=>$myData[$j]['providers']['landmark'],
			 					'working_hours'=>$myData[$j]['providers']['working_hours'],
			 					'listed_categories'=>$myData[$j]['providers']['listed_categories'])
			 			);
			 	if($this->Providers_new->save($data))
			 	{
			 		$response = "done.";
			 	}
			 	
			 	/* $sql_query_in = "INSERT INTO `providers_new` (`id`,`url`, `provider_type`, `provider_name`, `website`, `mobile`, `phone`, `contact_person`, `area`, `address`, `city`, `pin_code`, `landmark`, `working_hours`, `listed_categories`) VALUES ".$j
			 		.",'".Sanitize::escape($myData[$j]['providers']['url'],'default')."',"
			 		."'".Sanitize::escape($myData[$j]['providers']['provider_type'],'default')."',"
			 		."'".Sanitize::escape($myData[$j]['providers']['provider_name'],'default')."',"
			 		."'".Sanitize::escape($myData[$j]['providers']['website'],'default')."',"
					."'".Sanitize::escape($myData[$j]['providers']['mobile'],'default')."',"			 				
			 		."'".Sanitize::escape($myData[$j]['providers']['phone'],'default')."',"
			 		."'".Sanitize::escape($myData[$j]['providers']['contact_person'],'default')."',"
					."'".Sanitize::escape($myData[$j]['providers']['area'],'default')."',"
					."'".Sanitize::escape($myData[$j]['providers']['address'],'default')."',"
					."'".Sanitize::escape($myData[$j]['providers']['city'],'default')."',"
					."'".Sanitize::escape($myData[$j]['providers']['pin_code'],'default')."',"
					."'".Sanitize::escape($myData[$j]['providers']['landmark'],'default')."',"
					."'".Sanitize::escape($myData[$j]['providers']['working_hours'],'default')."',"
					."'".Sanitize::escape($myData[$j]['providers']['listed_categories'],'default')."';";
			 	$myData_in = $db->query($sql_query_in);
			 	echo $sql_query_in."</BR>"; */
			 	
			 	echo "Added ".$j;
			 }   
			
			 $this->autoRender = false;
			 $this->response->type('json');
			 $json = json_encode($response);
			 $this->response->body($json);
		}
		
	}
	
}