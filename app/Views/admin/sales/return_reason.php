<?php include('header.php'); ?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="add_return_reason.php" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-return-reason').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Return Reasons</h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="#">Return Reasons</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Return Reason List</h3>
      </div>
      <div class="panel-body">
        <form action="http://localhost/opencart/admin/index.php?route=localisation/return_reason/delete&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT" method="post" enctype="multipart/form-data" id="form-return-reason">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=localisation/return_reason&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;sort=name&amp;order=DESC" class="asc">Return Reason Name</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="1" />
                    </td>
                  <td class="text-left">Dead On Arrival</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=localisation/return_reason/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;return_reason_id=1" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="4" />
                    </td>
                  <td class="text-left">Faulty, please supply details</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=localisation/return_reason/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;return_reason_id=4" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="3" />
                    </td>
                  <td class="text-left">Order Error</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=localisation/return_reason/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;return_reason_id=3" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="5" />
                    </td>
                  <td class="text-left">Other, please supply details</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=localisation/return_reason/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;return_reason_id=5" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="2" />
                    </td>
                  <td class="text-left">Received Wrong Item</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=localisation/return_reason/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;return_reason_id=2" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"></div>
          <div class="col-sm-6 text-right">Showing 1 to 5 of 5 (1 Pages)</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>