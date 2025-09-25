<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="submit" form="form-store" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/store'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
   </div>
   <h1>Stores</h1>
   <ul class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Stores</a></li>
    <li><a href="">Settings</a></li>
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
   
    <?php echo form_open_multipart($form_action,'id="form-store" class="form-horizontal"'); ?>

     <ul class="nav nav-tabs">
      <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
      <li><a href="#tab-store" data-toggle="tab">Store</a></li>
      <li><a href="#tab-local" data-toggle="tab">Local</a></li>
       <li><a href="#tab-distributor" data-toggle="tab">Distributer</a></li> 
      <li><a href="#tab-image" data-toggle="tab">Image</a></li>
      <li><a href="#tab-server" data-toggle="tab">Social</a></li>
       <li><a href="#tab-mail" data-toggle="tab">Mail</a></li>
     </ul>
   
     <div class="tab-content">
      <div class="tab-pane active" id="tab-general">
         
       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-meta-title">Meta Title</label>
        <div class="col-sm-10">
         <input type="text" name="config_meta_title" value="<?php echo $config['config_meta_title']; ?>" placeholder="Meta Title" id="input-meta-title" class="form-control" />
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-meta-description">Meta Tag Description</label>
        <div class="col-sm-10">
         <textarea name="config_meta_description" rows="5" placeholder="Meta Tag Description" id="input-meta-description" class="form-control"><?php echo $config['config_meta_description']; ?></textarea>
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-meta-keyword">Meta Tag Keywords</label>
        <div class="col-sm-10">
         <textarea name="config_meta_keyword" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword" class="form-control"><?php echo $config['config_meta_keyword']; ?></textarea>
        </div>
       </div>

     

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-meta-keyword">Tawk To Script</label>
        <div class="col-sm-10">
         <textarea name="config_tawkto" rows="5" placeholder="Tawk To Script" id="input-meta-keyword" class="form-control"><?php echo $config['config_tawkto']; ?></textarea>
        </div>
       </div>


      </div>
     
      <div class="tab-pane" id="tab-store">
      
       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-name">Store Name</label>
        <div class="col-sm-10">
         <input type="text" name="config_name" value="<?php echo $config['config_name']; ?>" placeholder="Store Name" id="input-name" class="form-control" />
         <?php echo $validation->hasError('config_name')?$validation->showError('config_name'):''; ?>
        </div>
       </div>
       
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-name">Store Breadcum Name</label>
        <div class="col-sm-10">
         <input type="text" name="store_breadcum" value="<?php echo $config['store_breadcum']; ?>" placeholder="Store Name" id="input-name" class="form-control" />
         <?php echo $validation->hasError('config_name')?$validation->showError('config_name'):''; ?>
        </div>
       </div>
       
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-owner">Store Owner</label>
        <div class="col-sm-10">
         <input type="text" name="config_owner" value="<?php echo $config['config_owner']; ?>" placeholder="Store Owner" id="input-owner" class="form-control" />
        </div>
       </div>
       
       
         <div class="form-group">
        <label class="col-sm-2 control-label" for="input-name">Invoice Prefix</label>
        <div class="col-sm-10">
         <input type="text" name="invoice_prefix" value="<?php echo $config['invoice_prefix']; ?>" placeholder="Store Name" id="input-name" class="form-control" />
         <?php echo $validation->hasError('config_name')?$validation->showError('config_name'):''; ?>
        </div>
       </div>
       
       
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-owner">GSTIN NO.</label>
        <div class="col-sm-10">
         <input type="text" name="gstin" value="<?php echo @$config['gstin']; ?>" placeholder="GSTIN Number" id="input-owner" class="form-control" />
        </div>
       </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-owner">PAN NO.</label>
        <div class="col-sm-10">
         <input type="text" name="pan" value="<?php echo @$config['pan']; ?>" placeholder="Pan number" id="input-owner" class="form-control" />
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-address">Address</label>
        <div class="col-sm-10">
         <textarea name="config_address" rows="5" placeholder="Address" id="input-address" class="form-control"><?php echo $config['config_address']; ?></textarea>
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-geocode"><span data-toggle="tooltip" data-container="#tab-general" title="Please enter your store location geocode manually.">Geocode</span></label>
        <div class="col-sm-10">
         <input type="text" name="config_geocode" value="<?php echo $config['config_geocode']; ?>" placeholder="Geocode" id="input-geocode" class="form-control" />
        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-geocode"><span data-toggle="tooltip" data-container="#tab-general" title="Please enter your store location geocode manually.">Google Iframe</span></label>
        <div class="col-sm-10">
         <textarea name="config_google_iframe" class="form-control" rows="5"> <?php echo $config['config_google_iframe']; ?></textarea>
        </div>
       </div>


       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
        <div class="col-sm-10">
         <input type="text" name="config_email" value="<?php echo $config['config_email']; ?>" placeholder="E-Mail" id="input-email" class="form-control" />
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
        <div class="col-sm-10">
         <input type="text" name="config_telephone" value="<?php echo $config['config_telephone']; ?>" placeholder="Telephone" id="input-telephone" class="form-control" />
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Alternate No</label>
        <div class="col-sm-10">
         <input type="text" name="telephone2" value="<?php echo $config['telephone2']; ?>" placeholder="Telephone 2" id="input-fax" class="form-control" />
        </div>
       </div>
      
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-open"><span data-toggle="tooltip" title="Fill in your stores opening times.">Opening Times</span></label>
        <div class="col-sm-10">
         <textarea name="config_open" rows="5" placeholder="Opening Times" id="input-open" class="form-control"><?php echo $config['config_open']; ?></textarea>
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-comment"><span data-toggle="tooltip" title="This field is for any special notes you would like to tell the customer i.e. Store does not accept cheques.">Comment</span></label>
        <div class="col-sm-10">
         <textarea name="config_comment" rows="5" placeholder="Comment" id="input-comment" class="form-control"><?php echo $config['config_comment']; ?></textarea>
        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-comment"><span data-toggle="tooltip" title="Footer Note">Footer Note</span></label>
        <div class="col-sm-10">
         <textarea name="config_footer_note" rows="5" placeholder="Comment" id="input-comment" class="form-control"><?php echo $config['config_footer_note']; ?></textarea>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-comment"><span data-toggle="tooltip" title="Copywrite Line">Copywrite</span></label>
        <div class="col-sm-10">
         <textarea name="config_copywrite" rows="5" placeholder="Comment" id="input-comment" class="form-control"><?php echo $config['config_copywrite']; ?></textarea>
        </div>
       </div>

      </div>
      <div class="tab-pane" id="tab-local">
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-country">Country</label>
        <div class="col-sm-10">
         <select name="config_country_id" id="country_id" class="form-control">
         
          <option value="">select option </option>
          <?php foreach ($country_list as $key => $value): ?>
           <option value="<?php echo $value->id; ?>" <?php echo $config['config_country_id']==$value->id?'selected':''; ?>><?php echo $value->name; ?></option> 
          <?php endforeach ?>
         </select>
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-zone">Region / State</label>
        <div class="col-sm-10">
          <select name="config_state_id" id="state_id" class="form-control">
            <?php if (!empty($config['config_state_id'])) {?>
              <?php foreach ($state_list as $key => $value): ?>
                <option value="<?php echo $value->id; ?>" <?php echo $config['config_state_id']==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
              <?php endforeach ?>
            <?php }else{ ?>
              <option value="">select state</option>
            <?php } ?>
          </select>
        </div>
       </div>
    

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-currency"><span data-toggle="tooltip" title="Change the default currency. Clear your browser cache to see the change and reset your existing cookie.">Currency</span></label>
        <div class="col-sm-10">
         <select name="config_currency" id="input-currency" class="form-control">
          <option value="">select option</option>
          <?php foreach ($currency_list as $key => $value): ?>
            <option value="<?php echo $value->id; ?>" <?php echo $config['config_currency']==$value->id?'selected':''; ?>><?php echo $value->title; ?></option>
          <?php endforeach ?>
         </select>
        </div>
       </div>
       
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax"><span data-toggle="tooltip" title="Enter target amount of order when reach then its apply! ">Free COD Shipping</span></label>
        <div class="col-sm-10">
         <input type="text" name="cod_limit" value="<?php echo @$config['cod_limit']; ?>" placeholder="Cod Limit" id="input-fax" class="form-control" />
        </div>
       </div>
        
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">COD Shipping Charges</label>
        <div class="col-sm-10">
         <input type="text" name="cod_charges" value="<?php echo @$config['cod_charges']; ?>" placeholder="Cod Shipping charges" id="input-fax" class="form-control" />
        </div>
       </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">COD Token Type</label>
        <div class="col-sm-10">
         <select name="token_type" class="form-control">
             <option value="P" <?php echo @$config['token_type']=='P'?'selected':'';  ?>>Percentage</option>
             <option value="F" <?php echo @$config['token_type']=='F'?'selected':'';  ?>>Fixed</option>
         </select>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">COD Token Amount </label>
        <div class="col-sm-10">
         <input type="text" name="token_charges" value="<?php echo @$config['token_charges']; ?>" placeholder="100" id="input-fax" class="form-control" />
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">COD Token Status </label>
        <div class="col-sm-10">
        <select name="token_status" class="form-control">

          <option value="1" <?php echo @$config['token_status']==1?'selected':''; ?>>Enable</option>
          <option value="0" <?php echo @$config['token_status']=='0'?'selected':''; ?>>Disable</option>
        </select>

        </div>
       </div>
       
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">COD Payment Status </label>
        <div class="col-sm-10">
        <select name="cod_status" class="form-control">

          <option value="1" <?php echo @$config['cod_status']==1?'selected':''; ?>>Enable</option>
          <option value="0" <?php echo @$config['cod_status']=='0'?'selected':''; ?>>Disable</option>
        </select>

        </div>
       </div>
       
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Payu Payment Status </label>
        <div class="col-sm-10">
        <select name="payu_status" class="form-control">

          <option value="1" <?php echo @$config['payu_status']==1?'selected':''; ?>>Enable</option>
          <option value="0" <?php echo @$config['payu_status']=='0'?'selected':''; ?>>Disable</option>
        </select>

        </div>
       </div>
      

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">COD Checkout General Message </label>
        <div class="col-sm-10">
        <input type="text" name="cod_message" value="<?php echo @$config['cod_message']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>
       
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax"><span data-toggle="tooltip" title="Enter target amount of order can purchase! ">COD Limit to buy</span></label>
        <div class="col-sm-10">
         <input type="text" name="cod_amount" value="<?php echo @$config['cod_amount']; ?>" placeholder="Cod Limit" id="input-fax" class="form-control" />
        </div>
       </div>


      </div>
      
      <!--distributor-->
      <div class="tab-pane" id="tab-distributor">
       <fieldset>
        <legend>Beneficiary Details:</legend>
      

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Name of the recipient : </label>
        <div class="col-sm-10">
        <input type="text" name="b_name" value="<?php echo @$config['b_name']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">MOB : </label>
        <div class="col-sm-10">
        <input type="text" name="b_mobile" value="<?php echo @$config['b_mobile']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">GST : </label>
        <div class="col-sm-10">
        <input type="text" name="b_gst" value="<?php echo @$config['b_gst']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>
         <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">EMAIL : </label>
        <div class="col-sm-10">
        <input type="text" name="b_email" value="<?php echo @$config['b_email']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Bank Account number : </label>
        <div class="col-sm-10">
        <input type="text" name="b_account_no" value="<?php echo @$config['b_account_no']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Bank address : </label>
        <div class="col-sm-10">
        <input type="text" name="b_bank_address" value="<?php echo @$config['b_bank_address']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">IFSC Code : </label>
        <div class="col-sm-10">
        <input type="text" name="b_ifse" value="<?php echo @$config['b_ifse']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Address : </label>
        <div class="col-sm-10">
        <input type="text" name="b_address" value="<?php echo @$config['b_address']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Beneficiary Bank : </label>
        <div class="col-sm-10">
        <input type="text" name="b_bank" value="<?php echo @$config['b_bank']; ?>" placeholder="" id="input-fax" class="form-control" />

        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Swift Code : </label>
        <div class="col-sm-10">
        <input type="text" name="b_swift_code" value="<?php echo @$config['b_swift_code']; ?>" placeholder="Swift Code" id="input-fax" class="form-control" />

        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Purpose of remittance : </label>
        <div class="col-sm-10">
        <input type="text" name="b_purpose" value="<?php echo @$config['b_purpose']; ?>" placeholder="Purpose of remittance" id="input-fax" class="form-control" />

        </div>
       </div>
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Declaration : </label>
        <div class="col-sm-10">
        <input type="text" name="b_declaration" value="<?php echo @$config['b_declaration']; ?>" placeholder="Declaration" id="input-fax" class="form-control" />

        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Signature : </label>
        <div class="col-sm-10">
          <?php if (!empty($config['b_signature'])): ?>
            <img src="<?php echo base_url($config['b_signature']); ?>" width="100" height="100">
            <input type="hidden" name="old_b_signature" value="<?php echo $config['b_signature']; ?>">
          <?php endif ?>
        <input type="file" name="b_signature"  class="form-control" />

        </div>
       </div>
        
        <legend>Addtional Details:</legend>
         <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Terms of Payment : </label>
        <div class="col-sm-10">
        <input type="text" name="b_terms" value="<?php echo @$config['b_terms']; ?>" placeholder="Terms of Payment" id="input-fax" class="form-control" />

        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Dispatch Time : </label>
        <div class="col-sm-10">
        <input type="text" name="b_dispatch" value="<?php echo @$config['b_dispatch']; ?>" placeholder="Dispatch Time" id="input-fax" class="form-control" />

        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-fax">Validity : </label>
        <div class="col-sm-10">
        <input type="text" name="b_validity" value="<?php echo @$config['b_validity']; ?>" placeholder="Validity" id="input-fax" class="form-control" />

        </div>
       </div>

       </fieldset>
      </div>
      <!--end -->
      
      <div class="tab-pane" id="tab-option">
       <fieldset>
        <legend>Taxes</legend>
        <div class="form-group">
         <label class="col-sm-2 control-label">Display Prices With Tax</label>
         <div class="col-sm-10">
          <label class="radio-inline">
           <input type="radio" name="config_tax" value="1" <?php echo $config['config_tax']==1?'checked':''; ?> />
           Yes
          </label>
          <label class="radio-inline">
           <input type="radio" name="config_tax" value="0" <?php echo $config['config_tax']==0?'checked':''; ?> />
           No
          </label>
         </div>
        </div>
        <div class="form-group">
         <label class="col-sm-2 control-label" for="input-tax-default">
          <span data-toggle="tooltip" title="Use the store address to calculate taxes if customer is not logged in. You can choose to use the store address for the customer's shipping or payment address.">Use Store Tax Address</span>
         </label>
         <div class="col-sm-10">
          <select name="config_tax_default" id="input-tax-default" class="form-control">
           <option value=""> --- None --- </option>
           <option value="shipping" <?php echo $config['config_tax_default']=='shipping'?'selected':''; ?>>Shipping Address</option>
           <option value="payment" <?php echo $config['config_tax_default']=='payment'?'selected':''; ?>>Payment Address</option>
          </select>
         </div>
        </div>
        <div class="form-group">
         <label class="col-sm-2 control-label" for="input-tax-customer">
          <span data-toggle="tooltip" title="Use the customers default address when they login to calculate taxes. You can choose to use the default address for the customer's shipping or payment address.">Use Customer Tax Address</span>
         </label>
         <div class="col-sm-10">
          <select name="config_tax_customer" id="input-tax-customer" class="form-control">
           <option value=""> --- None --- </option>
           <option value="shipping" <?php echo $config['config_tax_customer']=='shipping'?'selected':''; ?>>Shipping Address</option>
           <option value="payment" <?php echo $config['config_tax_customer']=='payment'?'selected':''; ?>>Payment Address</option>
          </select>
         </div>
        </div>
       </fieldset>
       <fieldset>
        <!-- <legend>Account</legend> -->
        
      <!--   <div class="form-group">
         <label class="col-sm-2 control-label" for="input-customer-group"><span data-toggle="tooltip" title="Default customer group.">Customer Group</span></label>
         <div class="col-sm-10">
          <select name="config_customer_group_id[]" id="input-customer-group" class="form-control">
           <option value="1">Default</option>
          </select>
         </div>
        </div> -->

       <!--  <div class="form-group">
         <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="Display customer groups that new customers can select to use such as wholesale and business when signing up.">Customer Groups</span></label>
         <div class="col-sm-10">
          <div class="checkbox">
           <label>
            <input type="checkbox" name="config_customer_group_display[]" value="1" />
            Default
           </label>
          </div>
         </div>
        </div> -->
     <!--    <div class="form-group">
         <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="Only show prices when a customer is logged in.">Login Display Prices</span></label>
         <div class="col-sm-10">
          <label class="radio-inline">
           <input type="radio" name="config_customer_price" value="1" />
           Yes
          </label>
          <label class="radio-inline">
           <input type="radio" name="config_customer_price" value="0" checked="checked" />
           No
          </label>
         </div>
        </div> -->
      <!--   <div class="form-group">
         <label class="col-sm-2 control-label" for="input-account"><span data-toggle="tooltip" title="Forces people to agree to terms before an account can be created.">Account Terms</span></label>
         <div class="col-sm-10">
          <select name="config_account_id" id="input-account" class="form-control">
           <option value="0"> --- None --- </option>
           <option value="4">About Us</option>
           <option value="6">Delivery Information</option>
           <option value="3">Privacy Policy</option>
           <option value="5">Terms &amp; Conditions</option>
          </select>
         </div>
        </div> -->
       </fieldset>
       <fieldset>
        <legend>Checkout</legend>
        <div class="form-group">
         <label class="col-sm-2 control-label">Display Weight on Cart Page</label>
         <div class="col-sm-10">
          <label class="radio-inline">
           <input type="radio" name="config_cart_weight" value="1"  <?php echo $config['config_cart_weight']==1?'checked':''; ?> />
           Yes
          </label>
          <label class="radio-inline">
           <input type="radio" name="config_cart_weight" value="0"  <?php echo $config['config_cart_weight']==0?'checked':''; ?> />
           No
          </label>
         </div>
        </div>
        <div class="form-group">
         <label class="col-sm-2 control-label">
          <span data-toggle="tooltip" title="Allow customers to checkout without creating an account. This will not be available when a downloadable product is in the shopping cart.">Guest Checkout</span>
         </label>
         <div class="col-sm-10">
          <label class="radio-inline">
           <input type="radio" name="config_checkout_guest" value="1" <?php echo $config['config_checkout_guest']==1?'checked':''; ?> />
           Yes
          </label>
          <label class="radio-inline">
           <input type="radio" name="config_checkout_guest" value="0" <?php echo $config['config_checkout_guest']==0?'checked':''; ?> />
           No
          </label>
         </div>
        </div>
      <!--   <div class="form-group">
         <label class="col-sm-2 control-label" for="input-checkout"><span data-toggle="tooltip" title="Forces people to agree to terms before an a customer can checkout.">Checkout Terms</span></label>
         <div class="col-sm-10">
          <select name="config_checkout_id" id="input-checkout" class="form-control">
           <option value="0"> --- None --- </option>
           <option value="4">About Us</option>
           <option value="6">Delivery Information</option>
           <option value="3">Privacy Policy</option>
           <option value="5">Terms &amp; Conditions</option>
          </select>
         </div>
        </div> -->
        <div class="form-group">
         <label class="col-sm-2 control-label" for="input-order-status"><span data-toggle="tooltip" title="Set the default order status when an order is processed.">Order Status</span></label>
         <div class="col-sm-10">
          <select name="config_order_status_id" id="input-order-status" class="form-control">
           <option value="">select option</option>
           <?php foreach ($order_status_list as $key => $value){ ?>
             <option value="<?php echo $value->id; ?>" <?php echo $config['config_order_status_id']==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
            <?php } ?>
          </select>
         </div>
        </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-process-status"><span data-toggle="tooltip" title="Set the order status the customer's order must reach before the order starts stock subtraction and coupon, voucher and rewards redemption.">Processing Order Status</span></label>
              <div class="col-sm-10">
                <div class="well well-sm" style="height: 150px; overflow: auto;">   
                  <?php foreach ($order_status_list as $key => $value){ ?>
              
                     <div class="checkbox">
                        <label>
                          <input type="checkbox" name="config_processing_status[]" value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($config['config_processing_status']))?'checked':''; ?> />
                          <?php echo $value->name; ?>
                           </label>
                      </div>
                    <?php } ?>
                </div>
             </div>
      </div>

      <div class="form-group">
       <label class="col-sm-2 control-label" for="input-complete-status"><span data-toggle="tooltip" title="Set the order status the customer's order must reach before they are allowed to access their downloadable products and gift vouchers.">Complete Order Status</span></label>
            <div class="col-sm-10">
                <div class="well well-sm" style="height: 150px; overflow: auto;">     <?php foreach ($order_status_list as $key => $value) {?>
                 
                     <div class="checkbox">
                        <label>  <input type="checkbox" name="config_complete_status[]" value="<?php echo $value->id; ?>" <?php echo in_array($value->id,json_decode($config['config_complete_status']))?'checked':''; ?> />
                          <?php echo $value->name; ?>
                         </label>
                      </div>  
                    <?php } ?>
               </div>
             </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-fraud-status"><span data-toggle="tooltip" title="Set the order status when a customer is suspected of trying to alter the order payment details or use a coupon, gift voucher or reward points that have already been used.">Fraud Order Status</span></label>
                  <div class="col-sm-10">
                    <select name="config_fraud_status_id" id="input-fraud-status" class="form-control">
                      <?php foreach ($order_status_list as $key => $value) {?>  
                      <option value="<?php echo $value->id; ?>" <?php echo $config['config_fraud_status_id']==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
                    <?php } ?>
                  </select>
                </div>
        </div>

       </fieldset>
       <fieldset>
        <legend>Stock</legend>
        <div class="form-group">
         <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="Display stock quantity on the product page.">Display Stock</span></label>
         <div class="col-sm-10">
          <label class="radio-inline">
           <input type="radio" name="config_stock_display" value="1" <?php echo $config['config_stock_display']==1?'checked':''; ?> />
           Yes
          </label>
          <label class="radio-inline">
           <input type="radio" name="config_stock_display" value="0" <?php echo $config['config_stock_display']==0?'checked':''; ?> />
           No
          </label>
         </div>
        </div>
      <!--   <div class="form-group">
         <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="Allow customers to still checkout if the products they are ordering are not in stock.">Stock Checkout</span></label>
         <div class="col-sm-10">
          <label class="radio-inline">
           <input type="radio" name="config_stock_checkout" value="1" />
           Yes
          </label>
          <label class="radio-inline">
           <input type="radio" name="config_stock_checkout" value="0" checked="checked" />
           No
          </label>
         </div>
        </div> -->
       </fieldset>
      </div>
      <div class="tab-pane" id="tab-image">
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-logo">Store Logo</label>
        <div class="col-sm-10">
          <?php if (!empty($config['config_logo'])): ?>
            <img src="<?php echo base_url($config['config_logo']); ?>" width="100" height="100">
          <?php endif ?>
          <input type="file" name="config_logo" class="form-control" id="input-logo" />
           <input type="hidden" name="old_config_logo" value="<?php echo $config['config_logo'] ?>">
        </div>
       </div>
     

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-icon"><span data-toggle="tooltip" title="The icon should be a PNG that is 16px x 16px.">Default Icon</span></label>
        <div class="col-sm-10">

         <?php if (!empty($config['config_icon'])): ?>
            <img src="<?php echo base_url($config['config_icon']); ?>" width="100" height="100">
          <?php endif ?>

         <input type="file" name="config_icon" class="form-control" id="input-icon" />
         <input type="hidden" name="old_config_icon" value="<?php echo $config['config_icon'] ?>">
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-icon"><span data-toggle="tooltip" title="The icon should be a PNG that is 16px x 16px.">Favicon icon</span></label>
        <div class="col-sm-10">

         <?php if (!empty($config['config_favicon'])): ?>
            <img src="<?php echo base_url($config['config_favicon']); ?>" width="100" height="100">
          <?php endif ?>

         <input type="file" name="config_favicon" class="form-control" id="input-icon" />
         <input type="hidden" name="old_config_favicon" value="<?php echo $config['config_favicon'] ?>">
        </div>
       </div>
       
         <div class="form-group">
        <label class="col-sm-2 control-label" for="input-icon"><span data-toggle="tooltip" title="The image shown in checkout page">Footer Logo</span></label>
        <div class="col-sm-10">

         <?php if (!empty($config['checkout_image'])): ?>
        
            <img src="<?php echo base_url($config['checkout_image']); ?>" width="100" height="100">
             <a href="<?php echo base_url('admin/Store/delete_checkout_image');?>" ><i class="fa fa-trash fa-2x"></i></a> 
          <?php endif ?>

         <input type="file" name="checkout_image" class="form-control" id="input-icon" />
         <input type="hidden" name="old_checkout_image" value="<?php echo @$config['checkout_image'] ?>">
        </div>
       </div>
       
       <!-- <div class="form-group">-->
       <!-- <label class="col-sm-2 control-label" for="input-icon"><span data-toggle="tooltip" >Checkout image Link</span></label>-->
       <!-- <div class="col-sm-10">-->
        

       <!--  <input type="text" name="checkout_image_link" class="form-control" id="input-icon" value="<?php echo @$config['checkout_image_link']; ?>" />-->
         
       <!-- </div>-->
       <!--</div>-->

      </div>
      <div class="tab-pane" id="tab-server">
      
       <div class="form-group">
        <label class="col-sm-2 control-label">Facebook</label>
        <div class="col-sm-10">
          <input type="text" name="config_facebook" class="form-control" id="input-logo" value="<?php echo $config['config_facebook']; ?>" />
        </div>
       </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Twitter</label>
        <div class="col-sm-10">
          <input type="text" name="config_twitter" class="form-control" id="input-logo" value="<?php echo $config['config_twitter']; ?>" />
        </div>
       </div>
           <div class="form-group">
        <label class="col-sm-2 control-label">Linkedin</label>
        <div class="col-sm-10">
          <input type="text" name="config_linkedin" class="form-control" id="input-logo" value="<?php echo $config['config_linkedin']; ?>" />
        </div>
       </div>
     
       <div class="form-group">
        <label class="col-sm-2 control-label">Instagram</label>
        <div class="col-sm-10">
          <input type="text" name="config_instagram" class="form-control" id="input-logo" value="<?php echo $config['config_instagram']; ?>" />
        </div>
       </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Pinterest</label>
        <div class="col-sm-10">
          <input type="text" name="config_pinterest" class="form-control" id="input-logo" value="<?php echo $config['config_pinterest']; ?>" />
        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Youtube</label>
        <div class="col-sm-10">
          <input type="text" name="config_youtube" class="form-control" id="input-logo" value="<?php echo $config['config_youtube']; ?>" />
        </div>
       </div>
    
      <div class="form-group">
        <label class="col-sm-2 control-label">WhatssApp </label>
        <div class="col-sm-10">
          <input type="text" name="whatsapp" class="form-control" value="<?php echo $config['whatsapp']; ?>" />
        </div>
       </div>

      </div>
         <div class="tab-pane" id="tab-mail">
              <fieldset>
                <legend>General</legend>
               <!--  <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-mail-engine"><span data-toggle="tooltip" title="Only choose 'Mail' unless your host has disabled the php mail function.">Mail Engine</span></label>
                  <div class="col-sm-10">
                    <select name="config_mail_engine" id="input-mail-engine" class="form-control">
                      <option value="mail">Mail</option>                 
                      <option value="smtp">SMTP</option>        
                    </select>
                  </div>
                </div> -->
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-mail-parameter"><span data-toggle="tooltip" title="This is using for sending for all emails  (e.g. -f email@storeaddress.com).">Sending Email address</span></label>-->
                
                  <div class="col-sm-10">
                    <input type="text" name="sending_email" value="<?php echo $config['sending_email']; ?>" placeholder="Mail Parameters" class="form-control" />
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-mail-smtp-hostname"><span data-toggle="tooltip" title="Add 'tls://' or 'ssl://' prefix if security connection is required. (e.g. tls://smtp.gmail.com, ssl://smtp.gmail.com).">SMTP Hostname</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="config_mail_smtp_hostname" value="<?php echo $config['config_mail_smtp_hostname']; ?>" placeholder="SMTP Hostname ex: ssl://smtp.gmail.com" id="input-mail-smtp-hostname" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-mail-smtp-username">SMTP Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="config_mail_smtp_username" value="<?php echo $config['config_mail_smtp_username']; ?>" placeholder="SMTP Username" id="input-mail-smtp-username" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-mail-smtp-password"><span data-toggle="tooltip" title="For gmail you might need to setup a application specific password here: https://security.google.com/settings/security/apppasswords.">SMTP Password</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="config_mail_smtp_password" value="<?php echo $config['config_mail_smtp_password']; ?>" placeholder="SMTP Password" id="input-mail-smtp-password" class="form-control" />
                  </div>
                </div>
                <div class="form-group">  
                  <label class="col-sm-2 control-label" for="input-mail-smtp-port">SMTP Port</label>
                  <div class="col-sm-10">
                    <input type="text" name="config_mail_smtp_port" value="<?php echo $config['config_mail_smtp_port']; ?>" placeholder="SMTP Port" id="input-mail-smtp-port" class="form-control" />
                  </div>
                </div>
              
              </fieldset>
            <!--   <fieldset>
                <legend>Mail Alerts</legend>
                <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="Select which features you would like to receive an alert email on when a customer uses them.">Alert Mail</span></label>
                  <div class="col-sm-10">
                    <div class="well well-sm" style="height: 150px; overflow: auto;">                       <div class="checkbox">
                        <label>                           <input type="checkbox" name="config_mail_alert[]" value="account" />
                          Register
                           </label>
                      </div>
                                            <div class="checkbox">
                        <label>                           <input type="checkbox" name="config_mail_alert[]" value="affiliate" />
                          Affiliate
                           </label>
                      </div>
                                            <div class="checkbox">
                        <label>                           <input type="checkbox" name="config_mail_alert[]" value="order" checked="checked" />
                          Orders
                           </label>
                      </div>
                                            <div class="checkbox">
                        <label>                           <input type="checkbox" name="config_mail_alert[]" value="review" />
                          Reviews
                           </label>
                      </div>
                       </div>
                  </div>
                </div>
             
              </fieldset> -->
            </div>
     </div>
    </form>
   </div>
  </div>
 </div>

 <script type="text/javascript">
  <!--
  $('select#country_id').on('change', function() {
    var val = $(this).val();
    $.ajax({
        url:"<?php echo base_url('admin/get_state_list'); ?>",
        type:"POST",
        data:{country_id:val},
       success: function(data) {
        var obj = JSON.parse(data);
        if (obj.status==1) {
          $('#state_id').html(obj.ss);
        }else{
          $('#state_id').html(obj.ss);
        }
      },
     
    });
  });

  //-->
 </script>
</div>
<?php $this->endSection(); ?>