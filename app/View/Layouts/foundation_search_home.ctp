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

<div class="row">
  <div class="large-12 columns">
    <!-- Navigation -->

    <div class="row">
      <div class="large-12 columns">
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
        </nav><!-- End Top Bar -->
      </div>
    </div><!-- End Navigation -->
    
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
	?>
	
	
	 <div class="row">
     <div class="large-12 columns">
 
       <!-- Top Gap -->
         <div class="row" >
	        <div class="large-12 columns">
	          <div class="panel">
              	<ul class="small-block-grid-1" id="searchTerm" >
              	</ul>
              <!-- Kart -->
              	<ul class="small-block-grid-1" id="bucketID">
						<a href="javascript:openCart();" >My Selection</a>
              	</ul>
	          <div class="large-6 columns" style="display:none" id="karttwistie_container">              
              	<div class="amazon_scroller" id="karttwistie">
					<div class="amazon_scroller_mask">
						<ul>
						<li><a href="link1" title="title1"><img src="images/scroller_large_1.jpg" width="60" height="60" alt="title"/></a></li>
						<li><a href="link2" title="title2"><img src="images/scroller_large_2.jpg" width="60" height="60" alt="title"/></a></li>
						<li><a href="link3" title="title3"><img src="images/scroller_large_3.jpg" width="60" height="60" alt="title"/></a></li>
						</ul>
					</div>
						<ul class="amazon_scroller_nav">
								<li></li>
								<li></li>
						</ul>
					<div style="clear: both"></div>
				</div>
			</div>
			<div class="large-6 columns" id="locateTable" style="display:none">
		 					<form id="locateP">
					                <div class="large-4 columns">
					                 <input type="search" id="LocateProvider" value="Please enter area, city or pincode" />
					                </div>
					                <div class="large-2 columns">
					 				 <a href="#" class="postfix button radius" onclick="javascript:getProviderResults();">find</a>
					                </div>
		            		</form>
 			</div>
          </div>
            
            <!-- Locate Bar-->
            
 			<div class="row" id="Filter"   style="display:none">
		 		<form id="MyLocation">
					              <div class="row">
					              
					                <div class="large-1 columns">
					               	 &nbsp;
					                </div>
					                <div class="large-4 columns">
					               	 <a href="#"  class="button radius" onClick="javascript:showlocation();">Filter based on My Location</a>
					                </div>
					                <div class="large-5 columns">
					 		  		&nbsp;
					                </div>
					  				<div class="large-2 columns">
					  				&nbsp;
					                </div>
					 
					              </div>		 
		            		</form>
 			</div>
 			<div class="row" id="locateResultTable"  style="display:none" >
 					<table class="responsive">
					  <thead>
					    <tr>
					      <th>Provider Name</th>
					      <th>Provider Address</th>
					      <th></th>
					    </tr>
					  </thead>
					  <tbody>
						<tr>
					      <td id="ProviderName"></td>
					      <td id="ProviderAddress"></td>
					      <td>
						  <a href="#" id="select" class="button tiny radius" onClick="javascript:callSelectProvider('');">Add </a>
					      <a href="#" id="Remove" class="button tiny radius" onClick="javascript:callRemoveProvider('');">Remove</a>
					      </td>
					    </tr>
					  </tbody>
					</table>
 			</div>
 			<div class="row" id="quote"   style="display:none">
		 		<form id="locateP">
					              <div class="row">
					              
					                <div class="large-8 columns">
					               	 &nbsp;
					                </div>
					                <div class="large-2 columns">
					 		  			<a href="#" class="postfix button radius" onclick="javascript:getQuote();">Get Quote</a>
					                </div>
					  				<div class="large-2 columns">
					  				&nbsp;
					                </div>
					 
					              </div>		 
		            		</form>
 			</div>

	        </div>
         </div>
        <!-- Top Gap End -->         
       
       <!-- End Top Gap -->
 
 		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
 
 
      <!-- Footer -->
 
        <footer class="row">
        <div class="large-12 columns"><hr />
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
      </footer>
 
      <!-- End Footer -->
 

	<div id="myModalLogin" class="reveal-modal" data-reveal></div>
    </div>
    
	<div id="myModalRegister" class="reveal-modal" data-reveal></div>
    </div>

	<div id="myModalPostReq" class="reveal-modal" data-reveal></div>
    </div>

  </div>
    
      
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
    	$("#locateTable").toggle();
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
    	
    }
    
</script>
  </body>
</html>

	
