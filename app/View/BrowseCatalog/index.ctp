
      <!-- Browse Catalog -->
 
        <div id="content" class="row">
 
          <div class="large-12 columns">
            <div class="radius panel">
            
            <?php $length= count($categorydata) ;
			for($i=0;$i<$length;$i++)
			{
			?>
				<div class="maincategories">
           			<?php 
					$sublength = count($categorydata[$i]['subcategories']);
					?>
					<h2 class="maincategory"><?php echo ($categorydata[$i]['maindesc']) ?> ( <?php echo $sublength ?> )</h2>
					<?php
					for($j=0;$j<$sublength;$j++)
					{
					?>
	          			<div class="subcategories">
    	    				<?php 
							$catlength = count($categorydata[$i]['subcategories'][$j]['categories']);
							?>
							<h2 class="subcategory"><?php echo ($categorydata[$i]['subcategories'][$j]['subcatdesc']) ?> (  <?php echo $catlength ?> )</h2>

							<ul class="categories">	
								<?php
								for($k=0;$k<$catlength;$k++)
								{
								
									// echo '/img/products/' . ($categorydata[$i]['subcategories'][$j]['categories'][$k]['cat_image_folder']) . '.jpg';
								?>
									<li class="categories-item" style="width: 146px;">
					                	<a href="#" class="fllt">
					               <!-- 	    <div class="fllt imageBox"><img width="60" height="80" src="/alphabeta/img/products/<?php echo ($categorydata[$i]['subcategories'][$j]['categories'][$k]['cat_image_folder']) ?>.jpg"></div>
					               			<div class="fllt imageBox"><img width="60" height="80" src="<?php echo '/img/products/' . ($categorydata[$i]['subcategories'][$j]['categories'][$k]['cat_image_folder']) . '.jpg' ?>"></div> -->
					               			<div class="fllt imageBox"><?php echo $this->Html->image('/img/products/' . ($categorydata[$i]['subcategories'][$j]['categories'][$k]['cat_image_folder']) . '.jpg',  array('width'=>'60px', 'height'=>'80px')) ?></div>
					                	    <div class="fllt labelBox"><span class="arrow-right"><?php echo ($categorydata[$i]['subcategories'][$j]['categories'][$k]['cat_desc']) ?></span><span class="arrow-right">(<?php echo ($categorydata[$i]['subcategories'][$j]['categories'][$k]['product_count']) ?>)</span></div>
					                	</a>
					            	</li>
								<?php
								}						
							    ?>
							</ul>
						</div>
					<?php
					}
					?>
        		</div>
            <?php
            }
            ?>
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