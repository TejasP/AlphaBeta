        <section role="main" >
        

          <div class="row">
            <div class="large-12 columns">
              <div class="hide-for-small">
              <div class="sidebar">
 			  <div class="row">
 			  <div class="large-3 columns">
 			  	<div class="radius panel">
				  <nav>
				    <ul class="side-nav">
				     
				   		<?php 
						$data = $json;
						foreach ($data as $key => $value)
						{
							if($value ==='Heading'){
							?>
							<li class="heading"><?php echo $key ?></li>						
							<?php
							}
							else if($value ==='divider'){
							?>
							<li class="divider"></li>						
							<?php 	
							}else{
							?>
							<li><a href="<?php echo $value ?>"><?php echo $key ?></a></li>
							<?php
							}
						}
						?>
				
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
      </section> 