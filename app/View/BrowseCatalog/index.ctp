<?php
	// reading query str to add them when any link is clicked.	
	$querystr = $this->params['url'];
	
	$bchandler = new BrowseCatalogHandlerComponent();
	$filters = $bchandler->fetchFilters($querystr);

	$parambcflt = "";
	$parampg = "";
	$ppr_min;
	$ppr_max;	
	$cp;
	$spoint;
	for($i=0; $i<count($filters); $i++) {
		if ($filters[$i]["key"] == "ppr_min") {
			$ppr_min = $filters[$i]["value"];
		} else if($filters[$i]["key"] == "ppr_max") {
			$ppr_max= $filters[$i]["value"];
		} else if($filters[$i]["key"] == "cp") {
			$cp = $filters[$i]["value"];
		} else if($filters[$i]["key"] == "spoint") {
			$spoint = $filters[$i]["value"];
		}
	}
	
	$parambcflt = "bcflt=vw:gr";
	
	if(isset($ppr_min)) {
		$parambcflt = $parambcflt . ",ppr_min:" . $ppr_min;
	}
		
	if(isset($ppr_max)) {
		$parambcflt = $parambcflt . ",ppr_max:" . $ppr_max;
	}
	
	$parampg = $parampg . "&pg=";
	if(isset($cp)) {
		$parampg = $parampg . "cp:" . $cp;
	}
	
	if(isset($spoint)) {
		$parampg = $parampg . ",spoint:" . $spoint;
	}
	
	if(isset($parampg))
		$parampg = "cp:1,spoint:1";
	
	$parampg = $parampg . "&q=";
?>

