<div class="users form">

</div>

<div class="row">&nbsp;
</div>
<div class="row"><div data-alert class="alert-box success radius" id="SuccessAlert" style="display:none">Password Reset Successful , Please check your e-mail. <a href="" class="close">&times;</a> </div></div>

<div class="row"><div data-alert class="alert-box alert round" id="ResetAlert" style="display:none">Password Reset Unsuccessful , Please correct your username/e-mail. <a href="" class="close">&times;</a> </div></div>

<div class="row">
 
          <div class="large-12 columns">
          	<div class="large-4 columns">
          	&nbsp;
          	</div>
          	
	        <div class="large-4 columns">
	        	<div class="radius panel">
	        	<?php echo $this->Session->flash('auth'); ?>
	        	
	        	<fieldset>
	        	<form action="<?php echo $this->Html->url(array('controller'=>'registration', 'action'=>'resetPassword'))?>" id="UserResetForm" method="post" accept-charset="utf-8">
	        	<input name="data[User][email]" type="email" id="UserEmail" placeholder="E-mail" required="required">
	        	<a class="radius small button" id="link-id" href="javascript:callReset();">Reset</a>
	        	</form>
	        	</fieldset>

	        	</div>
	        </div>
 			 
 			 <div class="large-4 columns">
 			  &nbsp;
          	</div>
          	
 			</div>
</div>
<script type='text/javascript'>
	function callReset(){

				var  v = $('#UserEmail').val();
    		   $url_reset = '<?php echo $this->Html->url(array('controller'=>'Registration', 'action'=>'resetPassword'))?>'+'/'+v;
				$.getJSON($url_reset, function(data){
				 	$("#SuccessAlert").attr("style","display:block");
					//console.log(data);
 			});
	}
</script>