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
				  		<div class="organizations form">
							<?php echo $this->Form->create('Organization'); ?>
								<fieldset>
									<legend><?php echo __('Add Organization'); ?></legend>
								<?php
									echo $this->Form->input('orig_name');
									echo $this->Form->input('key_person');
									echo $this->Form->input('email');
									echo $this->Form->input('address');
									echo $this->Form->input('pin_code');
									echo $this->Form->input('created_by');
									echo $this->Form->input('created_when');
									echo $this->Form->input('updated_by');
									echo $this->Form->input('updated_when');
								?>
								</fieldset>
							<?php echo $this->Form->end(__('Submit')); ?>
							</div>
							<div class="actions">
								<h3><?php echo __('Actions'); ?></h3>
								<ul>
							
									<li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?></li>
								</ul>
							</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
       </div>
      </div>
      </section> 