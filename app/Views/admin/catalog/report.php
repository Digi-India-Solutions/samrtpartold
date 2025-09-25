<?php include('header.php'); ?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" data-toggle="tooltip" title="Filter" onclick="$('#filter-report').toggleClass('hidden-sm hidden-xs');" class="btn btn-default hidden-md hidden-lg"><i class="fa fa-filter"></i></button>
      </div>
      <h1>Reports</h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="#">Reports</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i> Choose the report type</h3>
      </div>
      <div class="panel-body">
        <div class="well">
          <div class="input-group">
            <select name="report" onchange="location = this.value;" class="form-control">
              
                                          
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=customer_transaction">Customer Transaction Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=customer_activity">Customer Activity Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=customer_order">Customer Orders Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=customer_reward">Customer Reward Points Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=customer_search">Customer Searches Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=sale_tax">Tax Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=sale_shipping">Shipping Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=sale_return">Returns Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=sale_order">Sales Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=sale_coupon">Coupons Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=product_viewed">Products Viewed Report</option>
              
                                                        
              <option value="http://localhost/opencart/admin/index.php?route=report/report&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;code=product_purchased">Products Purchased Report</option>
              
                                        
            </select>
            <span class="input-group-addon"><i class="fa fa-filter"></i> Filter</span></div>
        </div>
      </div>
    </div>
    <div><div class="row">
  <div id="filter-report" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-filter"></i> Filter</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label" for="input-date-start">Date Start</label>
          <div class="input-group date">
            <input type="text" name="filter_date_start" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" id="input-date-start" class="form-control" />
            <span class="input-group-btn">
            <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
            </span></div>
        </div>
        <div class="form-group">
          <label class="control-label" for="input-customer">Customer</label>
          <input type="text" name="filter_customer" value="" placeholder="Customer" id="input-customer" class="form-control" />
        </div>
        <div class="form-group">
          <label class="control-label" for="input-date-end">Date End</label>
          <div class="input-group date">
            <input type="text" name="filter_date_end" value="" placeholder="Date End" data-date-format="YYYY-MM-DD" id="input-date-end" class="form-control" />
            <span class="input-group-btn">
            <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
            </span></div>
        </div>
        <div class="form-group text-right">
          <button type="button" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 col-md-pull-3 col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i> Customer Transaction Report</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-left">Customer Name</td>
                <td class="text-left">E-Mail</td>
                <td class="text-left">Customer Group</td>
                <td class="text-left">Status</td>
                <td class="text-right">Total</td>
                <td class="text-right">Action</td>
              </tr>
            </thead>
            <tbody>
            
                        <tr>
              <td class="text-center" colspan="6">No results!</td>
            </tr>
                        </tbody>
            
          </table>
        </div>
        <div class="row">
          <div class="col-sm-6 text-left"></div>
          <div class="col-sm-6 text-right">Showing 0 to 0 of 0 (0 Pages)</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('#button-filter').on('click', function() {
	var url = '';
	
	var filter_customer = $('input[name=\'filter_customer\']').val();
	
	if (filter_customer) {
		url += '&filter_customer=' + encodeURIComponent(filter_customer);
	}
	
	var filter_date_start = $('input[name=\'filter_date_start\']').val();
	
	if (filter_date_start) {
		url += '&filter_date_start=' + encodeURIComponent(filter_date_start);
	}
	
	var filter_date_end = $('input[name=\'filter_date_end\']').val();
	
	if (filter_date_end) {
		url += '&filter_date_end=' + encodeURIComponent(filter_date_end);
	}
	
	location = 'index.php?route=report/report&code=customer_transaction&user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT' + url;
});
//--></script> 
<script type="text/javascript"><!--
$('.date').datetimepicker({
	language: 'en-gb',
	pickTime: false
});
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'filter_customer\']').autocomplete({
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
			}
		});
	},
	'select': function(item) {
		$('input[name=\'filter_customer\']').val(item['label']);
	}
});
//--></script></div>
  </div>
</div>
<?php include('footer.php'); ?>