<div class="row">&nbsp;
</div> 			
<div class="row">
          <div class="large-12 columns">
          	<div class="large-2 columns">
          	&nbsp;
          	</div>
	        <div class="large-7 columns">
	        <dl class="tabs" data-tab>
			  <dd class="active"><a href="#register">Register</a></dd>
			  <dd><a href="#register_pharmacy">Register Pharmacy </a></dd>
			  </dl>
			   <div class="radius panel">
			   <div class="tabs-content">
			   		<div class="content active" id="register">
		        	<div data-alert class="alert-box success radius" id="successID" style="display:none"></div>	        	
		        	<form id="resetFormID">
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
		        		<div class="content" id="register_pharmacy">
		        		<div data-alert class="alert-box success radius" id="psuccessID" style="display:none"></div>	        	
			        	<form id="presetFormID">
			        	<div data-alert class="alert-box alert round" id="palertID" style="display:none"></div>
			        	<input type="email" id="pemail" placeholder="E-mail" required="required"/>
			        	<div data-alert class="alert-box alert round" id="palertID1" style="display:none"></div>
			        	<input type="password"  id="ppassword" placeholder="Password" required="required">
			        	<div data-alert class="alert-box alert round" id="palertID2" style="display:none"></div>
			        	<input type="password"  id="pcpassword" placeholder="Re-Enter Password"required="required">
			        	<div data-alert class="alert-box alert round" id="palertID3" style="display:none"></div>
			        	<input type="text" id="pphone" placeholder="Phone Number" />
			        	<div data-alert class="alert-box alert round" id="palertID4" style="display:none"></div>
			        	<input type="text" id="pharmacy" placeholder="find your pharmacy" required="required"/>
						<input type="hidden" id="pharmacyID"/>
			        	<a class="radius small button" href="javascript:callPharmacyRegister()" id="register">Register</a>
			        	</form>
			        	</div>
		        	</div>
		        	</div>
	        </div>
 			 <div class="large-3 columns">
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
	$("#successID").hide();
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
		message = JSON.parse(data)['message'];
		if(status === "PASS"){
			$("#successID").text("You are registerd.");
			$("#successID").show();
			$("#resetFormID")[0].reset();
		}else{
			console.log(message);
			if(message.email != undefined){
				$("#alertID").text(message.email);
				$("#alertID").show();
			}
			if(message.password != undefined){
				$("#alertID1").text(message.password);
				$("#alertID1").show();
			}
			if(message.phone != undefined){
				$("#alertID3").text(message.phone);
				$("#alertID3").show();
			}
		}
	});
}


function callPharmacyRegister(){ 

	email = $("#pemail").val();
	password = $("#ppassword").val();
	cpassword = $("#pcpassword").val();
	phone = $("#pphone").val();
	$("#psuccessID").hide();
	$("#palertID").hide();
	$("#palertID1").hide();
	$("#palertID2").hide();
	$("#palertID3").hide();
	
	if(email.length == 0 || email==null){
		$("#palertID").text("Please enter e-mail.");
		$("#palertID").show();
	}
	else if(password.length == 0 || password==null){
		$("#palertID1").text("Please enter Password.");
		$("#palertID1").show();
	}
	else if(cpassword.length == 0 || cpassword==null){
		$("#palertID2").text("Please enter Confirm Password.");
		$("#palertID2").show();
	}
	else if(phone.length == 0 || phone==null){
		$("#palertID3").text("Please enter Phone number.");
		$("#palertID3").show();
	}
	
	$pharmacyID = $('#pharmacyID').val(); 
	$url_register = '<?php echo $this->Html->url(array('controller'=>'Registration', 'action'=>'validateAndRegisterPharmacy'))?>'+'/'+email+'/'+password+'/'+cpassword+'/'+phone+'/'+$pharmacyID;
	
	$.post($url_register, function(data){
		status = JSON.parse(data)['status'];
		message = JSON.parse(data)['message'];
		if(status === "PASS"){
			$("#psuccessID").text("You are registerd.");
			$("#psuccessID").show();
			$("#presetFormID")[0].reset();
		}else{
			console.log(message);
			if(message.email != undefined){
				$("#palertID").text(message.email);
				$("#palertID").show();
			}
			if(message.password != undefined){
				$("#palertID1").text(message.password);
				$("#palertID1").show();
			}
			if(message.phone != undefined){
				$("#palertID3").text(message.phone);
				$("#palertID3").show();
			}
		}
	});


}

    $(document).ready(function () {

    	var $nSearch = $('#pharmacy').val();

        var options, a;
        var $url = '<?php echo $this->Html->url(array('controller'=>'Registration', 'action'=>'pharmacyAutoComplete'))?>'+$nSearch;
        jQuery(function() {
            options = { 
                source: $url,
                dataType: "json",
                minChars: 4,
                select: function( event, ui ) {
						$( "#pharmacy").val(ui.item.label);
						$( "#pharmacyID").val(ui.item.providerID);
							return false;
					},
				 focus: function( event, ui ) {
					$( "#pharmacy" ).val( ui.item.label );
						return false;
					}
            };
            
            a = $('#pharmacy').autocomplete(options);
        }); 
        
  });      

</script>