<html><head>
<meta charset="utf-8">
<title>Registration</title>
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

    <div class="banner-image">
        <img src="<?php echo base_url('uploads/images/1638957398_7a0ada6481a0351f7f96.png'); ?>" style="
    width: 100%;
    height: 170px;
    object-fit: cover;
">
    </div>
    <article style="
    padding: 40px 50px;

">
    <h1 style="
    margin-top: 0;
    font-size: 20px;
    line-height: 27px;
    margin-bottom: 10px;
">Hi <?php echo $first_name; ?>,</h1>
  <h1 style="
    margin-top: 0;
    font-size: 18px;
    line-height: 27px;
    color: #090c42;
    margin-bottom: 5px;
">Welcome to Smart Parts Export</h1>
<h2 style="
    font-size: 16px;
    margin-top: 0;
    color: #090c42;
">You have been successfully Registered. Below are the details:</h2>

<table border="1" cellpadding="10" width="100%" style="
    border-collapse: collapse;
    text-align: left;
    font-size: 13px;
">
            <tbody><tr>
                <th>First Name :</th>
                <td><?php echo $first_name; ?></td>
            </tr>
            <tr>
                <th>Last Name :</th>
                <td><?php echo $last_name; ?></td>
            </tr>
            <tr>
                <th>Email :</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>Phone :</th>
                <td><?php echo $phone_code.' '.$mobile; ?></td>
            </tr>
            <tr>
                <th>Date &amp; Time :</th>
                <td><?php echo date('M d Y, H:i',strtotime($create_date)); ?></td>
            </tr>
        </tbody></table>
        <p style="
    font-size: 14px;
    line-height: 21px;
    text-align: center;
    font-weight: 600;
    margin-top: 30px;
">Click Below link to verify your account.</p>
      <a href="<?php echo base_url($link); ?>" target="_blank" style="
    text-decoration: none;
    background-color: #1f93ff;
    color: #fff;
    border-radius: 7px;
    padding: 15px 10px;
    display: block;
    width: 130px;
    text-align: center;
    margin: 0px auto 0 auto;
    font-size: 14px;
">Verify Account</a>

    
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