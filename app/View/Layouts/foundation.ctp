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
		echo $this->Html->css('foundation.min');
		echo $this->Html->css('normalize');
		echo $this->Html->script('modernizr');
				
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php
		echo $this->Html->script('/js/vendor/jquery');
		echo $this->Html->script('/js/vendor/fastclick.js');
		echo $this->Html->script('/js/foundation.min.js');		
		echo $this->Html->script('/js/foundation/foundation.js');
		echo $this->Html->script('/js/foundation/foundation.topbar.js');
	?>	

  
 <script>
    $(document).foundation();
  </script>
  
	<div id="container">
		<div id="content">
		<nav class="top-bar" data-topbar data-options="is_hover: false">
 			<ul class="title-area">
    			<li class="name">
      			<h1><a href="<?php echo $dashboard; ?>">eMediplus</a></h1>
    			</li>
    			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  			</ul>

  		<section class="top-bar-section">
    	<!-- Right Nav Section -->
    		<ul class="right">
      		<li class="active"><a href="#">Right Nav Button Active</a></li>
      			<li class="has-dropdown">
		        <a href="#">Right Button with Dropdown</a>
        		<ul class="dropdown">
          		<li><a href="#">First link in dropdown</a></li>
        	</ul>
      	</li>
    	</ul>
	<div class ="large-9 medium-8 columns">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
	<div id="footer">
	</div>
	</div>
	</div>
</body>
</html>