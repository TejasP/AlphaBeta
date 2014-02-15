<?php

App::uses('AppNoAuthController', 'Controller');

class BrowseCatalogController extends AppNoAuthController {

	public $uses = array('product_categories','product_headers');
	
	public $helpers = array('Html');
	
	public $component= array('JsHelper','RequestHandler');
	
	public function index (){
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		
		if (($user=== 'NULL') || ($user== '')) {
			$this->set('isUserLoggedIn',"false");
		}else
		{
			$this->set('isUserLoggedIn',"true");
			$user = Authsome::get('username');
			$role = Authsome::get('role');	
		}

		$isBucketFilled =  $this->Cookie->read('basket-data');
		
		$type= gettype($isBucketFilled);
		if($type==='string'||$type==='NULL')
		{
			$this->set('isBucketFilled',"false");
		}else{
			$this->set('isBucketFilled',"true");
		}
		
		$this->layout = "foundation_search_home";

		$options = array('conditions' => array(
				'product_categories.cat_parent' => 0)
		);
		
		//echo json_encode($options);
		
		$main_categories= $this->product_categories->find('all',$options);
		$maincat_length = count($main_categories);
		for($i=0 ; $i<$maincat_length;$i++)
		{
			$sub_categories = null;
			$sub_cat_ctr = 0;
			
			$maincatid = $main_categories[$i]['product_categories']['cat_id'];
			$maincatdesc = $main_categories[$i]['product_categories']['cat_desc'];
			
			$level1cat_options = array('conditions' => array(
					'product_categories.cat_parent' => $maincatid)
			);
			
			$level1_categories= $this->product_categories->find('all',$level1cat_options);
			$level1cat_length = count($level1_categories);
			for($j=0; $j<$level1cat_length; $j++)
			{
				$level1catid = $level1_categories[$j]['product_categories']['cat_id'];
				$level1catdesc = $level1_categories[$j]['product_categories']['cat_desc'];

				$categories = null;
				$cat_ctr = 0;
				
				$level2cat_options = array('conditions' => array(
						'product_categories.cat_parent' => $level1catid)
				);
					
				$level2_categories= $this->product_categories->find('all',$level2cat_options);
				$level2cat_length = count($level2_categories);
				for($k=0; $k<$level2cat_length; $k++)
				{
					$level2catid = $level2_categories[$k]['product_categories']['cat_id'];
					$level2catdesc = $level2_categories[$k]['product_categories']['cat_desc'];
					$level2catimgfolder = $level2_categories[$k]['product_categories']['cat_image_folder'];

					$poptions = array('conditions' => array(
							'product_headers.prod_cat_id = ' => $level2catid)
					);
						
					$presults = $this->product_headers->find('all',$poptions);
						
					//if(count($presults) > 0)
				//	{
						$categories[$cat_ctr] = array("cat_id"=>$level2catid, "cat_desc"=>$level2catdesc, "cat_image_folder"=>$level2catimgfolder, "product_count"=>count($presults));
						$cat_ctr++;
				//	}
				}
				
				$sub_categories[$sub_cat_ctr] = array("subcatid"=>$level1catid, "subcatdesc"=>$level1catdesc, "categories"=>$categories);
				$sub_cat_ctr++;
			}
			
			$data[$i] = array("mainid"=>$maincatid, "maindesc"=>$maincatdesc, "subcategories"=>$sub_categories);
		}

//      echo '<br>data:' . json_encode($data);
		
		$this->set('categorydata',$data);
		$this->render('index');
		
	/*	$length = count($results);
		for($i=0 ; $i<$length;$i++)
		{
			$data [$i] = array("cat_id"=>$results[$i]['product_categories']['cat_id'],"cat_desc"=>$results[$i]['product_categories']['cat_desc']);
		}
		
		echo json_encode($data);
		
		//$categories = $results['cat_id'];
		
		$categories = 3;
					
		$poptions = array('conditions' => array(
				'product_headers.prod_cat_id = ' => $categories)
		);
				
		$presults= $this->product_headers->find('all',$poptions);
		
		$json = json_encode($presults);
		$this->set('results',$presults);
		$this->render('index');
*/	}
	
	public function showBucket(){
		$this->layout = "foundation_search_home";
		
		return $this->redirect(
				array('controller' => 'Booking', 'action' => 'index')
		);
	}
	
	public function logoutUser(){
		$this->layout = "foundation_search_home";
		$this->Cookie->delete('basket-data');
		return $this->redirect(
				array('controller' => 'Search', 'action' => 'index')
		);
	}
}