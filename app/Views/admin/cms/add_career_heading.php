<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-filter" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/career_heading'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
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
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
      </div>
      <div class="panel-body">
  
        <?php echo form_open_multipart($form_action,'id="form-filter" class="form-horizontal"'); ?>  


          <fieldset id="option-value">
            <legend>Life @Smart Parts Exports</legend>
            

            <div class="form-group required">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="heading" class="form-control" value="<?php echo set_value('heading',$heading); ?>" />
                </div>
                <?php echo $validation->hasError('heading')?$validation->showError('heading','my_single'):''; ?>
               </div>
            </div>
            
               


            <legend>Counter 1</legend>
             <div class="form-group ">
              <label class="col-sm-2 control-label">Value</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('cv1',$cv1); ?>" name="cv1" class="form-control" />
                </div>
               </div>
            </div>
              <div class="form-group ">
              <label class="col-sm-2 control-label">Heading </label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('ch1',$ch1); ?>" name="ch1" class="form-control" />
                </div>
               </div>
            </div>
             <legend>Counter 2</legend>
             <div class="form-group ">
              <label class="col-sm-2 control-label">Value</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('cv2',$cv2); ?>" name="cv2" class="form-control" />
                </div>
               </div>
            </div>
              <div class="form-group ">
              <label class="col-sm-2 control-label">Heading </label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('ch2',$ch2); ?>" name="ch2" class="form-control" />
                </div>
               </div>
            </div>
            
            <legend>Counter 3</legend>
             <div class="form-group ">
              <label class="col-sm-2 control-label">Value</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('cv3',$cv3); ?>" name="cv3" class="form-control" />
                </div>
               </div>
            </div>
              <div class="form-group ">
              <label class="col-sm-2 control-label">Heading </label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('ch3',$ch3); ?>" name="ch3" class="form-control" />
                </div>
               </div>
            </div>

             <legend>Counter 4</legend>
             <div class="form-group ">
              <label class="col-sm-2 control-label">Value</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('cv4',$cv4); ?>" name="cv4" class="form-control" />
                </div>
               </div>
            </div>
              <div class="form-group ">
              <label class="col-sm-2 control-label">Heading </label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('ch4',$ch4); ?>" name="ch4" class="form-control" />
                </div>
               </div>
            </div>

           
        
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Status</label>
              <div class="col-sm-10">
                <select class="form-control" name="status" id="status">
                  <option value=""> Select option </option>
                  <option value="1" <?php echo $status==1?'selected':''; ?>> Active </option>
                  <option value="0" <?php echo $status==0?'selected':''; ?>> Deactive </option>

                </select>
            
              </div>
            </div>
          </fieldset>
          
        </form>
      </div>
    </div>
  </div>

</div>

<?php $this->endSection(); ?>