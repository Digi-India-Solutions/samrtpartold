<html><head>
<meta charset="utf-8">
<title>Forgot Password</title>
</head>
<body style="
    background: #f9f9f9;
    margin: 0;
    font-family: sans-serif;
">
<div class="mail-body" style="
    width: 700px;
    max-width: 95%;
    margin: 0 auto;
    background: #fff;
">
	<header style="
    padding: 20px 20px;
    border-bottom: 1px solid #090c421c;
">
		<img src="<?php echo base_url('assets/frontend/images/logo.png'); ?>" alt="logo" title="Smart Parts" style="
    display: block;
    width: 200px;
    margin: 0 auto;
">
	</header>

	<article style="
    padding: 40px 50px;
    text-align: center;
    max-width: 60%;
    margin: 0 auto;
">
	<h1 style="
    margin-top: 0;
    font-size: 20px;
">Hi, <?php echo $first_name; ?></h1>
		<p style="
    font-size: 14px;
    line-height: 21px;
">We're sending you this email because you requested a password reset. Click on this link to create a new password.</p>
		<a href="<?php echo $link; ?>" target="_blank" style="
    text-decoration: none;
    background-color: #1f93ff;
    color: #fff;
    border-radius: 7px;
    padding: 15px 10px;
    display: block;
    width: 160px;
    text-align: center;
    margin: 30px auto 30px auto;
    font-size: 14px;
">Set a new password</a>
<p style="
    font-size: 14px;
    line-height: 21px;
">If you didn't requst a password reset, you can ignore this email. Your password will not be chanegd.</p>
	
	</article>

	<footer style="
    background: #090c42;
    padding: 10px 20px;
">
		<div class="row">
			<div class="col-md-6" style="
    width: 49%;
    display: inline-block;
">
				<p style="
    margin: 0;
    color: #ffffff;
    font-size: 12px;
"><?php echo $wconfig['config_copywrite'];  ?></p>
			</div>

			            <div class="col-md-6" style="
    width: 49%;
    display: inline-block;
    text-align: right;
">

<?php if (!empty($wconfig['config_facebook'])): ?>
 <a href="<?php echo $wconfig['config_facebook']; ?>" target="_blank" style="padding-right: 5px;"><img src="<?php echo base_url('assets/frontend/images/facebook-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
 <?php endif ?>


 <?php if (!empty($wconfig['config_instagram'])): ?>
<a href="<?php echo $wconfig['config_instagram']; ?>" target="_blank" style="
    padding-right: 5px;
"><img src="<?php echo base_url('assets/frontend/images/instagram-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
<?php endif ?>  


<?php if (!empty($wconfig['config_linkedin'])): ?>
    <a href="<?php echo $wconfig['config_linkedin']; ?>" target="_blank" style="
    padding-right: 5px;
"><img src="<?php echo base_url('assets/frontend/images/linkedin-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
<?php endif ?>  


 <?php if (!empty($wconfig['config_twitter'])): ?>
    <a href="<?php echo $wconfig['config_twitter']; ?>" target="_blank" style="
    padding-right: 5px;
"><img src="<?php echo base_url('assets/frontend/images/twitter-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
<?php endif ?> 
                
                
<?php if (!empty($wconfig['config_pinterest'])): ?>
 <a href="<?php echo $wconfig['config_pinterest']; ?>" target="_blank" style="
    padding-right: 5px;
"><img src="<?php echo base_url('assets/frontend/images/pinterest-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
<?php endif ?>   


 <?php if (!empty($wconfig['whatsapp'])): ?>
 <a href="https://api.whatsapp.com/send?phone=<?php echo $wconfig['whatsapp']; ?>&amp;text=Welcome To Smart Parts Exports" target="_blank"><img src="<?php echo base_url('assets/frontend/images/whatsapp-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
                   
<?php endif ?>  

                
                
            </div>

            
		</div>
	</footer>
</div>


</body></html>