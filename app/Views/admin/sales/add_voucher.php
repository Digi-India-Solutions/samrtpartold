<?php include('header.php'); ?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
                <button type="submit" form="form-voucher" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="voucher.php" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Gift Vouchers</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Gift Voucher</h3>
      </div>
      <div class="panel-body">
        <form action="http://localhost/opencart/admin/index.php?route=sale/voucher/add&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW" method="post" enctype="multipart/form-data" id="form-voucher" class="form-horizontal">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
                      </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-code"><span data-toggle="tooltip" title="The code the customer enters to activate the voucher.">Code</span></label>
                <div class="col-sm-10">
                  <input type="text" name="code" value="" placeholder="Code" id="input-code" class="form-control" />
                                  </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-from-name">From Name</label>
                <div class="col-sm-10">
                  <input type="text" name="from_name" value="" placeholder="From Name" id="input-from-name" class="form-control" />
                                  </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-from-email">From E-Mail</label>
                <div class="col-sm-10">
                  <input type="text" name="from_email" value="" placeholder="From E-Mail" id="input-from-email" class="form-control" />
                                  </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-to-name">To Name</label>
                <div class="col-sm-10">
                  <input type="text" name="to_name" value="" placeholder="To Name" id="input-to-name" class="form-control" />
                                  </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-to-email">To E-Mail</label>
                <div class="col-sm-10">
                  <input type="text" name="to_email" value="" placeholder="To E-Mail" id="input-to-email" class="form-control" />
                                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-theme">Theme</label>
                <div class="col-sm-10">
                  <select name="voucher_theme_id" id="input-theme" class="form-control">
                                                            <option value="7">Birthday</option>
                                                                                <option value="6">Christmas</option>
                                                                                <option value="8">General</option>
                                                          </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-message">Message</label>
                <div class="col-sm-10">
                  <textarea name="message" rows="5" placeholder="Message" id="input-message" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-amount">Amount</label>
                <div class="col-sm-10">
                  <input type="text" name="amount" value="" placeholder="Amount" id="input-amount" class="form-control" />
                                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Status</label>
                <div class="col-sm-10">
                  <select name="status" id="input-status" class="form-control">
                                        <option value="1" selected="selected">Enabled</option>
                    <option value="0">Disabled</option>
                                      </select>
                </div>
              </div>
            </div>
                      </div>
        </form>
      </div>
    </div>
  </div>
  </div>
<?php include('footer.php'); ?>
