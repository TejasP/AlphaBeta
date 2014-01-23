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
	

		echo $this->Html->css('foundation');
		echo $this->Html->css('jquery-ui-1.10.4.custom');

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
              <h1><a href="#">Top Bar Title</a></h1>
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
                <a href="#" class="button">Browse Catalog</a>
              </li>
              
       

              <li class="divider"></li>

              <li class="gs">
                <a href="<?php echo $this->Html->url(array('controller'=>'Postrequirements', 'action'=>'add'))?>"class="button">Post your requirement</a>
              </li>

              <li class="divider"></li>

              <li class="has-dropdown">
                <a href="#">Account</a>

                <ul class="dropdown">
                  <li>
                    <a href="<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'login'))?>">Login</a>
                  </li>
                  <li>
                    <a href="<?php echo $this->Html->url(array('controller'=>'registration', 'action'=>'index'))?>">Register</a>
                  </li>

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
	
		
	?>
	
	
	 <div class="row">
     <div class="large-12 columns">
 
       <!-- Top Gap -->
         <div class="row" >
	        <div class="large-12 columns">
	          <div class="panel">
              <ul class="small-block-grid-1" id="searchTerm" >
              
              </ul>
            </div>
	        </div>
         </div>
       
       <!-- End Top Gap -->
 
 
      <!-- Search Bar -->
 
        <div class="row">
 
          <div class="large-12 columns">
            <div class="radius panel">
 
            <form id="search">
              <div class="row collapse">
 
 				<div class="large-3 small-3 columns">
                &nbsp;
                </div>
                
                <div class="large-4 small-4 columns">
                 <input type="text" id="searchWord" />
                </div>
 
                <div class="large-2 small-2 columns">
                 <?php echo $this->Html->link('Search','/search?showResults=1',array('class' => 'postfix button expand')); ?>
                </div>
                
  				<div class="large-3 small-3 columns">
                &nbsp;
                </div>
 
              </div>
            </form>

 					<div class="row" id="ResultsTable"  <?php if (!empty($showTable)){ if($showTable == 'true'){ ?>  style="display:block" <?php }}?>  style="display:none" >
 					<table>
					  <thead>
					    <tr>
					      <th width="200">Table Header</th>
					      <th>Item 	Description</th>
					      <th width="150">Price</th>
					      <th width="150"></th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td>Content Goes Here</td>
					      <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
					      <td>Content Goes Here</td>
					      <td><a href="#" class="button tiny radius">Book</a></td>
					    </tr>
					    <tr>
					      <td>Content Goes Here</td>
					      <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
					      <td>Content Goes Here</td>
					      <td><a href="#" class="button tiny radius">Book</a></td>
					    </tr>
					    <tr>
					      <td>Content Goes Here</td>
					      <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
					      <td>Content Goes Here</td>
					      <td><a href="#" class="button tiny radius">Book</a></td>
					    </tr>
					  </tbody>
					</table>
 					</div>
          </div>
          </div>
 
        </div>
 
      <!-- End Search Bar -->
 

 
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
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                  </ul>
              </div>
 
            </div>
        </div>
      </footer>
 
      <!-- End Footer -->
 
 
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
        var options, a;
        var $url = '<?php echo $this->Html->url(array('controller'=>'search', 'action'=>'searchAutoComplete'))?>'+'/'+"term";
        
        jQuery(function() {
            options = { 
                source: $url,
                minChars: 2,
            };
            
            a = $('#searchWord').autocomplete(options);
        });
    });
</script>

  </body>
</html>

	