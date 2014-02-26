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
			// dynamically refresh the first tab inside this accordion
			var $catId = $("div").find("#"+ $(this).next("div").attr("id")).find("a").attr("id");
			var $tabcontentDiv = $("div #" + $(this).next("div").attr("id") + "-1");
			$.fetchCategories($tabcontentDiv, "/alphabeta/browsecatalog/fetchCateogries?catid=" + $catId);
		});

		$("dd", "dl #mytab").click(function(e) {
			var $panelId = $(this).find("a").attr("href");
			var $contentDiv = $("div").find($panelId);
			$.fetchCategories($contentDiv, "/alphabeta/browsecatalog/fetchCateogries?catid=" + $(this).find("a").attr("id"));
		});

		$(document).on('click', 'ul.products li.products-item' , function() {
			
			// get the id
			var $prodid = $(this).attr("id");
			
			// find total li items in ul
			//alert("total:" + $("ul.products li.products-item").length);
			
			// hide already created li product details
			$('li.productdetail').css('display','none');
			
			// find the current index
			alert("current index:" + ($(this).index()) + " index%4:" + ($(this).index()%4));
			
			// find the index where the new li need to be added.
			var $prodIndex = $(this).index() + (4 - ($(this).index()%4));

			alert("will be added at :" + $prodIndex);
			
			// Verify if this id is already existing.. if no.. then add.. otherwise mark as visible
    	 	if (!$('#D' + $prodid).length) {
			    // ok to add stuff
				$("ul.products li:nth-child(" + $prodIndex + ")").after("<li id='D" + $prodid + "' class='productdetail'>Need to fetch product detail using ajax for product ID-" + $prodid + "</li>");
			}
			else
			{
				//	alert("already exist");
				$('#D' + $prodid).css('display','inline-block');
			}
			    	 	    	 	
    	 	
   		});
		
		$.fetchCategories = function($contentDiv, postUrl)
		{
			$.getJSON(postUrl, function(data){
/*				var $catlinks = $("<ul id='links'></ul>");
				for (var i=0, len=data.length; i < len; i++) {
		        	var $cat = data[i];
				  
					$catlinks.append("<li><div class='link'><a href='#'\>" + $cat.cat_desc + "(" + $cat.product_count + ")</a></div></li>");
				}
				$contentDiv.html($catlinks);
*/	
				var $prodlinks = $("<div id='prodlinks'></div>");
				var $prodcat = $("<ul class='products'></ul>");
				for (var i=0, len=data.length; i < len; i++) {
					var $product = data[i];

				  	var $prodcatli = $("<li class='products-item' id='" + $product.prod_id + "' style='width: 165px;'></li>");						
					$prodlink  = $("<a href='#' class='fllt'></a>");
					$prodlink.append("<div class='fllt imageBox'><img width='60px' height='80px' src='/alphabeta/img/products/" + $product.cat_imagefolder + "/" + $product.prod_id + "_small.jpg'></div>");
					$prodlink.append("<div class='fllt labelBox' style='height:85px;'><span class='arrow-right'>" + $product.prod_desc + "</span><span class='arrow-right'>(Rs." + $product.prod_price + ")<br></span><span class='arrow-right'>" + $product.cat_desc + "</span></div>");
					
					$prodcatli.append($prodlink);
					
					$prodcat.append($prodcatli);
				}
				
				$prodlinks.append($prodcat);
				
				$contentDiv.html($prodlinks);
			});
		}
	});
</script>

      <!-- Browse Catalog -->
 		<div id="content" class="row">

        	<div class="large-2 columns">
        		<div class="radius panel">
					<div data-ved="0CCMQsis" class="sr__restricts" style="width:150px;">
						<div class="sr__group">
							<div class="sr__text">
	<!--						<a	href="/search?tbs=vw:g&amp;tbm=shop&amp;q=chambray+shirt&amp;tbas=0&amp;sa=X&amp;ei=fC0KU4WsAqG5iQeNxIDoCQ&amp;ved=0CCQQvSs" class="sr__link"> --><a href="#"><span title="Clear all filters" class="sr__link-text"><span class="kcb"><input type="checkbox" value="clearall"></span>Clear all filters</span></a>
							</div>
						</div>
						<div class="sr__group">
							<div class="sr__title"><b>Price</b></div>
							<div class="sr__text">
	<!--							<a	href="/search?tbs=vw:g,cat:212,gender:v--2female,price:1,ppr_max:25&amp;tbm=shop&amp;q=chambray+shirt&amp;sa=X&amp;ei=fC0KU4WsAqG5iQeNxIDoCQ&amp;ved=0CCgQvSs" class="sr__link"> --><a href="#">
									<span class="kcb"><input type="checkbox" value="xxx-200"></span><span title="Up to $25" class="sr__link-text">Up to Rs. 200</span></a>
							</div>
							<div class="sr__text">
	<!--						<a href="/search?tbs=vw:g,cat:212,gender:v--2female,price:1,ppr_min:25,ppr_max:40&amp;tbm=shop&amp;q=chambray+shirt&amp;sa=X&amp;ei=fC0KU4WsAqG5iQeNxIDoCQ&amp;ved=0CCkQvSs" class="sr__link"> --><a href="#"><span class="kcb"><input type="checkbox" value="201-600"></span><span title="$25 &amp;#8211; $40" class="sr__link-text">Rs. 201 &ndash; Rs. 600</span></a>
							</div>
							<div class="sr__text">
	<!--						<a href="/search?tbs=vw:g,cat:212,gender:v--2female,price:1,ppr_min:40,ppr_max:60&amp;tbm=shop&amp;q=chambray+shirt&amp;sa=X&amp;ei=fC0KU4WsAqG5iQeNxIDoCQ&amp;ved=0CCoQvSs" class="sr__link"> --><a href="#"><span class="kcb"><input type="checkbox" value="610-800"></span><span title="$40 &amp;#8211; $60" class="sr__link-text">Rs. 601 &ndash; Rs. 800</span></a>
							</div>
							<div class="sr__text">
	<!--						<a href="/search?tbs=vw:g,cat:212,gender:v--2female,price:1,ppr_min:60&amp;tbm=shop&amp;q=chambray+shirt&amp;sa=X&amp;ei=fC0KU4WsAqG5iQeNxIDoCQ&amp;ved=0CCsQvSs" class="sr__link"> --><a href="#"><span class="kcb"><input type="checkbox" value="801-xxx"></span><span title="Over $60" class="sr__link-text">Over Rs. 801</span></a>
							</div>    
						</div>
					</div>
				</div>
			</div>
 
          <div class="large-10 columns">
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
							 <div class="content<?php echo (($j==0)?' active':'')?>" id="panel<?php echo ($i+1) ?>-<?php echo ($j+1) ?>" style="width:100%"> 
							 	<p></p> 
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

<!--
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
   -->
    	  </div>
	    </div>