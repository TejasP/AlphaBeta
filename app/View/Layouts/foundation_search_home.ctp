<?php
/** 
 *
 * PHP 5 testing....
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'eMediplus- Healthcare Marketplace and IT Solutions');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
	
		echo $this->Html->css('emediplus');
		echo $this->Html->css('foundation');
		echo $this->Html->css('jquery-ui-1.10.4.custom');
		echo $this->Html->css('responsive-tables');
		echo $this->Html->css('amazon_scroller.css');
		echo $this->Html->script('modernizr');
				
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<header>
<nav class="top-bar" data-topbar>
          <ul class="title-area">
            <!-- Title Area -->

            <li class="name">
              <h1><a href="<?php echo Configure::read('dashboard'); ?>"><?php echo $this->Html->image('/img/logo.png', array('alt' => 'eMediplus')); ?></a></h1>
            </li>

            <li class="toggle-topbar menu-icon">
              <a href="#"><span>menu</span></a>
            </li>
          </ul>

          <section class="top-bar-section">
            <!-- Right Nav Section -->

            <ul class="right">
            	<?php 
				if($isUserLoggedIn === 'true'){ ?>
				
              <li class="divider"></li>
            	<li class="has-dropdown">
                	<a href="#">Notification</a>
                	<ul class="dropdown">
                	<li><span class="label">Content First</div></li>
                	<li><div class="gs">Content Second</div></li>
                </ul>
              </li>
              <?php }  ?>
              
              <li class="divider"></li>

              <li class="gs">
                <a href="<?php echo $this->Html->url(array('controller'=>'browsecatalog', 'action'=>'index'))?>" class="button">Browse Catalog</a>
              </li>
              
       

              <li class="divider"></li>

              <li class="gs">
                <a  id="aPostID" class="button" href="<?php echo $this->Html->url(array('controller'=>'Postrequirements', 'action'=>'add'))?>">
    			Post your requirement
 	 			</a>
              </li>


              <li class="divider"></li>

              <li class="has-dropdown">
                <a href="#">Account</a>
                <ul class="dropdown">
				<?php 
				if($isUserLoggedIn === 'false'){ ?>
                  <li>
                    <a id="aLoginID" href="<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'login'))?>" >Login</a>
                  </li>
                  <li>
                    <a id="aRegisterID" href="<?php echo $this->Html->url(array('controller'=>'registration', 'action'=>'register'))?>">Register</a>
                  </li>
              	<?php }else{?>
              	  <li>
                    <a href="<?php echo $this->Html->url(array('controller'=>'dashboard', 'action'=>'index'))?>" >Dashboard</a>
                  </li>
              	  <li>
                    <a href="<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'logout'))?>" >Logout</a>
                  </li>
                <?php } ?>  
                </ul>
              </li>
            </ul>
          </section>
        </nav>
</header>
<!-- End Top Bar -->

    
	<?php
		echo $this->Html->script('/js/vendor/jquery');
		echo $this->Html->script('/js/vendor/fastclick.js');
		echo $this->Html->script('/js/foundation.min.js');
		echo $this->Html->script('/js/foundation/foundation.js');
		echo $this->Html->script('/js/foundation/foundation.topbar.js');
		echo $this->Html->script('/js/vendor/jquery-ui-1.10.4.custom.js');
		echo $this->Html->script('/js/foundation/foundation.reveal.js');
		echo $this->Html->script('responsive-tables');
		echo $this->Html->script('/js/foundation/foundation.tab.js');
		echo $this->Html->script('/js/foundation/foundation.accordion.js');
		echo $this->Html->script('/js/amazon_scroller.js');


		echo $this->Html->script('/js/vendor/jquery-ui.js');
		echo $this->Html->script('/js/vendor/jquery.ui.widget.js');


	?>
       <!-- Top sections -->
       		<section>
       				<div class="row">
	       		 		<div class="large-3 columns">
								<div class="step"><a href="<?php echo Configure::read('searchURL'); ?>">Search</a></div>
						</div>
						<div class="large-3 columns">
								<div class="step"><a href="javascript:openCart();">Select</a></div>
						</div>
						 <div class="large-3 columns">
								<div class="step"><a href="javascript:openLocation();">Locate</a></div>
						</div>
						 <div class="large-3 columns">
								<div class="step"><a href="javascript:openQuotes();">Get Quote</a></div>
						</div>
					</div>
       		</section>
       	
			<section>
					</br>
					</br>
		            <div class="large-2 medium-1 columns">
							<a href="javascript:openCart();" id="bucketID">My Selection (<?php if (!empty($selectedCount)){ echo $selectedCount; }else {echo '0'; }?>)</a>
					</div>
					<div class="large-5 medium-9 columns" >
			          		<div style="display:none" id="karttwistie_container">              
		    	          		<div class="amazon_scroller" id="karttwistie">
									<div class="amazon_scroller_mask">
									<ul>
									<li><div class="blankSelection"></div></li>
									<li><div class="blankSelection"></div></li>
									<li><div class="blankSelection"></div></li>
									<li><div class="blankSelection"></div></li>
									</ul>
									</div>
									<ul class="amazon_scroller_nav">
										<li class="amazon_scroller_left_arrow"></li>
										<li class="amazon_scroller_right_arrow"></li>
									</ul>
								<div style="clear: both"></div>
								</div>
							</div>
				    </div>
				    <div class="large-3 medium-2 columns" >
				    	<div style="display:none" id="kart_itemdisplay_container">  
				   	 	</div>
				    </div>
				     <div class="large-2 medium-2 columns" >
				     	<div style="display:none"  id="kart_booking"> 
							<a href="#"  class="button tiny radius" onClick="javascript:callBooking();">Book</a>
						</div>	
				    </div>
				<hr/></br>
	    	</section>
	    			<!-- Selection Bar End-->
	                <!-- Locate Bar-->
	    <section>	
	    			<div class="row"><div data-alert class="alert-box alert round" id="locationAlert" style="display:none" >Please choose location for getting quote. <a href="" class="close">&times;</a> </div></div>
	    			<div class="large-4 medium-3 columns">		
								<a href="javascript:openLocation();" >My Location</a>
					</div>
					<div class="large-3 columns" id="PreferredLocationText" <?php if(!empty($isLocationSet)){  if($isLocationSet=='true') {?> style="display:block"  <?php } }else{?> style="display:none"  <?php }?> > 		
							<div  class="medium-6 columns" ><?php if (!empty($isLocationSet)){  if($isLocationSet=='true') { echo $locationText;  ?></div><div  class="medium-6 columns" ><a href='#' id='select' class='button tiny radius' onClick='javascript:changePreference();'>Change</a></div><?php } }   else { ?>&nbsp;</div><?php }?>
					</div>
					</div>
					<div class="large-6 medium-5 columns" id="locateTable" style="display:none">
						<div>
									<div class="medium-5 small-5 columns">				
					                 	<input type="search" id="LocateProvider" value="Please enter area, city or pincode" />
					                 	<input type="hidden" id="LocationId"/>
					                 </div>
					                 <div class="medium-2 small-3 columns">
					 					<a href="#" class="button tiny radius" onclick="javascript:getProviderResults();">find</a>
					 				 </div>
					 				  <div class="medium-1 small-1 columns">
					 					&nbsp;
					 				 </div>
 					  	</div>
					</div>
					<br/>
					<div class="large-2 medium-4 columns">
							&nbsp;
					</div>
					<div class="large-8 medium-10 columns" id="preferenceTable" style="display:none">
							<div >
									<div class="medium-4 small-5 columns">				
					                 Do you want to save the location as your preferred location ?
					                </div>
					                <div class="medium-4 small-3 columns">
					 				 <a href="#" class="button tiny radius" onclick="javascript:submitYes();">Yes</a>
					 				 <a href="#" class="button tiny radius" onclick="javascript:submitNo();">No</a>
					 				</div>
					 				<div class="medium-2 small-2 columns">
					 				 &nbsp;
					 				</div>
 					  		</div>
 					  		<div id="NoResultsTable" style="display:none">
									<div class="medium-4 small-5 columns">				
					                	Sorry, No Results found. <a href="#" class="button tiny radius" onclick="javascript:submitNo();">close</a>
					                </div>
					                <div class="medium-4 small-3 columns">
					 				 &nbsp
					 				</div>
					 				<div class="medium-2 small-2 columns">
					 				 &nbsp;
					 				</div>
 					  		</div>
					</div>
					</div>
					<hr/>
	    </section>
	    			<!-- Locate Bar End-->
					<!-- Quote Bar -->
			<section>
					</br>
					<div class="row"><div data-alert class="alert-box alert round" id="quoteAlert" style="display:none" >Please log-in to view or submit quote. <a href="" class="close">&times;</a> </div></div>
		         	<div class="row"><div data-alert class="alert-box success radius" id="quoteSubmitAlert" style="display:none" >Your cart is submitted and request for quote is under process. <a href="" class="close">&times;</a> </div></div>
		            <div class="large-4 medium-2 columns">
							<a href="javascript:openQuotes();" id="quotesID">My Quotes</a>
					</div>
					<div class="large-8 medium-10 columns" >
						<div id="quoteTable" style="display:none">
								
						</div>
				    </div>
				<hr/></br>
	    	</section>
					<!-- Quote Bar End -->
	    
        <!-- Top Sections End -->         
       
       <!-- Mid Section -->
 
 		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
 
        <!-- Mid Section End-->
 
      <!-- Footer -->
 
 
 	<footer>
 	<hr/>
        <div class="xxlarge-12 columns">
        	<div class="medifooter">
            <div class="row">
              <div class="large-6 columns">
                  <p>&copy; 2014 eMediplus</p>
              </div>
 
              <div class="large-6 columns">
                  <ul class="inline-list right">
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">How it Works</a></li>
                    <li><a href="#">Link 4</a></li>
                  </ul>
              </div>
 			</div>
            </div>
        </div>
      </footer>
      <!-- End Footer -->

  
    
      
	<script>
      $(document).foundation();
      	var doc = document.documentElement;
      	doc.setAttribute('data-useragent', navigator.userAgent);
      
      	var input = document.getElementById('LocateProvider');
		input.onfocus = function() {
		input.value = '';
		}
	
    </script>
    
    
    <script type='text/javascript'>
    
    $('#search').submit(function(event) {
    var $nSearch = $('#searchWord').val();
    
    var $url = '<?php echo $this->Html->url(array('controller'=>'search', 'action'=>'search'))?>'+'/'+$nSearch;
    
    event.preventDefault(); // interrupt form submission
	$.getJSON($url, function(data){
      	console.log("Starting.");
      	$("#searchTerm").text(data.message);
      	$('#ResultsTable').attr("style","display:block");
      	console.log("done.");
		});
	});

	</script>
	
	<script type="text/javascript">
    $(document).ready(function () {

    	var $nSearch = $('#searchWord').val();
    	
        var options, a;
        var $url = '<?php echo $this->Html->url(array('controller'=>'search', 'action'=>'searchAutoComplete'))?>'+$nSearch;
        jQuery(function() {
            options = { 
                source: $url,
                dataType: "json",
                minChars: 4,
                select: function( event, ui ) {
						$( "#searchWord").val(ui.item.label);
						$( "#searchID").val(ui.item.searchID);
							return false;
					},
				 focus: function( event, ui ) {
					$( "#searchWord" ).val( ui.item.label );
						return false;
					}
            };
            
            a = $('#searchWord').autocomplete(options);
        });
        
        
        var $nSearch = $('#LocateProvider').val();
    	
        var options, a1;
        var $url_locate = '<?php echo $this->Html->url(array('controller'=>'LocateProvider', 'action'=>'getAreaName'))?>'+"/"+$nSearch;
        jQuery(function() {
            options = { 
                source: $url_locate,
                dataType: "json",
                minChars: 4,
                   select: function( event, ui ) {
						$( "#LocateProvider").val(ui.item.label);
						$( "#LocationId").val(ui.item.locationID);
							return false;
					},
				 focus: function( event, ui ) {
					$( "#LocateProvider" ).val( ui.item.label );
						return false;
					}
            };
            
            a1 = $('#LocateProvider').autocomplete(options);
        });
        
		
    });
    
    var curr = 6;
    $(document).on('click', "#loadMore", function (event) {
    		event.preventDefault();
		 $('#ProviderContainer tr').eq(++curr).show();
    });
   
    $(document).on('click', "#showLess", function (event) {
    		event.preventDefault();
		  $('#ProviderContainer tr').eq(++curr).hide();
    }); 
    
    
    function callModal(){
		$('a.reveal-link').trigger('click');
		$('a.close-reveal-modal').trigger('click');
    }
    
    function callLoginModal(){
		$('a.reveal-link').trigger('click');
		$('a.close-reveal-modal').trigger('click');    
    }
    
    function callRegisterModal(){
    	$('a.reveal-link').trigger('click');
		$('a.close-reveal-modal').trigger('click');
    }
    
    function openCart(){
    	$("#karttwistie_container").toggle();
    	initialzeKT();    	
    	$url = '<?php echo $this->Html->url(array('controller'=>'Booking', 'action'=>'getCookie'))?>';
    	$.getJSON($url, function(data){
					if(data.data === "No Data"){
						$("#kart_booking").hide();
					}else{
	    	    		$.each(data, function(index, valueInner) {
	    	    				var indexCount = index+1;
	    	    				var selector = "#karttwistie > div > ul > li:nth-child("+indexCount+")";
	    	    				$(selector).html("<a href='#' onclick='openSelectedItem("+"&apos;"+valueInner.prodid+"&apos;,&apos;"+valueInner.prodname+"&apos;,&apos;"+valueInner.prodCategory+"&apos;);'"+"><img src='' />"+valueInner.prodname+"</a>");
	    	    			
						});
						$("#kart_booking").show();
					}

    	});
	   	$("#kart_itemdisplay_container").hide();
    }
    
    
    function openLocation(){
        	$url = '<?php echo $this->Html->url(array('controller'=>'Booking', 'action'=>'getLocationCookie'))?>';
    			$.getJSON($url, function(data){
						if(data.data === "No Data"){
							console.log(data.data);
							$("#preferenceTable").hide();
        					$("#locateTable").show();							
        				}else{
							console.log(data);

        					$("#PreferredLocationText").show();			
						}
					});
    }
    
    
    function openQuotes(){

    	$url = '<?php echo $this->Html->url(array('controller'=>'Booking', 'action'=>'getQuotData'))?>';
    	
    	$url_quote = '<?php echo $this->Html->url(array('controller'=>'QuoteManagementAPI', 'action'=>'retrieveLastQuotes'))?>';
    	
    	$.getJSON($url, function(data){
						if(data === "NOTAUTHENTICATED"){
							$("#quoteAlert").show();	
        				}else{
        					$.getJSON($url_quote, function(data){
        						$htmlStr ="<div>Your Last quotes submitted are :</div>";
	        					$.each(data, function(index, valueInner) { $htmlStr= $htmlStr+"</br><div>"+$.datepicker.formatDate('MM dd, yy',new Date(valueInner.Quotes.submitted))+"</div>";});
    	    					 $("#quoteTable").html($htmlStr);
        					 });
        					$("#quoteTable").toggle();
						}
					});
    }
    
    
    function getProviderResults(){
    		var nSearch = $('#LocateProvider').val();
    		var length = nSearch.length;
			var $url = '<?php echo $this->Html->url(array('controller'=>'locateProvider', 'action'=>'getProviderNearArea'))?>'+'/'+nSearch;
    
				
				
			if(nSearch!=null){
				var size = 0; 		
    			if(length>0){
    			$.getJSON($url, function(data){
      				console.log("Starting.");

					$.each(data, function(index, value) {
						$("#ProviderContainer").append("<tr><td id='ProviderName'>"+value.Providers.provider_name+"</td><td id='ProviderAddress'>"+value.Providers.address+"</td><td><a href='#' id='select' class='button tiny radius' onClick='javascript:callSelectProvider('');'>Set Preferred</a></td></tr>");
						size = size +1;
					});
				
					$("#ProviderContainer").append("<tr><td>&nbsp;</td><td><a href='#' id='loadMore' class='button expand radius' >show more</a></td><td>&nbsp;</td></tr>");
				
					size_li = $("#ProviderContainer tr").size();
				
					$('#ProviderContainer tr').hide().slice(0, 5).show();
					$('#ProviderContainer tr:last-child').show();
	      			
	      			console.log("done.");
	      			console.log(size);
	      			
	    			if(size===0){
	    				console.log("No results for Location");
	    				$("#NoResultsTable").attr("style","display:block");
	    			}
	    			if(size >0){
	    			    $("#PharmaTable").attr("style","display:block");
						$("#ResultsTable").attr("style","display:block");
						$("a[href='#PharmaTableContainer']").click();
	    				$("#preferenceTable").attr("style","display:block");
	    			}
	      			
				});
    			}
    		}	
    	}
    
    function submitYes(){
    	var locationText = $('#LocateProvider').val();
    	var locationID = $('#LocationId').val();
		var $url = '<?php echo $this->Html->url(array('controller'=>'locateProvider', 'action'=>'setPreferredLocation'))?>'+'/'+locationText+'/'+locationID;
		$.getJSON($url, function(data){
			console.log("cookie value set for location");
		});
    	$("#preferenceTable").hide();
    	$("#PreferredLocationText").show();
    	$("#PreferredLocationText").html("<div class='medium-5 columns'>"+locationText+"</div><div class='medium-1 columns'><a href='#' id='select' class='button tiny radius' onClick='javascript:changePreference();'>Change</a></div>");
    	$("#locateTable").hide();
    	$("#locationAlert").hide();
    }
    
    function submitNo(){
    	$("#preferenceTable").hide();
    	$("#NoResultsTable").hide();
    }
   	
   	function changePreference(){
   		$("#locateTable").show();
   		$("#PreferredLocationText").hide();
   		$("#PreferredLocationText").hide();
   	}
   	
   	
   	function callBook(id,category,qty){
 			// Get AJAX call
 			
 			
 		var $url = '<?php echo $this->Html->url(array('controller'=>'Booking', 'action'=>'addToBucket'))?>'+'/'+id+'/'+category+'/'+qty;
		$.getJSON($url, function(data){
      			console.log("done.");
      			var quote= "#"+"quote-"+id;
      			$(quote).text('Chosen');
      			$(quote).attr("class","button tiny radius disabled");
      			$("#book").attr("style","display:block");
 			});

    
		var $url_count = '<?php echo $this->Html->url(array('controller'=>'Search', 'action'=>'getSelectedItemsCount'))?>';
		$.getJSON($url_count, function(data){
				$.each(data, function(index, value) {
				    var sel = $("#bucketID").text();
					var count = increaseSelectionCount(sel);
      			 	$("#bucketID").text('My Selection ('+count+')');
				});
 			});
    		
    	}    	
    	
    	function increaseSelectionCount(selection){
    	    var openBracket = selection.indexOf('(');
      		var closeBracket = selection.indexOf(')');
      		var selectCount = parseInt(selection.substring(openBracket+1,closeBracket));
      		var newCount = selectCount+1;
      		return newCount;
    	}
    	
    function callBooking(){

    	$url = '<?php echo $this->Html->url(array('controller'=>'Booking', 'action'=>'getLocationAuthenticateCookie'))?>';
    	$url_cart_quote = '<?php echo $this->Html->url(array('controller'=>'QuoteManagementAPI', 'action'=>'callCartAndQuoteSubmit'))?>';
    			$.getJSON($url, function(data){
						if(data.location === "No Data"){
							openLocation();
							$("#locationAlert").show();
        				}else{
        					if(data.authenticated === "NOTAUTHENTICATED"){
								openQuotes();
							}else
							{
							$.post($url_cart_quote, function(data){
								if(data === "SUCCESS"){
									callRemoveCart();
								}
							});
							
							}
						}
					});					
    }
    
    function callRemoveCart(){
        	$url = '<?php echo $this->Html->url(array('controller'=>'Booking', 'action'=>'removeBucketCookie'))?>';
    		$.getJSON($url, function(data){ 
    			if(data === "SUCCESS"){
    								  $("#kart_booking").hide();
									  $("#bucketID").text('My Selection (0)');
	    	    					  $("#karttwistie").html("<div class=\"amazon_scroller_mask\"><ul><li><div class=\"blankSelection\"></div></li><li><div class=\"blankSelection\"></div></li><li><div class=\"blankSelection\"></div></li><li><div class=\"blankSelection\"></div></li></ul></div><ul class=\"amazon_scroller_nav\"><li class=\"amazon_scroller_left_arrow\"></li><li class=\"amazon_scroller_right_arrow\"></li></ul><div style=\"clear: both\"></div>");
	    	    					  initialzeKT();
								 	  $("#quoteSubmitAlert").show();
									  }
    		});
    }
   	
   	function initialzeKT(){
   		$("#karttwistie").amazon_scroller({
                    scroller_title_show: 'disable',
                    scroller_time_interval: '3000',
                    scroller_window_background_color: "none",
                    scroller_window_padding: '10',
                    scroller_border_size: '0',
                    scroller_border_color: '#CCC',
                    scroller_images_width: '100',
                    scroller_images_height: '80',
                    scroller_title_size: '12',
                    scroller_title_color: 'black',
                    scroller_show_count: '6',
                    directory: 'img'
                });
   	}
   	
	function openSelectedItem(id, desc,category){
				
    			var $url = '<?php echo $this->Html->url(array('controller'=>'Search', 'action'=>'getItemDetailsBasedonIDCategory'))?>'+'/'+id+'/'+category;
    			var quantity,unit_measurement,packaging_type,composition,generic;

    			$.getJSON($url, function(data){
    				if (category==1){
    				quantity =data[0].medicines_header.quantity;
 					unit_measurement = data[0].medicines_header.unit_measurement;
 					packaging_type = data[0].medicines_header.packaging_type;
 					composition = data[0].medicines_header.composition;
 					generic = data[0].medicines_header.generic;
 					//TODO add delete item button.
	   				$("#kart_itemdisplay_container").html("<div>"+desc+"</div><div>Generic :"+generic+"</div><div>Composition:"+composition+"</div>");
	   				}
	   				
	   				if (category==2){
 					prddesc = data[0].product_header.prod_desc;
 					company = data[0].product_header.prod_company;
 					//TODO add delete item button.
	   				$("#kart_itemdisplay_container").html("<div>"+desc+"</div><div>Product Detail :"+prddesc+"</div><div>Company:"+company+"</div>");
	   				}    			
    			});

	   		$("#kart_itemdisplay_container").show();
	}

</script>
  </body>
</html>

	
