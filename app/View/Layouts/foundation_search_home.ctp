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
                <a href="browsecatalog" class="button">Browse Catalog</a>
              </li>
              
       

              <li class="divider"></li>

              <li class="gs">
                <a data-reveal-id="myModalPostReq" id="aPostID" class="button" href="<?php echo $this->Html->url(array('controller'=>'Postrequirements', 'action'=>'add'))?>" data-reveal-ajax="true" onclick="javascript:callModal();">
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
                    <a data-reveal-id="myModalLogin" id="aLoginID" href="<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'login'))?>" data-reveal-ajax="true" onclick="javascript:callLoginModal();">Login</a>
                  </li>
                  <li>
                    <a data-reveal-id="myModalRegister" id="aRegisterID" href="<?php echo $this->Html->url(array('controller'=>'registration', 'action'=>'register'))?>" data-reveal-ajax="true" onclick="javascript:callRegisterModal();">Register</a>
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
		
	?>
	
	
	 <div class="row">
     <div class="large-12 columns">
 
       <!-- Top Gap -->
         <div class="row" >
	        <div class="large-12 columns">
	          <div class="panel">
              <ul class="small-block-grid-1" id="searchTerm" >
              </ul>
              <ul class="small-block-grid-1" id="bucketID" <?php if($isBucketFilled==='true'){ ?> style="display:block" <?php }?> style="display:none">
					<a href="<?php echo $this->Html->url(array('controller'=>'search', 'action'=>'showBucket'))?>">Bucket</a>
              </ul>
            </div>
	        </div>
         </div>
         
       
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
    
</script>
  </body>
</html>

	
