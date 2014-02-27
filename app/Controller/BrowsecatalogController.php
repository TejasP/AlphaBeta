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
			
		
		/*
		 SELECT *
		FROM  `product_headers`
		WHERE prod_cat_id
		IN (
				SELECT cat_id
				FROM  `product_categories`
				WHERE cat_parent =2
		)
		LIMIT 0 , 30
		*/
		$options['joins'] = array(
				array('table' => 'product_categories',
						'alias' => 'product_categories',
						'type' => 'inner',
						'conditions' => array(
								'product_headers.prod_cat_id = product_categories.cat_id'
						)
				)
		);
		
		$options['conditions'] = array(
			'product_categories.cat_parent' => $query_catid
		);
		
		$options['limit'] = 10;
		$options['fields'] = array('product_categories.cat_id', 'product_categories.cat_desc', 'product_categories.cat_image_folder','product_headers.prod_id','product_headers.prod_desc','product_headers.prod_company','product_headers.prod_price');
		
		$products = null;
		$presults = $this->product_headers->find('all',$options);
		$pcounts  = count($presults);
		for($k=0; $k<$pcounts; $k++)
		{
			$cat_id = $presults[$k]['product_categories']['cat_id'];
			$cat_desc = $presults[$k]['product_categories']['cat_desc'];
			$cat_imagefolder = $presults[$k]['product_categories']['cat_image_folder'];
			$prod_id = $presults[$k]['product_headers']['prod_id'];
			$prod_desc = $presults[$k]['product_headers']['prod_desc'];
			$prod_company = $presults[$k]['product_headers']['prod_company'];
			$prod_price = $presults[$k]['product_headers']['prod_price'];
	
			$products[$k] = array("cat_id"=>$cat_id, "cat_desc"=>$cat_desc, "cat_imagefolder"=>$cat_imagefolder, "prod_id"=>$prod_id, "prod_desc"=>$prod_desc, "prod_company"=>$prod_company, "prod_price"=>$prod_price);
		}
		
		$this->autoRender = false;
		return json_encode($products);
	/*	
		$presults = $this->product_headers->find('all', array('limit' => 10,
				'prod_cat_id' => array(
						'product_categories.cat-id' => array(
								'product_categories.cat_parent' => $query_catid))
		)
		);
			
		echo $presults;
	*/	
		
		/*
		$cat_options = array('conditions' => array(
			'product_categories.cat_parent' => $query_catid)
			);
					
		$categories= $this->product_categories->find('all',$cat_options);
		$cat_length = count($categories);
		for($j=0; $j<$cat_length; $j++)
		{
			$cat_id = $categories[$j]['product_categories']['cat_id'];
			$cat_desc = $categories[$j]['product_categories']['cat_desc'];
			$cat_imagefolder = $categories[$j]['product_categories']['cat_image_folder'];

			$poptions = array('limit' => 2, 'conditions' => array(
					'product_headers.prod_cat_id = ' => $cat_id)
			);
			
			$products = null;
			$presults = $this->product_headers->find('all',$poptions);
			$pcounts  = count($presults);
			for($k=0; $k<$pcounts; $k++)
			{
				$prod_id = $presults[$k]['product_headers']['prod_id'];
				$prod_desc = $presults[$k]['product_headers']['prod_desc'];
				$prod_company = $presults[$k]['product_headers']['prod_company'];
				$prod_price = $presults[$k]['product_headers']['prod_price'];
				
				$products[$k] = array("prod_id"=>$prod_id, "prod_desc"=>$prod_desc, "prod_company"=>$prod_company, "prod_price"=>$prod_price); 
			}
			
			$data[$j] = array("cat_id"=>$cat_id, "cat_desc"=>$cat_desc, "cat_image_folder"=>$cat_imagefolder, "product_count"=> $pcounts, "products"=> $products);
		}
		
		$this->autoRender = false;
		return json_encode($data);
*/	}
	
		
	public function fetchProductDetail (){
		$this->layout = "foundation_search_home";
	
		$query_prodid = $this->request->query['prodid'];
	
		$options = array('conditions' => array(
				'product_headers.prod_id' => $query_prodid)
		);
	
		$products = $this->product_headers->find('all',$options);
	
		$pcounts  = count($products);
		for($k=0; $k<$pcounts; $k++)
		{
			$prod_id = $products[$k]['product_headers']['prod_id'];
			$prod_desc = $products[$k]['product_headers']['prod_desc'];
			$prod_company = $products[$k]['product_headers']['prod_company'];
			$prod_price = $products[$k]['product_headers']['prod_price'];
			$prod_cat_id = $products[$k]['product_headers']['prod_cat_id'];

			// get image details.
			$cat_options = array('conditions' => array(
					'product_categories.cat_id' => $prod_cat_id)
			);

			$cat_id = "";
			$cat_desc = "";
			$cat_imagefolder = "";
			$cat_details = $this->product_categories->find('all',$cat_options);
			$cat_length = count($cat_details);
			for($j=0; $j<$cat_length; $j++)
			{
				$cat_id = $cat_details[$j]['product_categories']['cat_id'];
				$cat_desc = $cat_details[$j]['product_categories']['cat_desc'];
				$cat_imagefolder = $cat_details[$j]['product_categories']['cat_image_folder'];
			}
			
			$data[$k] = array("cat_id"=>$cat_id, "cat_desc"=>$cat_desc, "cat_imagefolder"=>$cat_imagefolder, "prod_id"=>$prod_id, "prod_desc"=>$prod_desc, "prod_company"=>$prod_company, "prod_price"=>$prod_price);
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