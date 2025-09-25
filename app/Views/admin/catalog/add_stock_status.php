<?php include('header.php'); ?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-stock-status" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="stock_status.php" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Stock Statuses</h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="#">Stock Statuses</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Stock Status</h3>
      </div>
      <div class="panel-body">
        <form action="http://localhost/opencart/admin/index.php?route=localisation/stock_status/add&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT" method="post" enctype="multipart/form-data" id="form-stock-status" class="form-horizontal">
          <div class="form-group required">
            <label class="col-sm-2 control-label">Stock Status Name</label>
            <div class="col-sm-10">
                            <div class="input-group"> <span class="input-group-addon"><img src="language/en-gb/en-gb.png" title="English" /></span>
                <input type="text" name="stock_status[1][name]" value="" placeholder="Stock Status Name" class="form-control" />
              </div>
                                        </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>

