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

$cakeDescription = __d('cake_dev', 'eMediplus- Healthcare IT Solutions');
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
              <h1><a href="<?php echo Configure::read('dashboard'); ?>">Top Bar Title</a></h1>
            </li>

            <li class="toggle-topbar menu-icon">
              <a href="#"><span>menu</span></a>
            </li>
          </ul>

          <section class="top-bar-section">
            <!-- Right Nav Section -->

            <ul class="right">
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
								<div class="step"><a href="#">Get Quote</a></div>
						</div>
					</div>
       		</section>
       	
			<section>
					</br>
					</br>
		            <div class="large-4 medium-2 columns">
							<a href="javascript:openCart();" id="bucketID">My Selection (<?php echo $selectedCount ?>)</a>
					</div>
					<div class="large-8 medium-10 columns" >
			          		<div style="display:none" id="karttwistie_container">              
		    	          		<div class="amazon_scroller" id="karttwistie">
									<div class="amazon_scroller_mask">
									<ul>
									<li><div class="blankSelection"></div></li>
									<li><div class="blankSelection"></div></li>
									<li><div class="blankSelection"></div></li>
									</ul>
									</div>
									<ul class="amazon_scroller_nav">
										<li></li>
										<li></li>
									</ul>
								<div style="clear: both"></div>
								</div>
							</div>
				    </div>
				<hr/></br>
	    	</section>
	    			<!-- Selection Bar End-->
	                <!-- Locate Bar-->
	    <section>	
	    			<div class="large-4 medium-2 columns">
							<a href="javascript:openLocation();" >My Location</a>
					</div>
					<div class="large-8 medium-10 columns">
						<div id="locateTable" style="display:none">
									<div class="large-4 medium-5 columns">				
					                 <input type="search" id="LocateProvider" value="Please enter area, city or pincode" />
					                 </div>
					                 <div class="large-4 medium-5 columns">
					 				 <a href="#" class="button radius" onclick="javascript:getProviderResults();">find</a>
					 				 </div>
 					  	</div>
					</div>
					<hr/>
	    </section>
	    			<!-- Locate Bar End-->
					<!-- Quote Bar -->
			<section>
					</br>
		            <div class="large-4 medium-2 columns">
							<a href="javascript:openQuotes();" id="bucketID">My Quotes</a>
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
​​​​​​​​​​​​​​​​​​​​​​​​
      <!-- End Footer -->

  
    
      
	<script>
      $(document).foundation();
      var doc = document.documentElement;
      doc.setAttribute('data-useragent', navigator.userAgent);
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
    });
    
    
      $(function() {
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
                    scroller_show_count: '2',
                    directory: 'img'
                });
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

    	$("#karttwistie").amazon_scroller({
                    scroller_title_show: 'disable',
                    scroller_time_interval: '300000',
                    scroller_window_background_color: "none",
                    scroller_window_padding: '0',
                    scroller_border_size: '0',
                    scroller_border_color: '#CCC',
                    scroller_images_width: '100',
                    scroller_images_height: '80',
                    scroller_title_size: '12',
                    scroller_title_color: 'black',
                    scroller_show_count: '2',
                    directory: 'img'
                });
    	
    }
    
    function openLocation(){
        	$("#locateTable").toggle();
    }
    
    function openQuotes(){
    	$("#quoteTable").toggle();
    }	
    function getProviderResults(){
    		var nSearch = $('#LocateProvider').val();
    		var length = nSearch.length;
			var $url = '<?php echo $this->Html->url(array('controller'=>'locateProvider', 'action'=>'getProviderNearArea'))?>'+'/'+nSearch;
    
    	
				
				
				
			if(nSearch!=null){
    			if(length>0){
    			$.getJSON($url, function(data){
      			console.log("Starting.");
      			$("#PharmaTable").attr("style","display:block");
    			$("#locateResultTable").attr("style","display:none");
    			$("#Filter").attr("style","display:none");
				$("#quote").attr("style","display:none");
				$("#ResultsTable").attr("style","display:block");
				
				$("a[href='#PharmaTableContainer']").click();
				
				
				$.each(data, function(index, value) {
				    $("#ProviderName").text(value.Providers.provider_name);
				    $("#ProviderAddress").text(value.Providers.address);
				});
      			console.log("done.");
				});
    			}
    		}	
    	}
</script>
  </body>
</html>

	
