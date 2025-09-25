<?php 
$this->extend('layout/master_admin'); $this->section('page'); $validation = \Config\Services::validation(); ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-user" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo base_url('admin/customer_group');?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
            </div>
            <h1>Customer Group</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                <li>
                    <a href="javascript:void();"><?php echo $page_title; ?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
               <?php if ($success = session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong><?php echo $success; ?></strong> </a>
                </div>
                <?php endif ?>

                <?php if ($error = session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong><?php echo $error; ?></strong> </a>
                </div>
                <?php endif ?>

                <h3 class="panel-title">
                    <i class="fa fa-pencil"></i>
                    <?php echo $page_title; ?>
                </h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Customer Group Name</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="https://demo.opencart.com/admin/language/en-gb/en-gb.png" title="English" /></span>
                                <input type="text" name="group_name" value="<?php echo set_value('group_name',$group_name); ?>" placeholder="Customer Group Name" class="form-control" />
                            </div>
                             <?php echo $validation->hasError('group_name')?$validation->showError('group_name','my_single'):''; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-description1">Description</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="https://demo.opencart.com/admin/language/en-gb/en-gb.png" title="English" /></span>
                                <textarea name="description" rows="5" placeholder="Description" id="input-description1" class="form-control"><?php echo $description; ?></textarea>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="" data-original-title="Customer can see the price.">Show Price Customers</span></label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="price_approval" value="1" <?php echo $price_approval==1?'checked':'';?> />&nbsp; Yes &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="price_approval" value="0" <?php echo $price_approval==0?'checked':'';?>  /> No
                            </label>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                        <div class="col-sm-10">
                            <input type="text" name="sort_order" value="<?php echo $sort_order; ?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-status">Status</label>
                      <div class="col-sm-10">
                      <select name="status" id="input-status" class="form-control">
                      <option value="0" <?php echo $status==0?'selected':''; ?>>Disabled</option>
                      <option value="1" <?php echo $status==1?'selected':''; ?>>Enabled</option>
                      </select>
                      </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection();?>
