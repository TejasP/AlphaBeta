        <section role="main" >
          <div class="row">
            <div class="large-12 columns">
            
            

			<!-- Row starting -->
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
					  <div class="subheader">
				  			Your Purchases  Pending reivew : 
				  	  </div>
				  	  <table class="responsive">
					    <tr>
					      <th></th>
					      <th>Item 	Description</th>
					      <th>Price</th>
					      <th></th>
					    </tr>
					    <tr>
					      <td>Some Content </td>
					      <td>Some COntent 1 </td>
					      <td>Some COntent 2</td>
					      <td>Some COntent 3</td>
					   </tr>
					  </table>
				      </div>
				</div>
			  </div>

       </div>
      </div>
</section> 