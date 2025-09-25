
var base_url = $('#base').data('base');

// Enqiry
$('form#enquiry_form').submit(function(e){
    e.preventDefault();
    var form = $(this);
var missing = 0;
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
     toastr.error('Please Fill All Required Field');
    return false;
  }

    $.ajax({
        url:base_url+'send_enquiry',
        type:"POST",
        data:form.serialize(),
        beforeSend:function(){
            $('#btn_enq').html('submitting..');
        },
        success:function(data){

        var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            $('form#enquiry_form')[0].reset();
            $('#btn_enq').html('Sent');
        }else{
          $('#btn_enq').html('Submit');
            var set_v = '';
            if(obj.email){
                set_v = obj.email;
            }
             if(obj.name){
                set_v = obj.name;
            }
            if(obj.phone){
                set_v = obj.phone;
            }
             if(obj.msg){
                set_v = obj.msg;
            }
            
            toastr.error(set_v);
           }
           
        }
    });
})


//////////


// Career form

$('form#career_form').submit(function(e){
    e.preventDefault();
   var formData = new FormData(this);
var missing = 0;
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
     toastr.error('Please Fill All Required Field');
    return false;
  }

    $.ajax({
        url:base_url+'save_career_enquiry',
        type:"POST",
         data:formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend:function(){
            $('#btn_enq').html('submitting..');
        },
        success:function(data){

        var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            $('form#career_form')[0].reset();
            $('#btn_enq').html('Sent');
            setInterval(function(){locaion.reload()},200);
            
        }else{
          $('#btn_enq').html('Submit');
            var set_v = '';
            if(obj.email){
                set_v = obj.email;
            }
             if(obj.name){
                set_v = obj.name;
            }
            if(obj.phone){
                set_v = obj.phone;
            }
            
             if(obj.designation){
                set_v = obj.designation;
            }
             if(obj.msg){
                set_v = obj.msg;
            }
            
            toastr.error(set_v);
           }
           
        }
    });
})



// Reviews
$('form#review_form').submit(function(e){
    e.preventDefault();
    var form = $(this);
    
    var missing = 0;
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
         toastr.error('Please Fill All Required Field');
        return false;
      }
    
    
    $.ajax({
        url:base_url+'send_review',
        type:"POST",
        data:form.serialize(),
        beforeSend:function(){
            $('#reviewbtn').html('submitting..');
        },
        success:function(data){
            var obj = JSON.parse(data);
            if (obj.status==1) {
                $('form#review_form')[0].reset();
                 $('#reviewbtn').html('Add A Review');
                toastr.success(obj.msg);
                $('.close').click();
            }else{
                 toastr.error(obj.msg);
                if(obj.redirect){
                    setInterval(function(){window.location.href=obj.redirect;},2000);
                }
               
            }
        }
    });
})


////////////////////
// WISHLIST

function add_to_wishlist(id){
if (id) {
 
   $.ajax({
    url:base_url+'add_wishlist',
    type:"POST",
    data:{p_id:id},
    success:function(data){
        var obj = JSON.parse(data);
        if (obj.status==1) {
            toastr.success(obj.msg);
            $('.wishlist_count').html(obj.wishlist);
        }else{
           
            toastr.error(obj.msg);
             if(obj.redirect){
                window.location.href= obj.redirect;
            }
        }
    }
   }); 
}
}


function remove_wishlist(id){
if (id) {
   $.ajax({
    url:base_url+'remove_wishlist',
    type:"POST",
    data:{p_id:id},
    success:function(data){
        var obj = JSON.parse(data);
        if (obj.status==1) {
            $('#wish'+id).remove();
            toastr.success(obj.msg);
            $('.wishlist_count').html(obj.wishlist);
        }else{
            toastr.error(obj.msg);
        }
    }
   }); 
}
}




$('#buy_now').click('on',function(){
  $('input[name="buy"]').val(1);
  // $('form#add_to_cart').submit();
});


