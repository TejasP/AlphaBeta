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

			$("#recentquotes").append("<div class='section-listing'><a id='" + value.quote_id + "' class='listing-item'><span class='section-listing-text'>Quote " + value.quote_id  + " </span></a><span>recevied from " + value.user_name + "</span><div class='quote-received'>Received at " + value.submitted + "</div></div>");
		});
	
		console.log("done.");
	});
}

$(document).on('click', 'div.section-listing a.listing-item' , function() {
	$quoteid = $(this).attr("id")

	getQuoteDetail($quoteid);
		
});

function getQuoteDetail($quoteid) {
	var $url = '<?php echo $this->Html->url(array('controller'=>'Org', 'action'=>'quoteDetail'))?>'+'?sessionid=123456789&quoteid=' + $quoteid;

	$.getJSON($url, function(data){
		console.log("Starting.");

		$("#quoteheader").html("<div class='section-header padder'><div class='order-status'></div><div class='order-header'>Quote #" + data[0].quote_id +" received from " + data[0].user_name + "</div><div class='order-detail'>order comments here</div></div>");
		
		$proddetails = "";
		$.each(data[0].products, function(index, product) {
			if($proddetails == "")
				$proddetails = product.prod_name + " qty:" + product.qty + " Rs." + product.price
			else
				$proddetails = $proddetails + "<br>" + product.prod_name + " qty:" + product.qty + " Rs." + product.price;
		});
		$("#quotedetail").html("<div class='section-detail padder'><div class='order-prodheader'>Products</div><div class='order-proddetail'>" + $proddetails + "</div></div>");
		
		$notesdetails = "";
		if(data[0].notifications != null)
		{
			$.each(data[0].notifications, function(index, notification) {
				if($notesdetails == "")
					$notesdetails = notification.initiated_by + " " + notification.initiated_time + " " + notification.comments;
				else
					$notesdetails = $notesdetails + "<br>" + notification.initiated_by + " " + notification.initiated_time + " " + notification.comments;
			});
		}
		$("#quotenotification").html("<div class='section-notification padder'><div class='order-notiheader'>Notifications for " + data[0].quote_id + " here</div><div class='order-notidetail'>" + $notesdetails + "</div><div><textarea id='newcomment' name='newcomment' value=''/><div style='width:150px'><a class='postfix button expand' href='#' onClick='javascript:saveNotification("+ data[0].quote_id + ", " + data[0].cart_id + ", " + data[0].user_id + ");'>Save Comment</a></div></div></div>");
	
		console.log("done.");
	});
}

function saveNotification(quoteid,cartid,userid){	
	var comment = $("#newcomment").val();
   	var sendInfo = { Comment: comment};
	
	var $url = '<?php echo $this->Html->url(array('controller'=>'Org', 'action'=>'saveNotification'))?>'+'/'+quoteid+'/'+cartid+'/'+userid;
	$.getJSON($url, sendInfo, function(data){
  			console.log("done.");
	
			getQuoteDetail(quoteid);
		}); 
		
}
			
</script>

<style>
#centerpane {
	#background-color: blue;
    border: 1px solid #9CACBC;
    border-radius: 7px 0px 0 0;
    #box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
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

#leftpane {
	background-color: #FFFFFF;
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
	font-size: 14px;
	font-weight: bold;
	width: 250px;
    height: 40px;
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

.quote-received {
	font-size: 10px;
	font-weight: 100;
	color: #A7A7A7;
}

.listing-item {
	text-decoration: underline;
}

.arrow-indicator {
	#background-image: url("http://localhost/alphabeta/img/arrow-indicator.png");
}

.order-status {
	border: 1px solid #A7A7A7;
	border-radius: 2px;
	width: 20px;
	padding: 10px;
	margin-top: 7px;
}

.order-header {
	font-weight: bold;
	font-size: 14px;
	margin-left: 30px;
	margin-top: -18px;
}

.order-detail {
	margin-left: 30px;
	font-size: 13px;
}

.order-prodheader {
	font-weight: bold;
	font-size: 14px;
}

.order-proddetail {
	font-size: 12px;
}

.order-notification {
	margin-left: 30px;
	font-size: 13px;
}

.order-notiheader {
	font-weight: bold;
	font-size: 14px;
}

.order-notidetail {
	font-size: 12px;
}

.section-listing-text {
    font-family: proxima-nova-condensed,"Helvetica Neue",Arial,sans-serif;
    font-size: 12px;
	line-height: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    text-shadow: 0 1px #ECF0F3;
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

				<div id="centerpane" style="left: 300px; top: 20px; width: 572px; height: 92%; position: absolute;">
					<div id="quoteheader">
						
					</div>
					<div id="quotedetail">
						
					</div>
					<div id="quotenotification">
						
					</div>
			<!--		<div class="section-footer padder">
						<div class="section-title-text">Footer here</div>
					</div> 
			-->
				</div>
				
			</div>
    	  </div>
	    </section>