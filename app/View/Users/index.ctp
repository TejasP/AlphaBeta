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
					  	<?php foreach ($users as $user): ?>
					  	<table class="responsive">
					  	<tr>
					  		<td><?php  echo ($user['User']['username']); ?>&nbsp;</td>
							<td class="actions">
								<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
								<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
							</td>
						 </tr>
						 </table>
						<?php endforeach; ?>
				  </div>
				</div>
			  </div>
			</div>
		</div>
       </div>
      </div>
      </section>	