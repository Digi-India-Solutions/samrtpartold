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
                  <h2>Register To Start Shopping</h2>
                  <p>Already have an account? <a href="<?php echo base_url('login') ?>"><b>Login</b></a></p>
                </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-sm-10 mx-auto mt-4">
                    <form  id="register_form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="First Name" name="first_name"  class="form-control required txtOnly" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Last Name" name="last_name"  class="form-control required txtOnly" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email" name="email"   class="form-control required" />
                        </div>

                        <div class="form-group">
                            <input type="radio"  name="reg_type"   value="bussiness" /> &nbsp; Business Card
                            <input type="radio"  name="reg_type"   value="company" /> &nbsp; Company Name
                        </div>

                          <div class="form-group bussiness">
                            <input type="file" name="bussiness_card"   class="form-control" id="bussiness_card" />
                        </div>

                        <div class="form-group company">
                            <input type="text" name="company_name" placeholder="Company Name"  class="form-control" id="company_name"  />
                        </div>

                        <div class="form-group company">
                            <input type="text" name="company_address" placeholder="Company Address"  class="form-control" id="company_address" />
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" placeholder="Password" name="password"  class="form-control required" />
                                    <span class="toggle-password"><i class="fa fa-eye-slash"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" placeholder="Confirm Password" name="cpassword"  class="form-control required" />
                                    <span class="toggle-password"><i class="fa fa-eye-slash"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group phone-tel">
                            <input type="text" autocomplete="off" class="phone-tel-code"  />
                            <input type="tel" placeholder="Whatsapp number" name="mobile" id="phone_reg"  class="form-control required isnumber" />
                        </div>
                    
                    
                       <input type="hidden" value="" name="phone_code" autocomplete="off" class="phone-tel-code required" id="phone_code" />
                        <!--  <div class="form-group">
                            <input type="text" placeholder="Whatsapp number" name="whatsapp" class="form-control required isnumber" />
                        </div> -->

                          <div class="form-group">
                            <input type="text" name="website_link" placeholder="Website Link optional"  class="form-control" />
                        </div>

                        <div class="form-group">
                            <button type="submit" class="theme-btn full" id="reg_btn">Register Now</button>
                        </div>
                        <div class="or-seprator">Or</div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <a href="javascript:void();"  onclick="fbLogin();" class="theme-btn full fb"><i class="fab fa-facebook-square"></i> FACEBOOK</a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                              <div id="gSignIn"></div>
                               <!--  <a href="javascript:void();" class="theme-btn full google"><i class="fab fa-google" ></i> GOOGLE</a> -->
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



var input = document.querySelector("#phone_reg");
window.intlTelInput(input, {
  // allowDropdown: false,
  // autoHideDialCode: false,
  // autoPlaceholder: "off",
  // dropdownContainer: document.body,
  // excludeCountries: ["us"],
  // formatOnDisplay: false,
  // geoIpLookup: function(callback) {
  //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
  //     var countryCode = (resp && resp.country) ? resp.country : "";
  //     callback(countryCode);
  //   });
  // },
  // hiddenInput: "full_number",
  // initialCountry: "auto",
  // localizedCountries: { 'de': 'Deutschland' },
  // nationalMode: false,
  // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  // placeholderNumberType: "MOBILE",
  preferredCountries: ['us'],
  // separateDialCode: true,
  //utilsScript: "build/js/utils.js",
});

var phone_code = $(".iti__selected-flag").attr("title");
var phone_codedev = phone_code.split(":");
var getcode = phone_codedev[1]
$(".phone-tel-code").val(getcode);

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


</script>

<?php echo $this->endSection(); ?>
