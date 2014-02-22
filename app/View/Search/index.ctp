
      <!-- Search Bar -->
 
        <div class="row">
          <div class="large-12 columns">
            <div class="radius panel">
	            <form id="search">
              <div class="row">
              
                <div class="large-3 columns">
                &nbsp;
                </div>
                
                <div class="large-5 columns">
                 <input type="search" id="searchWord" />
                 <input type="hidden" id="searchID">
                </div>
 
                
                
                <div class="large-2 columns">
 				 <a href="#" class="postfix button expand" onclick="javascript:getResults()">Search</a>
                </div>
  				<div class="large-2 columns">
  				&nbsp;
                </div>
 
              </div>
 			  <div class="row">
                
                <div class="large-6 columns" id="searchWordResult">
              	  <?php  if (!empty($resultsText)){  echo $resultsText ; }?>
                </div>
 
                <div class="large-2 columns">
                </div>
                
                <div class="large-4 columns">
 	            </div>
  			
 
              </div>
 
            </form>
            
            

 			<div class="row" id="ResultsTable"  <?php if (!empty($showTable)){ if($showTable == 'true'){ ?>  style="display:block" <?php }}?>  style="display:none" >
		 			<dl class="tabs" data-tab>
		  			<dd class="active"><a href="#MedicineTable">Medicine</a></dd>
		  			<dd><a href="#PharmaTable">Pharmacy</a></dd>
		  			<dd><a href="#HospitalTable">Hospitals</a></dd>
		  			<dd><a href="#WebTable">Web Search</a></dd>
					</dl>
				<div class="tabs-content">
 					<div class="content active" id="MedicineTable">
 					<table class="responsive">
					  <thead>
					    <tr>
					      <th width="200"><?php echo 'Medicine' ?></th>
					      <th>Item 	Description</th>
					      <th width="150">Price</th>
					      <th width="150"></th>
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
					      <td>Content Goes Here</td>
					      <td><a href="#" id="quote-<?php echo ($results[$i][0]['medicines_header']['medicine_id']) ?>" class="button tiny radius" onClick="javascript:callBook('<?php echo $results[$i][0]['medicines_header']['medicine_id'] ?>');">Choose</a></td>
					   	  </tr>
					    <?php 
					    	}
						  ?>
					  </tbody>
					</table>
					</div>
					<div class="content" id="PharmaTable">

					</div>
					<div class="content"  id="HospitalTable">
					</div>
					<div class="content"  id="WebTable">
					</div>
				</div>
 			</div>
 			<div class="row" id="ChooseButton" <?php if (!empty($showTable)){ if($showTable == 'true'){ ?>  style="display:block" <?php }}?>  style="display:none">
 				<div class="large-8 columns">
            	&nbsp;
                </div>
 	            
                
                <div class="large-1 columns">
                &nbsp;
 	            </div>
 	            
 	            <div class="large-3 columns"  style="display:none" id="book">
                <a href="#"  class="button tiny radius" onClick="javascript:callBooking();">Book</a>
                </div>
 	            
 			</div>
          </div>
          </div>
 
        </div>
 
      <!-- End Search Bar -->
      
      
      
      		
 			
 			
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
    			$("#Filter").attr("style","display:block");
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
    		document.location.href = '<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'login'))?>';
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
	
	function showlocation() {
   // One-shot position request.
   	navigator.geolocation.getCurrentPosition(callback);
	}
 
	function callback(position) {
   		console.log(position.coords.latitude);
   		console.log(position.coords.longitude);
	}
	
	window.onload=function(){
		showlocation();
	};
      
    
  
    
    function getResults(){
    		var nSearch = $('#searchWord').val();
    		var searchID = $('#searchID').val();
    		var length = nSearch.length;
			if(nSearch!=null){
    			if(length>0){
    					document.location.href = '<?php echo Configure::read('searchURL'); ?>'+'?showResults=1&term='+nSearch+'&searchID='+searchID;
    					var $url = '<?php echo $this->Html->url(array('controller'=>'Search', 'action'=>'auditSearch'))?>'+'/'+nSearch;
						$.getJSON($url, function(data){
    					console.log("done.");
    					});
    			}
    		}	
    	}
    	
    	
  
    	
 	function callBook(id){
 			// Get AJAX call
 			
 			
 		var $url = '<?php echo $this->Html->url(array('controller'=>'Booking', 'action'=>'addToBucket'))?>'+'/'+id;
		$.getJSON($url, function(data){
      			console.log("done.");
      			var quote= "#"+"quote-"+id;
      			$(quote).text('Chosen');
      			$(quote).attr("class","button tiny radius disabled");
      			$("#book").attr("style","display:block");
      			$("#bucketID").attr("style","display:block");
 			});
    		
    	}    	
    	
    	
    function callBooking(){
    	$("#locateTable").attr("style","display:block");
    }	
    	
    </script>