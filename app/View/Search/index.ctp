

      <!-- Search Bar -->
<section> 
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
		 			<dl class="tabs" data-tab id="dTab">
		  			<dd class="active"><a href="#MedicineTable">Medicine</a></dd>
		  			<dd><a href="#PharmaTableContainer">Pharmacy</a></dd>
		  			<dd><a href="#HospitalTable">Hospitals</a></dd>
		  			<dd><a href="#WebTable">Web Search</a></dd>
					</dl>
				<div class="tabs-content">
 					<div class="content active" id="MedicineTable">
 					<?php if (!empty($results)){ ?>
 					<table class="responsive">
					  <thead>
					    <tr>
					      <th width="200"><?php echo 'Medicine' ?></th>
					      <th>Item 	Description</th>
					      <th width="150">Indicative Price(&#8377;)</th>
					      <th width="150"></th>
					    </tr>
					  </thead>
					  <tbody>
						  <?php $length= count($results) ;
						  for($i=0;$i<$length;$i++)
						  {
						  ?>
						  <tr id="master-<?php echo ($results[$i][0]['medicines_header']['medicine_id']) ?>" >
					      <td><a href="javascript:void(0);" onClick="javascript:openDetail('<?php echo $results[$i][0]['medicines_header']['medicine_id'] ?>',this);"><?php echo ($results[$i][0]['medicines_header']['medicine_name']) ?></a></td>
					      <td><?php echo ($results[$i][0]['medicines_header']['mfg_name']) ?></td>
					      <td><?php echo ($results[$i][0]['medicines_header']['price']) ?> &#8377; </td>
					      <td><a href="#" id="quote-<?php echo ($results[$i][0]['medicines_header']['medicine_id']) ?>" class="button tiny radius" onClick="javascript:callBook('<?php echo $results[$i][0]['medicines_header']['medicine_id'] ?>','1');">Choose</a></td>
					   	  </tr>
					   	  <tr id="details-<?php echo ($results[$i][0]['medicines_header']['medicine_id'])?>"  style="display:none" >
					   	  </tr>
					    <?php 
					    	}
						  ?>
					  </tbody>
					</table>
					<?php } ?>
					</div>
					<div class="content" id="PharmaTableContainer">
						<table class="responsive" id="PharmaTable" style="display:none" >
						  <thead>
						    <tr>
						      <th>Provider Name</th>
						      <th>Provider Address</th>
						      <th></th>
						    </tr>
						  </thead>
						  <tbody id="ProviderContainer">
							
						  </tbody>
						</table>
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
</section> 

<script type='text/javascript'>

    	
   	function Locate(){
      			$("#locateTable").attr("style","display:block");
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
    	
    	
  
    	
 	
    

 	$(document).on('click', "#closebutton", function (event) {
    		event.preventDefault();
			$(this).parent().parent().parent().attr("style","display:none");
    });
    
    
            
    function openDetail(id,elem){
    	var masterID= "#"+"master-"+id;
    	var detailsID= "#"+"details-"+id;
    	

    	if ( $(detailsID).css("display")== 'table-row') {
    		 $(detailsID).attr("style","display:none");
    	}
    	else{
    	   	var $url = '<?php echo $this->Html->url(array('controller'=>'Search', 'action'=>'getItemDetailsBasedonID'))?>'+'/'+id;
    	   	var quantity,unit_measurement,packaging_type,composition,generic;
    	   	
			$.getJSON($url, function(data){
 				quantity =data[0].medicines_header.quantity;
 				unit_measurement = data[0].medicines_header.unit_measurement;
 				packaging_type = data[0].medicines_header.packaging_type;
 				composition = data[0].medicines_header.composition;
 				generic = data[0].medicines_header.generic;
 				console.log("quantity."+quantity);

		    	$(detailsID).html("<TD colspan=3><div> Available in "+packaging_type+" of "+quantity+" "+unit_measurement +"<div id='closebutton'>close</div></div></TD>");
		    	$(detailsID).attr("style","display:table-row");
 				});

		}
    }
    </script>