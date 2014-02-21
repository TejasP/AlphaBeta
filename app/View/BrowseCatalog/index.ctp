
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery.ui.widget.js"></script>
 
<script language="javascript">

    $(document).ready(function () {
	    // add loading image to div
	    //$('#loading').html("<img src=\'<?php echo $this->Html->image('/img/ajaxloader.gif') ?>\'>loading...");
/* 		$('#loading').html('<?php echo $this->Html->image("/img/ajaxloader.gif") ?> Loading...');
 		
		$.ajax({
		    type: "post",       // Request method: post, get
		    url: "http://localhost/alphabeta/browsecatalog/fetchProducts",
		    data: {username: "wiiNinja", password: "isAnub"}, 
		    dataType: "json",   // Expected response type
		    contentType: "application/json",
		    cache: false,
		    success: function(response, status) {
		        $('#productData').attr("style","display:block");

				
		        var $main = $("<dl id='tempaccordion' class='accordion' data-accordion=''></dl>");
		        for (var i=0, len=response.length; i < len; i++) {
		        	var counter = response[i];
				  //  alert(counter.mainid + " " + counter.maindesc + " subcategories:" + counter.subcategories.length + " " + counter.subcategories[0].subcatid + " " + counter.subcategories[0].subcatdesc + " categories: " + counter.subcategories[0].categories.length);
					var $maincategory = $("<dd></dd>");
					var $maincatdetail = $("<div id='panel" + (i+1) +"' class='content'></div>");
					var $dl = $("<dl></dl>");

					$maincategory.append("<a href='#panel" + (i+1) +"'\>" + counter.maindesc + " (" + counter.subcategories.length + ")</a>");
					
					$maincategory.append($maincatdetail);
															
					$main.append($maincategory);
				}
				
		//		$('#tempaccordion').accordion('destroy').accordion({ active: active});
				
		//		$('#productData').append($main);
				
		        $('#loading').html("");
    	    },
		    error: function(response, status) {
		        alert('Error! response=' + response + " status=" + status + " response=" + response);
		    }
		});
*/   
	 });
	 
	 $(function() {
		$("#myaccordion").accordion({          
			header: "h2",
			active: false,
			collapsible: true
		});

		$("h2", "#myaccordion").click(function(e) {
			var $contentDiv = $("#myaccordion div").find("#" + $(this).next("div").attr("id") + "-1");
			$contentDiv.html("need to fetch categories using ajax #" + $(this).next("div").attr("id"));
			$.fetchCategories($contentDiv, "/alphabeta/browsecatalog/fetchCateogries?catid=" + $(this).find("a").attr("id"));
		});

		$("dd", "dl #mytab").click(function(e) {
			var $panelId = $(this).find("a").attr("href");
			var $contentDiv = $("div").find($panelId);
			$contentDiv.html("need to fetch categories using ajax #" + $panelId);
			$.fetchCategories($contentDiv, "/alphabeta/browsecatalog/fetchCateogries?catid=" + $(this).find("a").attr("id"));
		});

		$.fetchCategories = function($contentDiv, postUrl)
		{
			$.getJSON(postUrl, function(data){
				var $catlinks = $("<div class='links'></div>");
				for (var i=0, len=data.length; i < len; i++) {
		        	var $cat = data[i];
				  
					$catlinks.append("<li><a href='#'\>" + $cat.cat_desc + "</a></li>");
				}
				$contentDiv.html($catlinks);
				console.log(data);
				console.log($contentDiv);
      			console.log("done.");
 			});
		}
	});
