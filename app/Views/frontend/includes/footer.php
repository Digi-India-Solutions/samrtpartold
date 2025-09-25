<?php
use App\Models\CommonModel;
$this->AdminModel =new CommonModel();
$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
foreach($setting as $value){
    $wconfig[$value->key] = $value->value;
}

  $footer_category = $this->AdminModel->all_fetch('front_menu',array('status'=>1,'footer'=>1,'parent_id'=>0),'sort_order_footer','asc');

?>


<section class="footer-top-section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-column-section">
                        
                        <?php if (!empty($footer_category)) { foreach ($footer_category as $key => $value) {
                          $sub_category = $this->AdminModel->all_fetch('front_menu',array('parent_id'=>$value->id,'status'=>1,'footer'=>1),'sort_order_footer','asc');
                          if ($sub_category) {?>
                   
                          <div class="footer-column">
                            <h5><?php echo $value->name; ?></h5>
                            <ul>
                              <?php foreach ($sub_category as $key => $row): ?>
                                                             
                                <li><a href="<?php echo base_url($row->link); ?>"><?php echo $row->name; ?></a></li>
                            
                              <?php endforeach ?>
                            </ul>
                        </div>
                      <?php } } } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-12">
        <div class="footer-about">
          <div class="footer-logo">
            <img src="<?php echo $wconfig['checkout_image']; ?>" class="img-fluid">
          </div>
          <p><?php echo $wconfig['config_footer_note']; ?></p>
          <div class="footer-follow-us">
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

                
                           
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 offset-lg-2 col-sm-6 col-5">
        <div class="footer-links">
      
                  
          <div class="footer-link-div">
           <ul>
               <li><i class="fa fa-envelope"></i> Email</li>
               <li><a href="<?php echo $wconfig['whatsapp']; ?>" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a></li>
               
               <li><a href="<?php echo @$wconfig['weechat']; ?>" target="_blank"><i class="fab fa-weixin"></i> WE chat</a></li>
               
               
      
               
               
               
              <!-- <li><i class="fa fa-calendar"></i> Working Days</li>
               <li><i class="fa fa-clock"></i> Working Hours</li>-->
           </ul>
          </div>
        
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-7">
         <div class="footer-link-div">
           <ul>
               <li class="p-0"><a href="mailto:<?php echo $wconfig['config_email']; ?>"><?php echo $wconfig['config_email']; ?></a></li>
               <li class="p-0"><a href="tel:<?php echo $wconfig['config_telephone']; ?>"><?php echo $wconfig['config_telephone']; ?></a></li>
               <!--<li class="p-0">Monday - Sunday</li>
               <li class="p-0">24 Hours</li>-->
           </ul>
          </div> 
          
      </div>
    </div>
    <div class="copyright">
        <div class="row">
            <div class="col-lg-6 col-sm-12"><p><?php echo $wconfig['config_copywrite']; ?></p></div>
            <div class="col-lg-6 col-sm-12 text-lg-right text-sm-center">
                <div class="copyright-links footer-links">
        <li><a href="<?php echo base_url(); ?>/terms-and-conditions">Term & Conditions</a></li>
        <li><a href="<?php echo base_url(); ?>/privacy-policy">Privacy Policy</a></li>
        <li><a target="_blank" href="<?php echo base_url('sitemap.xml'); ?>">Sitemap</a></li>
      </div>
            </div>
        </div>
      
      
    <!--  <p>Designed by CyberWorx</p>-->
    </div>
  </div>
</footer>
<a href="https://bit.ly/4d73t8L" target="_blank" class="whastapp_btn"><img width="50" height="50" src="<?php echo base_url(); ?>/assets/frontend/images/whatsapp-icon.webp"></a>
<script src="<?php echo CATALOG; ?>js/toastr.min.js"></script>
<script src="<?php echo CATALOG; ?>js/common.js"></script>
<script src="<?php echo CATALOG; ?>js/login.js"></script>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>