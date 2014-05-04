        <section role="main" >
        
	     <div class="row"><div data-alert class="alert-box alert round" id="authenticationAlert" <?php if(!empty($isAuthenticated)){  if($isAuthenticated=='true') {?> style="display:none"  <?php } }else{?> style="display:block"  <?php }?>  >Please login to view Notification.</div></div>
         	 <?php if(!empty($isAuthenticated)){  if($isAuthenticated=='true') {?> 

          <div class="row">
            <div class="large-12 columns">
              <div class="hide-for-small">
              <div class="sidebar">
 			  <div class="row">
 			  <div class="large-3 columns">
 			  	<div class="radius panel">
				  <nav>
				  
				    <ul class="side-nav" id="leftNavID">
				    	<?php
				    		$count = count($leftNav);
				    		for($i=0;$i<$count;$i++){
				    		?>
				  			<li><a href="javascript:getNotification('<?php echo $leftNav[$i]['Carts']['id']; ?>');"> Cart #<?php echo $leftNav[$i]['Carts']['id']; ?></a></li>
				    		<?php
				    		}
				    	?>
						<li></li>
				    </ul>
				  </nav>
				  </div>
				</div>
				 <div class="large-9 columns">
					 <div class="radius panel" id="rhdPanel">
				  		
				  </div>
				</div>
			  </div>
			</div>
		</div>
       </div>
      </div>
      		<?php } }?>
      </section>
  
  <script type='text/javascript'>
  function getNotification(cartID){
			var $url = '<?php echo $this->Html->url(array('controller'=>'notification', 'action'=>'getNotificationForQuote'))?>'+'/'+cartID;
			$.getJSON($url, function(data){
				console.log(data[0]['notification']['Notifications']['comments']);
				console.log(data[0]['notification']['Notifications']['initiated_time']);
				$("#rhdPanel").append(data[0]['notification']['Notifications']['comments']);
				$("#rhdPanel").append(data[0]['notification']['Notifications']['initiated_time']);
			});
  }
  </script>
  