</script>

      <!-- Browse Catalog -->
 		<div id="content" class="row">
 
          <div class="large-12 columns">
            <div class="radius panel">

			<div id="loading"></div>
			
			<div id="productData"></div>

			<br>

			<dl id="myaccordion" class="accordion" data-accordion=""> 
            <?php $length= count($categorydata) ;
			for($i=0;$i<$length;$i++)
			{
				$sublength = count($categorydata[$i]['subcategories']);
			?>
				<dd>
					<h2><a id="<?php echo ($categorydata[$i]['mainid']) ?>" href="#panel<?php echo ($i+1) ?>" class="<?php echo (($i==0)?'active':'')?>"><?php echo ($categorydata[$i]['maindesc']) ?> ( <?php echo $sublength ?> )</a></h2> 
					<div id="panel<?php echo ($i+1) ?>" class="content"> 
						<dl id="mytab" class="tabs" data-tab> 
						<?php
						for($j=0;$j<$sublength;$j++)
						{
							$catlength = count($categorydata[$i]['subcategories'][$j]['categories']);
						?>
							<dd class="<?php echo (($j==0)?'active':'')?>">
								<a id="<?php echo ($categorydata[$i]['subcategories'][$j]['subcatid'])?>" href="#panel<?php echo ($i+1) ?>-<?php echo ($j+1) ?>"><?php echo ($categorydata[$i]['subcategories'][$j]['subcatdesc']) ?> (  <?php echo $catlength ?> )</a>
							</dd> 
						<?php
						}
						?>
						</dl> 
						<div class="tabs-content">
						<?php
						for($j=0;$j<$sublength;$j++)
						{
							$catlength = count($categorydata[$i]['subcategories'][$j]['categories']);
						?>
							 <div class="content<?php echo (($j==0)?' active':'')?>" id="panel<?php echo ($i+1) ?>-<?php echo ($j+1) ?>"> 
							 	<p><?php echo ($categorydata[$i]['subcategories'][$j]['subcatdesc']) ?> (<?php echo $catlength ?>)</p> 
							 </div>
						<?php
						}
						?>
					</div> 
				</dd> 

			<?php 
			}
			?>
			</dl>

			
<!--			<div style="display:block" id="productData"><dl data-accordion="" class="accordion"><dd><a href="#panel1">diabetes</a><div class="content active" id="panel1">testing....</div></dd><dd><a href="#panel2">beauty</a><div class="content" id="panel2">testing....</div></dd><dd><a href="#panel3">women-care</a><div class="content" id="panel3">testing....</div></dd><dd><a href="#panel4">personal-n-baby-care</a><div class="content" id="panel4">testing....</div></dd><dd><a href="#panel5">elderly-n-patient-care</a><div class="content" id="panel5">testing....</div></dd><dd><a href="#panel6">vitamins-n-supplements</a><div class="content" id="panel6">testing....</div></dd><dd><a href="#panel7">sports-nutrition</a><div class="content" id="panel7">testing....</div></dd><dd><a href="#panel8">health-food-n-drinks</a><div class="content" id="panel8">testing....</div></dd></dl></div>
		<dl class="accordion" data-accordion=""> 
			<dd>
				<a href="#panel1">Accordion 1</a> 
				<div id="panel1" class="content active"> 
					<dl class="tabs" data-tab> 
						<dd class="active">
							<a href="#panel2-1">Tab 1</a>
						</dd> 
						<dd>
							<a href="#panel2-2">Tab 2</a>
						</dd> 
						<dd>
							<a href="#panel2-3">Tab 3</a>
						</dd> 
						<dd>
							<a href="#panel2-4">Tab 4</a>
						</dd> 
					</dl> 
					<div class="tabs-content">
						 <div class="content active" id="panel2-1"> 
						 	<p>First panel content goes here...</p> 
						 </div>
						 <div class="content" id="panel2-2">
						 	<p>Second panel content goes here...</p> 
						 </div> 
						 <div class="content" id="panel2-3">
						   <p>Third panel content goes here...</p> 
						 </div>
						 <div class="content" id="panel2-4"> <p>Fourth panel content goes here...</p> 
						 </div> 
					</div> 
				</div> 
			</dd> 
			<dd> <a href="#panel2">Accordion 2</a> <div id="panel2" class="content"> Panel 2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div> 
			</dd>
			<dd> <a href="#panel3">Accordion 3</a> <div id="panel3" class="content"> Panel 3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
			</dd> 
		</dl>
			<br>
-->
            
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
					               			<div class="fllt imageBox"><!--<?php echo $this->Html->image('/img/products/' . ($categorydata[$i]['subcategories'][$j]['categories'][$k]['cat_image_folder']) . '.jpg',  array('width'=>'60px', 'height'=>'80px')) ?> --></div>
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