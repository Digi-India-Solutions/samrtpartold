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

<section class="page-title-section">
    <div class="title-banner">
        <img src="<?php echo $meta->image?base_url($meta->image):base_url($config_logo); ?>" alt="<?php echo $meta->name; ?>" class="d-md-block d-sm-none d-none" />
        <img src="<?php echo base_url(); ?>/assets/frontend/images/contact-us-banner-mob.jpg" class="d-md-none d-sm-block d-block" />
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-block text-center">
                        <h2><?php echo $meta->name; ?></h2>
                        <div class="breadcrumb">
                            <ul class="nav">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><?php echo $meta->name; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="contact-form" style="position: relative;width: 10px;height: 2px;bottom: 88px;"></div>
<section class="section-space smart-section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="section-head mb-md-5 mb-2">
            			<h2>Contact <span>Form</span></h2>
            			<p><?php echo $wconfig['config_footer_note']; ?></p>
            		</div>
            		<form id="enquiry_form">
            		    <div class="row">
            		        <div class="col-md-6">
            		            <div class="form-group">
            		                <input type="text" name="name" class="form-control required txtOnly" placeholder="Name" />
            		            </div>
            		        </div>
            		        <div class="col-md-6">
            		            <div class="form-group">
            		                <input type="email" name="email" class="form-control required" placeholder="Email Address*" />
            		            </div>
            		        </div>
            		        <div class="col-md-6">
            		            <div class="form-group">
            		                <input type="tel" name="phone" class="form-control required isnumber" placeholder="Phone Number*" />
            		            </div>
            		        </div>
            		        <div class="col-md-6">
            		            <div class="form-group">
            		                <input type="text" name="city" class="form-control required" placeholder="City*" />
            		            </div>
            		        </div>
            		        <div class="col-md-12">
            		            <div class="form-group">
            		                <textarea name="message" placeholder="Message" rows="7" class="form-control"></textarea>
            		            </div>
            		        </div>
            		        <div class="col-md-3 mx-auto">
            		            <button type="submit" class="theme-btn full" id="btn_enq">Submit</button>
            		        </div>
            		    </div>
            		</form>
            	</div>
            	
                <div class="col-md-6 align-self-center">
                    <img src="assets/frontend/images/contact-form.gif" class="img-fluid"/>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section-space smart-section pt-0">
    <div class="container-fluid">
        <div class="container card-box">
            <div class="row">
                <div class="col-lg-6 col-sm-12 theme-bg contact-info-box">
                    <div class="section-head mb-5">
            			<h2>Contact information</h2>
            			<!--<p>Fill up the form and our Team will get back to you within 24 hours.</p>-->
            		</div>
            		<ul class="contact-info">
            		    <?php if (!empty($wconfig['config_telephone'])): ?>
            		    <li><img src="assets/frontend/images/phone-icon.png" /><a href="tel:<?php echo $wconfig['config_telephone'];  ?>"><?php echo $wconfig['config_telephone'];  ?></a></li>
            		     <?php endif ?>
            		     <?php if (!empty($wconfig['config_email'])): ?>
						 <li><img src="assets/frontend/images/main-icon.png" /><a href="mailto:<?php echo $wconfig['config_email'];  ?>"><?php echo $wconfig['config_email'];  ?></a></li>
						  <?php endif ?>

            		    <?php if (!empty($wconfig['config_address'])): ?>
            		    <li><img src="assets/frontend/images/location-icon.png" /><a href="#"><?php echo $wconfig['config_address'];  ?></a></li>
            		    <?php endif ?>
            		  
            		</ul>
            		<div class="social">


            	  <?php if (!empty($wconfig['config_facebook'])): ?>
                    <a href="<?php echo $wconfig['config_facebook']; ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
                  <?php endif ?>
                            
                    
                  <?php if (!empty($wconfig['config_instagram'])): ?>
                      <a href="<?php echo $wconfig['config_instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                  <?php endif ?>      
                            
                  <?php if (!empty($wconfig['config_linkedin'])): ?>
                       <a href="<?php echo $wconfig['config_linkedin']; ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                  <?php endif ?>       
                  
                  <?php if (!empty($wconfig['config_twitter'])): ?>
                       <a href="<?php echo $wconfig['config_twitter']; ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
                  <?php endif ?>       
                
                 <?php if (!empty($wconfig['config_pinterest'])): ?>
                     <a href="<?php echo $wconfig['config_pinterest']; ?>" target="_blank"><i class="fab fa-pinterest"></i></a>
                  <?php endif ?>      

                  <!--<?php if (!empty($wconfig['whatsapp'])): ?>-->
                  <!--  <a href="<?php echo $wconfig['whatsapp']; ?>" target="_blank"><i class="fab fa-whatsapp"></i></a> -->
                   
                  <!--<?php endif ?>  -->
                      
                      <a href="weixin://dl/chat?mayank140395"><i class="fab fa-weixin"></i></a>
                      
                      
                    </div>
            	</div>
                <div class="col-lg-6 col-sm-12 pl-0 pr-lg-2 pr-sm-0 pr-0">
                    <?php echo $wconfig['config_google_iframe']; ?>
            	</div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "7f161efb6e66c7da4124b24f058fba0f866c127a54d51e88e3094942ed1f01d51b8fc7f05a9d601789e611732fa731a8", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.in/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>

<?php $this->endSection(); ?>