<script language="javascript">

	function getURLParameter(sParam)
	{
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		for (var i = 0; i < sURLVariables.length; i++) 
    	{
    		var sParameterName = sURLVariables[i].split('=');
    		if(sParameterName[0] == sParam)
    		{
    			return "&" + sParameterName[0] + "=" + sParameterName[1];
    		}
    		else 
    		{
    			return "";
    		}
    	}
	}


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
			
			$.fetchCategories($tabcontentDiv, "<?php echo Configure::read('browsecatalogURL'); ?>/fetchCateogries?catid=" + $catId + "&<?php echo $parambcflt . $parampg ?>"); 
		});

		$("dd", "dl #mytab").click(function(e) {
			var $panelId = $(this).find("a").attr("href");
			var $contentDiv = $("div").find($panelId);
			$.fetchCategories($contentDiv, "<?php echo Configure::read('browsecatalogURL'); ?>/fetchCateogries?catid=" + $(this).find("a").attr("id") + "&<?php echo $parambcflt . $parampg ?>");
		});

		$(document).on('click', 'ul.products li.products-item' , function() {
			
			var $catid = $(this).parent().attr("id");
			var $prodsection = $(this).attr("class");
			
			//alert("$prodsection:" + $prodsection);
			
			//alert($(this).parent().attr("id"));
			
			// get the id
			var $currprodid = $(this).attr("id");

			// find the current index
			var $found  = false;			
			var $prodno = 1;
			$("ul#" + $catid + " li.products-item" ).each(function( index ) {
				var $prodid = $(this).attr('id');

				if($prodid == $currprodid) {
					$found  = true;
				}
				if(!($found))
					$prodno++;
			});
			
//			alert("index......." + $prodno);
			
			
			if(($prodno%5) > 0) {
				$prodSeq = $prodno%5;
				$prodno = $prodno + (5 - ($prodno%5));
			}
			else {
				$prodSeq = 5;
			}
			
//			alert("to be added at......." + $prodno + " " + $("ul#" + $catid + " li.products-item:eq(" + ($prodno-1) + ")").html());

			// hide already created li product details
			$('ul#' + $catid + ' li.productdetail').css('display','none');
			
			// Verify if this id is already existing.. if no.. then add.. otherwise mark as visible
    	 	if (!$('#D' + $currprodid).length) {
			    // ok to add stuff
				$("ul#" + $catid + " li.products-item:eq(" + ($prodno-1) + ")").after("<li id='D" + $currprodid + "' class='productdetail'></li>");
				
				var $contentDiv = $("ul#" + $catid + " li#D" + $currprodid);
				$.fetchProductDetail($prodSeq, "D" + $currprodid, $contentDiv, "<?php echo Configure::read('browsecatalogURL'); ?>/fetchProductDetail?prodid=" + $currprodid.split("-")[1]);
			}
			else
			{
				//	alert("already exist");
				$('#D' + $currprodid).css('display','inline-block');
			}
   		});
		
		$.fetchCategories = function($contentDiv, postUrl)
		{
			$.getJSON(postUrl, function(data){
				$contentDiv.html("");
				var $contents  = $("<div class='nav left'><a href='" + "<?php echo Configure::read('browsecatalogURL') . '?' . $parambcflt . $parampg ?>" + "'><b>&lt;</b></a></div><div class='nav right'><a href='" + "<?php echo Configure::read('browsecatalogURL') . '?' . $parambcflt . $parampg ?>" + "'><b>&gt;</b></a></div>");
				var $prodlinks = $("<div id='prodlinks'></div>");
				if(data != null) {
					var $prodcat = $("<ul id='" + data[0].cat_id + "' class='products'></ul>");
					for (var i=0, len=data.length; i < len; i++) {
						var $product = data[i];
	
					  	var $prodcatli = $("<li class='products-item' id='" + $product.cat_id + "-" + $product.prod_id + "' style='width: 165px;'></li>");						
						$prodlink  = $("<a class='fllt'></a>");
						$prodlink.append("<div class='fllt imageBox'><img width='60px' height='80px' src='" + "<?php echo Configure::read('imgproductfolder'); ?>" + "/" + $product.cat_imagefolder + "/" + $product.prod_id + "_small.jpg'></div>");
						$prodlink.append("<div class='fllt labelBox' style='height:85px;'><span class='arrow-right'>" + $product.prod_desc + "</span><span class='arrow-right'>(Rs." + $product.prod_price + ")<br></span><span class='arrow-right'>" + $product.cat_desc + "</span></div>");
						
						$prodcatli.append($prodlink);
						
						$prodcat.append($prodcatli);
					}
					
					$prodlinks.append($prodcat);
					$contentDiv.append($contents);
				} else {
					$prodlinks.append("no products found for this category");
				}				
				$contentDiv.append($prodlinks);
			});
		}

		// close link for product detail
		$(document).on('click', 'div.pdetail-section div.pdetail-close' , function() {
			$('li#' +  $(this).parent().attr("data")).css('display','none');
		});

		$.fetchProductDetail = function($prodSeq, $prodId, $contentDiv, postUrl)
		{
				$.getJSON(postUrl, function(data){
					var $contents = $("<div class='pdetail-section' data='" + $prodId +"'></div>");
					$contents.append("<div class='pdetail-close'><a class='action'>[X]</a></div>");
					for (var i=0, len=data.length; i < len; i++) {
						var $product = data[i];
	
						var $callBook = "javascript:callBook('1000','1');";
						$contents.append("<div class='pdetail-thumbimg'><img width='300px' height='300px' src='" + "<?php echo Configure::read('imgproductfolder'); ?>" + "/" + $product.cat_imagefolder + "/" + $product.prod_id + "_large.jpg'></div>");
						$contents.append("<div class='pdetail-content'><div class='pdetail-prodname'>" + $product.prod_desc + "</div><div class='pdetail-company'>" + $product.prod_company + "</div><div class='pdetail-desc'>product description to be placed here</div><div class='pdetail-leftblock'><div><span class='pdetail-label'>Starting from </span><span class='pdetail-price'>Rs. " + $product.prod_price + "</span></div><div><span class='pdetail-label'>inclusive of taxes</span></div><div class='pdetail-submit' style='width:100px;'><a class='postfix button expand' href='#' onClick='javascript:callBook("+ $product.prod_id + ", 2);'>Shortlist</a></div><div class='pdetail-seperator'></div></div><div class='pdetail-attributes'>product attributes to be placed here</div></div>");
					}
					
					$contentDiv.html("");
					$contentDiv.append("<div class='pdetail-uparrow' style='margin-left:" + (($prodSeq*165)-82) + "px;'><img src='/alphabeta/img/up-arrow.png'></div>");
					$contentDiv.append($contents);
			});
		}

	});
	
