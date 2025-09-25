<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" data-toggle="tooltip" title="Filter" onclick="$('#filter-marketing').toggleClass('hidden-sm hidden-xs');" class="btn btn-default hidden-md hidden-lg"><i class="fa fa-filter"></i></button>
        <a href="<?php echo base_url('add_marketing'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-marketing').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Marketing Tracking</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">        <div class="row">
      <div id="filter-marketing" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-filter"></i> Filter</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="control-label" for="input-name">Campaign Name</label>
              <input type="text" name="filter_name" value="" placeholder="Campaign Name" id="input-name" class="form-control" />
            </div>
            <div class="form-group">
              <label class="control-label" for="input-code">Tracking Code</label>
              <input type="text" name="filter_code" value="" placeholder="Tracking Code" id="input-code" class="form-control" />
            </div>
            <div class="form-group">
              <label class="control-label" for="input-date-added">Date Added</label>
              <div class="input-group date">
                <input type="text" name="filter_date_added" value="" placeholder="Date Added" data-date-format="YYYY-MM-DD" class="form-control" />
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
            <h3 class="panel-title"><i class="fa fa-list"></i> Marketing Tracking List</h3>
          </div>
          <div class="panel-body">
            <form action="http://localhost/opencart/admin/index.php?route=marketing/marketing/delete&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT" method="post" enctype="multipart/form-data" id="form-marketing">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                      <td class="text-left"> <a href="http://localhost/opencart/admin/index.php?route=marketing/marketing&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;sort=m.name&amp;order=DESC">Campaign Name</a> </td>
                      <td class="text-left"> <a href="http://localhost/opencart/admin/index.php?route=marketing/marketing&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;sort=m.code&amp;order=DESC">Code</a> </td>
                      <td class="text-right">Clicks</td>
                      <td class="text-right">Orders</td>
                      <td class="text-left"> <a href="http://localhost/opencart/admin/index.php?route=marketing/marketing&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;sort=m.date_added&amp;order=DESC">Date Added</a> </td>
                      <td class="text-right">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                  
                                    <tr>
                    <td class="text-center" colspan="8">No results!</td>
                  </tr>
                                      </tbody>
                  
                </table>
              </div>
            </form>
            <div class="row">
              <div class="col-sm-6 text-left"></div>
              <div class="col-sm-6 text-right">Showing 0 to 0 of 0 (0 Pages)</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
$('#button-filter').on('click', function() {
	url = 'index.php?route=marketing/marketing&user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT';
	
	var filter_name = $('input[name=\'filter_name\']').val();
	
	if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}
	
	var filter_code = $('input[name=\'filter_code\']').val();
	
	if (filter_code) {
		url += '&filter_code=' + encodeURIComponent(filter_code);
	}
		
	var filter_date_added = $('input[name=\'filter_date_added\']').val();
	
	if (filter_date_added) {
		url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
	}
	
	location = url;
});
//--></script> 
  <script type="text/javascript"><!--
$('.date').datetimepicker({
	language: 'en-gb',
	pickTime: false
});
//--></script> 
</div>

