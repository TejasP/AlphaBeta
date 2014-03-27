<div class="row">&nbsp;
</div> 			
<div class="row">
 
          <div class="large-12 columns">
          	<div class="large-2 columns">
          	&nbsp;
          	</div>
          	
	        <div class="large-4 columns">
	        	<div class="radius panel">
	        	<div data-alert class="alert-box success radius" id="successID" style="display:none"></div>	        	
	        	<form>
	        	<div data-alert class="alert-box alert round" id="alertID" style="display:none"></div>
	        	<input type="email" id="email" placeholder="E-mail" required="required"/>
	        	<div data-alert class="alert-box alert round" id="alertID1" style="display:none"></div>
	        	<input type="password"  id="password" placeholder="Password" required="required">
	        	<div data-alert class="alert-box alert round" id="alertID2" style="display:none"></div>
	        	<input type="password"  id="cpassword" placeholder="Re-Enter Password"required="required">
	        	<div data-alert class="alert-box alert round" id="alertID3" style="display:none"></div>
	        	<input type="text" id="phone" placeholder="Phone Number" />
	        	<a class="radius small button" href="javascript:callRegister()" id="register">Register</a>
	        	</form>
	        	</div>
	        </div>
 			 <div class="large-2 columns">
 			  &nbsp;
          	</div>
 			<div class="large-3 columns" >
 				 <a class="radius medium button" href="#">Register Pharmacy</a>
 			</div> 
 			 <div class="large-2 columns">
 			  &nbsp;
          	</div>
          	
 			</div>
</div>
<script type='text/javascript'>
function callRegister(){
	email = $("#email").val();
	password = $("#password").val();
	cpassword = $("#cpassword").val();
	phone = $("#phone").val();
	
	$("#alertID").hide();
	$("#alertID1").hide();
	$("#alertID2").hide();
	$("#alertID3").hide();
	
	if(email.length == 0 || email==null){
		$("#alertID").text("Please enter e-mail.");
		$("#alertID").show();
	}
	else if(password.length == 0 || password==null){
		$("#alertID1").text("Please enter Password.");
		$("#alertID1").show();
	}
	else if(cpassword.length == 0 || cpassword==null){
		$("#alertID2").text("Please enter Confirm Password.");
		$("#alertID2").show();
	}
	else if(phone.length == 0 || phone==null){
		$("#alertID3").text("Please enter Phone number.");
		$("#alertID3").show();
	}
	
	$url_register = '<?php echo $this->Html->url(array('controller'=>'Registration', 'action'=>'validateAndRegister'))?>'+'/'+email+'/'+password+'/'+cpassword+'/'+phone;
	
	$.post($url_register, function(data){
		status = JSON.parse(data)['status'];
		if(status === "PASS"){
			$("#successID").text("You are registerd.");
			$("#successID").show();
			$("#email").val("E-mail");
			$("#password").val("Password");
			$("#cpassword").val("Re-enter Password");
			$("#phone").val("Phone");
		}
	});
}

</script>