<?php


App::uses('AppNoAuthController', 'Controller');
App::uses('ConnectionManager', 'Model');
App::uses('Sanitize','Utility');
App::uses('Xml','Utility');

class UtilityController extends AppNoAuthController {
	public $uses = array('Providers','Providers_new','location','Providers_datas');
	
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
	
	
	public function updateDBwithGoogleData(){
	
		$db = ConnectionManager::getDataSource('default');
		$response;
	
		if (!$db->isConnected()) {
			$response = "Error";
		} else {
			// $sql_query = "SELECT DISTINCT `provider_name` , `url`, `provider_type`, `provider_name`, `website`, `mobile`, `phone`, `contact_person`, `area`, `address`, `city`, `pin_code`, `landmark`, `working_hours`, `listed_categories` FROM  `providers_datas` group by provider_name, area, address having count(*) > 1  order by id asc";
			$sql_query = "SELECT DISTINCT (`area`) `address`, `city`, `pin_code`, `landmark` FROM  `providers_datas` order by id asc";	
			$myData = $db->fetchAll($sql_query);

			$count = count($myData);
	
			for($j=0;$j<=500;$j++)
			{
			/*$data = array(
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
			); */
				
			$data = array(
						'Providers_new' => array(
								'area'=>$myData[$j]['providers']['area'],
								'address'=>$myData[$j]['providers']['address'],
								'city'=>$myData[$j]['providers']['city'],
								'pin_code'=>$myData[$j]['providers']['pin_code'],
								'landmark'=>$myData[$j]['providers']['landmark'])
				);

			
		//	$url  ="https://maps.googleapis.com/maps/api/place/textsearch/xml?query=".str_replace(" ","%20%",$myData[$j]['providers']['provider_name'])."%20%near%20%".str_replace(" ","%20%",$myData[$j]['providers']['area'])."%20%".str_replace(" ","%20%",$myData[$j]['providers']['city'])."&sensor=false&key=AIzaSyBSDjiTpiGA5JmwAav6VodAfRozJRP0a4E";
			$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".str_replace(" ","%20%",$myData[$j]['providers']['area'])." ".str_replace(" ","%20%",$myData[$j]['providers']['city'])."&sensor=false";
			
			//$url  ="https://maps.googleapis.com/maps/api/place/textsearch/xml?query=Apollo%20%Pharmacy%20%near%20%Pune&sensor=false&key=AIzaSyD0brQ1DgNejCu1JEUK2ZNx98dPkz1GaMA";
	
			$response = $this->curl($url);
		 	
		
		//	$xml = new SimpleXMLElement($response); 
			
			$xml = $this->xml_to_array($response);

			if ($xml['status']==='OK'){
				if(count($xml['result']['name'])== 1){
					echo count($xml['result']['name'])."</BR>";
					echo $xml['result']['name']."</BR>";
					echo $xml['result']['formatted_address']."</BR>";
					echo $xml['result']['geometry']['location']['lat']."</BR>";
					echo $xml['result']['geometry']['location']['lng']."</BR>";
					echo "</br>";
					
					if($this->Providers_new->updateAll( array('Providers_new.google_address_1' =>"'".$xml['result']['formatted_address']."'", 'Providers_new.google_address_1_longi'=> $xml['result']['geometry']['location']['lng'], 'Providers_new.google_address_1_lati'=> $xml['result']['geometry']['location']['lat']),array('Providers_new.id' => $j)))
					{
						echo  "Updated .";
						echo "</br>";
						
					}
				}
				else {
					echo count($xml['result'][0]['name'])."</BR>";
					echo $xml['result'][0]['name']."</BR>";
					echo $xml['result'][0]['formatted_address']."</BR>";
					echo $xml['result'][0]['geometry']['location']['lat']."</BR>";
					echo $xml['result'][0]['geometry']['location']['lng']."</BR>";
					echo "</br>";
					echo count($xml['result'][1]['name'])."</BR>";
					echo $xml['result'][1]['name']."</BR>";
					echo $xml['result'][1]['formatted_address']."</BR>";
					echo $xml['result'][1]['geometry']['location']['lat']."</BR>";
					echo $xml['result'][1]['geometry']['location']['lng']."</BR>";
					echo "</br>";
					
					if($this->Providers_new->updateAll( array('Providers_new.google_address_1' =>"'".$xml['result'][0]['formatted_address']."'", 'Providers_new.google_address_1_longi'=> $xml['result'][0]['geometry']['location']['lng'], 'Providers_new.google_address_1_lati'=> $xml['result'][0]['geometry']['location']['lat'],'Providers_new.google_address_2' =>"'".$xml['result'][1]['formatted_address']."'", 'Providers_new.google_address_2_longi'=> $xml['result'][1]['geometry']['location']['lng'], 'Providers_new.google_address_2_lati'=> $xml['result'][1]['geometry']['location']['lat']),array('Providers_new.id' => $j)))
					{
						echo  "Updated .";
						echo "</br>";
						
					}
					
				}
		//	var_dump($xml);
			}
		//	echo $xml->$status;
			
		//	echo $xml->$result->$name;
			
			//echo $response; 
			
			
		
		//	echo "Added ".$j;
			}
			 $this->autoRender = false;
		/* 	$this->response->type('json');
			$this->response->body($xml); */
		}
	}
	
	function xml_to_array($xml,$main_heading = '') {
		$deXml = simplexml_load_string($xml);
		$deJson = json_encode($deXml);
		$xml_array = json_decode($deJson,TRUE);
		if (! empty($main_heading)) {
			$returned = $xml_array[$main_heading];
			return $returned;
		} else {
			return $xml_array;
		}
	}
	
