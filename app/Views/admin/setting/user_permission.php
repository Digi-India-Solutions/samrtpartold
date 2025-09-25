<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="add_user_permission.php" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-user-group').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>User Groups</h1>
      <ul class="breadcrumb">
               <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> User Group</h3>
      </div>
      <div class="panel-body">
        <form action="http://localhost/opencart/admin/index.php?route=user/user_permission/delete&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT" method="post" enctype="multipart/form-data" id="form-user-group">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=user/user_permission&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;sort=name&amp;order=DESC" class="asc">User Group Name</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="1" />
                    </td>
                  <td class="text-left">Administrator</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=user/user_permission/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;user_group_id=1" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="10" />
                    </td>
                  <td class="text-left">Demonstration</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=user/user_permission/edit&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&amp;user_group_id=10" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"></div>
          <div class="col-sm-6 text-right">Showing 1 to 2 of 2 (1 Pages)</div>
        </div>
      </div>
    </div>
  </div>
</div>
