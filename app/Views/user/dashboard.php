<?php 
$this->extend('layout/user_layout');
$this->section('page');
 ?>
<style>
 input.required.nofillout{
  border-color: #f70101 !important;
}
select.required.nofillout{
 border-color: #f70101 !important;
}

</style> 
 
<div class="col-lg-9 col-sm-12">
  <div class="dashboard-block">
    <div class="dashboard-head">
      <h5>Profile Settings</h5>
    </div>
    <div class="dashboard-body">
      <div class="tab-content show" data="my-profile" data-tab="account">
      
        <?php echo form_open_multipart('','class="form-data" data="user-profile" id="user_profile"'); ?>
        
          <div class="profile-box mb-4" >
            <div class="profile-image">
              <img src="<?php echo $user->photo?base_url($user->photo):base_url('assets/frontend/images/user-image.jpg');?>" alt="profile-image" />
              <label for="profile-image" disabled>Upload</label>
              <input type="file" name="photo" accept=".png,.jpg,.jpeg" class="edit-field" id="profile-image" />
            </div>
            <h3><?php echo ucwords($user->first_name.' '.$user->last_name); ?></h3>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" placeholder="Frist Name*" value="<?php echo $user->first_name; ?>" name="first_name" class="edit-field form-control txtOnly" disabled="">
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <input type="text" placeholder="Last Name*" value="<?php echo $user->last_name; ?>" name="last_name" class="edit-field form-control txtOnly" disabled="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email Address*" value="<?php echo $user->email; ?>" name="email" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="tel" value="<?php echo $user->mobile; ?>" placeholder="Registered Mobile*" name="mobile" class="edit-field form-control" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row edit-row" data="user-profile">
                <div class="col-xl-4 col-lg-6 col-sm-6  col-12 mb-md-0 mb-sm-0 mb-3">
                  <div class="input-box fill  mt-0 mb-0">
                    <button type="button" class="theme-btn full edit-data" data="user-profile"><span>Edit Profile</span></button>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-sm-6   col-12">
                  <div class="input-box fill mt-0 mb-0">
                    <button type="button" class="theme-btn tab-btn full outline"  data="my-profile" data-tab="password"><span>Change Password</span></button>
                  </div>
                </div>
              </div>
              <div class="row save-data d-none" data="user-profile">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                  <a href="javascript:void(0);" onclick="location.reload()" class="theme-btn full save-data" data="user-address"><span>Back</span></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
                  <button type="submit" class="theme-btn full save-data" data="user-address"><span>Save Profile</span></button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="tab-content" data="my-profile" data-tab="password">
        <form method="post" id="change_user_password">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <button type="button" class="theme-btn tab-btn"  data="my-profile" data-tab="account"><span>Back to Profile</span></button>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="password" placeholder="New Password" class="form-control"  name="password">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="password" placeholder="Confirm Password"  class="form-control" name="cpassword">
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                    <button type="submit" class="theme-btn full"><span>Change Password</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<script type="text/javascript">
  $('form#user_profile').submit(function(e){
    e.preventDefault();
   var formData = new FormData(this);
    $.ajax({
      url:"<?php echo base_url('update_user_profile'); ?>",
      type:"POST",
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(data){
        var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            setInterval(function(){ location.reload(); }, 3000);
          
            
        }else{
            var set = '';
            if(obj.first_name){
                set = obj.first_name;
            }
                if(obj.email){
                set = obj.email;
            }
                if(obj.mobile){
                set = obj.mobile;
            }
                if(obj.msg){
                set = obj.msg;
            }
            toastr.error(set);   
            
        }
      }
    });
  });


  $('form#change_user_password').submit(function(e){
    e.preventDefault();
    var form = $(this);
    $.ajax({
      url:"<?php echo base_url('change_user_password'); ?>",
      type:"POST",
      data:form.serialize(),
      success:function(data){
        var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            $('form#change_user_password')[0].reset();
        }else{
            var set = '';
            if(obj.password){
                set = obj.password;
            }
                if(obj.cpassword){
                set = obj.cpassword;
            }
               
             if(obj.msg){
                set = obj.msg;
            }
            toastr.error(set);   
            
        }
      }
    });
  });


  $('form#user_address').submit(function(e){
    e.preventDefault();
    var form = $(this);
    
    var missing =0;

        $(this).find('.required').each(function(){
          if ($(this).val().length <1 || $(this).val()=='') {
            $(this).addClass('nofillout');
            missing++;
          
          }
        });
        
        $('.nofillout').each(function(){
          if ($(this).val().length >1) {
            $(this).removeClass('nofillout');
          }
        });
        
        if (missing >=1) {
           toastr.error('Please Fill All Requird Field');
          return false;
        }
    
    
    
    $.ajax({
      url:"<?php echo base_url('update_user_address'); ?>",
      type:"POST",
      data:form.serialize(),
      success:function(data){
        var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            setInterval(function(){ location.reload(); }, 3000);
      
        }else{
            var set = '';
            if(obj.address){
                set = obj.address;
            }
            if(obj.postcode){
                set = obj.postcode;
            }
              if(obj.state){
                set = obj.state;
            }
            if(obj.country){
                set = obj.country;
            }   
            if(obj.msg){
                set = obj.msg;
            }
            toastr.error(set);   
            
        }
      }
    });
  });



</script>


                      
<?php $this->endSection();?>