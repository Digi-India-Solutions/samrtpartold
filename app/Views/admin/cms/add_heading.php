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
        <a href="<?php echo base_url('admin/heading'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
               <legend>About Detail</legend>
            <div class="form-group required">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="heading" class="form-control" value="<?php echo set_value('heading',$heading); ?>" />
                </div>
                <?php echo $validation->hasError('heading')?$validation->showError('heading','my_single'):''; ?>
               </div>
            </div>

            <div class="form-group required">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10"> 

                <div class="input-group">
                 <textarea  data-toggle="summernote" name="description" class="form-control"> <?php echo set_value('description',$description); ?> </textarea>
                </div>
                <?php echo $validation->hasError('description')?$validation->showError('description','my_single'):''; ?>
               </div>
            </div>

             <div class="form-group required">
              <label class="col-sm-2 control-label">Video Thumbnail Image</label>
              <div class="col-sm-10"> 
              <?php if($thumbnail){?>
                <img src="<?php echo base_url($thumbnail);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="file"  name="thumbnail" class="form-control" />
                </div>
                </div>
            </div>

            <div class="form-group required">
              <label class="col-sm-2 control-label">Video</label>
              <div class="col-sm-10"> 
              <?php if($video){?>
                <video width="320" height="240" controls>
                <source src="<?php echo base_url($video);?>" type="video/mp4">
                </video>
               
                <?php } ?>
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="file"  name="video" class="form-control" />
                </div>
                </div>
            </div>

            <div class="form-group required">
              <label class="col-sm-2 control-label">Video Title</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="vtitle" class="form-control" value="<?php echo set_value('vtitle',$vtitle); ?>" />
                </div>
                <?php echo $validation->hasError('vtitle')?$validation->showError('vtitle','my_single'):''; ?>
               </div>
            </div>



            <legend>Our Main Goals</legend>
            <div class="form-group required">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="heading1" class="form-control" value="<?php echo set_value('heading1',$heading1); ?>" />
                </div>
                <?php echo $validation->hasError('heading1')?$validation->showError('heading1','my_single'):''; ?>
               </div>
            </div>

             <legend>Our Story</legend>

             <div class="form-group required">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="oheading" class="form-control" value="<?php echo set_value('oheading',$oheading); ?>" />
                </div>
                <?php echo $validation->hasError('oheading')?$validation->showError('oheading','my_single'):''; ?>
               </div>
            </div>

             <div class="form-group required">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10"> 

                <div class="input-group">
                 <textarea  data-toggle="summernote" name="odescription" class="form-control"> <?php echo set_value('odescription',$odescription); ?> </textarea>
                </div>
                <?php echo $validation->hasError('odescription')?$validation->showError('odescription','my_single'):''; ?>
               </div>
            </div>


            <div class="form-group required">
              <label class="col-sm-2 control-label">Image</label>
              <div class="col-sm-10"> 
              <?php if($oimage){?>
                <img src="<?php echo base_url($oimage);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="file"  name="oimage" class="form-control" />
                </div>
                </div>
            </div>

            <legend>Who We Are?</legend>
            
            <div class="form-group required">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="wheading" class="form-control" value="<?php echo set_value('wheading',$wheading); ?>" />
                </div>
                <?php echo $validation->hasError('wheading')?$validation->showError('wheading','my_single'):''; ?>
               </div>
            </div>
              <div class="form-group required">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10"> 

                <div class="input-group">
                 <textarea  data-toggle="summernote" name="wdescription" class="form-control"> <?php echo set_value('wdescription',$wdescription); ?> </textarea>
                </div>
                <?php echo $validation->hasError('wdescription')?$validation->showError('wdescription','my_single'):''; ?>
               </div>
            </div>


            <div class="form-group required">
              <label class="col-sm-2 control-label">Image</label>
              <div class="col-sm-10"> 
              <?php if($wimage){?>
                <img src="<?php echo base_url($wimage);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="file"  name="wimage" class="form-control" />
                </div>
                </div>
            </div>




          <legend>Meet Our Leadership</legend>
            <div class="form-group required">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('mheading',$mheading); ?>" name="mheading" class="form-control" />
                </div>
               
               </div>
            </div>


          <legend>Cutomer Reviews</legend>
            <div class="form-group required">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('cheading',$cheading); ?>" name="cheading" class="form-control" />
                </div>
               
               </div>
            </div>
               



            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Status</label>
              <div class="col-sm-10">
                <select class="form-control" name="status" id="status" required="required">
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