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
						<li></li>
				    </ul>
				  </nav>
				  </div>
				</div>
				 <div class="large-9 columns">
					 <div class="radius panel">
				  
				  </div>
				</div>
			  </div>
			</div>
		</div>
       </div>
      </div>
      		<?php } }?>
      </section>
      