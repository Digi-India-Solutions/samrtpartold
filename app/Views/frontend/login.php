<?php 
$this->extend('layout/master');
$this->section('page');
?>

<style type="text/css">
 input.required.nofillout{
  border-color: #f70101 !important;
}

select.required.nofillout{
 border-color: #f70101 !important;
}
</style>
<section class="section-space smart-section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center subheading-large">
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
    
    
            			<h2>Login to your Account</h2>
            			<p>Don't have an account? <a href="<?php echo base_url('sign-up') ?>"><b>Sign Up</b></a></p>
            		</div>
                </div>
                <div class="col-xl-5 col-lg-6 col-sm-10 mx-auto mt-4">
                    <form id="user_login">
                        <div class="form-group">
                            <input type="email" placeholder="Email Address" name="email"  class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" name="password"  class="form-control" />
                            <span class="toggle-password"><i class="fa fa-eye-slash"></i></span>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="remember" value="1">
                                      <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 text-right">
                                    <a href="<?php echo base_url('forgot'); ?>">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn full" id="btn_login">Login</button>
                        </div>
                        <div class="or-seprator">Or</div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <a href="javascript:void();" onclick="fbLogin();" class="theme-btn full fb"><i class="fab fa-facebook-square" ></i> FACEBOOK</a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                            	 <div id="gSignIn"></div>
                               <!--  <a href="javascript:void();" class="theme-btn full google"><i class="fab fa-google"></i> GOOGLE</a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="107570828197-5snoplkqq9fst9lbnmd57sgm4qcdcc0e.apps.googleusercontent.com">
<script type="text/javascript">

$(document).ready(function(){
  $('.bussiness').each(function(){
    $('.bussiness').hide();
    $('.company').hide();
  });
  
});


$('input[name="reg_type"]').on('click',function(){

 var val = $('input[name="reg_type"]:checked').val();
  if(val=='bussiness'){
    $('#bussiness_card').attr('required',true);
    $('#company_name').removeClass('required');
    $('#company_address').removeClass('required');
   
    $('#bussiness_card1').attr('required',true);
    $('#company_name1').removeClass('required');
    $('#company_address1').removeClass('required');
    
    $('.bussiness').each(function(){
    $('.bussiness').show();
    $('.company').hide();
    });

  }else{
    $('#bussiness_card').removeClass('required');
    $('#bussiness_card').removeAttr('required',false);
    $('#company_name').addClass('required');
    $('#company_address').addClass('required');
    
    $('#bussiness_card1').removeAttr('required',false);
     $('#bussiness_card1').removeClass('required');
    $('#company_name1').addClass('required');
    $('#company_address1').addClass('required');
    
    
    $('.bussiness').each(function(){
    $('.bussiness').hide();
    $('.company').show();
    });

  }

});


function renderButton() {
gapi.signin2.render('gSignIn', {
'scope': 'profile email',
'width': 172,
'height': 35,
'longtitle': true,
'theme': 'dark',
'onsuccess': onSuccess,
'onfailure': onFailure
});
}
window.onbeforeunload = function(e){
  gapi.auth2.getAuthInstance().signOut();
};
var input = document.querySelector("#phone_reg2");
window.intlTelInput(input, {
  preferredCountries: ['in'],
});
$(".phone-tel-code").val($(".iti__preferred span.iti__dial-code").text());
</script>

<?php echo $this->endSection(); ?>
