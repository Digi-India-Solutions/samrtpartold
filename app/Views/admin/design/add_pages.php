<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="submit" form="form-information" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/pages'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
   </div>
   <h1><?php echo $page_title; ?></h1>
   <ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
   </ul>
  </div>
 </div>
 <div class="container-fluid">
  <div class="panel panel-default">
   <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
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
   </div>
   <div class="panel-body">
   
    <?php echo form_open_multipart($form_action,'id="form-information" class="form-horizontal"'); ?>

     <ul class="nav nav-tabs">
      <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
      <li><a href="#tab-data" data-toggle="tab">Data</a></li>
       <li><a href="#tab-design" data-toggle="tab">FAQ</a></li>
      <li><a href="#tab-seo" data-toggle="tab">SEO</a></li>
     
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="tab-general">
       <ul class="nav nav-tabs" id="language">
        <li>
         <a href="#language1" data-toggle="tab"> English</a>
        </li>
       </ul>
       <div class="tab-content">
        <div class="tab-pane" id="language1">
         <div class="form-group required">
         <label class="col-sm-2 control-label" for="input-title1">Page Title</label>
          <div class="col-sm-10">
           <input type="text" name="title"  placeholder="Page Title" id="input-title1" class="form-control" value="<?php echo set_value('title',$title); ?>" />
            <?php echo $validation->hasError('title')?$validation->showError('title','my_single'):''; ?>
          </div>

         </div>

        <div class="form-group required">
         <label class="col-sm-2 control-label" for="input-title1">Short Description</label>
          <div class="col-sm-10">
           <input type="text" name="sort_des"  placeholder="Short Description" id="input-title1" class="form-control" value="<?php echo set_value('sort_des',$sort_des); ?>" />
           
          </div>

         </div>

         <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-description1">Description</label>
          <div class="col-sm-10">
           <textarea name="description" data-toggle="summernote" placeholder="Description"  class="form-control"><?php echo set_value('description',$description); ?></textarea>
               
          </div>
         </div>
      

         <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-meta-title1">Meta Tag Title</label>
          <div class="col-sm-10">
           <input type="text" name="m_title" value="<?php echo set_value('m_title',$m_title); ?>" placeholder="Meta Tag Title" id="input-meta-title1" class="form-control" />
          </div>
         </div>
         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-description1">Meta Tag Description</label>
          <div class="col-sm-10">
           <textarea name="m_description" rows="5" placeholder="Meta Tag Description" id="input-meta-description1" class="form-control"><?php echo set_value('m_description',$m_description); ?></textarea>
          </div>
         </div>
         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-keyword1">Meta Tag Keywords</label>
          <div class="col-sm-10">
           <textarea name="m_keyword" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword1" class="form-control"><?php echo set_value('m_keyword',$m_keyword); ?></textarea>
          </div>
         </div>
        </div>
       </div>
      </div>
      <div class="tab-pane" id="tab-data">
  
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Top Header Image</label>
         <div class="col-sm-10">
          <?php if(!empty($top_image)){?>
            <img src="<?php echo base_url($top_image);?>" alt="" height="100" width="100">
            <?php } ?>
         <input type="file" name="top_image"  id="input-sort-order" class="form-control" />
        </div>
       </div>
    
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
        <div class="col-sm-10">
         <input type="number" name="sort_order" value="<?php echo set_value('sort_order',$sort_order); ?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
        </div>
       </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Statusr</label>
        <div class="col-sm-10">
          <select name="status" class="form-control">
         <option value="1" <?php echo $status==1?'selected':''; ?>>Enabled</option>
         <option value="0" <?php echo $status==0?'selected':''; ?>>Disabled</option>
          </select>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-bottom"><span data-toggle="tooltip" title="Display in the bottom footer.">Show in Bottom</span></label>
        <div class="col-sm-10">
         <div class="checkbox">
          <label> <input type="checkbox" name="bottom" value="1" id="input-bottom" <?php echo $bottom?'checked':''; ?> /> &nbsp;</label>
         </div>
        </div>
       </div>

      </div>
      <div class="tab-pane" id="tab-seo">
       <div class="alert alert-info"><i class="fa fa-info-circle"></i> Do not use spaces, instead replace spaces with - and make sure the SEO URL is globally unique.</div>
       <div class="table-responsive">
        <table class="table table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Stores</td>
           <td class="text-left">Keyword</td>
          </tr>
         </thead>
         <tbody>
          <tr>
           <td class="text-left">Default</td>
           <td class="text-left">
            <div class="input-group">
             <span class="input-group-addon">
              <!-- <img src="language/en-gb/en-gb.png" title="English" /> -->
            </span>
             <input type="text" name="keyword" value="<?php echo set_value('keyword',$slug); ?>" placeholder="Keyword" class="form-control" />
            </div>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
      <div class="tab-pane" id="tab-design">

        <div class="form-group">
      
        <div class="col-sm-12">
        <button type="button" onclick="add_faq();" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i>&nbsp; Add New</button>
        </div>
       </div>
      
        <?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
        
        
      
        <div class="removefaq<?php echo $value->id; ?>">
          <div class="col-sm-12">
        <button type="button" onclick="remove_faq(<?php echo $value->id; ?>);" class="btn btn-danger" style="float: right;"><i class="fa fa-minus"></i>&nbsp; Add New</button>
        </div>
        
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Question</label>
        <div class="col-sm-10">
         <textarea name="question[]" class="form-control"><?php echo $value->question; ?></textarea>
        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Answer</label>
        <div class="col-sm-10">
         <textarea name="answer[]" data-toggle="summernote" rows="3" class="form-control summernote"><?php echo $value->answer; ?></textarea>
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
        <div class="col-sm-4">
         <input type="number" name="fsort_order[]" value="<?php echo $value->sort_order; ?>" class="form-control">
        </div>
        <label class="col-sm-2 control-label" for="input-sort-order">Status</label>
        <div class="col-sm-4">
         <select class="form-control" name="fstatus[]">
           <option value="1" <?php echo $value->status==1?'selected':''; ?>>Enabled</option>
           <option value="0" <?php echo $value->status==0?'selected':''; ?>>Disabled</option>
         </select>
        </div>
       </div>
       <hr>
        </div>
        <?php } }else{ ?>
            <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Question</label>
        <div class="col-sm-10">
         <textarea name="question[]" class="form-control"></textarea>
        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Answer</label>
        <div class="col-sm-10">
         <textarea name="answer[]" class="form-control"></textarea>
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
        <div class="col-sm-4">
         <input type="number" name="fsort_order[]" class="form-control">
        </div>
        <label class="col-sm-2 control-label" for="input-sort-order">Status</label>
        <div class="col-sm-4">
         <select class="form-control" name="fstatus[]">
           <option value="1">Enabled</option>
           <option value="0">Disabled</option>
         </select>
        </div>
       </div>
       <hr>

        <?php } ?>

       <div id="faq"></div>

      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
 <link href="<?php echo base_url('assets/'); ?>javascript/codemirror/lib/codemirror.css" rel="stylesheet" />
 <link href="<?php echo base_url('assets/'); ?>javascript/codemirror/theme/monokai.css" rel="stylesheet" />
 <script type="text/javascript" src="<?php echo base_url('assets/'); ?>javascript/codemirror/lib/codemirror.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/'); ?>javascript/codemirror/lib/xml.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/'); ?>javascript/codemirror/lib/formatting.js"></script>

 
 <script type="text/javascript">
  <!--
  $('#language a:first').tab('show');
  //-->
 </script>
