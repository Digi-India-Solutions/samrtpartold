<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-download" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/downloads'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">   
                <li><a href="">Home</a></li>
                <li><a href=""><?php echo $page_title; ?></a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
         <?php if ($success = $this->session->flashdata('success')): ?>
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong><?php echo $success; ?></strong> </a>
    </div>
    <?php endif ?>

    <?php if ($error = $this->session->flashdata('error')): ?>
      <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong><?php echo $error; ?></strong> </a>
    </div>
    <?php endif ?>
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
      </div>
      <div class="panel-body">
        
         <?php echo form_open_multipart($form_action,'id="form-download" class="form-horizontal"'); ?>
          <div class="form-group required">
            <label class="col-sm-2 control-label">Download Name</label>
            <div class="col-sm-10">
                <div class="input-group"> <span class="input-group-addon"></span>
                <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="Download Name" class="form-control" />
              </div>
              </div>
          </div>

          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-filename"><span data-toggle="tooltip" title="You can upload via the upload button or use FTP to upload to the download directory and enter the details below.">Upload File</span></label>
            <div class="col-sm-10">
              <div class="input-group">
                <?php if ($file): ?>
                  <a href="<?php echo base_url($file); ?>" target="_blank" title="click to view"><i class="fa fa-file-pdf-o fa-2x"></i></a>
                <?php endif ?>
                <input type="file" name="file" id="input-filename" class="form-control" />
               
               </div>
              </div>
          </div>
<!-- 
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-mask"><span data-toggle="tooltip" title="It is recommended that the filename and the mask are different to stop people trying to directly link to your downloads.">Mask</span></label>
            <div class="col-sm-10">
              <input type="text" name="mask" value="" placeholder="Mask" id="input-mask" class="form-control" />
            </div>
          </div> -->

        </form>
      </div>
    </div>
  </div>
<script type="text/javascript"><!--
$('#button-upload').on('click', function() {
	$('#form-upload').remove();

	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

	$('#form-upload input[name=\'file\']').trigger('click');

	if (typeof timer != 'undefined') {
    	clearInterval(timer);
	}

	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);

			$.ajax({
				url: 'index.php?route=catalog/download/upload&user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW',
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$('#button-upload').button('loading');
				},
				complete: function() {
					$('#button-upload').button('reset');
				},
				success: function(json) {
					if (json['error']) {
						alert(json['error']);
					}

					if (json['success']) {
						alert(json['success']);

						$('input[name=\'filename\']').val(json['filename']);
						$('input[name=\'mask\']').val(json['mask']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
//--></script></div>
