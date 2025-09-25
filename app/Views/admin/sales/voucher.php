<?php include('header.php'); ?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" id="button-send" data-toggle="tooltip" title="Send" class="btn btn-warning"><i class="fa fa-envelope"></i></button>
        <a href="add_voucher.php" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-voucher').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Gift Vouchers</h1>
      <ul class="breadcrumb">
                <li><a href="http://localhost/opencart/admin/index.php?route=common/dashboard&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW">Home</a></li>
                <li><a href="http://localhost/opencart/admin/index.php?route=sale/voucher&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW">Gift Vouchers</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Gift Voucher List</h3>
      </div>
      <div class="panel-body">
        <form action="http://localhost/opencart/admin/index.php?route=sale/voucher/delete&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW" method="post" enctype="multipart/form-data" id="form-voucher">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=sale/voucher&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;sort=v.code&amp;order=ASC">Code</a>
                    </td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=sale/voucher&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;sort=v.from_name&amp;order=ASC">From</a>
                    </td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=sale/voucher&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;sort=v.to_name&amp;order=ASC">To</a>
                    </td>
                  <td class="text-right">                    <a href="http://localhost/opencart/admin/index.php?route=sale/voucher&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;sort=v.amount&amp;order=ASC">Amount</a>
                    </td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=sale/voucher&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;sort=theme&amp;order=ASC">Theme</a>
                    </td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=sale/voucher&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;sort=v.status&amp;order=ASC">Status</a>
                    </td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=sale/voucher&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;sort=v.date_added&amp;order=ASC" class="desc">Date Added</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                                <tr>
                  <td class="text-center" colspan="9">No results!</td>
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
  <script type="text/javascript"><!--
$('#button-send').on('click', function() {
	$.ajax({
		url: 'index.php?route=sale/voucher/send&user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW',
		type: 'post',
		dataType: 'json',
		data: $('input[name^=\'selected\']:checked'),
		beforeSend: function() {
			$('#button-send i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
			$('#button-send').prop('disabled', true);
		},	
		complete: function() {
			$('#button-send i').replaceWith('<i class="fa fa-envelope"></i>');
			$('#button-send').prop('disabled', false);
		},
		success: function(json) {
			$('.alert-dismissible').remove();
			
			if (json['error']) {
				$('#content > .container-fluid').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}
			
			if (json['success']) {
				$('#content > .container-fluid').prepend('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
			}		
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});	
})
//--></script></div>
<?php include('footer.php'); ?>