</script>

      <!-- Browse Catalog -->
 		<section>

        	<div class="large-2 columns">
        		<div class="radius panel">
					<div data-ved="0CCMQsis" class="sr__restricts" style="width:150px;">
						<div class="sr__group">
							<div class="sr__text">
								<a	href="?bcflt=vw:gr&amp;pg=cp:1,spoint:1&amp;q=">
									<span title="Clear all filters" class="link-text"><span class="kcb"></span><span class="link-text">&nbsp;Clear all filters</span></a>
							</div>
						</div>
						<div class="sr__group">
							<div class="sr__title"><b>Price</b></div>
							<div class="sr__text">
								<a	href="?bcflt=vw:gr,ppr_max:1000&amp;pg=cp:1,spoint:1&amp;q=">
									<span class="kcb"></span><span class="link-text">&nbsp;Up to Rs. 1000</span></a>
							</div>
							<div class="sr__text">
								<a	href="?bcflt=vw:gr,ppr_min:1001,ppr_max:10000&amp;pg=cp:1,spoint:1&amp;q=">
									<span class="kcb"></span><span class="link-text">&nbsp;Rs. 1001 &ndash; Rs. 10000</span></a>
							</div>
							<div class="sr__text">
								<a	href="?bcflt=vw:gr,ppr_min:10001,ppr_max:25000&amp;pg=cp:1,spoint:1&amp;q=">	
									<span class="kcb"></span><span class="link-text">&nbsp;Rs. 10001 &ndash; Rs. 25000</span></a>
							</div>
							<div class="sr__text">
								<a	href="?bcflt=vw:gr,ppr_min:25001&amp;pg=cp:1,spoint:1&amp;q=">
									<span class="kcb"></span><span class="link-text">&nbsp;Over Rs. 25001</span></a>
							</div>    
						</div>
					</div>
					<div data-ved="0CCMQsis" class="sr__restricts" style="width:150px;">
						<div class="sr__group">
							<div class="sr__title"><b>Brand</b></div>
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
				$subprdcount =  $categorydata[$i]['product_count'];
				if($subprdcount > 0) {
			?>
				<dd>
					<h2><a id="<?php echo ($categorydata[$i]['mainid']) ?>" href="#panel<?php echo ($i+1) ?>" class="<?php echo (($i==0)?'active':'')?>"><?php echo ($categorydata[$i]['maindesc']) ?> ( <?php echo $sublength ?>  - <?php echo $subprdcount ?>)</a></h2> 
					<div id="panel<?php echo ($i+1) ?>" class="content"> 
						<dl id="mytab" class="tabs" data-tab> 
						<?php
						for($j=0;$j<$sublength;$j++)
						{
							$catlength = count($categorydata[$i]['subcategories'][$j]['categories']);
							$catprdcount =  $categorydata[$i]['subcategories'][$j]['product_count'];
							if($catprdcount > 0) {
						?>
							<dd class="<?php echo (($j==0)?'active':'')?>">
								<a id="<?php echo ($categorydata[$i]['subcategories'][$j]['subcatid'])?>" href="#panel<?php echo ($i+1) ?>-<?php echo ($j+1) ?>"><?php echo ($categorydata[$i]['subcategories'][$j]['subcatdesc']) ?> (  <?php echo $catlength ?> - <?php echo $catprdcount ?>)</a>
							</dd> 
						<?php
							}
						}
						?>
						</dl> 
						<div class="tabs-content">
						<?php
						for($j=0;$j<$sublength;$j++)
						{
							$catlength = count($categorydata[$i]['subcategories'][$j]['categories']);
							$catprdcount =  $categorydata[$i]['subcategories'][$j]['product_count'];
							if($catprdcount > 0) {
						?>
							 <div class="content<?php echo (($j==0)?' active':'')?>" id="panel<?php echo ($i+1) ?>-<?php echo ($j+1) ?>" style="width:100%"> 
							 	<p></p> 
							 </div>
						<?php
							}
						}
						?>
					</div> 
				</dd> 

			<?php 
				}
			}
			?>
			</dl>
    	  </div>
	    </section>