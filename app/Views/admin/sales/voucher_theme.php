
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="add_voucher_theme.php" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-voucher-theme').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Voucher Themes</h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="#">Voucher Themes</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Voucher Theme List</h3>
      </div>
      <div class="panel-body">
        <form action="http://localhost/opencart/admin/index.php?route=sale/voucher_theme/delete&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW" method="post" enctype="multipart/form-data" id="form-voucher-theme">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=sale/voucher_theme&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;sort=name&amp;order=DESC">Voucher Theme Name</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="7" />
                    </td>
                  <td class="text-left">Birthday</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=sale/voucher_theme/edit&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;voucher_theme_id=7" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="6" />
                    </td>
                  <td class="text-left">Christmas</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=sale/voucher_theme/edit&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;voucher_theme_id=6" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="8" />
                    </td>
                  <td class="text-left">General</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=sale/voucher_theme/edit&amp;user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&amp;voucher_theme_id=8" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
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

