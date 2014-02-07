        <div class="row">
 
          <div class="large-12 columns">
            <div class="radius panel">
				<div class="row" id="CartTable"  <?php if (!empty($showCartTable)){ if($showCartTable == 'true'){ ?>  style="display:block" <?php }}?>  style="display:none" >
 					<table>
					  <thead>
					    <tr>
					      <th><?php echo 'Medicine' ?></th>
					      <th>Item 	Description</th>
					      <th>Quantity</th>
					      <th></th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td><?php echo ($results[0]['Medicine']['medicine_name']) ?></td>
					      <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
					      <td>Content Goes Here</td>
					      <td>
						  <a href="#" id="Add" class="button tiny radius" onClick="javascript:callAdd('');">Add </a>
					      <a href="#" id="Remove" class="button tiny radius" onClick="javascript:callRemove('');">Remove</a>
					      </td>
					    </tr>
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
					 				 <a href="#" class="postfix button expand" onclick="javascript:getProviderResults();">find</a>
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
			if(nSearch!=null){
    			if(length>0){
    				document.location.href = '/alphabeta/search?showResults=1&term='+nSearch;
    			}
    		}	
    	}
    	
    	
    </script>