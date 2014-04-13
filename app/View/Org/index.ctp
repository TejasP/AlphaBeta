<script type='text/javascript'>

getRecentQuotes('N');

$(document).on('click', '#initiatedquotes' , function() {
	getRecentQuotes('N');
});

$(document).on('click', '#acceptedquotes' , function() {
	getRecentQuotes('A');
});

$(document).on('click', '#confirmedquotes' , function() {
	getRecentQuotes('C');
});


function getRecentQuotes(quotestatus) {
	
	//alert("quotesstatus:"+quotestatus);
	var $url = '<?php echo $this->Html->url(array('controller'=>'Org', 'action'=>'recentQuotes'))?>'+'?sessionid=123456789&quotestatus=' + quotestatus;

	$.getJSON($url, function(data){
		console.log("Starting.");
		
		$("#recentquotes").html("");
		
		if(data == null)
		{
			$("#recentquotes").append("<div class='section-listing'>No record found</div>");
		}	
		else
		{	
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
		}
		
		if(quotestatus == 'N')
			$("#recentquotes-links").html("&nbsp;Initiated&nbsp;<a class='listing-item' id='acceptedquotes'>Accepted</a>&nbsp;<a class='listing-item' id='confirmedquotes'>Confirmed</a>");
		else if(quotestatus == 'A')
			$("#recentquotes-links").html("&nbsp;<a class='listing-item' id='initiatedquotes'>Initiated</a>&nbsp;Accepted&nbsp;<a class='listing-item' id='confirmedquotes'>Confirmed</a>");
		else if(quotestatus == 'C')
			$("#recentquotes-links").html("&nbsp;<a class='listing-item' id='initiatedquotes'>Initiated</a>&nbsp;<a class='listing-item' id='acceptedquotes'>Accepted</a>&nbsp;Confirmed");	
		
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

		$proddetails = "";
		
		if(data[0].quote_status == 'N')
		{
			$quoteaction = "<div class='order-action'><a id='accept_order' tabindex='-1' class='dropdown-menu-link' onClick='javascript:acceptOrder("+ data[0].quote_id + ");'><div class='new-button new-primary-button'><span class='new-button-text'>Accept Order</span></div></a><a id='save_comment' tabindex='-1' class='dropdown-menu-link' onClick='javascript:saveNotification("+ data[0].quote_id + ", " + data[0].cart_id + ", " + data[0].user_id + ");'><div class='new-button new-primary-button'><span class='new-button-text'>Save Comment</span></div></a></div>";
			$proddetails = "<div class='order-proddetail'><b><div class='order-prodname'>Product Name</div><div class='order-qty'>Qty</div><div class='order-price'>Price</div><div class='order-newprice'>Offer Price</div></b></div>";
		}
		else
		{
			$quoteaction = "<div class='order-action'><a id='save_comment' tabindex='-1' class='dropdown-menu-link' onClick='javascript:saveNotification("+ data[0].quote_id + ", " + data[0].cart_id + ", " + data[0].user_id + ");'><div class='new-button new-primary-button'><span class='new-button-text'>Save Comment</span></div></a></div>";
			$proddetails = "<div class='order-proddetail'><b><div class='order-prodname'>Product Name</div><div class='order-qty'>Qty</div><div class='order-price'>Price</div></b></div>";
		}
			
		$quotestatusdetails = "<span class='order-status-desc'>" + data[0].quote_statusdesc + "</span>";
		
		$("#quoteheader").html("<div class='section-header padder'><div class='order-status'></div><div class='order-header'>Quote #" + data[0].quote_id +" received from " + data[0].user_name + " " + $quotestatusdetails + "</div><div class='order-detail'>order comments here</div></div>");
		
		$.each(data[0].products, function(index, product) {
			if(data[0].quote_status == 'N')
				$proddetails = $proddetails + "<div class='order-proddetail'><div class='order-prodname'>" + product.prod_name + "</div><div class='order-qty'>" + product.qty + "</div><div class='order-price'>" + product.price + "</div><div class='order-newprice'><input class='textfield' id='order-newprice" + index + "' name='" + product.prod_id + "' type='text' value='" + product.price +"'/></div></div>";
			else
				$proddetails = $proddetails + "<div class='order-proddetail'><div class='order-prodname'>" + product.prod_name + "</div><div class='order-qty'>" + product.qty + "</div><div class='order-price'>" + product.price + "</div><div class='order-newprice'></div></div>";
		});
		$("#quotedetail").html("<div class='section-detail padder'><div class='order-prodheader'>Products</div>" + $proddetails + "</div>");
		
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
		$("#quotenotification").html("<div class='section-notification padder'><div class='order-notiheader'>Notifications for " + data[0].quote_id + " here</div><div class='order-notidetail'>" + $notesdetails + "</div><div><textarea id='newcomment' name='newcomment' value=''/></div></div>");

		$("#quoteaction").html("<div class='section-action padder'>" + $quoteaction +"<input type='hidden' id='total_products' name='total_products' value='" + data[0].products.length + "'></div>");

	
		console.log("done.");
	});
}