	public function curl($url){
		$ch = curl_init();
		
		$options = array(CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => TRUE
		);
		
		curl_setopt_array($ch,$options);
		
		
		$data = curl_exec($ch);

		//echo curl_getinfo($ch) . '<br/>';
		//echo curl_errno($ch) . '<br/>';
		//echo curl_error($ch) . '<br/>';
		
		curl_close($ch);
		return $data;
	}
	
	public function updateLocationDBWithGoogleData(){
	
		$db = ConnectionManager::getDataSource('default');
		$response;
	
		if (!$db->isConnected()) {
			$response = "Error";
		} else {
			$sql_query = "SELECT DISTINCT (`area`) , `city`, `pin_code`, `landmark` FROM  `providers_datas` order by id asc";
			$myData = $db->fetchAll($sql_query);
	
			$count = count($myData);
	
			for($j=0;$j<=100;$j++)
			{

	
		
			$url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".str_replace(" ","%20",$myData[$j]['providers_datas']['area']).",".str_replace(" ","%20",$myData[$j]['providers_datas']['city'])."&sensor=false";
			echo $url;
			$response = $this->curl($url);
		
			$xml = $this->xml_to_array($response);
			//var_dump($xml);
			
			if ($xml['status']==='OK'){
				echo '</BR> RESULT COUNT'.count($xml);
				var_dump(($xml));
				if(count($xml['result']) <=5){
				$data = array(
						'location' => array(
								'tags'=>$myData[$j]['providers_datas']['area'],
								'city'=>$myData[$j]['providers_datas']['city'],
								'pin_code'=>$myData[$j]['providers_datas']['pin_code'],
								'landmark'=>$myData[$j]['providers_datas']['landmark'],
								'bounds_northeast_lat'=>$xml['result']['geometry']['bounds']['northeast']['lat'],
								'bounds_northeast_lng'=>$xml['result']['geometry']['bounds']['northeast']['lng'],
								'bounds_southwest_lat'=>$xml['result']['geometry']['bounds']['southwest']['lat'],
								'bounds_southwest_lng'=>$xml['result']['geometry']['bounds']['southwest']['lng'],
								'location_lat'=>$xml['result']['geometry']['location']['lat'],
								'location_lng'=>$xml['result']['geometry']['location']['lng']
						)
					);
				
					
						/* echo $xml['result']['geometry']['location']['lat']."</BR>";
						echo $xml['result']['geometry']['location']['lng']."</BR>";						
						echo $xml['result']['geometry']['bounds']['southwest']['lat']."</BR>";
						echo $xml['result']['geometry']['bounds']['southwest']['lng']."</BR>";
						echo $xml['result']['geometry']['bounds']['northeast']['lat']."</BR>";
						echo $xml['result']['geometry']['bounds']['northeast']['lng']."</BR>";
						echo "</br>";	 */	
								
										$this->location->create();
										var_dump($data);
										if($this->location->save($data))
										{
										echo  "created .";
										echo "</br>";
										}
										else{
											debug($this->location->invalidFields());
										}
				}

				if(count($xml['result']) >5){
							/* if(($xml['result'][0]['geometry']['bounds'])!=null){
								$bounds_northeast_lat=$xml['result'][0]['geometry']['bounds']['northeast']['lat'];
								$bounds_northeast_lng=$xml['result'][0]['geometry']['bounds']['northeast']['lng'];
								$bounds_southwest_lat=$xml['result'][0]['geometry']['bounds']['southwest']['lat'];
								$bounds_southwest_lng=$xml['result'][0]['geometry']['bounds']['southwest']['lng'];
							}
							if(count($xml['result'][0]['geometry']['location'])>0){
								$location_lat=$xml['result'][0]['geometry']['location']['lat'];
								$location_lng=$xml['result'][0]['geometry']['location']['lng'];
							}					
							$data = array(
									'location' => array(
											'tags'=>$myData[$j]['providers_datas']['area'],
											'city'=>$myData[$j]['providers_datas']['city'],
											'pin_code'=>$myData[$j]['providers_datas']['pin_code'],
											'landmark'=>$myData[$j]['providers_datas']['landmark'],
											'bounds_northeast_lat'=>$bounds_northeast_lat,
											'bounds_northeast_lng'=>$bounds_northeast_lng,
											'bounds_southwest_lat'=>$bounds_southwest_lat,
											'bounds_southwest_lng'=>$bounds_southwest_lng,
											'location_lat'=>$location_lat,
											'location_lng'=>$location_lng
									)
							);
						

							 echo $xml['result'][0]['geometry']['location']['lat']."</BR>";
							echo $xml['result'][0]['geometry']['location']['lng']."</BR>";
							echo $xml['result'][0]['geometry']['bounds']['southwest']['lat']."</BR>";
							echo $xml['result'][0]['geometry']['bounds']['southwest']['lng']."</BR>";
							echo $xml['result'][0]['geometry']['bounds']['northeast']['lat']."</BR>";
							echo $xml['result'][0]['geometry']['bounds']['northeast']['lng']."</BR>";
							echo "</br>"; 
						
							$this->location->create();

							if($this->location->save($data))
							{
								echo  "created .";
								echo "</br>";
							}
							else{
								debug($this->location->invalidFields());
							} */
						} 

						
					}
		}
		$this->autoRender = false;
			/* 	$this->response->type('json');
			$this->response->body($xml); */
			}
		}
}