// add to cart
$('form#add_to_cart').submit(function(e){
var buy =   $('input[name="buy"]').val();
var form = $(this);
e.preventDefault();
$.ajax({
    
    url:base_url+'add_to_cart_',
    type:"POST",
    data:form.serialize(),
    beforeSend:function(){
         if (buy) {
             $('#buy_now').html('Processing...');
         }else{
             $('#add_cart_button').html('Processing...');
         }
    },
    success:function(data){
        var obj = JSON.parse(data);
        if (obj.status==1) {
              
            $('.cart_count').html(obj.cart_count);
           
            if (buy) {
              window.location.href="checkout";
            }else{
                 $('#add_cart_button').html('Add to cart');
                 toastr.success(obj.msg);
                //  $(".main_cart_div").load(location.href + " .main_cart_div");
                //  $('.main_cart_div').addClass('cart_msgbox');
                  $('#cart_count').html(obj.cart_count);
            }
    
        }else{
             
             if (buy) {
                $('#buy_now').html('Buy Now');
             }else{
                 $('#add_cart_button').html('Add to cart');
             }
            
            var set_v = '';
            if (obj.right_option_id) {
                set_v = obj.right_option_id;
            }
            if (obj.msg) {
                set_v = obj.msg;
            }
            toastr.error(set_v);
        }
    },
});
});

$(document).ready(function() {
    $(".main_cart_div ").delegate(".close_msgbox" , "click", function() {
    $('.main_cart_div').removeClass('cart_msgbox');
    });
});

function remove_item(id){
    if (id) {
      $.ajax({
      url:base_url+'Delete_cart_item_',    
      type:"POST",
      data:{id:id},
      success:function(data){
        var obj = JSON.parse(data);
        if (obj.status==1) {
          
            location.reload();
           // remove_cart_item(id);
        }else{
            toastr.error(obj.msg);
        }
      } 
      });
    }
  }

function remove_cart_item(id){
  $('#remove_item'+id).hide();
  $(".main_cart_div").load(location.href + " .main_cart_div");
}

function update_cart(id){

  var quantity = $('#item'+id).val();
  if (quantity >=1) {
    $.ajax({
    url:base_url+'update_cart_',     
    type:"POST",
    data:{id:id,quantity:quantity},
    success:function(data){
      var obj = JSON.parse(data);
      if (obj.status==1) {
            $(".main_cart_div1").load(location.href + " .main_cart_div1");
        // location.reload();
      }else{
         toastr.error(obj.msg);
      }
    }
    });

  }else{
      $(".main_cart_div1").load(location.href + " .main_cart_div1");
  }

}
///////////////////

// subscribe

$('form#subscribe').submit(function(e){
    var form = $(this);
    e.preventDefault();
    $.ajax({
      url:base_url+'subscribe',
      type:"POST",
      data:form.serialize(),
      success:function(data){
        var obj = JSON.parse(data);
        if (obj.status==1) {
          $('form#subscribe')[0].reset();
          $('#newsletter-form').modal('hide');
          toastr.success(obj.msg);
        }else{
          toastr.error(obj.msg);
        }
      }
    });
  });
  
  
  
$('form#quotation_form').submit(function(e){
    var form = $(this);
    e.preventDefault();
    $.ajax({
      url:base_url+'quotation',
      type:"POST",
      data:form.serialize(),
      success:function(data){
        var obj = JSON.parse(data);
        if (obj.status==1) {
          $('form#quotation_form')[0].reset();
          $('#newsletter-form').modal('hide');
          toastr.success(obj.msg);
        }else{
            var set ='';
            if(obj.name){
                set = obj.name;
            }
              if(obj.email){
                set = obj.email;
            }
              if(obj.phone){
                set = obj.phone;
            }
              if(obj.msg){
                set = obj.msg;
            }
            
          toastr.error(set);
        }
      }
    });
  });
  
  /////////




//////////////

// Search
function search(){
var keyword = $('#search_top').val();
  if (keyword.length > 1) {
    $.ajax({
      url:base_url+'search_result', 
      type:"POST",
      data:{keyword:keyword},
      success:function(data){
         
        if(data){
            $('#search_result').html(data);
        }else{
          $('#search_result').html('');  
        }
        
      }
    });
  }else{
    $('#search_result').html('');    
  }
  
}

