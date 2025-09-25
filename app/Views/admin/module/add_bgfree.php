
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-manufacturer" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/bgfree'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href=""><?php echo $page_title; ?></a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid"> 
    <div class="panel panel-default">
      <div class="panel-heading">

         <?php if ($success = $this->session->flashdata('success')): ?>
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong><?php echo $success; ?></strong> </a>
    </div>
    <?php endif ?>

    <?php if ($error = $this->session->flashdata('error')): ?>
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong><?php echo $error; ?></strong> </a>
    </div>
    <?php endif ?>
    
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
      </div>
      <div class="panel-body">
        
        <?php echo form_open_multipart($form_action,'id="form-manufacturer" class="form-horizontal"'); ?>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
            <li><a href="#tab-seo" data-toggle="tab">Offer Detail</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
            
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name">Name </label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="Title" id="input-name" class="form-control" />
                  <?php echo form_error('name'); ?>
                  </div>
              </div>

              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name">Discount Type </label>
                <div class="col-sm-10">
                 <select name="discount_type" class="form-control">
                   <option value="FR" <?php echo $discount_type=='FR'?'selected':''; ?>>Free</option>
                   <option value="P" <?php echo $discount_type=='P'?'selected':''; ?>>Percentage</option>
                   <option value="F" <?php echo $discount_type=='F'?'selected':''; ?>>Fixed</option>
                 </select>
                </div>
              </div>

             <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name">Discount </label>
                <div class="col-sm-10">
                  <input type="number" name="discount" value="<?php echo set_value('discount',$discount); ?>" placeholder="Discount" id="input-name" class="form-control" />
                  <?php echo form_error('discount'); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-name">Date Start </label>
                <div class="col-sm-10">
                  <input type="date" name="date_start" value="<?php echo set_value('date_start',$date_start); ?>" placeholder="Bundle Title" id="input-name" class="form-control" />
                  <?php echo form_error('date_start'); ?>
                  </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-name">Date End </label>
                <div class="col-sm-10">
                  <input type="date" name="date_end" value="<?php echo set_value('date_end',$date_end); ?>" placeholder="Bundle Title" id="input-name" class="form-control" />
                  <?php echo form_error('date_end'); ?>
                  </div>
              </div>
           
          

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-filter"><span data-toggle="tooltip" title="(Autocomplete)">Select Product to buy</span></label>
              <div class="col-sm-10">
               <select class="form-control" name="product_id">
                    <option value="">select option</option>
                    
                    <?php foreach ($product_list as $key => $value): ?>
                    <option value="<?php echo $value->id; ?>" <?php echo @$value->id==$product_id?'selected':''; ?>><?php echo $value->name; ?></option>
                    <?php endforeach ?>
               </select>
              </div>
             </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-filter"><span data-toggle="tooltip" title="(Autocomplete)">Select Product to gift</span></label>
              <div class="col-sm-10">
                <p>Note: Leave it blank if Buy product is Gift product </p>
               <select class="multiple form-control" name="gift_product_id[]" multiple>
                    <option value="">select option</option>
                    
                    <?php foreach ($product_list as $key => $value): ?>
                    <option value="<?php echo $value->id; ?>" <?php echo @in_array($value->id, @$gift_product_id)?'selected':''; ?>><?php echo $value->name; ?></option>
                    <?php endforeach ?>
               </select>
              </div>
             </div>

               <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                 <div class="col-sm-10">
                  <input type="number" name="sort_order" value="<?php echo set_value('sort_order',$sort_order); ?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
                </div>
              </div>



              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name">Status </label>
                <div class="col-sm-10">
                 <select name="status" class="form-control">
                  <option value="">Select option</option>
                   <option value="1" <?php echo $status=='1'?'selected':''; ?>>Enabled</option>
                   <option value="0" <?php echo $status=='0'?'selected':''; ?>>Disabled</option>
                 </select>
                </div>
              </div>

            </div>
            <div class="tab-pane" id="tab-seo">
              
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-name">Coupon Code </label>
                <div class="col-sm-10">
                  <input type="text" name="coupon_code" value="<?php echo set_value('coupon_code',$coupon_code); ?>" placeholder="Coupon Code" id="input-name" class="form-control" />
                  <?php echo form_error('coupon_code'); ?>
                  </div>
              </div>

             <div class="form-group">
                <label class="col-sm-2 control-label" for="input-name">Ribbon Text </label>
                <div class="col-sm-10">
                  <input type="text" name="ribbon_text" value="<?php echo set_value('ribbon_text',$ribbon_text); ?>" placeholder="Ribbon Text" id="input-name" class="form-control" />
                  <?php echo form_error('ribbon_text'); ?>
                  </div>
              </div>

             <div class="form-group">
                <label class="col-sm-2 control-label" for="input-name">Offer heading </label>
                <div class="col-sm-10">
                  <input type="text" name="offer_heding" value="<?php echo set_value('offer_heding',$offer_heding); ?>" placeholder="Offer Heading" id="input-name" class="form-control" />
                  <?php echo form_error('offer_heding'); ?>
                  </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-name">Offer Description </label>
                <div class="col-sm-10">
                    <textarea name="offer_desciption" class="form-control" data-toggle="summernote">
                        <?php echo set_value('offer_desciption',$offer_desciption);?>
                    </textarea>    

                  <?php echo form_error('offer_desciption'); ?>
                  </div>
              </div>


            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
