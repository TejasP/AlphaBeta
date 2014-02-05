
      <!-- Search Bar -->
 
        <div class="row">
 
          <div class="large-12 columns">
            <div class="radius panel">
 
            <form id="search">
              <div class="row">
                
                <div class="large-6 columns">
                 <input type="search" id="searchWord" />
                </div>
 
                <div class="large-2 columns">
                </div>
                
                <div class="large-4 columns">
 				 <a href="#" class="postfix button expand" onclick="javascript:getResults()">Search</a>
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
					    <tr>
					      <td><?php echo ($results[0]['Medicine']['medicine_name']) ?></td>
					      <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
					      <td>Content Goes Here</td>
					      <td><a href="#" class="button tiny radius">Book</a></td>
					    </tr>
					  </tbody>
					</table>
 					</div>
          </div>
          </div>
 
        </div>
 
      <!-- End Search Bar -->
      
        <script type='text/javascript'>
    
  
    
    function getResults(){
    		var nSearch = $('#searchWord').val();
    		document.location.href = '/alphabeta/search?showResults=1&term='+nSearch;
    	}
    </script>