function search1(){
var keyword = $('#search_top1').val();
  if (keyword.length >2) {
    $.ajax({
      url:base_url+'search_result', 
      type:"POST",
      data:{keyword:keyword},
      success:function(data){
         
        if(data){
            $('#search_result1').html(data);
        }else{
          $('#search_result1').html('');  
        }
        
      }
    });
  }else{
    $('.search_result1').html('');    
  }
  
}
///////////


// confirm form
$('form#confirm_form').submit(function(e){
  
var form = $(this);
e.preventDefault();
var missing =0;


$(this).find('.required').each(function(){
  if ($(this).val().length <1 || $(this).val()=='') {
    $(this).addClass('nofillout');
    missing++;
  }
});

 email = $('input[name="email"]').val();
  if (email) {
   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (email) {
     if(!regex.test(email)){
      toastr.error('Invalid Email Address');
      return false;
      }
    }
  }


var phone = $('input[name="phone"]').val();
if(phone.length <10){
toastr.error('Phone number must be 10 digit');
$('input[name="phone"]').focus();
return false; 
}

var regex1 = new RegExp("^[0-9]+$");
if (!regex1.test(phone)) {
 toastr.error('Phone no must be numeric');
 $('input[name="phone"]').focus();
return false; 
}

var regex = new RegExp("^[a-zA-Z_ ]+$");
var str = $('input[name="firstname"]').val();
if (!regex.test(str)) {
 toastr.error('Frist name field cannot contain special character');
 $('input[name="firstname1"]').focus();
return false; 
}

var str1 = $('input[name="lastname"]').val();
if (str1 !='' && !regex.test(str1)) {
 toastr.error('Last name field cannot contain special character');
 $('input[name="lastname"]').focus();
return false; 
}


$('.nofillout').each(function(){
  if ($(this).val().length >1) {
    $(this).removeClass('nofillout');
  }
});

if (missing >=1) {
   toastr.error('Please Fill All Required Field');
  return false;
}

if($('input[name="payment_method"]:checked').length < 1){
 toastr.error('Please select a payment option');
 $('#payumoney').focus();
    return false;
}


$.ajax({
  url: base_url+'confirm',
  type:"POST",
  data:form.serialize(),
  beforeSend:function(){
    $('#confirm_btn').html('Processing...');
	$('#confirm_btn').attr('type', 'button');
  },
  success:function(data){ 
      
    var obj = JSON.parse(data);
      if (obj.status==1) {
		
    //  $(this).unbind(event.preventDefault());

    // https://sandboxsecure.payu.in/_payment
    // https://secure.payu.in/_payment
    // obj.payment_method=='cod' && obj.token_status==''
    
     if (obj.payment_method=='cod') {
      $('#confirm_form').attr('action', base_url+'order-success');
     }else{
      $('#confirm_form').attr('action', 'https://sandboxsecure.payu.in/_payment');
     }

    $('input[name="key"]').val(obj.Mkey);
    $('input[name="hash"]').val(obj.hash);
    $('input[name="txnid"]').val(obj.txnid);
    $('input[name="amount"]').val(obj.amount);
    $('input[name="productinfo"]').val(obj.productinfo);

    $('input[name="firstname"]').val(obj.firstname);
    $('input[name="email"]').val(obj.email);
    $('input[name="phone"]').val(obj.phone);

    $('input[name="surl"]').val(obj.surl);
    $('input[name="furl"]').val(obj.furl);
    $('input[name="curl"]').val(obj.curl);
    $('form#confirm_form')[0].submit();
    
    }else{
	
		$('#confirm_btn').attr('type', 'submit');  
    	$('#confirm_btn').html('Place Order');	
	
		if(obj.msg){
		   toastr.error(obj.msg);   
	 	}
       
        if(obj.otp=='show'){
        //  $('#otp_msg').html(obj.otp_msg);
         $('.otpdiv').show();
          $('#otp').attr('required',true);
        //  $('#confirm_btn').hide();
        }
        
      }
  
  },
  error:function(){
    $('#pay').html('Place Order');
  }
});
});
////////////////////////

