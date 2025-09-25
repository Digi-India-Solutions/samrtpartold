<?php include('header.php'); ?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="add_return_status.php" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-return-status').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Return Statuses</h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="#">Return Statuses</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Return Status List</h3>
      </div>
      <div class="panel-body">
        <form action="http://localhost/opencart/admin/index.php?route=localisation/return_status/delete&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT" method="post" enctype="multipart/form-data" id="form-return-status">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=localisation/return_status&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;sort=name&amp;order=DESC" class="asc">Return Status Name</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="2" />
                    </td>
                  <td class="text-left">Awaiting Products <b>(Default)</b></td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=localisation/return_status/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;return_status_id=2" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="3" />
                    </td>
                  <td class="text-left">Complete</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=localisation/return_status/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;return_status_id=3" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="1" />
                    </td>
                  <td class="text-left">Pending</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=localisation/return_status/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;return_status_id=1" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"></div>
          <div class="col-sm-6 text-right">Showing 1 to 3 of 3 (1 Pages)</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
