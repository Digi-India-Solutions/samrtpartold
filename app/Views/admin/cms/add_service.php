
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-filter" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/services'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
        <li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">     <div class="panel panel-default">
      <div class="panel-heading">
        <?php if ($success = $this->session->flashdata('success')): ?>
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong><?php echo $success; ?></strong> </a>
    </div>
    <?php endif ?>

    <?php if ($error = $this->session->flashdata('error')): ?>
      <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong><?php echo $error; ?></strong> </a>
    </div>
    <?php endif ?>
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
      </div>
      <div class="panel-body">
  
        <?php echo form_open_multipart($form_action,'id="form-filter" class="form-horizontal"'); ?>  

           <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Select Category</label>
              <div class="col-sm-10">
                <select class="form-control" name="category_id" required="required">
                  <option value="">select category</option>
                  <?php foreach ($category_list as $key => $value): ?>
                    <option value="<?php echo $value->id; ?>" <?php echo $category_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
                  <?php endforeach ?>
                </select>
                <?php echo form_error('category_id'); ?>
              </div>
            </div>

       
              <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Main Title</label>
              <div class="col-sm-10">
                <input type="text" name="main_title" value="<?php echo set_value('main_title',$main_title); ?>" class="form-control">
                <?php echo form_error('main_title'); ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Title</label>
              <div class="col-sm-10">
                <input type="text" name="title" value="<?php echo set_value('title',$title); ?>" class="form-control">
                <?php echo form_error('title'); ?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="summernote" name="description"><?php echo set_value('description',$description); ?></textarea>
               
                <?php echo form_error('description'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Link</label>
              <div class="col-sm-10">
                <input type="text" name="link" value="<?php echo set_value('link',$link); ?>" class="form-control">
                <?php echo form_error('link'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Select Banner</label>
              <div class="col-sm-10">
                <select class="form-control" name="banner_id" required="required">
                  <option value="">select banner</option>
                  <?php foreach ($banner_list as $key => $value): ?>
                    <option value="<?php echo $value->id; ?>" <?php echo $banner_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
                  <?php endforeach ?>
                </select>
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
                <?php echo form_error('status'); ?>
              </div>
            </div>


            <br>
            <h3 class="text-center">Services</h3>

             <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order"></label>
              <div class="col-sm-10 ">
                <button type="button" onclick="add_services();" class="btn btn-success pull-right"><i class="fa fa-plus"></i></button>
              </div>
            </div>

         
            <?php if (!empty($services_detail)) {foreach ($services_detail as $key => $value) {?>
            <input type="hidden" name="old_id[]" value="<?php echo $value->id; ?>">
            <div class="removeclass<?php echo $value->id; ?>">
             <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order"></label>
              <div class="col-sm-10 ">
                <button type="button" onclick="return confirm('Are You sure to delete') && remove_row(<?php echo $value->id; ?>);" class="btn btn-danger pull-right"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Title</label>
              <div class="col-sm-10">
                <input type="text" name="s_title[]" value="<?php echo $value->s_title; ?>" class="form-control">
               </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="s_des[]"><?php echo $value->s_des; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Price</label>
              <div class="col-sm-10">
                <input type="number" name="s_price[]" value="<?php echo $value->s_price; ?>" class="form-control">
              </div>
            </div>
            </div>
             <?php } } ?>
          


        



            <div id="add_services"></div>




 
        </form>
      </div>
    </div>
  </div>

</div>

 <script type="text/javascript">


function remove_row(id){

  if (id) {
    $.ajax({
      url:"<?php echo base_url('admin/cms/delete_services_row'); ?>",
      type:"POST",
      data:{id:id,token:$('input[name="token"]').val()},
      success:function(data){

        var obj = JSON.parse(data);
        if (obj.status==1) {
          $('input[name="token"]').val(obj.token);
          remove_services(id);
        }else{
            $('input[name="token"]').val(obj.token);
          toastr.error(obj.msg);
        }
      }
    });
  }
}






   
var room = 1;
function add_services() {

     room++;
    var objTo = document.getElementById('add_services')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "removeclass"+room);
    var rdiv = 'removeclass'+room;
    divtest.innerHTML = ' <div class="form-group"> <label class="col-sm-2 control-label" for="input-sort-order"></label> <div class="col-sm-10 "> <button type="button" onclick="remove_services('+room+');" class="btn btn-danger pull-right"><i class="fa fa-times"></i></button> </div> </div> <div class="form-group"> <label class="col-sm-2 control-label" for="input-sort-order">Title</label> <div class="col-sm-10"> <input type="text" name="s_title[]" value="" class="form-control" required> </div> </div> <div class="form-group"> <label class="col-sm-2 control-label" for="input-sort-order">Description</label> <div class="col-sm-10"> <textarea class="form-control" rows="5" name="s_des[]"></textarea> </div> </div> <div class="form-group"> <label class="col-sm-2 control-label" for="input-sort-order">Price</label> <div class="col-sm-10"> <input type="number" name="s_price[]" value="" class="form-control"><hr style="    border-top: 4px solid #c4c4c4;"> </div> </div>';
    
    objTo.appendChild(divtest)
}

function remove_services(rid) {
   $('.removeclass'+rid).remove();
}
 </script>