        <div class="row">
 
          <div class="large-12 columns">
            <div class="radius panel">
				<div class="row" id="CartTable"  <?php if (!empty($showCartTable)){ if($showCartTable == 'true'){ ?>  style="display:block" <?php }}?>  style="display:none" >
 					<table class="responsive">
					  <thead>
					    <tr>
					      <th><?php echo 'Medicine' ?></th>
					      <th>Item 	Description</th>
					      <th>Quantity</th>
					      <th></th>
					    </tr>
					  </thead>
					  <tbody>
					  <?php $length= count($results) ;
						  for($i=0;$i<$length;$i++)
						  {
						  ?>
						<tr>
					      <td><?php echo ($results[$i][0]['medicines_header']['medicine_name']) ?></td>
					      <td><?php echo ($results[$i][0]['medicines_header']['mfg_name']) ?></td>
					      <td id="AddRemoveID">Content Goes Here</td>
					      <td>
						  <a href="#" id="Add" class="button tiny radius" onClick="javascript:callAdd('');">Add </a>
					      <a href="#" id="Remove" class="button tiny radius" onClick="javascript:callRemove('<?php echo ($results[$i][0]['medicines_header']['medicine_id']) ?>');">Remove</a>
					      </td>
					    </tr>
					   <?php 
					    	}
						  ?>
					  </tbody>
					</table>
 			</div>
 			
 			<div class="row" id="locateTable"  <?php if (!empty($showLocateTable)){ if($showLocateTable == 'true'){ ?>  style="display:block" <?php }}?>  style="display:none" >
		 					<form id="locateP">
					              <div class="row">
					              
					                <div class="large-3 columns">
					                &nbsp;
					                </div>
					                <div class="large-5 columns">
					                 <input type="search" id="LocateProvider" value="Please enter area, city or pincode" />
					                </div>
					                <div class="large-2 columns">
					 				 <a href="#" class="postfix button radius" onclick="javascript:getProviderResults();">find</a>
					                </div>
					  				<div class="large-2 columns">
					  				&nbsp;
					                </div>
					 
					              </div>		 
		            		</form>
 			</div>
 			<div class="row" id="locateResultTable"  style="display:none" >
 					<table class="responsive">
					  <thead>
					    <tr>
					      <th>Provider Name</th>
					      <th>Provider Address</th>
					      <th></th>
					    </tr>
					  </thead>
					  <tbody>
						<tr>
					      <td id="ProviderName"></td>
					      <td id="ProviderAddress"></td>
					      <td>
						  <a href="#" id="select" class="button tiny radius" onClick="javascript:callSelectProvider('');">Add </a>
					      <a href="#" id="Remove" class="button tiny radius" onClick="javascript:callRemoveProvider('');">Remove</a>
					      </td>
					    </tr>
					  </tbody>
					</table>
 			</div>
 			<div class="row" id="quote"   style="display:none">
		 		<form id="locateP">
					              <div class="row">
					              
					                <div class="large-8 columns">
					               	 &nbsp;
					                </div>
					                <div class="large-2 columns">
					 		  			<a href="#" class="postfix button radius" onclick="javascript:getQuote();">Get Quote</a>
					                </div>
					  				<div class="large-2 columns">
					  				&nbsp;
					                </div>
					 
					              </div>		 
		            		</form>
 			</div>
 			
 			
 		</div>
 	</div>
 </div>
 
      <script type='text/javascript'>

	var input = document.getElementById('LocateProvider');
		input.onfocus = function() {
		input.value = '';
	}

   $(document).ready(function () {
    	var $nSearch = $('#LocateProvider').val();
    	
        var options, a;
        var $url = '<?php echo $this->Html->url(array('controller'=>'LocateProvider', 'action'=>'getAreaName'))?>'+"/"+$nSearch;
        jQuery(function() {
            options = { 
                source: $url,
                dataType: "json",
                minChars: 4,
            };
            
            a = $('#LocateProvider').autocomplete(options);
        });
    });
    	
   	function Locate(){
      			$("#locateTable").attr("style","display:block");
    	}
    
    
     function getProviderResults(){
    		var nSearch = $('#LocateProvider').val();
    		var length = nSearch.length;
			var $url = '<?php echo $this->Html->url(array('controller'=>'locateProvider', 'action'=>'getProviderNearArea'))?>'+'/'+nSearch;
    
			if(nSearch!=null){
    			if(length>0){
    			$.getJSON($url, function(data){
      			console.log("Starting.");
    			$("#locateResultTable").attr("style","display:block");
				$("#quote").attr("style","display:block");
				
				$.each(data, function(index, value) {
				    $("#ProviderName").text(value.Providers.provider_name);
				    $("#ProviderAddress").text(value.Providers.address);
				});
      			console.log("done.");
				});
    			}
    		}	
    	}
    	
    function callRemove(medicineID){
   		 var $url = '<?php echo $this->Html->url(array('controller'=>'Booking', 'action'=>'removeFromBucket'))?>'+'/'+medicineID;
		 $.getJSON($url, function(data){
		 		document.location.href = "<?php echo $this->Html->url(array('controller'=>'Booking', 'action'=>'index'))?>";

 			});
    }
    function getQuote(){
    	var userID = 001;
    	var providerID= 001;
    	var cartID = 001
    	<?php if($isUserLoggedIn === 'false'){ 

    	?>
    		var a = $("#aLoginID");
    		a.click();
			
		<?php }else{?>
	        var $url = '<?php echo $this->Html->url(array('controller'=>'QuoteManagementAPI', 'action'=>'submitQuote'))?>'+'?userID='+userID+'&providerID='+providerID+'&cartID='+cartID;
	        $.getJSON($url, function(data){
	        	console.log(data);
	        });
	    	$('#quote').append('<div data-alert class="alert-box success radius">Your quote requested have been submitted.</div>');
    	<?php }?>
    }	

	function callAdd(medicineID){
		var a = document.getElementById("AddQty");
		if(a==null){
			$("#AddRemoveID").html('<select id="qty"><option value="1">1</option></select>');
		}
	}
    	
    </script>