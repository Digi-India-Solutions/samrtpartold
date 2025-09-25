<?php 
$this->extend('layout/user_layout');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div class="col-lg-9 col-sm-12">
<div class="dashboard-block">
    <div class="dashboard-head">
      <h5><?php echo $page_title; ?></h5>
    </div>
    <div class="dashboard-body">
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
    
      <form action="<?php echo $form_action; ?>" method="post" class="form-data" data="user-address" id="user_address">
        
         <div class="row">
           <div class="col-md-6">
            <div class="form-group">
              <input type="text" placeholder="First Name*" name="firstname" class="edit-field form-control required txtOnly" value="<?php echo old('firstname',$firstname); ?>"  <?php echo $id?'disabled=""':''; ?>  >
              <?php echo $validation->hasError('firstname')?$validation->showError('firstname','my_single'):''; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" placeholder="Last Name*" name="lastname"  class="edit-field form-control required txtOnly" value="<?php echo old('lastname',$lastname); ?>"  <?php echo $id?'disabled=""':''; ?>>
           
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <input type="text" placeholder="Email" name="email"  class="edit-field form-control required" value="<?php echo old('email',$email); ?>"  <?php echo $id?'disabled=""':''; ?>>
              <?php echo $validation->hasError('email')?$validation->showError('email','my_single'):''; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" placeholder="Phone*" name="phone"  class="edit-field form-control required isnumber" value="<?php echo old('phone',$phone); ?>"  <?php echo $id?'disabled=""':''; ?>>
              <?php echo $validation->hasError('phone')?$validation->showError('phone','my_single'):''; ?>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" placeholder="Address Line 1*" name="address1"  class="edit-field form-control required" value="<?php echo old('address1',$address1); ?>"  <?php echo $id?'disabled=""':''; ?>>
              <?php echo $validation->hasError('address1')?$validation->showError('address1','my_single'):''; ?>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <input type="text" placeholder="Address Line 2" name="address2"  class="edit-field form-control required" value="<?php echo old('address2',$address2); ?>"  <?php echo $id?'disabled=""':''; ?>>
              <?php echo $validation->hasError('address2')?$validation->showError('address2','my_single'):''; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" placeholder="City*" name="city"  class="edit-field form-control required" value="<?php echo old('city',$city); ?>" name="state" <?php echo $id?'disabled=""':''; ?>>
              <?php echo $validation->hasError('city')?$validation->showError('city','my_single'):''; ?>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <input type="number" placeholder="Pincode" name="pincode"  class="edit-field form-control required" value="<?php echo old('pincode',$pincode); ?>"  <?php echo $id?'disabled=""':''; ?>>
              <?php echo $validation->hasError('pincode')?$validation->showError('pincode','my_single'):''; ?>
            </div>
          </div>

           <div class="col-md-6">
            <div class="form-group">
              <label>Country</label>
              <select name="country_id" id="country_id" class="edit-field form-control required" <?php echo $id?'disabled=""':''; ?>>
                <option value="">Select</option>
                <?php foreach ($country_list as $key => $value): ?>
                  <option value="<?php echo $value->id; ?>" <?php echo $country_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
                <?php endforeach ?>
              </select>


              <?php echo $validation->hasError('country_id')?$validation->showError('country_id','my_single'):''; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>State</label>
              <select name="state_id"  id="state_id" class="edit-field form-control required" <?php echo $id?'disabled=""':''; ?>>
                <option value="">-- Select --</option>
                <?php if (!empty($state_list)): ?>
                  <?php foreach ($state_list as $key => $value): ?>
                    <option value="<?php echo $value->id; ?>" <?php echo $state_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
                  <?php endforeach ?>
                <?php endif ?>
              </select>

              <?php echo $validation->hasError('state_id')?$validation->showError('state_id','my_single'):''; ?>
            </div>
          </div>

           <div class="col-md-6">
            <div class="form-group">
              <label>Status</label>
              <select name="status"  class="edit-field form-control required" <?php echo $id?'disabled=""':''; ?>>
                <option value="1" <?php echo $status?'selected':''; ?>>Active</option>
                <option value="0" <?php echo $status==0?'selected':''; ?>>Deactive</option>
              </select>             
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label>Default Address</label>
              <input type="radio" value="1" name="primary_addr" <?php echo $primary_addr==1?'checked':''; ?>> Yes  &nbsp; <input type="radio" value="0" name="primary_addr" <?php echo $primary_addr==0?'checked':''; ?>> No  &nbsp;
            </div>
          </div>

        
         
         
                       

                 
            <?php if (!empty($id)) {?>
              <div class="col-md-12">
                   <div class="row edit-row" data="user-address">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="input-box fill mt-0 mb-0">
                    <button type="button" class="theme-btn full edit-data" data="user-address"><span>Edit Address</span></button>
                  </div>
                </div>
              </div>
              <div class="row save-data d-none" data="user-address">
               

               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                <a href="javascript:void(0);" onclick="location.reload()" class="theme-btn full save-data" data="user-address"><span>Back</span></a>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <button type="submit" class="theme-btn full save-data" data="user-address"><span>Save Address</span></button>
              </div>
               </div>
              <?php }else{ ?>   
              <div class="col-md-12">          
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 p-0">
                <button type="submit" class="theme-btn full save-data"><span>Save Address</span></button>
              </div>
               </div>
              <?php } ?>
             

           

        

        </div>
      <div style="display:none"><label>Fill This Field</label><input type="text" name="motorkart_honeypot" value=""></div></form>
    </div>
  </div>
</div>


<script>
 $('select#country_id').on('change',function(){
  var country_id = $(this).val();
  if (country_id) {
    $.ajax({
      url:"<?php echo base_url('get_state'); ?>",
      type:"POST",
      data:{country_id:country_id},
      success:function(data){
        $('#state_id').html(data);
      }
    });
  }
});


</script>
      
<?php $this->endSection();?>