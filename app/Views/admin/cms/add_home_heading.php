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
        <a href="<?php echo base_url('admin/home_heading'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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

             <legend>High Quality Standards</legend>
            
              <div class="form-group">
              <label class="col-sm-2 control-label">High Quality Standards</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="t_heading" class="form-control" value="<?php echo set_value('t_heading',$t_heading); ?>" />
                </div>
                <?php echo $validation->hasError('t_heading')?$validation->showError('t_heading','my_single'):''; ?>
               </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Orignal, Aftermarket & OEM Parts</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="t_sub_heading" class="form-control" value="<?php echo set_value('t_sub_heading',$t_sub_heading); ?>" />
                </div>
           
               </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Button Name</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="btn_name" class="form-control" value="<?php echo set_value('btn_name',$btn_name); ?>" />
                </div>
           
               </div>
            </div>


             <div class="form-group">
              <label class="col-sm-2 control-label">Button Link</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="btn_link" class="form-control" value="<?php echo set_value('btn_link',$btn_link); ?>" />
                </div>
           
               </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">From India to the World!</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="india_heading" class="form-control" value="<?php echo set_value('india_heading',$india_heading); ?>" />
                </div>
           
               </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                 <textarea name="india_des" class="form-control" rows="5"><?php echo set_value('india_des',$india_des); ?></textarea>
                </div>
           
               </div>
            </div>



            <legend>Let Smart Parts Exports Help You Choose Your Spare Parts</legend>
            

            <div class="form-group required">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="heading" class="form-control" value="<?php echo set_value('heading',$heading); ?>" />
                </div>
                <?php echo $validation->hasError('heading')?$validation->showError('heading','my_single'):''; ?>
               </div>
            </div>
            

          <legend>Step 1 </legend>

            <div class="form-group ">
              <label class="col-sm-2 control-label">icon</label>
              <div class="col-sm-10"> 
                   <?php if($icon1){?>
                <img src="<?php echo base_url($icon1);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group">
                <input type="file" name="icon1" class="form-control">
                </div>
               </div>
            </div>
            
            <div class="form-group ">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10"> 
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('step1title',$step1title); ?>" name="step1title" class="form-control" />
                </div>
               </div>
            </div>
          


             <legend>Step 2 </legend>

            <div class="form-group ">
              <label class="col-sm-2 control-label">icon</label>
              <div class="col-sm-10"> 
                   <?php if($icon2){?>
                <img src="<?php echo base_url($icon2);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group">
                <input type="file" name="icon2" class="form-control">
                </div>
               </div>
            </div>
            
            <div class="form-group ">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10"> 
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('step2title',$step2title); ?>" name="step2title" class="form-control" />
                </div>
               </div>
            </div>
           

            
            <legend>Step 3 </legend>

            <div class="form-group ">
              <label class="col-sm-2 control-label">icon</label>
              <div class="col-sm-10"> 
                   <?php if($icon3){?>
                <img src="<?php echo base_url($icon3);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group">
                <input type="file" name="icon3" class="form-control">
                </div>
               </div>
            </div>
            
            <div class="form-group ">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10"> 
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('step3title',$step3title); ?>" name="step3title" class="form-control" />
                </div>
               </div>
            </div>

            <legend>Step 4 </legend>

            <div class="form-group ">
              <label class="col-sm-2 control-label">icon</label>
              <div class="col-sm-10"> 
                   <?php if($icon4){?>
                <img src="<?php echo base_url($icon4);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group">
                <input type="file" name="icon4" class="form-control">
                </div>
               </div>
            </div>
            
            <div class="form-group ">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10"> 
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('step4title',$step4title); ?>" name="step4title" class="form-control" />
                </div>
               </div>
            </div>

            <legend>Step 5 </legend>

            <div class="form-group ">
              <label class="col-sm-2 control-label">icon</label>
              <div class="col-sm-10"> 
                   <?php if($icon5){?>
                <img src="<?php echo base_url($icon5);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group">
                <input type="file" name="icon5" class="form-control">
                </div>
               </div>
            </div>
            
            <div class="form-group ">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10"> 
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('step5title',$step5title); ?>" name="step5title" class="form-control" />
                </div>
               </div>
            </div>


             <legend>Step 6 </legend>

            <div class="form-group ">
              <label class="col-sm-2 control-label">icon</label>
              <div class="col-sm-10"> 
                   <?php if($icon6){?>
                <img src="<?php echo base_url($icon6);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group">
                <input type="file" name="icon6" class="form-control">
                </div>
               </div>
            </div>
            
            <div class="form-group ">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10"> 
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('step6title',$step6title); ?>" name="step6title" class="form-control" />
                </div>
               </div>
            </div>





           <legend>Most Popular Parts</legend>

            <div class="form-group ">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('heading2',$heading2); ?>" name="heading2" class="form-control" />
                </div>
                </div>
            </div>

            <legend>Search by Category</legend>

            <div class="form-group ">
            <label class="col-sm-2 control-label">Heading</label>
            <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                <input type="text" value="<?php echo set_value('heading3',$heading3); ?>" name="heading3" class="form-control" />
                </div>
                </div>
            </div>

            <legend>Search by Vehicle</legend>

            <div class="form-group ">
            <label class="col-sm-2 control-label">Heading</label>
            <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                <input type="text" value="<?php echo set_value('heading4',$heading4); ?>" name="heading4" class="form-control" />
                </div>
                </div>
            </div>

           <legend>Search by Brand</legend>

            <div class="form-group ">
            <label class="col-sm-2 control-label">Heading</label>
            <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                <input type="text" value="<?php echo set_value('heading5',$heading5); ?>" name="heading5" class="form-control" />
                </div>
                </div>
            </div>



          <legend>Smart Parts Exports – #1 Online</legend>
           
               <div class="form-group ">
              <label class="col-sm-2 control-label">Side Image</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="file"  name="side_image" class="form-control" />
                </div>
               
               </div>
            </div>

            <div class="form-group ">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('smart_heading',$smart_heading); ?>" name="smart_heading" class="form-control" />
                </div>
               </div>
            </div>
       
            <div class="form-group ">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10"> 

                <div class="">
                 <textarea rows="4"  name="smart_des" class="form-control"> <?php echo set_value('smart_des',$smart_des); ?> </textarea>
                </div>
                <?php echo $validation->hasError('smart_des')?$validation->showError('smart_des','my_single'):''; ?>
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



            
            <legend>Smart Parts Experts Support</legend>
            <div class="form-group ">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('sup_heading',$sup_heading); ?>" name="sup_heading" class="form-control" />
                </div>
                <?php echo $validation->hasError('sup_heading')?$validation->showError('sup_heading','my_single'):''; ?>
               </div>
            </div>

             <div class="form-group ">
              <label class="col-sm-2 control-label">Sub Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('sup_sub_heading',$sup_sub_heading); ?>" name="sup_sub_heading" class="form-control" />
                </div>
                <?php echo $validation->hasError('sup_sub_heading')?$validation->showError('sup_sub_heading','my_single'):''; ?>
               </div>
            </div>

            <div class="form-group ">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('sup_des',$sup_des); ?>" name="sup_des" class="form-control" />
                </div>
                <?php echo $validation->hasError('sup_des')?$validation->showError('sup_des','my_single'):''; ?>
               </div>
            </div>
          
            <div class="form-group ">
              <label class="col-sm-2 control-label">Background Image</label>
              <div class="col-sm-10"> 
              <?php if($sup_image){?>
                <img src="<?php echo base_url($sup_image);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="file" name="sup_image" class="form-control" />
                </div>
               
               </div>
            </div>
            <div class="form-group ">
              <label class="col-sm-2 control-label">Link</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('link',$link); ?>" name="link" class="form-control" />
                </div>
               
               </div>
            </div>
                    

              <legend>Our Blogs</legend>

            <div class="form-group ">
            <label class="col-sm-2 control-label">Heading</label>
            <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                <input type="text" value="<?php echo set_value('blog_heading',$blog_heading); ?>" name="blog_heading" class="form-control" />
                </div>
                </div>
            </div>



            <legend>Subscribe to Newsletters Section</legend>
            <div class="form-group ">
              <label class="col-sm-2 control-label">Heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('news_heading',$news_heading); ?>" name="news_heading" class="form-control" />
                </div>
                </div>
            </div>

            <div class="form-group ">
              <label class="col-sm-2 control-label">Sub heading</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" value="<?php echo set_value('news_sub_heading',$news_sub_heading); ?>" name="news_sub_heading" class="form-control" />
                </div>
                </div>
            </div>
            <div class="form-group ">
              <label class="col-sm-2 control-label">Background Image</label>
              <div class="col-sm-10"> 
              <?php if($news_image){?>
                <img src="<?php echo base_url($news_image);?>" alt="" width="100" height="100">
                <?php } ?>
                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="file" name="news_image" class="form-control" />
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