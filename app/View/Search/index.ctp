
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
 					<table>
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
      
        <script type='text/javascript'>
    
  
    
    function getResults(){
    		var nSearch = $('#searchWord').val();
    		var searchID = $('#searchID').val();
    		var length = nSearch.length;
			if(nSearch!=null){
    			if(length>0){
    				document.location.href = '/alphabeta/search?showResults=1&term='+nSearch+'&searchID='+searchID;
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
      			$("#book").attr("style","display:block");
      			$("#bucketID").attr("style","display:block");
 			});
    		
    	}    	
    	
    	
    function callBooking(){
    	document.location.href = '/alphabeta/Booking';
    }	
    	
    </script>