</div>


<script type="text/javascript">
  var room = 0;
  function add_faq() {

     room++;
    var objTo = document.getElementById('faq')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removefaq"+room);
    var rdiv = 'removeclass'+room;
    divtest.innerHTML = ' <div class="form-group"> <div class="col-sm-12"> <button type="button" class="btn btn-danger" style="float: right;" onclick="remove_faq('+room+')"><i class="fa fa-minus"></i>&nbsp; Remove</button> </div> </div> <div class="form-group"> <label class="col-sm-2 control-label" for="input-sort-order">Question</label> <div class="col-sm-10"> <textarea name="question[]" class="form-control"></textarea> </div> </div> <div class="form-group"> <label class="col-sm-2 control-label" for="input-sort-order">Answer</label> <div class="col-sm-10"> <textarea name="answer[]" rows="4" class="form-control"></textarea> </div> </div> <div class="form-group"> <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label> <div class="col-sm-4"> <input type="number" name="fsort_order[]" class="form-control"> </div> <label class="col-sm-2 control-label" for="input-sort-order">Status</label> <div class="col-sm-4"> <select class="form-control" name="fstatus[]"> <option value="1">Enabled</option> <option value="0">Disabled</option> </select> </div> </div>  <hr>';
    
    objTo.appendChild(divtest)
}

function remove_faq(rid) {
   $('.removefaq'+rid).remove();
}
</script>


<?php $this->endSection(); ?>