// discount coupon

$('form#coupan_form').submit(function(e){
var form = $(this);

e.preventDefault();
$.ajax({
url: base_url+'check_coupan',    
type:"POST",
data:form.serialize(),
success:function(data){

  $('.apply_success').html();
  var obj = JSON.parse(data);
  if (obj.status==1) {
 
     toastr.success('You apply coupan code success');
     $('.apply_success').html('You apply coupan code success');
      $(".main_cart_div").load(location.href + " .main_cart_div");
      location.reload();
  }else{
    toastr.error(obj.msg);
  
  }
},
error:function(data){
    toastr.error('error posting feed');
}
});
});

// end discount


// otp start


$('#verify_btn').on('click',function(){
  var val = $('#otp').val();
  if (val.length < 6) {
    toastr.error('OTP Must Be 6 Digit');
    return false;
  }
  if (val.length == 6) {
    $.ajax({
      url: base_url+'check_otp',    
      type:"POST",
      data:{otp:val},
      success:function(data){
        var obj = JSON.parse(data);
        if (obj.status==1) {
          $('#verify_btn').hide();
          $('#otp').attr('readonly',true);
          $('#otp_img').show();
          $('#confirm_btn').attr('type', 'submit');
          $('#resend_otp').hide();
          setInterval(function(){$('.otpdiv').hide();},2000);
          
          $('#confirm_btn').click();
        }else{
          toastr.error(obj.msg);
        }
      }
    });
  }else{
    toastr.error('Please enter correct otp');
  }

});



$('#resend_otp').on('click',function(){
  var mobile = $('input[name="phone1"]').val();
  var addressid = $('select[name="address_id"]').val();
    $.ajax({
      url: base_url+'resend_otp',
      type:"POST",
      data:{mobile:mobile,addressid:addressid},
      success:function(data){
          var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            //  $('#otp_msg').html(obj.otp_msg);
        }else{
            toastr.error(obj.msg);
        }
      }
    });

});


// end otp

// USER REGISTER    


$('form#register_form').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    
    var missing = 0;
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
       toastr.error('Please Fill All Required Field');
      return false;
    } 
    
    if($('input[name="reg_type"]:checked').length < 1){
     toastr.error('Please select an option');
        return false;
    }
    
    $.ajax({
	  url: base_url+'save_user_registration',	
      type:"POST",  
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      beforeSend:function(){
        $('#reg_btn').html('Processing...');
      },
      success:function(data){
        var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            window.location.href= obj.redirect;
        }else{
            $('#reg_btn').html('Register Now');
            var set_v = '';
            if(obj.first_name){
                set_v = obj.first_name;
            }
            if(obj.last_name){
                set_v = obj.last_name;
            }
            if(obj.email){
                set_v = obj.email;
            }
            if(obj.mobile){
                set_v = obj.mobile;
            }
            if(obj.password){
                set_v = obj.password;
            }
            
            if(obj.company_name){
                set_v = obj.company_name;
            }
            
              if(obj.company_address){
                set_v = obj.company_address;
            }
           
            if(obj.reg_type){
                set_v = obj.reg_type;
            }
            
              if(obj.phone_code){
                set_v = obj.phone_code;
            }
            
             if(obj.msg){
                set_v = obj.msg;
            }
            
            toastr.error(set_v);
        }
      },
     
    });
  });




$('form#company_form').submit(function(e){
   e.preventDefault();
    var formData = new FormData(this);
    
    if($('input[name="reg_type"]:checked').length < 1){
     toastr.error('Please select an option');
        return false;
    }
  
    var missing = 0;
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
       toastr.error('Please Fill All Required Field');
      return false;
    } 
    
    
    
      $.ajax({
      url: base_url+'update_company_info',
      type:"POST",  
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      beforeSend:function(){
        $('#reg_btn2').html('Processing...');
      },
      success:function(data){ 
        var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            window.location.href= obj.redirect;
        }else{
            $('#reg_btn2').html('Save');
            var set_v = '';
           
            if(obj.whatsapp){
                set_v = obj.whatsapp;
            }
              if(obj.company_name){
                set_v = obj.company_name;
            }
            if(obj.company_address){
                set_v = obj.company_address;
            }
            if(obj.mobile){
                set_v = obj.mobile;
            } 
             if(obj.company_address){
                set_v = obj.company_address;
            }
             if(obj.company_name){
                set_v = obj.company_name;
            }
            
             if(obj.msg){
                set_v = obj.msg;
            }
            
            toastr.error(set_v);
        }
      }
     
    });

});


