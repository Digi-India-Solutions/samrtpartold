<html><head>
<meta charset="utf-8">
<title>Smart Parts Enquiry</title>
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
">
    <h1 style="
    margin-top: 0;
    font-size: 20px;
">Hi, <?php echo $wconfig['config_name']; ?></h1>
        <h2 style="
    font-size: 16px;
    margin-top: 0;
    color: #090c42;
">You Have a new enquiry below are the details.</h2>
        <table border="1" cellpadding="10" width="100%" style="
    border-collapse: collapse;
    text-align: left;
    font-size: 13px;
">
            <tbody><tr>
                <th>Name :</th>
                <td><?php echo strtoupper($name?$name:''); ?></td>
            </tr>
            <tr>
                <th>Email :</th>
                <td><?php echo $email?$email:''; ?></td>
            </tr>
            <tr>
                <th>Phone :</th>
                <td><?php echo $phone?$phone:''; ?></td>
            </tr>
            <tr>
                <th>City :</th>
                <td><?php echo $city?$city:''; ?></td>
            </tr>
            <tr>
                <th>Message :</th>
                <td><?php echo $message?$message:''; ?></td>
            </tr>
            <tr>
                <th>Date &amp; Time :</th>
              <td><?php echo date('M d Y, H:i',strtotime($create_date)); ?></td>
            </tr>
        </tbody></table>

        <a href="<?php echo base_url(); ?>" target="_blank" style="
    text-decoration: none;
    background-color: #1f93ff;
    color: #fff;
    border-radius: 7px;
    padding: 15px 10px;
    display: block;
    width: 130px;
    text-align: center;
    margin: 30px auto 0 auto;
    font-size: 14px;
">Explore Website</a>
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