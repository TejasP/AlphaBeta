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