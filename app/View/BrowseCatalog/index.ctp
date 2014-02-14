
      <!-- Search Bar -->
 
        <div class="row">
 
          <div class="large-12 columns">
            <div class="radius panel">

 			<div class="row" id="ResultsTable">
 					<table>
					  <thead>
					    <tr>
					      <th>Category ID</th>
					      <th>Category Desc</th>
					      <th>Product Count</th>
					    </tr>
					  </thead>
					  <tbody>
						  <?php $length= count($categorydata) ;
						  for($i=0;$i<$length;$i++)
						  {
						  ?>
							  <tr>
						      <td><?php echo ($categorydata[$i]['mainid']) ?></td>
						      <td><?php echo ($categorydata[$i]['maindesc']) ?></td>
						      <td></td>
						   	  </tr>
			  		      <?php 
								$sublength = count($categorydata[$i]['subcategories']);
								for($j=0;$j<$sublength;$j++)
								{
								?>
								  <tr>
							      <td><?php echo ($categorydata[$i]['subcategories'][$j]['subcatid']) ?></td>
							      <td><?php echo ($categorydata[$i]['subcategories'][$j]['subcatdesc']) ?></td>
							      <td></td>
							   	  </tr>
					  		      <?php 
									$catlength = count($categorydata[$i]['subcategories'][$j]['categories']);
									for($k=0;$k<$catlength;$k++)
									{
									?>
									  <tr>
								      <td><?php echo ($categorydata[$i]['subcategories'][$j]['categories'][$k]['cat_id']) ?></td>
								      <td><?php echo ($categorydata[$i]['subcategories'][$j]['categories'][$k]['cat_desc']) ?></td>
								      <td><?php echo ($categorydata[$i]['subcategories'][$j]['categories'][$k]['product_count']) ?></td>
								   	  </tr>
									<?php
									}						
								}						
	  				      }
						  ?>
					  </tbody>
					</table>
 			</div>

<!--
 
 			<div class="row" id="ResultsTable">
 					<table>
					  <thead>
					    <tr>
					      <th>Product ID</th>
					      <th>Product Description</th>
					      <th>Company</th>
					      <th>Price</th>
					    </tr>
					  </thead>
					  <tbody>
						  <?php $length= count($results) ;
						  for($i=0;$i<$length;$i++)
						  {
						  ?>
						  <tr>
					      <td><?php echo ($results[$i]['product_headers']['prod_id']) ?></td>
					      <td><?php echo ($results[$i]['product_headers']['prod_desc']) ?></td>
					      <td><?php echo ($results[$i]['product_headers']['prod_company']) ?></td>
					      <td><?php echo ($results[$i]['product_headers']['prod_price']) ?></td>
					   	  </tr>
					
					    <?php 
					    	}
						  ?>
					  </tbody>
					</table>
 			</div>
   -->
    	  </div>
	    </div>
 
        <script type='text/javascript'>
      	function getResults(){
    		var nSearch = $('#searchWord').val();
    		var searchID = $('#searchID').val();
    		var length = nSearch.length;
			if(nSearch!=null){
    			if(length>0){
    				document.location.href = '/alphabeta/search?showResults=1&term='+nSearch+'&searchID='+searchID;
    			}
    		}	
    	}
    	
    	</script>