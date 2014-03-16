<script type='text/javascript'>

getRecentQuotes();

function getRecentQuotes() {
	var $url = '<?php echo $this->Html->url(array('controller'=>'Org', 'action'=>'recentQuotes'))?>'+'?sessionid=123456789';

	$.getJSON($url, function(data){
		console.log("Starting.");

		$.each(data, function(index, value) {
		
			if(index == 0)
			{
				getQuoteDetail(value.quote_id);
				$arrow = "<span style='padding-left:12px;'><img src='/alphabeta/img/arrow-indicator.png'></span>";
			}
			else
				$arrow = "";

			$("#recentquotes").append("<div class='section-listing'><a id='" + value.quote_id + "' class='listing-item'><div class='section-listing-text'>" + value.quote_id  + $arrow + "</div></a>");
		});
	
		console.log("done.");
	});
}

$(document).on('click', 'div.section-listing a' , function() {
	$quoteid = $(this).attr("id")

	getQuoteDetail($quoteid);
		
});

function getQuoteDetail($quoteid) {
	var $url = '<?php echo $this->Html->url(array('controller'=>'Org', 'action'=>'quoteDetail'))?>'+'?sessionid=123456789&quoteid=' + $quoteid;

	$.getJSON($url, function(data){
		console.log("Starting.");

		$("#quoteheader").html("<div class='section-header padder'><div class='section-title-text'><b>Quote #</b> " + data[0].quote_id +"</div></div>");
		
		$proddetails = "";
		$.each(data[0].products, function(index, product) {
			if($proddetails == "")
				$proddetails = product.prod_id + " " + product.prod_name + " " + product.qty + " " + product.price
			else
				$proddetails = $proddetails + "<br>" + product.prod_id + " " + product.prod_name + " " + product.qty + " " + product.price;
		});
		$("#quotedetail").html("<div class='section-detail padder'><div class='section-title-text'>Quote detail for " + data[0].quote_id + " here</div>" + $proddetails + "</div>");
		
		$notesdetails = "";
		$.each(data[0].notifications, function(index, notification) {
			if($notesdetails == "")
				$notesdetails = notification.initiated_by + " " + notification.time + " " + notification.comments;
			else
				$notesdetails = $notesdetails + "<br>" + notification.initiated_by + " " + notification.time + " " + notification.comments;
		});
		$("#quotenotification").html("<div class='section-notification padder'><div class='section-title-text'>Notifications for " + data[0].quote_id + " here</div>" + $notesdetails + "<br><textarea name='newcomment' value=''/><div style='width:150px'><a class='postfix button expand' href='#' onClick='javascript:saveNotification("+ data[0].quote_id + ", 2);'>Save Comment</a></div></div>");
	
		console.log("done.");
	});
}
			
</script>

<style>
#centerpane {
	#background-color: blue;
    border: 1px solid #9CACBC;
    border-radius: 7px 0px 0 0;
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
 	border-radius: 7px 0px 0 0;
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
	width: 150px;
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

.arrow-indicator {
	#background-image: url("http://localhost/alphabeta/img/arrow-indicator.png");
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
            <div class="radius panel" style="height:550px;">
				
				<div id="leftpane">
					<div class="section-header">
						<div class="section-title-text"><b>Recent Quotes</b></div>
					</div>
					<div id="recentquotes">

					</div>
				</div>

				<div id="centerpane" style="left: 251px; top: 20px; width: 572px; height: 92%; position: absolute;">
					<div id="quoteheader">
						
					</div>
					<div id="quotedetail">
						
					</div>
					<div id="quotenotification">
						
					</div>
					<div class="section-footer padder">
						<div class="section-title-text">Footer here</div>
					</div>
				</div>
				
			</div>
    	  </div>
	    </section>