function saveNotification(quoteid, cartid, userid){	
	var comment = $("#newcomment").val();
   	var sendInfo = { Comment: comment};
	
	var $url = '<?php echo $this->Html->url(array('controller'=>'Notification', 'action'=>'saveNotification'))?>'+'/'+quoteid+'/'+cartid+'/'+userid;
	$.getJSON($url, sendInfo, function(data){ alert("testing..");
  			console.log("done.");
	});
	
	getQuoteDetail(quoteid); 
		
}

function acceptOrder(quoteid){	
	var products = {
	    product: []
	};
	
	var total_products = $("#total_products").val();
	
	for(var i=0; i< total_products; i++)
	{	
	    var prodprice = $("#order-newprice" + i).val();
	    var prodid = $("#order-newprice" + i).attr("name");
	
	    products.product.push({ 
	    	"prodindex" : (i+1),
	    	"prodid" : prodid,
	        "prodprice"  : prodprice
	    });
	}

	var $url = '<?php echo $this->Html->url(array('controller'=>'QuoteManagementAPI', 'action'=>'acceptOrder'))?>'+'/'+quoteid;
	$.getJSON($url, products, function(data){ 
		alert("testing..");		// control is not going inside this function .. u know why?
  		console.log("done.");
		getQuoteDetail(quoteid);
	}); 
		
	getQuoteDetail(quoteid);
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
 	overflow-y: auto;
}

#centerpane .section-notification {
 	background-color: #FFFFFF;
 	height: 200px;
 	overflow-y: auto;
}

#centerpane .section-action {
 	background-color: #FFFFFF;
 	height: 52px;
}

#centerpane .section-footer {
	background-color: #A7A7A7;
 	height: 52px;
}

#leftpane {
	background-color: #FFFFFF;
}

#recentquotes-links {
	font-size: 11px;
	font-weight: bold;
}

#recentquotes {
	width: 200px;
	height: auto;
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

.order-action {
	width: 100%;
}

.order-status-desc {
	color: blue;
	font-size: 14px;
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

.order-prodname {
	display: inline-block;
	width: 200px;
}
.order-qty {
	display: inline-block;
	width: 50px;
}
.order-price {
	display: inline-block;
	width: 50px;
	text-align: right;
	padding-right: 4px;
}
.order-newprice {
	display: inline-block;
	width: 75px;
}


input.textfield {
	width:70px;
	height: 1rem;
	margin: 0;
	padding: 0;
	text-align: right;
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


.dropdown-menu-link {
    color: #FFFFFF;
    padding-right: 4px;
}

.dropdown-menu-link:hover {
    color: #FFFFFF;
}

.new-primary-button:hover:not(:focus):not(.unhovered):not(.disabled):not(.pressed) {
    background-color: #1F8DD6;
    background-image: -moz-linear-gradient(90deg, #1F8DD6 0%, #74C1ED);
}
.new-primary-button {
    color: #FFFFFF;
    background-color: #1F8DD6;
    border: 1px solid #114D97;
}
.new-button {
    border-radius: 3px 3px 3px 3px;
    box-shadow: 0 1px rgba(255, 255, 255, 0.3) inset, 0 -1px 1px rgba(0, 0, 0, 0.1) inset;
    cursor: pointer;
    display: inline-block;
    font-size: 11px;
    font-weight: 600;
    line-height: 100%;
    padding: 4px 10px;
    text-align: center;
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
					<div id="recentquotes-links">
						
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
					<div id="quoteaction">
						
					</div>
				</div>
				
			</div>
    	  </div>
	    </section>