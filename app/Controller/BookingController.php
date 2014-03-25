<?php

App::uses('AppNoAuthController', 'Controller');

class BookingController extends AppNoAuthController {
	
	public $uses = array('Search','medicines_header','Providers', 'product_headers');
	
	public function addToBucket($ItemId,$category,$qty){
		// first check if cookie exists
		// IF yes add to existing else create cookie and add
		$cookieData = $this->Cookie->read('basket-data');
		$type= gettype($cookieData);
		if($type==='string')
		{
		$cookieData =json_decode($cookieData,true);
		}

		$basketData = array();
		$basketData =$cookieData;
		$basketData []= array('category'=>$category,'item'=>$ItemId,'qty'=>$qty);
		
		
		$this->Cookie->write('basket-data',json_encode($basketData));
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode(array('message'=>json_encode($basketData)));
		$this->response->body($json); 
	}
	
	public function removeFromBucket($ItemId,$category){
		// remove item from cookie
		$cookieData = $this->Cookie->read('basket-data');
		$type= gettype($cookieData);

		
		foreach(array_keys($cookieData) as $keyOut){
				echo  $keyOut;
				 if ($cookieData[$keyOut]['category']===$category && $cookieData[$keyOut]['item']=== $ItemId) {
		 			unset($cookieData[$keyOut]);
			}
		}
		
		$new_cookieData = array_values($cookieData);
	
		$this->Cookie->write('basket-data',json_encode($new_cookieData));
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode(array('message'=>json_encode($new_cookieData)));
		$this->response->body($json);
	}
	
	public function removeBucketCookie(){
		$this->autoRender=false;
		$this->Cookie->delete('basket-data');
		$this->response->type('json');
		$json = json_encode("SUCCESS");
		$this->response->body($json);
	}
	
	
	public function index(){
		$this->layout = "foundation_search_home";
		
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		
		$this->Session->write('Redirect.Controller', 'Booking');
		$this->Session->write('Redirect.Action', 'index');
		
		if (($user=== NULL) || ($user== '')) {
			$this->set('isUserLoggedIn',"false");
		}else
		{
			$this->set('isUserLoggedIn',"true");
		}
		
		$isBucketFilled =  $this->Cookie->read('basket-data');
		
		$type= gettype($isBucketFilled);
		if($type==='string')
		{
			$this->set('isBucketFilled',"false");
			$this->set('showCartTable','false');
		}else{
			$this->set('isBucketFilled',"false");
			$this->set('showCartTable','true');
		}
		
		
		$this->set('showLocateTable','true');
		
		$chosenId =$this->Cookie->read('basket-data');
		$length =  count($chosenId);
		$mresults = array();
		
		for($i=0;$i<$length;$i++){

			$moptions = array('conditions' => array(
					'medicines_header.medicine_id = ' => $chosenId[$i])
			);
			
			$mresults[]= $this->medicines_header->find('all',$moptions);
		}

		
		if($mresults==null || count($mresults)==0 )
		{
			$this->set('showTable','false');
		}
		if($mresults!=null || count($mresults)>0 )
		{
			$this->set('showTable','true');
		}
	
		$this->set('results',$mresults);
	}
	
	
	public function getCookie(){

		$products = null;
		$chosenId =$this->Cookie->read('basket-data');
		$type= gettype($chosenId);
		
		//echo print_r($chosenId);
		
		if(!empty($chosenId)){
			$i = 0;
			foreach(array_keys($chosenId) as $keyOut){
				$id =  $chosenId[$keyOut]['item'];
				$category = $chosenId[$keyOut]['category'];
	
				if($category == "1")
				{
					$moptions['conditions'] = array(
							'medicines_header.medicine_id = ' => $id);
					
					$mresults = $this->medicines_header->find('all',$moptions);
					
					$mcounts  = count($mresults);
					for($k=0; $k<$mcounts; $k++)
					{
						$prodid = $mresults[$k]['medicines_header']['id'];
						$prodname = $mresults[$k]['medicines_header']['medicine_name'];
				
						$products[$i] = array("prodid"=>$prodid, "prodname"=>$prodname,"prodCategory"=>$category);
					}
				}
				else if($category == "2")
				{
					$poptions['conditions'] = array(
							'product_headers.prod_id = ' => $id);
						
					$presults = $this->product_headers->find('all',$poptions);
						
					$pcounts  = count($presults);
					for($j=0; $j<$pcounts; $j++)
					{
						$prodid = $presults[$j]['product_headers']['prod_id'];
						$prodname = $presults[$j]['product_headers']['prod_desc'];
					
						$products[$i] = array("prodid"=>$prodid, "prodname"=>$prodname,"prodCategory"=>$category);
					}
				}
				$i++;
			}
		}else{
			$products = array('data'=>'No Data');
		}
		
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode($products);
		$this->response->body($json);
		
	}
	
	
	public function getLocationCookie(){
	
		$location =$this->Cookie->read('location-data');
		$type= gettype($location);
	
	
		if(!empty($location)){
			$mresults = array($location);
		}else{
			$mresults = array('data'=>'No Data');
		}
	
	
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode($mresults);
		$this->response->body($json);
	
	}
	
	
	public function getLocationAuthenticateCookie(){
		$location =$this->Cookie->read('location-data');
		$type= gettype($location);
		
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		$result;
		if (($user=== 'NULL') || ($user== '')) {
			$result = "NOTAUTHENTICATED";
		}else
		{
			$result = "AUTHENTICATED";
		}
		
		if(!empty($location)){
			$mresults = array('location'=>$location ,'authenticated'=>$result);
		}else{
			$mresults = array('location'=>'No Data','authenticated'=>$result);
		}
		
		
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode($mresults);
		$this->response->body($json);
		
	}
	
	public function getQuotData(){
		
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		$result;
		if (($user=== 'NULL') || ($user== '')) {
			$result = "NOTAUTHENTICATED";
		}else
		{
			$result = array('getting details');
		}
		
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode($result);
		$this->response->body($json);
		
	}
	
}