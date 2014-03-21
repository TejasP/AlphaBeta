<div class="users form">

</div>

<div class="row">&nbsp;
</div> 			
<div class="row">
 
          <div class="large-12 columns">
          	<div class="large-4 columns">
          	&nbsp;
          	</div>
          	
	        <div class="large-4 columns">
	        	<div class="radius panel">
	        	<?php echo $this->Session->flash('auth'); ?>
	        	
	        	<fieldset>
	        	<form action="<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'login'))?>" id="UserLoginForm" method="post" accept-charset="utf-8">
	        	<input name="data[User][email]" type="email" id="UserEmail" placeholder="E-mail" required="required">
	        	<input name="data[User][password]" type="password" placeholder="Password" id="UserPassword" required="required">
	        	<a class="radius small button" id="link-id" href="javascript:formSubmit();">login</a>
	        	</form>
				<?php echo $this->Html->link(__('Forgot Password ?'), array('controller'=>'registration','action' => 'resetRender')); ?>
	        	</fieldset>

	        	</div>
	        </div>
 			 
 			 <div class="large-4 columns">
 			  &nbsp;
          	</div>
          	
 			</div>
</div>
<script type='text/javascript'>
	$('#link-id').click(function(){
	  $('#UserLoginForm').submit();
	});
</script>