<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button id="button-send" data-loading-text="Loading..." data-toggle="tooltip" title="Send" class="btn btn-primary" onclick="send('index.php?route=marketing/contact/send&user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT');">
     <i class="fa fa-envelope"></i>
    </button>
    <a href="contact.php" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
   </div>
   <h1>Mail</h1>
   <ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
   </ul>
  </div>
 </div>
 <div class="container-fluid">
  <div class="panel panel-default">
   <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-envelope"></i> Mail</h3>
   </div>
   <div class="panel-body">
    <form class="form-horizontal">
     <div class="form-group">
      <label class="col-sm-2 control-label" for="input-store">From</label>
      <div class="col-sm-10">
       <select name="store_id" id="input-store" class="form-control">
        <option value="0">Default</option>
       </select>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-2 control-label" for="input-to">To</label>
      <div class="col-sm-10">
       <select name="to" id="input-to" class="form-control">
        <option value="newsletter">All Newsletter Subscribers</option>
        <option value="customer_all">All Customers</option>
        <option value="customer_group">Customer Group</option>
        <option value="customer">Customers</option>
        <option value="affiliate_all">All Affiliates</option>
        <option value="affiliate">Affiliates</option>
        <option value="product">Products</option>
       </select>
      </div>
     </div>
     <div class="form-group to" id="to-customer-group">
      <label class="col-sm-2 control-label" for="input-customer-group">Customer Group</label>
      <div class="col-sm-10">
       <select name="customer_group_id" id="input-customer-group" class="form-control">
        <option value="1">Default</option>
       </select>
      </div>
     </div>
     <div class="form-group to" id="to-customer">
      <label class="col-sm-2 control-label" for="input-customer"><span data-toggle="tooltip" title="(Autocomplete)">Customer</span></label>
      <div class="col-sm-10">
       <input type="text" name="customers" value="" placeholder="Customer" id="input-customer" class="form-control" />
       <div class="well well-sm" style="height: 150px; overflow: auto;"></div>
      </div>
     </div>
     <div class="form-group to" id="to-affiliate">
      <label class="col-sm-2 control-label" for="input-affiliate"><span data-toggle="tooltip" title="(Autocomplete)">Affiliate</span></label>
      <div class="col-sm-10">
       <input type="text" name="affiliates" value="" placeholder="Affiliate" id="input-affiliate" class="form-control" />
       <div class="well well-sm" style="height: 150px; overflow: auto;"></div>
      </div>
     </div>
     <div class="form-group to" id="to-product">
      <label class="col-sm-2 control-label" for="input-product"><span data-toggle="tooltip" title="Send only to customers who have ordered products in the list. (Autocomplete)">Products</span></label>
      <div class="col-sm-10">
       <input type="text" name="products" value="" placeholder="Products" id="input-product" class="form-control" />
       <div class="well well-sm" style="height: 150px; overflow: auto;"></div>
      </div>
     </div>
     <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-subject">Subject</label>
      <div class="col-sm-10">
       <input type="text" name="subject" value="" placeholder="Subject" id="input-subject" class="form-control" />
      </div>
     </div>
     <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-message">Message</label>
      <div class="col-sm-10">
       <textarea name="message" placeholder="Message" id="input-message" data-toggle="summernote" data-lang="" class="form-control"></textarea>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
 <link href="view/javascript/codemirror/lib/codemirror.css" rel="stylesheet" />
 <link href="view/javascript/codemirror/theme/monokai.css" rel="stylesheet" />
 <script type="text/javascript" src="view/javascript/codemirror/lib/codemirror.js"></script>
 <script type="text/javascript" src="view/javascript/codemirror/lib/xml.js"></script>
 <script type="text/javascript" src="view/javascript/codemirror/lib/formatting.js"></script>
 <script type="text/javascript" src="view/javascript/summernote/summernote.js"></script>
 <link href="view/javascript/summernote/summernote.css" rel="stylesheet" />
 <script type="text/javascript" src="view/javascript/summernote/summernote-image-attributes.js"></script>
 <script type="text/javascript" src="view/javascript/summernote/opencart.js"></script>
 <script type="text/javascript">
  <!--
  $('select[name=\'to\']').on('change', function() {
  	$('.to').hide();

  	$('#to-' + this.value.replace('_', '-')).show();
  });

  $('select[name=\'to\']').trigger('change');
  //-->
 </script>
 <script type="text/javascript">
  <!--
  // Customers
  $('input[name=\'customers\']').autocomplete({
  	'source': function(request, response) {
  		$.ajax({
  			url: 'index.php?route=customer/customer/autocomplete&user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&filter_name=' +  encodeURIComponent(request),
  			dataType: 'json',
  			success: function(json) {
  				response($.map(json, function(item) {
  					return {
  						label: item['name'],
  						value: item['customer_id']
  					}
  				}));
  			},
  			error: function(xhr, ajaxOptions, thrownError) {
  				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
  			}
  		});
  	},
  	'select': function(item) {
  		$('input[name=\'customers\']').val('');

  		$('#input-customer' + item['value']).remove();

  		$('#input-customer').parent().find('.well').append('<div id="customer' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="customer[]" value="' + item['value'] + '" /></div>');
  	}
  });

  $('#input-customer').parent().find('.well').delegate('.fa-minus-circle', 'click', function() {
  	$(this).parent().remove();
  });

  // Affiliates
  $('input[name=\'affiliates\']').autocomplete({
  	'source': function(request, response) {
  		$.ajax({
  			url: 'index.php?route=customer/customer/autocomplete&user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&filter_name=' +  encodeURIComponent(request) + '&filter_affiliate=1',
  			dataType: 'json',
  			success: function(json) {
  				response($.map(json, function(item) {
  					return {
  						label: item['name'],
  						value: item['customer_id']
  					}
  				}));
  			},
  			error: function(xhr, ajaxOptions, thrownError) {
  				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
  			}
  		});
  	},
  	'select': function(item) {
  		$('input[name=\'affiliates\']').val('');

  		$('#input-affiliate' + item['value']).remove();

  		$('#input-affiliate').parent().find('.well').append('<div id="affiliate' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="affiliate[]" value="' + item['value'] + '" /></div>');
  	}
  });

  $('#input-affiliate').parent().find('.well').delegate('.fa-minus-circle', 'click', function() {
  	$(this).parent().remove();
  });

  // Products
  $('input[name=\'products\']').autocomplete({
  	'source': function(request, response) {
  		$.ajax({
  			url: 'index.php?route=catalog/product/autocomplete&user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&filter_name=' +  encodeURIComponent(request),
  			dataType: 'json',
  			success: function(json) {
  				response($.map(json, function(item) {
  					return {
  						label: item['name'],
  						value: item['product_id']
  					}
  				}));
  			},
  			error: function(xhr, ajaxOptions, thrownError) {
  				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
  			}
  		});
  	},
  	'select': function(item) {
  		$('input[name=\'products\']').val('');

  		$('#input-product' + item['value']).remove();

  		$('#input-product').parent().find('.well').append('<div id="product' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product[]" value="' + item['value'] + '" /></div>');
  	}
  });

  $('#input-product').parent().find('.well').delegate('.fa-minus-circle', 'click', function() {
  	$(this).parent().remove();
  });

  function send(url) {
  	$.ajax({
  		url: url,
  		type: 'post',
  		data: $('#content select, #content input, #content textarea'),
  		dataType: 'json',
  		beforeSend: function() {
  			$('#button-send').button('loading');
  		},
  		complete: function() {
  			$('#button-send').button('reset');
  		},
  		success: function(json) {
  			$('.alert-dismissible, .text-danger').remove();

  			if (json['error']) {
  				if (json['error']['warning']) {
  					$('#content > .container-fluid').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
  				}

  				if (json['error']['email']) {
  					$('#content > .container-fluid').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error']['email'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
  				}

  				if (json['error']['subject']) {
  					$('input[name=\'subject\']').after('<div class="text-danger">' + json['error']['subject'] + '</div>');
  				}

  				if (json['error']['message']) {
  					$('textarea[name=\'message\']').parent().append('<div class="text-danger">' + json['error']['message'] + '</div>');
  				}
  			}

  			if (json['success']) {
  				$('#content > .container-fluid').prepend('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i>  ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
  			}

  			if (json['next']) {
  				send(json['next']);
  			}
  		},
  		error: function(xhr, ajaxOptions, thrownError) {
  			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
  		}
  	});
  }
  //-->
 </script>
</div>
