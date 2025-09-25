var base_url = $('#base').data('base');

 $("body").delegate(".iti__country","click",function(){
    var cval = $(this).attr("data-dial-code");
    $("#phone_code").val("+"+cval+"");
    $("#phone_code2").val("+"+cval+"");
    });

// var cval = $('.iti__country-list .iti__active span.iti__dial-code ').text();

// $("#phone_code").val(cval);
// $("#phone_code2").val(cval);


var input = document.querySelector("#phone_reg2");
window.intlTelInput(input, {
  preferredCountries: ['us'],
  
  
});



window.fbAsyncInit = function() {
// FB JavaScript SDK configuration and setup
FB.init({
appId      : '171415508495489', // FB App ID
cookie     : true,  // enable cookies to allow the server to access the session
xfbml      : true,  // parse social plugins on this page
version    : 'v3.2' // use graph api version 2.8
});
// Check whether the user already logged in
FB.getLoginStatus(function(response) {
if (response.status === 'connected') {
//display user data
// getFbUserData();
FB.logout(function(response) {
  // user is now logged out
});

}
});
};
// Load the JavaScript SDK asynchronously
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
FB.login(function (response) {
if (response.authResponse) {
// Get and display the user profile data
getFbUserData();
} else {
document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
}
}, {scope: 'email'});
}
// Fetch the user profile data from facebook
function getFbUserData(){
FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
function (response) {
var first_name = response.first_name;
var last_last = response.last_name;
var email = response.email;
var fphoto = response.picture.data.url;
var oauth_uid = response.id;
$.ajax({
url: base_url+'facebook_login',
method: "POST",
data: {first_name:first_name,last_last,email,fphoto,oauth_uid},
success: function(data){
 var obj = JSON.parse(data);
if(obj.status==1){
    
     if (obj.type=='new') {
      $('#auth_id').val(obj.user_id); 
      $('#regModel').modal('show');
    }else{
      window.location.href=obj.url;
    }
    
}
}
});
}); 
}
// Logout from facebook



//google api
// Render Google Sign-in button
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
// Sign-in success callback
function onSuccess(googleUser) {
// Get the Google profile data (basic)
//var profile = googleUser.getBasicProfile();
// Retrieve the Google account data
gapi.client.load('oauth2', 'v2', function () {
var request = gapi.client.oauth2.userinfo.get({
'userId': 'me'
});
request.execute(function (resp) {
// Display the user details
var name = resp.name;
var email = resp.email;
var gpicture = resp.picture;
var oauth_uid = resp.id;

$.ajax({
url: base_url+'google_login',
method: "POST",
data: {name:name,email:email,gpicture:gpicture,oauth_uid:oauth_uid},
success: function(data){ 
var obj = JSON.parse(data);
if(obj.status==1){

    if (obj.type=='new') {
      $('#auth_id').val(obj.user_id); 
      $('#regModel').modal('show');
    }else{
      window.location.href=obj.url;
    }
    
}

}
});
});
});
}
// Sign-in failure callback
function onFailure(error) {
// googleUser.disconnect();    
alert(error);
}
// Sign out the user
window.onbeforeunload = function(e){
  gapi.auth2.getAuthInstance().signOut();
};



