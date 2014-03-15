<style>

#centerpane {
	#background-color: blue;
    border: 1px solid #9CACBC;
    border-radius: 4px 0px 0 0;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    position: absolute;
}

#centerpane .padder {
	padding-top: 5px;
	padding-left: 5px;
    border-bottom: 1px solid #a7a7a7;
}


#centerpane .section-header {
	background-color: #FFFFFF;
 	height: 100px;
}

#centerpane .section-detail {
	background-color: #FFFFFF;
 	height: 100px;
}

#centerpane .section-notification {
 	background-color: #FFFFFF;
 	height: 270px;
}

#centerpane .section-footer {
	background-color: #A7A7A7;
 	height: 52px;
}

#leftpane .section-header {
    background-color: #CED7E0;
    background-image: -moz-linear-gradient(90deg, #CED7E0 0%, #ECF0F3);
    border-bottom: 1px solid #9CACBC;
    box-shadow: 0 1px #FFFFFF inset, 0 1px #ECF0F3;
    height: 23px;
    margin-bottom: 1px;
    padding: 7px 5px 3px 5px;    
}

#leftpane .section-listing {
    height: 20px;
    margin-bottom: 1px;
    padding: 5px 5px 3px 5px;
}

.section-title-text {
    font-family: proxima-nova-condensed,"Helvetica Neue",Arial,sans-serif;
    font-size: 12px;
	line-height: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    text-shadow: 0 1px #ECF0F3;
    text-transform: uppercase;
    white-space: nowrap;
}

.section-listing-text {
    font-family: proxima-nova-condensed,"Helvetica Neue",Arial,sans-serif;
    font-size: 12px;
	line-height: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    text-shadow: 0 1px #ECF0F3;
    text-transform: uppercase;
    white-space: nowrap;
}

</style>



      <!-- Orignization home page-->
 		<section>
          <div class="large-12 columns">
				This is origanization home page......

            <div class="radius panel" style="height:550px;">
				
				<div id="leftpane">
					<div class="section-header">
						<div class="section-title-text"><b>Recent Orders</b></div>
					</div>
					<div class="section-listing">
						<a id="1234567890" class="listing-item">
							<div class="section-listing-text">1234567890 >></div>	
						</a>
					</div>
					<div class="section-listing">
						<a id="1234567891" class="listing-item">
							<div class="section-listing-text">1234567891</div>	
						</a>
					</div>
				</div>

				<div id="centerpane" style="left: 251px; top: 20px; width: 572px; height: 92%; position: absolute;">
					<div class="section-header padder">
						<div class="section-title-text"><b>Order #</b> 1234567890</div>
					</div>
					<div class="section-detail padder">
						<div class="section-title-text">Order detail here</div>
					</div>
					<div class="section-notification padder">
						<div class="section-title-text">Notifications here</div>
					</div>
					<div class="section-footer padder">
						<div class="section-title-text">Footer here</div>
					</div>
				</div>
				
			</div>
    	  </div>
	    </section>