//lgoin

$('form#user_login').submit(function(e){
    e.preventDefault();
    var form = $(this);
    $.ajax({
	  url: base_url+'user_login',	
      type:"POST",
      data:form.serialize(),
      beforeSend:function(){
        $('#btn_login').html('Processing...');
      },
      success:function(data){
        var obj = JSON.parse(data);
        if(obj.status==1){
            
            if(obj.type=='new'){
                  $('#auth_id').val(obj.user_id); 
                $('#regModel').modal('show');
            }else{
            toastr.success(obj.msg);
            window.location.href= obj.redirect;
            }
           
        }else{
            $('#btn_login').html('Login');
            var set_v = '';
            if(obj.email){
                set_v = obj.email;
            }
             if(obj.password){
                set_v = obj.password;
            }
            
             if(obj.msg){
                set_v = obj.msg;
            }
            
            toastr.error(set_v);
        }
      },
     
    });
  });

//end login

// FORGET

 $('form#forget_form').submit(function(e){
    e.preventDefault();
    var form = $(this);
    $.ajax({
      url:base_url+'forget_send',
      type:"POST",
      data:form.serialize(),
      beforeSend:function(){
        $('#btn_login').html('Processing...');
      },
      success:function(data){
        var obj = JSON.parse(data);
        if(obj.status==1){
        //   $('#msg').html(obj.msg);
          toastr.success(obj.msg);
           $('#btn_login').html('Sent');
          $('form#forget_form')[0].reset();
        }else{
            var set_v = '';
            if(obj.email){
                set_v = obj.email;
            }
             if(obj.msg){
                set_v = obj.msg;
            }
            $('#btn_login').html('Send');
            toastr.error(set_v);
        }
      },
    });
  });

/////////

// RESET PASSWORD

  $('form#reset_form').submit(function(e){
    e.preventDefault();

     var form = $(this);
    $.ajax({
      url:base_url+'reset_save',
      type:"POST",
      data:form.serialize(),
      beforeSend:function(){
        $('#btn_login').html('Processing...');
      },
      success:function(data){ 
        var obj = JSON.parse(data);
        if(obj.status==1){
          $('#msg').html(obj.msg);
          toastr.success(obj.msg);
          $('form#reset_form')[0].reset();
          setInterval(function(){
             window.location.href="login";
          },2000);
        }else{
            var set_v = '';
            if(obj.password){
                set_v = obj.password;
            }
            if(obj.c_pass){
                set_v = obj.c_pass;
            }
            
             if(obj.msg){
                set_v = obj.msg;
            }
            $('#btn_login').html('Reset');
            toastr.error(set_v);
        }
      },
      complete:function(){
       $('#btn_login').html('Reset');
      }
    });
  });


function newsletter_cancel(){
    $.ajax({
        url: base_url+'cancel_newsletter',
        type:"POST",
        success:function(data){
           
        }
    });
}  

// general validation

$(".isnumber").on("keypress keyup blur",function (event) {    
$(this).val($(this).val().replace(/[^\d].+/, ""));
if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
    return false;
}
});  


$('.txtOnly').keypress(function (e) {
      var regex = new RegExp("^[a-zA-Z ]+$");
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str)) {
        return true;
      }
      else
      {
      e.preventDefault();
      return false;
      }
    });
    
$('.address').keypress(function (e) {
      var regex = new RegExp("^[a-zA-Z0-9-/, ]+$");
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str)) {
        return true;
      }
      else
      {
      e.preventDefault();
      return false;
      }
    });    
    
    
 $('.copypeste').on("cut copy paste",function(e) {
      e.preventDefault();
   });
   
//  end validation
