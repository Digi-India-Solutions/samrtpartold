<?php
use App\Models\CommonModel;
$this->AdminModel =new CommonModel();
$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
foreach($setting as $value){
    $wconfig[$value->key] = $value->value;
}

?>


<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-6">
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

                  <?php if (!empty($wconfig['whatsapp'])): ?>
                    <a href="https://api.whatsapp.com/send?phone=91<?php echo $wconfig['whatsapp']; ?>&text=urlencodedtext" target="_blank"><i class="fab fa-whatsapp"></i></a> 
                   
                  <?php endif ?>  
                  
                 
                         
                         
                           
                           
                           
                           
                           
                           
                           
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="footer-links">
          <?php 
          $menu_category = $this->AdminModel->all_fetch('front_menu',array('parent_id'=>0,'status'=>1,'footer'=>1),'sort_order_footer','asc');
          foreach ($menu_category as $key => $value) { 
            $sub_menu = $this->AdminModel->all_fetch('front_menu',array('parent_id'=>$value->id,'status'=>1,'footer'=>1),'sort_order_footer','asc');
           ?>
                  
          <div class="footer-link-div">
            <li><?php echo $value->name; ?></li>
            <?php if (!empty($sub_menu)){ foreach ($sub_menu as $key => $row) {?>
                
            <li><a href="<?php echo base_url($row->link); ?>" class="footer-link"><?php echo $row->name; ?></a></li>
            <?php } } ?>
           
          </div>

        <?php }  ?>
        
        </div>
      </div>
      <div class="col-lg-4 col-sm-12">
        <div class="footer-info">
          <!--<div class="banner-reviews">-->
          <!--  Rated 4.2/5 from 10 Reviews | <img src="<?php echo CATALOG; ?>images/banner-google-reviews.png" class="banner-google-reviews">-->
          <!--</div>-->
          <p><b>Help and Support</b><br>
            Call: <?php echo $wconfig['config_telephone']; ?><br>
            Text: <?php echo $wconfig['telephone2']; ?><br>
            Email: <a href="mailto:<?php echo $wconfig['config_email']; ?>"><?php echo $wconfig['config_email']; ?></a>
          </p>
        </div>
       <!-- <form class="newsletter" method="post">
            <h5>Subscribe our Newsletter</h5>
            <div class="form-group">
                <input type="email" placeholder="Enter Email Id" class="form-control sml" required />
                <button type="submit"><i class="las la-arrow-right"></i></button>
            </div> 
        </form>-->
      </div>
    </div>
    <div class="copyright">
      <p><?php echo $wconfig['config_copywrite']; ?></p>
      <div class="copyright-links footer-links">
        <li><a href="<?php echo base_url(); ?>/terms-and-conditions">Term & Conditions</a></li>
        <li><a href="<?php echo base_url(); ?>/privacy-policy">Privacy Policy</a></li>
        <li><a href="#">Sitemap</a></li>
      </div>
    <!--  <p>Designed by CyberWorx</p>-->
    </div>
  </div>
</footer>
<script src="<?php echo CATALOG; ?>js/toastr.min.js"></script>
<script src="<?php echo CATALOG; ?>js/common.js"></script>