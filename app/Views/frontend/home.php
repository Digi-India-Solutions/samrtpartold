<?php
$this->extend('layout/master');
$this->section('page');
?>

<style>
header {
    position: fixed;
    top: 0;
    z-index: 99;
    background-color: transparent;
    width: 100%;
    left: 0;
}
.main-header .menu li a {
    color: #ffffff;
}
.main-header .social-menu li a {
    color: #fff;
}

.main-header .social-menu img {
    filter: brightness(0) invert(1);
}
@media only screen and (max-width: 768px){
.hamburg-icon .line {
    background-color: #fff;
}
.main-header .menu li a {
    color: #000000;
}
header.sticky .hamburg-icon .line {
    background: #000;
}
}




</style>

<?php if(!empty($home_slider)){?>

<div class="preloader" id="preloader">
    <video width="100%" height="100vh" autoplay muted>
      <source src="<?php echo CATALOG; ?>images/preload_video_c.mp4" type="video/mp4">
    </video>
</div>
<script>

if(sessionStorage.getItem("loader") == null){
    sessionStorage.setItem("loader",true)
    setTimeout(function(){
     $('.preloader').addClass("isdone");
    },1000);
}else{
    document.getElementById("preloader").classList.add("d-none")
}
</script>
<section class="smart-section main-banner-section new_banner">
    <div class="swiper main-banner-slide ">
      <div class="swiper-wrapper">
        
        <div class="swiper-slide">
          <div class="container">     
              
           <svg id="ea9M6OZy5QW1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3375 2585" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><style><![CDATA[#ea9M6OZy5QW6_tr {animation: ea9M6OZy5QW6_tr__tr 20000ms linear infinite normal backwards}@keyframes ea9M6OZy5QW6_tr__tr { 0% {transform: translate(2495px,1236px) rotate(354.372177deg)} 100% {transform: translate(2495px,1236px) rotate(712.742644deg)}} #ea9M6OZy5QW8_tr {animation: ea9M6OZy5QW8_tr__tr 20000ms linear infinite normal backwards}@keyframes ea9M6OZy5QW8_tr__tr { 0% {transform: translate(1561px,856px) rotate(1452.753642deg)} 100% {transform: translate(1561px,856px) rotate(1812.746832deg)}}]]></style><g clip-path="url(#ea9M6OZy5QW9)"><g><path d="M0,-792c437.105,0,792,354.895,792,792s-354.895,792-792,792-792-354.895-792-792s354.895-792,792-792Z" transform="matrix(.98479 0 0 0.98479 2495 1236)" fill="none" stroke="#2ceef0" stroke-width="2"/><path d="M0,-792c-437.41,0-792,354.59-792,792s354.59,792,792,792s792-354.59,792-792-354.59-792-792-792Z" transform="matrix(.98479 0 0 0.98479 2090.5 1728)" fill="none" stroke="#fff" stroke-width="2"/><g id="ea9M6OZy5QW6_tr" transform="translate(2495,1236) rotate(354.372177)"><path d="M14.08,4.686c-7.56,6.608-17.3,9.347-26.5,8.103-1.66-9.133.65-18.986,6.91-26.822c4.467176,1.438969,8.549649,3.872725,11.94,7.118c3.395384,3.23798,6.011152,7.204715,7.65,11.601Z" transform="translate(-780.08193,-8.016986)" fill="#0476d0"/></g><path d="M0,-792c437.41,0,792,354.59,792,792s-354.59,792-792,792-792-354.59-792-792s354.59-792,792-792Z" transform="matrix(.98479 0 0 0.98479 1561 856)" fill="none" stroke="#0476d0" stroke-width="2"/><g id="ea9M6OZy5QW8_tr" transform="translate(1561,856) rotate(1452.753642)"><path d="M-14.038,5.728c3.500318,3.102971,7.662681,5.366107,12.17,6.617c4.535164,1.265045,9.297081,1.491998,13.932.664c1.974-9.824-.51-19.567-6.197-26.822-8.783,3.219-16.209,10.189-19.905,19.541Z" transform="translate(-754.519611,-212.236056)" fill="#2ceef0"/></g></g><clipPath id="ea9M6OZy5QW9"><path d="M0,0h3375v2585h-3375Z"/></clipPath></g></svg>
            <div class="banner-content">
              <h2><span><?php echo $heading->t_heading; ?></span></h2>
              <h1><span><?php echo $heading->t_sub_heading; ?></span></h1>
                <a href="<?php echo $heading->btn_link; ?>" class="theme-btn"><?php echo $heading->btn_name; ?></a>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </section>
  
  
  
<!--<section class="smart-section main-banner-section">-->
  <!--  <div class="swiper main-banner-slide">-->
  <!--    <div class="swiper-wrapper">-->
        
  <!--    <?php foreach($home_slider as $value){?>-->
  <!--      <div class="swiper-slide">-->
  <!--        <div class="container">-->
  <!--          <div class="main-banner-img" style="background-image: url('<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>');"></div>-->
  <!--          <div class="banner-content">-->
  <!--            <h2><span><?php echo $value->title; ?></span></h2>-->
  <!--            <p><span><?php echo $value->subtitle; ?></span></p>-->
  <!--            <?php if(!empty($value->p_link)){?>-->
  <!--              <a href="<?php echo $value->p_link; ?>" class="theme-btn">Explore Now</a>-->
  <!--              <?php }?>-->
              
  <!--          </div>-->
            <!--<div class="banner-reviews">-->
            <!--  Rated 4.2/5 from 10 Reviews | <img src="<?php echo CATALOG; ?>images/banner-google-reviews.png" class="banner-google-reviews">-->
            <!--</div>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    <?php } ?>-->
      
  <!--    </div>-->
  <!--    <div class="swiper-button-next"></div>-->
  <!--    <div class="swiper-button-prev"></div>-->
  <!--  </div>-->
  <!--</section>-->

  <?php } ?>
  

<?php 
$str = explode(' ', $heading->india_heading);
$lastt = end($str);
array_pop($str);


 ?>

<section class="smart-section section-space pb-0 pt-5">
  <div class="container">
      <div class="section-head">
        <h2><?php echo implode(' ',$str); ?><span>&nbsp;<?php echo $lastt; ?></span></h2>
      </div>
      <div class="section-content">
          <p><?php echo $heading->india_des; ?></p>
      </div>
  </div>
</section>



<?php if (!empty($brands_list)) { foreach ($brands_list as $key => $brand) {

  $str = explode(' ',$brand['name']);
  $txt1 = @$str[1];
  $txt2 = @$str[2]?$str[2]:'';
  $first = @$str[0]?$str[0]:'';

  ?>

<div id="<?php echo $brand['seo_url']; ?>" style="position: relative;width: 10px;height: 2px;bottom: 88px;"></div>
<section class="smart-section brands-section">
    <div class="container">
      <div class="section-head">
        <h2><?php echo $first.' '.$txt1; ?> <span><?php echo $txt2; ?></span></h2>
      </div>
      <div class="help-you-choose-grids">
        <?php if(!empty($brand['brand_list'])){ foreach ($brand['brand_list'] as $key => $row) {?>
      
        <div class="brand-grid">
          <a href="<?php echo base_url('brands/'.$brand['seo_url'].'/'.$row->seo_url); ?>">  <div class="icon">
            <img height="75" width="auto" loading="lazy" src="<?php echo $row->image?base_url($row->image):base_url($config_logo); ?>" class="img-fluid" alt="logo">
          </div>
          <p><?php echo $row->name; ?></p></a>
        </div>
       
       <?php } } ?>
                
      
      </div>
    </div>
  </section>

<?php } }  ?>


  





  
<?php if (!empty($brands)) {?>

<?php 
  $str = explode(' ',$heading->heading5);
  $txt1 = $str[1];
  $txt2 = $str[2];
  $first = $str[0];
  
  ?>
  <section class="smart-section brands-section d-none">
    <div class="container">
      <div class="section-head">
        <h2><?php echo $first.' '.$txt1; ?> <span><?php echo $txt2; ?></span></h2>
      </div>
      <div class="help-you-choose-grids space">
        
        <?php foreach ($brands as $key => $value) {?>
        
        <div class="brand-grid">
          <div class="icon">
            <img height="75" width="auto" loading="lazy" src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" class="img-fluid" alt="logo">
          </div>
          <p><?php echo $value->name; ?></p>
        </div>
        <?php } ?>  
      
      </div>
      <div class="pt-5 text-center mt-4">
        <a href="#" class="theme-btn">View All</a>
      </div>
    </div>
  </section>

<?php } ?>

  <?php if (!empty($category)) {?>


<?php 
  $str = explode(' ',$heading->heading3);
  $txt1 = $str[1];
  $txt2 = $str[2];
  $first = $str[0];
  
  ?>
<div id="categories" style="position: relative;width: 10px;height: 2px;bottom: 88px;"></div>
  <section class="smart-section categories-section">
    <div class="container">
      <div class="section-head">
        <h2><?php echo $first.' '.$txt1; ?> <span><?php echo $txt2; ?></span></h2>

      </div>
      <div class="help-you-choose-grids space">
        
        <?php foreach ($category as $key => $value) {?>
        
        <div class="category-grid">
          <a href="<?php echo base_url('category/'.$value->keyword); ?>">
          <div class="icon">
            <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" class="img-fluid" alt="logo">
          </div>
          <p><?php echo $value->name; ?></p>
           </a>
        </div>
        <?php } ?>
      
      </div>
      <!--<div class="pt-lg-5 pt-sm-4 text-center mt-4">
        <a href="<?php echo base_url('categories'); ?>" class="theme-btn">View More</a>
      </div>-->
    </div>
  </section>

<?php } ?>


<?php if (!empty($popular_product)) {?>


  <?php 
  $str = explode(' ',$heading->heading2);
  $first1 = $str[0];
  $txt1 = $str[1];
  $txt2 = $str[2];
  
  
  ?>

  <section class="smart-section popular-parts-section pt-4">
    <div class="container">
      <div class="curve-frame-wrapper"></div>
      <div class="section-head">
        <h2><?php echo $first1; ?> <span><?php echo $txt1 .' '.$txt2; ?></span></h2>
      </div>
      <div class="help-you-choose-grids">
        <div class="swiper popular-parts-slider">
          <div class="swiper-wrapper">
            <?php foreach ($popular_product as $key => $product) {?>
            
            <div class="swiper-slide">
              <a href="<?php echo base_url('product/'.$product['product_seo_url']); ?>">
              <div class="popular-grid">
                <div class="image" style="background-image: url('<?php echo $product['image']?base_url($product['image']):base_url($config_logo); ?>')">
                  <div class="cart-icon">

                    <img src="<?php echo CATALOG; ?>images/cart-icon-white.png" class="popular-cart-icon" alt="cart-icon">
                  </div>
                 
                </div>
                <div class="info-content">
                  <div class="text">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo substr(strip_tags($product['description']),0,100).'...'; ?></p>
                    <span class="product_number">Part Number : <b><?php echo $product['part_no']; ?></b></span>
                  </div>
                  <div class="price-ratings">
                      <?php if(!empty($product['price'])){?>
                    <div class="price">$ <?php echo $product['price']; ?></div>
                    <?php } ?>
                    <div class="rating">
                        <div class="star-rating-box" data-rating="<?php echo $product['rating']?$product['rating']:0; ?>">
                                              <span><i class="fa fa-star"></i></span>
                                              <span><i class="fa fa-star"></i></span>
                                              <span><i class="fa fa-star"></i></span>
                                              <span><i class="fa fa-star"></i></span>
                                              <span><i class="fa fa-star"></i></span>
                                          </div>
                    </div>
                  </div>
                </div>
              </div>
               </a>
            </div>

            <?php } ?>
            
            
          </div>
        </div>
        <div class="swiper-arrows next-arrow-popular">
          <img src="<?php echo CATALOG; ?>images/slider-arrow-right.png" alt="right-arrow">
        </div>
        <div class="swiper-arrows prev-arrow-popular">
          <img src="<?php echo CATALOG; ?>images/slider-arrow-left.png" alt="left-arrow">
        </div>
      </div>
      <div class="pt-md-5 my-md-2 mt-2 text-center">
        <a href="<?php echo base_url('most-popular-part'); ?>" class="theme-btn">View More</a>
      </div>
    </div>
  </section>

<?php } ?>
  





<?php 
  $str = explode(' ',$heading->heading4);
  $txt1 = $str[1];
  $txt2 = $str[2];
  $first = $str[0];
  
  ?>
  <section class="smart-section search-section pt-0 top_show d-none">
    <div class="container">
      <div class="section-head">
        <h2><?php echo $first.' '.$txt1; ?> <span><?php echo $txt2; ?></span></h2>
      </div>
      <div class="help-you-choose-grids space">
        <div class="search-grid">
          <div class="icon">
            <img src="<?php echo CATALOG; ?>images/search-grid-icon.png" class="img-fluid" alt="search">
          </div>
          <input type="input" name="search" placeholder="Enter the Vehicle or VIN" id="search_top" onkeyup="search();">
          <div class="icon">
            <!--<img src="<?php echo CATALOG; ?>images/search-close.png" class="img-fluid">-->
          </div>
           <div class="searchdiv" id="search_result" ></div> 
        </div>
      </div>
    </div>
  </section>




  <section class="smart-section best-marketplace-section pt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 pl-0">
          <div class="image-area">
            <img src="<?php echo $heading->side_image?base_url($heading->side_image):base_url($config_logo); ?>" class="img-fluid" alt="logo">
          </div>
        </div>
        <div class="col-md-8">
          <div class="content-area">
            <div class="section-head text-center">
              <h2><?php echo $heading->smart_heading; ?></h2>
              <p><?php echo $heading->smart_des; ?></p> 
            </div>
            <div class="best-marketplace-pointers-grids">
              <div class="counter-grid">
                <div class="icon-text">
                  <!-- <img src="<?php echo CATALOG; ?>images/countries.png" class="img-fluid"> -->
                  <span class="timer1" timer="<?php echo trim($heading->cv1); ?>"><?php echo $heading->cv1; ?></span>+
                </div>
                <p><?php echo $heading->ch1; ?></p>
              </div>
              <div class="counter-grid">
                <div class="icon-text">
                  <!-- <img src="<?php echo CATALOG; ?>images/continents.png" class="img-fluid"> -->
                  <span class="timer2" timer="<?php echo trim($heading->cv2); ?>"><?php echo $heading->cv2; ?></span>+
                </div>
                <p><?php echo $heading->ch2; ?></p>
              </div>
              <div class="counter-grid">
                <div class="icon-text">
                  <!-- <img src="<?php echo CATALOG; ?>images/clients.png" class="img-fluid"> -->
                  <span class="timer3" timer="<?php echo trim($heading->cv3); ?>"><?php echo $heading->cv3; ?></span>+
                </div>
                <p><?php echo $heading->ch3; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



<?php if (!empty($flip)): ?>
  


  <section class="homeflip-section  pt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 d-flex flex-wrap justify-content-between p-0" style="gap:40px;
    margin-bottom: 40px;">
            
            <?php foreach ($flip as $key => $value): ?> 
          
            <div class="flip-card" tabIndex="0">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <h3><?php echo $value->title; ?></h3>
                  <p><?php echo $value->subtitle; ?> </p>
                  <img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" class="img-fluid" alt="logo" />
                </div>
                <div class="flip-card-back">
                  <h3><?php echo $value->btitle; ?></h3>
                  <p><?php echo $value->bsubtitle; ?> </p>
                  <img src="<?php echo $value->bimage?base_url($value->bimage):base_url($config_logo); ?>" class="img-fluid" alt="logo" />
                </div>
              </div>
            </div>
            
               <?php endforeach ?>               
            
            
        </div>
      </div>
    </div>
  </section>
<?php endif ?>


  <section class="smart-section contact-us-stripe-section pt-0">
    <div class="container">
      <div class="contact-stripe-flex" style="background-image: url('<?php echo $heading->sup_image?base_url($heading->sup_image):base_url($config_logo); ?>');">
        <div class="section-head">
          <h5 class="label"><?php echo $heading->sup_heading; ?></h5>
          <h2><?php echo $heading->sup_sub_heading; ?></h2>
          <p><?php echo $heading->sup_des; ?></p>
        </div>
        <div class="button">
          <a href="<?php echo base_url($heading->link); ?>" class="theme-btn">Contact Us</a>
        </div>
      </div>
    </div>
  </section>

  

  <?php 
  $str = explode(' ',$heading->heading);
  $txt1 = $str[1];
  $txt2 = $str[2];
  $first = $str[0];
  unset($str[0]);
  unset($str[1]);
  unset($str[2]);


   ?>
  
  
  <section class="smart-section pro_bar ">
      <div class="container">  
        <div class="row">
            
            <div class="col-md-12">
                <div class="section-head">
                  <h2><?php echo $first; ?> <span><?php echo $txt1.' '.$txt2; ?></span> <?php echo implode(' ', $str); ?></h2>
                </div>
                <div class="steps-wrapper">
                    <div class="line_animate d-md-block d-none">
                        <div class="pro_line">
                            <img src="<?php echo CATALOG; ?>images/gray_line.svg" class="img-fluid" alt="gray-line" />
                        </div>
                        <div class="pro_line active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1576.72 397.89">
                              <defs>
                                <style>
                                .cls-1 {
                                  fill: none;
                                  stroke: #fff;
                                  stroke-miterlimit: 10;
                                  stroke-width: 9px;
                                }
                                
                                .cls-2 {
                                  fill: #fff;
                                }
                                </style>
                              </defs>
                              <g id="Layer_2" data-name="Layer 2">
                                <g id="Layer_1-2" data-name="Layer 1">
                                  <path class="cls-1" d="M3.09,4.5H1400.83c93.91,0,169.82,49.17,171.39,134.48V251.8c0,45.4-36,131.27-137,131.27H14.83" />
                                  <circle class="cls-2" cx="20" cy="380" r="20" />
                                </g>
                              </g>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="line_animate mobile d-md-none d-block">
                        <div class="pro_line">
                            <img src="<?php echo CATALOG; ?>images/mobileline2.svg" class="img-fluid" alt="mobile-line" />
                        </div>
                        <div class="pro_line active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.22 851">
                                <defs>
                                    <style>
                                        .cls-2{
                                            fill:none;
                                            stroke:#fff;
                                            stroke-miterlimit:10;
                                            stroke-width:5px;
                                            
                                        }
                                        .cls-2{
                                            fill:#fff;
                                            
                                        }
                                        </style>
                                        </defs>
                                        <title>Asset 3</title>
                                        <g id="Layer_2" data-name="Layer 2">
                                            <g id="Layer_1-2" data-name="Layer 1">
                                                <line class="cls-2" x1="8.11" x2="8.11" y2="850"/>
                                                <circle class="cls-2" cx="8.11" cy="842.89" r="8.11"/>
                                                </g>
                                            </g>
                                        </svg>
                            <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1576.72 397.89">
                              <defs>
                                <style>
                                .cls-1 {
                                  fill: none;
                                  stroke: #fff;
                                  stroke-miterlimit: 10;
                                  stroke-width: 9px;
                                }
                                
                                .cls-2 {
                                  fill: #fff;
                                }
                                </style>
                              </defs>
                              <g id="Layer_2" data-name="Layer 2">
                                <g id="Layer_1-2" data-name="Layer 1">
                                  <path class="cls-1" d="M3.09,4.5H1400.83c93.91,0,169.82,49.17,171.39,134.48V251.8c0,45.4-36,131.27-137,131.27H14.83" />
                                  <circle class="cls-2" cx="20" cy="380" r="20" />
                                </g>
                              </g>
                            </svg>-->
                        </div>
                    </div>
                    <div class="top_elements">
                        <div class="pro_item">
                            <span><img src="<?php echo $heading->icon1?base_url($heading->icon1):base_url($config_logo); ?>" class="img-fluid" alt="logo" /></span>
                            <p><?php echo $heading->step1title; ?></p>
                        </div>
                         <div class="pro_item">
                            <span><img src="<?php echo $heading->icon2?base_url($heading->icon2):base_url($config_logo); ?>" class="img-fluid" alt="logo" /></span>
                            <p><?php echo $heading->step2title; ?></p>
                        </div>
                          <div class="pro_item">
                            <span><img src="<?php echo $heading->icon3?base_url($heading->icon3):base_url($config_logo); ?>" class="img-fluid" alt="logo" /></span>
                            <p><?php echo $heading->step3title; ?></p>
                        </div>
                    </div>
                    <div class="bottom_elements">
                       <div class="pro_item">
                            <span><img src="<?php echo $heading->icon6?base_url($heading->icon6):base_url($config_logo); ?>" class="img-fluid" alt="logo" /></span>
                            <p><?php echo $heading->step6title; ?></p>
                        </div>
                          <div class="pro_item">
                            <span><img src="<?php echo $heading->icon5?base_url($heading->icon5):base_url($config_logo); ?>" class="img-fluid" alt="logo" /></span>
                            <p><?php echo $heading->step5title; ?></p>
                        </div>
                        
                           <div class="pro_item">
                            <span><img src="<?php echo $heading->icon4?base_url($heading->icon4):base_url($config_logo); ?>" class="img-fluid" alt="logo" /></span>
                            <p><?php echo $heading->step4title; ?></p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
      </div>
  </section>





  <?php if (!empty($blogs)) {?>
  <?php 
  $str = explode(' ',$heading->heading);
  $txt1 = $str[1];
  $txt2 = $str[2];
  $first = $str[0];
  unset($str[0]);
  unset($str[1]);
  unset($str[2]);
  ?>


  <section class="smart-section help-you-choose-section d-none">
    <div class="help-you-choose-section-div">
      <div class="container">
        <div class="section-head">
          <h2><?php echo $first; ?> <span><?php echo $txt1.' '.$txt2; ?></span> <?php echo implode(' ',$str); ?></h2>
        </div>
        <div class="help-you-choose-grids space">
          <div class="progress-line">
            <div class="line"></div>
          </div>
          <div class="choose-grid choose-grid-1">
            <div class="number">01</div>
            <div class="icon">
              <img src="<?php echo $heading->icon1?base_url($heading->icon1):base_url($config_logo); ?>" alt="logo">
            </div>
            <div class="text">
              <h3><?php echo $heading->step1title; ?></h3>
              <p><?php echo $heading->step1des; ?></p>
            </div>
          </div>
          <div class="choose-grid choose-grid-2">
            <div class="number">02</div>
            <div class="icon">
              <img src="<?php echo $heading->icon2?base_url($heading->icon2):base_url($config_logo); ?>" class="tag-img" alt="logo">
            </div>
            <div class="text">
              <h3><?php echo $heading->step2title; ?></h3>
              <p><?php echo $heading->step2des; ?></p>
            </div>
          </div>
          <div class="choose-grid choose-grid-3">
            <div class="number">03</div>
            <div class="icon">
              <img src="<?php echo $heading->icon3?base_url($heading->icon3):base_url($config_logo); ?>" alt="logo">
            </div>
            <div class="text">
              <h3><?php echo $heading->step3title; ?></h3>
              <p><?php echo $heading->step3des; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



<?php 
  $str = explode(' ',$heading->blog_heading);
  $txt1 = $str[1];
  $first = $str[0];
  
  ?>
  <section class="smart-section blogs-section">
    <div class="container">
      <div class="section-head">
        <h2><?php echo $first; ?> <span><?php echo $txt1; ?></span></h2>
      </div>
      <div class="row mt-5 pt-5">
        
        <div class="col-lg-7 col-sm-12">
          <div class="blog-grid blog-grid-main">
            <a href="<?php echo base_url('blog/'.$blogs[0]->link); ?>" class="cover-link"></a>
            <div class="image" style="background-image: url('<?php echo $blogs[0]->image?base_url($blogs[0]->image):base_url($config_logo); ?>');"></div>
            <div class="content">
              <h4><?php echo $blogs[0]->title; ?></h4>
              <p><?php echo substr(strip_tags($blogs[0]->descri),0,600).'...'; ?></p>
            </div>
          </div>
        </div>

        <div class="col-lg-5 col-sm-12">

          <?php  array_shift($blogs);   foreach ($blogs as $key => $value) {?>
          
          <div class="blog-grid blog-grid-small">
            <a href="<?php echo base_url('blog/'.$value->link); ?>" class="cover-link"></a>
            <div class="image" style="background-image: url('<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>');"></div>
            <div class="content">
              <h4><?php echo $value->title; ?></h4>
              <p><?php echo substr(strip_tags($value->descri),0,150).'...'; ?></p>
            </div>
          </div>

           <?php } ?>

        </div>
      </div>
      <div class="pt-lg-5 pt-sm-4 text-center mt-4">
        <a href="<?php echo base_url('blogs'); ?>" class="theme-btn">View All</a>
      </div>
    </div>
  </section>
<?php } ?>

<?php if(empty($is_cancel)){?>

<div class="modal fade" id="newsletter-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" style="background-image:url('<?php echo $heading->news_image?base_url($heading->news_image):base_url($config_logo); ?>');"  >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="newsletter_cancel();" >
          <i class="las la-times"></i>
        </button>
      </div>
      <div class="modal-body text-center">
        <h3><?php echo $heading->news_heading; ?></h3>
        <p><?php echo $heading->news_sub_heading; ?></p>
        <form method="post" id="quotation_form">
            <div class="form-group">
                <input type="text" placeholder="Your Name" name="name" class="form-control sml outline" required />
            </div>
            <div class="form-group">
                <input type="text" placeholder="Email Id" name="email" class="form-control sml outline" required />
            </div>
            <div class="form-group phone-tel">
                 <input type="hidden" value="+1" name="phone_code" autocomplete="off" id="phone_code33" />
                 
                <input type="text" autocomplete="off" value="+1" class="phone-tel-code"  />
                <input type="tel" placeholder="Phone Number" name="phone" id="phone_reg33"  class="form-control sml outline isnumber" />
            </div>
            <button type="submit" class="theme-btn sml mb-3">Send Request</button>
            <p class="subtext mb-0">Our Team is Available 24X7 for client assistance.<br>Please Feel Free to Contact Us </p>
        </form>
      </div>
    </div>
  </div>
</div>

<?php } ?>


<?php echo $this->endSection(); ?>
 


<?php  echo $this->section('javascript'); ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.1/ScrollMagic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.1/plugins/animation.gsap.js"></script>
  <script type="text/javascript">
    // var swiper = new Swiper(".main-banner-slide", {
    //   loop: true,
    //       speed: 1000,
    //       autoplay: {
    //         delay: 3500,
    //         disableOnInteraction: false,
    //       },
    //       navigation: {
    //         nextEl: '.swiper-button-next',
    //         prevEl: '.swiper-button-prev',
    //     },
    //   });

    var swiper = new Swiper(".popular-parts-slider", {
          // slidesPerView: 4,
          // spaceBetween: 10,
          speed: 800,
          autoplay: {
            delay: 3500,
            disableOnInteraction: false,
          },
          navigation: {
            nextEl: '.next-arrow-popular',
            prevEl: '.prev-arrow-popular',
        },
        breakpoints: {
              320: {
                  slidesPerView: 1,
                  spaceBetween: 30,
              },
              768: {
                  slidesPerView: 2,
                  spaceBetween: 30,
              },
              1025: {
                  slidesPerView: 3,
                  spaceBetween: 30,
              }
          }
      });


    $.fn.isInViewport = function() {
            var elementTop = $(this).offset().top + $(window).height() / 4.5;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop() ;
            var viewportBottom = viewportTop + $(window).height();
            return elementTop < viewportBottom;
        };
      
        var runned = 0;
      
        $(window).scroll(function(){
            
            if($(window).scrollTop() > 0){
                $('header').addClass('sticky')
            }
            else{
                $('header').removeClass('sticky')
            }
            
            $('.smart-section').each(function(){
                if($(this).isInViewport()){
                    $(this).addClass('active')
                }
                else{
                    // $(this).removeClass('active')
                }
            })
            
            if($('.best-marketplace-section').hasClass('active') && runned == 0){
            var timer1 = $('.timer1').attr('timer');
            var timer2 = $('.timer2').attr('timer');
            var timer3 = $('.timer3').attr('timer');
            var timer4 = $('.timer4').attr('timer');
            setTimeout(function(){
                $('.timer1').countTo({
                    from: 0,
                    to: timer1,
                    speed: 1500,
                    refreshInterval: 50,
                    onComplete: function(value) {
                    //   console.debug(this);
                    }
                });
                $('.timer2').countTo({
                    from: 0,
                    to: timer2,
                    speed: 800,
                    refreshInterval: 50,
                    onComplete: function(value) {
                    //   console.debug(this);
                    }
                });
                $('.timer3').countTo({
                    from: 0,
                    to: timer3,
                    speed: 2500,
                    refreshInterval: 50,
                    onComplete: function(value) {
                    //   console.debug(this);
                    }
                    
                });
            }, 500)
            
            runned = 1;
        }
        })
        
        $('.smart-section').each(function(){
            if($(this).isInViewport()){
                $(this).addClass('active')
            }
            else{
                // $(this).removeClass('active')
            }
        })

        if($(window).scrollTop() > 0){
            $('header').addClass('sticky')
        }

        // Progress Bar
        var viewportSize = $(window).width();
        
        gsap.registerPlugin(ScrollTrigger);
        if(viewportSize < 700){
            gsap.to(".progress-line .line", {
              scrollTrigger: {
              trigger: ".help-you-choose-section",
                toggleActions: "restart reverse",
                // pin: '.help-you-choose-section-div',
                // pinSpacing: true,
                start: 'top top',
                end: '+=250%',
                scrub: .5,
                ease: "power2",
              },
              height: '100%'
            });
        }
        else {
            gsap.to(".progress-line .line", {
              scrollTrigger: {
              trigger: ".help-you-choose-section",
                toggleActions: "restart reverse",
                pin: '.help-you-choose-section-div',
                // pinSpacing: true,
                start: 'top top',
                end: '+=250%',
                scrub: .5,
                ease: "power2",
              },
              width: '100%'
            });
        }
        gsap.to(".choose-grid-1", {
          scrollTrigger: {
          trigger: ".help-you-choose-section",
            toggleActions: "restart reverse",
            start: '3%',
            end: '3%',
            scrub: .5,
            ease: "power2",
            onEnter: addMainSection1,
          onEnterBack: addMainSection1,
          },
        });

        gsap.to(".choose-grid-2", {
          scrollTrigger: {
          trigger: ".help-you-choose-section",
            toggleActions: "restart reverse",
            start: '7%',
            end: '7%',
            scrub: .5,
            ease: "power2",
            onEnter: addMainSection2,
          onEnterBack: addMainSection2,
          },
        });

        gsap.to(".choose-grid-3", {
          scrollTrigger: {
          trigger: ".help-you-choose-section",
            toggleActions: "restart reverse",
            start: '15%',
            end: '15%',
            scrub: .5,
            ease: "power2",
            onEnter: addMainSection3,
          onEnterBack: addMainSection3,
          },
        });

        function addMainSection1(){
          if($('.choose-grid-1').hasClass('active')){
              $('.choose-grid-1').removeClass('active')
          }else {
              $('.choose-grid-1').addClass('active')
          }
      }
        function addMainSection2(){
          if($('.choose-grid-2').hasClass('active')){
              $('.choose-grid-2').removeClass('active')
          }else {
              $('.choose-grid-2').addClass('active')
          }
      }
        function addMainSection3(){
          if($('.choose-grid-3').hasClass('active')){
              $('.choose-grid-3').removeClass('active')
          }else {
              $('.choose-grid-3').addClass('active')
          }
      }
    (function($){
          $.fn.countTo = function(options) {
              // merge the default plugin settings with the custom options
              options = $.extend({}, $.fn.countTo.defaults, options || {});
      
              // how many times to update the value, and how much to increment the value on each update
              var loops = Math.ceil(options.speed / options.refreshInterval),
                  increment = (options.to - options.from) / loops;
      
              return $(this).each(function() {
                  var _this = this,
                      loopCount = 0,
                      value = options.from,
                      interval = setInterval(updateTimer, options.refreshInterval);
      
                  function updateTimer() {
                      value += increment;
                      loopCount++;
                      $(_this).html(value.toFixed(options.decimals));
      
                      if (typeof(options.onUpdate) == 'function') {
                          options.onUpdate.call(_this, value);
                      }
      
                      if (loopCount >= loops) {
                          clearInterval(interval);
                          value = options.to;
      
                          if (typeof(options.onComplete) == 'function') {
                              options.onComplete.call(_this, value);
                          }
                      }
                  }
              });
          };
      
          $.fn.countTo.defaults = {
              from: 0,  // the number the element should start at
              to: 100,  // the number the element should end at
              speed: 1000,  // how long it should take to count between the target numbers
              refreshInterval: 100,  // how often the element should be updated
              decimals: 0,  // the number of decimal places to show
              onUpdate: null,  // callback method for every time the element is updated,
              onComplete: null,  // callback method for when the element finishes updating
          };
      })(jQuery);
      
setTimeout(function(){
    $('#newsletter-form').modal('show');
},5000);
      

    
if(window.innerWidth > 541){
var controller = new ScrollMagic.Controller();

function pathPrepare($el) {
  var lineLength = $el[0].getTotalLength();
  $el.css("stroke-dasharray", lineLength);
  $el.css("stroke-dashoffset", lineLength);
}

var $route = $("path.cls-1");

// prepare SVG
pathPrepare($route);

// build tween
var route_1 = new TimelineMax()
  .add(TweenMax.to($route, 6, {
    strokeDashoffset: 0,
    ease: Linear.easeNone
  }));   

var scene = new ScrollMagic.Scene({
    // triggerElement: ".line_animate",
    // duration: 2000,
    tweenChanges: true,
    triggerElement: ".pro_bar ",
  triggerHook: "onLeave",
  duration: 1500
  })
 
  .setPin(".pro_bar")
  .setTween(route_1)
  .addTo(controller);

}else{


var controller2 = new ScrollMagic.Controller();

function pathPrepare2($el) {
  var lineLength = $el[0].getTotalLength();
  $el.css("stroke-dasharray", lineLength);
  $el.css("stroke-dashoffset", lineLength);
}

var $route2 = $("line.cls-2");

// prepare SVG
pathPrepare2($route2);

// build tween
var route_2 = new TimelineMax()
  .add(TweenMax.to($route2, 6, {
    strokeDashoffset: 0,
    ease: Linear.easeNone
  }));   

var scene = new ScrollMagic.Scene({
    // triggerElement: ".line_animate",
    // duration: 2000,
    tweenChanges: true,
    triggerElement: ".pro_bar ",
  triggerHook: "onLeave",
  duration: 1200
  })
 
  .setPin(".pro_bar")
  .setTween(route_2)
  .addTo(controller2);
}
      
      
</script>
<?php if(empty($is_cancel)){?>
<script>
var input = document.querySelector("#phone_reg33");
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

$(".iti__country").click(function(){
   $("#phone_code33").val($(this).find(".iti__dial-code").text()) 
});
</script>



<script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "7f161efb6e66c7da4124b24f058fba0f866c127a54d51e88e3094942ed1f01d51b8fc7f05a9d601789e611732fa731a8", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.in/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>





<?php } ?>
<?php $this->endSection(); ?>
