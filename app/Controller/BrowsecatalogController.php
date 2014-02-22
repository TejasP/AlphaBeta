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

		$this->set('categorydata',$data);
		$this->render('index');
	}

	public function all (){
		$this->layout = "foundation_search_home";
		$isBucketFilled =  $this->Cookie->read('basket-data');
		
		$type= gettype($isBucketFilled);
		if($type==='string'||$type==='NULL')
		{
			$this->set('isBucketFilled',"false");
		}else{
			$this->set('isBucketFilled',"true");
		}
		
		$this->render('all');
	}
	
	public function fetchCateogries (){
		$this->layout = "foundation_search_home";

		$query_catid = $this->request->query['catid'];
	
		$cat_options = array('conditions' => array(
			'product_categories.cat_parent' => $query_catid)
			);
					
		$categories= $this->product_categories->find('all',$cat_options);
		$cat_length = count($categories);
		for($j=0; $j<$cat_length; $j++)
		{
			$cat_id = $categories[$j]['product_categories']['cat_id'];
			$cat_desc = $categories[$j]['product_categories']['cat_desc'];

			$poptions = array('conditions' => array(
					'product_headers.prod_cat_id = ' => $cat_id)
			);
			
			$presults = $this->product_headers->find('all',$poptions);
				
			
			$data[$j] = array("cat_id"=>$cat_id, "cat_desc"=>$cat_desc, "product_count"=>count($presults));
		}
		
		$this->autoRender = false;
		return json_encode($data);
	}
	
	
	public function fetchProducts (){
		$this->layout = "foundation_search_home";
		
		$options = array('conditions' => array(
				'product_categories.cat_parent' => 0)
			);
	
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
						
					$categories[$cat_ctr] = array("cat_id"=>$level2catid, "cat_desc"=>$level2catdesc, "cat_image_folder"=>$level2catimgfolder, "product_count"=>count($presults));
					$cat_ctr++;
				}
				
				$sub_categories[$sub_cat_ctr] = array("subcatid"=>$level1catid, "subcatdesc"=>$level1catdesc, "categories"=>$categories);
				$sub_cat_ctr++;
			}
			
			$data[$i] = array("mainid"=>$maincatid, "maindesc"=>$maincatdesc, "subcategories"=>$sub_categories);
		}
			
		$this->autoRender = false;
		return json_encode($data);
	}
		
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