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
<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-links">
            <?php foreach($breadcrumbs as $key => $value){ echo $key==0?'':'/';  ?>
              <a href="<?php echo $value['href']; ?>"><?php echo $value['text']; ?> </a>  
            <?php } ?>
            
    </div>
</section>

<section class="smart-section product-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="product-images-div">
                    <div class="hero-image">
                        <div class="image" style="background-image: url('<?php  echo $product['image']?base_url($product['image']):base_url($config_logo); ?>')"></div>
                    </div>
                    <div class="product-images-small">
                        <div class="product-arrow prev-arrow-product"><i class="fa fa-chevron-left"></i></div>
                        <div class="swiper product-images-slider">
                            <div class="swiper-wrapper">
                               


                                <div class="swiper-slide">
                                    <div class="product-related-img">
                                        <div class="image" style="background-image: url('<?php  echo $product['image']?base_url($product['image']):base_url($config_logo); ?>')"></div>
                                    </div>
                                </div>

                                <?php if (!empty($product_images)) {foreach ($product_images as $key => $value) {?>
                             
                                <div class="swiper-slide">
                                    <div class="product-related-img">
                                        <div class="image" style="background-image: url('<?php  echo $value->image?base_url($value->image):base_url($config_logo); ?>')"></div>
                                    </div>
                                </div>

                              <?php } } ?>
                               
                              
                            </div>
                        </div>
                        <div class="product-arrow next-arrow-product"><i class="fa fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 mt-lg-0 mt-sm-4 mt-4">
                <div class="single-product-details">
                    <div class="free-delivery">
                        <p><img src="assets/frontend/images/delivery-truck.png"> Free Delivery (Dispatch within 1 Day)</p>
                    </div>
                    <div class="single-product-name"><h1><?php echo $product['name']; ?></h1></div>
                   
                    <?php if (!empty($product['brand_image'])): ?>
                    <div class="single-product-company"><img src="<?php echo $product['brand_image']?base_url($product['brand_image']):base_url($config_logo); ?>">
                    </div>
                    <?php endif ?>
                   
                    <div class="single-product-price">
                                <?php if(!empty($product['price'])){?>
                                <div class="new-price">$ <?php echo $product['price']; ?></div>
                               <?php } ?>
                               
                                <?php if (!empty($product['old_price'])): ?>
                                <div class="old-price">
                                    <p><strike>MRP $ <?php echo $product['old_price']; ?></strike></p>
                                </div>
                                 <div class="discount-tag cart-item-discount"><?php echo $product['save_percentage']; ?> %</div>
                               <?php endif ?>
                       
                       
                    </div>
                    <div class="single-product-specs">
                        <div class="specs-div">
                            <div class="label">Part Number</div>
                            <div class="label-info"><?php echo $product['part_no']; ?></div>
                        </div>

                         <div class="specs-div">
                            <div class="label">Brand</div>
                            <div class="label-info"><?php echo $product['brand_name']; ?></div>
                        </div>


                        <?php if (!empty($product['origin'])): ?>
                          <div class="specs-div">
                            <div class="label">Origin</div>
                            <div class="label-info"><?php echo $product['origin']; ?></div>
                        </div>
                        <?php endif ?>
                         <?php if (!empty($product['class'])): ?>
                        <div class="specs-div">
                            <div class="label">Class</div>
                            <div class="label-info"><?php echo $product['class']; ?></div>
                        </div>
                         <?php endif ?>
                    </div>
                    <div class="single-product-description">
                        <h3>Description</h3>
                        <p><?php echo $product['description']; ?></p>
                    </div>
                 <!--    <div class="single-product-deliver">
                        <p><img src="assets/frontend/images/location-pin.png">Deliver to</p>
                        <div class="deliver-to-input">
                            <input type="number" class="form-control" placeholder="Enter you Pincode">
                            <button class="delivery-to-apply">Apply</button>
                        </div>
                    </div> -->
                    <!--d-md-inline-block-->
                <form id="add_to_cart" class="">
                <input type="hidden" name="p_id" value="<?php echo encrypt_url($product['id']); ?>">
                <input type="hidden" name="buy" value="">
                <?php if(!empty($product['price'])){?>
                    <div class="single-product-cta">
                        <button class="theme-btn" id="add_cart_button" type="submit">ADD TO CART</button>
                        <button class="theme-btn outline" id="buy_now" type="submit">BUY NOW</button>
                    </div>
                <?php } ?>

                </form> 
                
                <div class="share-product-block">
                    <h5>Share Product Via</h5>
                    <div class="social">
                       <a href="http://www.facebook.com/sharer.php?u=<?php echo current_url(); ?>" target="_blank" class="fb"><i class="fab fa-facebook"></i></a>
                        <a href="http://twitter.com/share?url=<?php echo current_url(); ?>&text=My Munchkin &hashtags=My_Munchkin" target="_blank" class="tw"><i class="fab fa-twitter"></i></a>
                         <a target="_blank " href="https://api.whatsapp.com/send?phone=&text=<?php echo current_url(); ?>" class="wt"><i class="fab fa-whatsapp"></i></a>
                       
                    </div>
                     <?php if(empty($product['price'])){?>
                    <a href="<?php echo base_url('sign-up'); ?>"><button class="btn theme-btn  mt-4">Unlock Price</button></a>
                  <?php } ?>
                </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($product_attribute)) { ?>
<section class="smart-section features-specs-section">
    <div class="container">
        <div class="section-head">
            <h2>Features and <span>Specifications</span></h2>
        </div>
        <div class="features-div">
           
           <?php  foreach ($product_attribute as $key => $value) { ?>
       
            <div class="featured-specs">
                <div class="label"><?php echo $value->atrribute_name; ?></div>
                <div class="label-info"><?php echo $value->text; ?></div>
            </div>
        <?php }  ?>
           
           <?php if (!empty($product['manufacture_name'])): ?>
                <div class="featured-specs">
                <div class="label">Manufacturer</div>
                <div class="label-info"><?php echo $product['manufacture_name']; ?></div>
            </div>
           <?php endif ?>
           

        </div>
    </div>
</section>
<?php }  ?>


<section class="smart-section features-specs-section mt-5 pb-5" id="review">
    <div class="container" >
        <div class="section-head mb-4"> 
            <h2>Product <span>Reviews</span> <a href="javascript:void(0)" data-toggle="modal" data-target="#product_review" class="theme-btn ml-4">Write Your Review</a></h2>
        </div>
        <div class="row">
         
            <div class="col-md-12" id="my__List">
              
             <?php  if (!empty($product_review)) {  foreach ($product_review as $key => $value) {?>
              
                <div class="product-review-section">
                    <div class="review-block">
            <h4><?php echo $value->title; ?></h4>
            <div class="star-rating-box" data-rating="<?php echo $value->rating; ?>">
                       
                       <?php for ($i=0; $i < $value->rating ; $i++) { 
                         echo '<span><i class="fa fa-star"></i></span>';
                       } ?>
                       
                  
                    </div>
            <h5>By <?php echo $value->fname.' '.$value->lname; ?></h5>
            <div class="date">On: <?php echo date('M d, Y',strtotime($value->create_date)); ?></div>
            <p><?php echo $value->review; ?></p>
          </div>
                </div>
               <?php } } ?>
               
            </div>
                        
                     <?php if(count($review_total) > 10){?>    
                       <div class="col-md-12 mt-4">
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <a href="javascript:void();" class="theme-btn full" id="btn_load">LODE MORE</a>
                                </div>
                            </div>
                        </div>
                      <?php } ?>
          <!--<div class="col-md-12 mt-4">-->
          <!--  <div class="item-pagination">-->
          <!--      <ul class="nav">-->
          <!--          <li><a href="#" class="page-move-btn"><i class="fa fa-angle-left"></i> <b>...</b></a></li>-->
          <!--          <li><a href="#" class="active">1</a></li>-->
          <!--          <li><a href="#">2</a></li>-->
          <!--          <li><a href="#">3</a></li>-->
          <!--          <li><a href="#">4</a></li>-->
          <!--          <li><a href="#">5</a></li>-->
          <!--          <li><a href="#" class="page-move-btn"><b>...</b> <i class="fa fa-angle-right"></i></a></li>-->
          <!--      </ul>-->
          <!--  </div>-->
               
            
            
           </div> 

           

        </div>
    </div>
</section>

<form id="review_ajax">
<input type="hidden" name="p_id" value="<?php echo encrypt_url($product['id']);?>">
<input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>">
<button type="submit" id="btn_review" class="d-none">Submit</button>
</form>








<?php if (!empty($related_product)) {?>

  <section class="smart-section popular-parts-section pt-4">
    <div class="container">
      <div class="curve-frame-wrapper"></div>
      <div class="section-head">
        <h2>Related <span>Products</span></h2>
      </div>
      <div class="help-you-choose-grids">
        <div class="swiper popular-parts-slider">
          <div class="swiper-wrapper">
            <?php foreach ($related_product as $key => $product) {?>
            
            <div class="swiper-slide">
              <!--<a href="<?php echo base_url('product/'.$product['product_seo_url']); ?>">-->
                  
              <a href=" <?php echo $brand_category?base_url('brand/'.$brand_category->seo_url.'/'.$brand->seo_url.'/'.$product['product_seo_url']):base_url('product/'.$product['product_seo_url']); ?>">    
                  
              <div class="popular-grid">
                <div class="image" style="background-image: url('<?php echo $product['image']?base_url($product['image']):base_url($config_logo); ?>')">
                  <div class="cart-icon">

                    <img src="<?php echo CATALOG; ?>images/cart-icon-white.png" class="popular-cart-icon">
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
          <img src="<?php echo CATALOG; ?>images/slider-arrow-right.png">
        </div>
        <div class="swiper-arrows prev-arrow-popular">
          <img src="<?php echo CATALOG; ?>images/slider-arrow-left.png">
        </div>
      </div>
      <!--<div class="pt-md-5 my-md-2 mt-2 text-center">-->
      <!--  <a href="<?php echo base_url('most-popular-part'); ?>" class="theme-btn">View More</a>-->
      <!--</div>-->
    </div>
  </section>

<?php } ?>













<!--<section class="smart-section key-features-section">
    <div class="container">
        <div class="key-features-div">
            <div class="key-featured-specs">
                <div class="key-featured-img"><img src="assets/frontend/images/ship.png"></div>
                <div class="key-featured-specs-info">
                    <div class="label">Extra Fast Delivery</div>
                    <div class="label-info">Your order will be delivered 3-5 business days after all of your items are available</div>
                </div>
            </div>
            <div class="key-featured-specs">
                <div class="key-featured-img"><img src="assets/frontend/images/price-tag.png"></div>
                <div class="key-featured-specs-info">
                    <div class="label">Best Price</div>
                    <div class="label-info">We'll match the product prices of key online and local competitors for immediately</div>
                </div>
            </div>
            <div class="key-featured-specs">
                <div class="key-featured-img"><img src="assets/frontend/images/guarantee.png"></div>
                <div class="key-featured-specs-info">
                    <div class="label">Guarantee</div>
                    <div class="label-info">If the item you want is available, we can process a return and place a new order</div>
                </div>
            </div>
        </div>
    </div>
</section>-->



<div class="modal fade" id="product_review" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="review_form">
            <input type="hidden" name="p_id" value="<?php echo encrypt_url($product['id']); ?>">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control sml required" name="fname"/>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control sml"  name="lname"/>
            </div>
        
            <div class="form-group">
                <label>Rating</label>
                <select name="rating" class="form-select sml required">
                    <?php foreach ($rating_list as $key => $value): ?>
                    <option value="<?php echo $value->id; ?>"> <?php echo $value->id; ?> (<?php echo $value->name; ?>)</option> 
                    <?php endforeach ?>
                                      
                </select>
            </div>
            
             <div class="form-group">
                <label>Review Title</label>
                <input type="text" class="form-control sml required" name="title"/>
            </div>
            
            <div class="form-group">
                <label>Review</label>
                <textarea class="form-control sml" name="review"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="theme-btn">Submit Review</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    $('body').addClass('product-detail-page');
    
    var swiper = new Swiper(".product-images-slider", {
        // slidesPerView: 4,
        // spaceBetween: 10,
        speed: 800,
        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.next-arrow-product',
            prevEl: '.prev-arrow-product',
        },
        breakpoints: {
            320: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1025: {
                slidesPerView: 4,
                spaceBetween: 30,
            }
        }
    });
    
    
$('#btn_load').on('click',function(){
  $('#btn_review').click();
});
    
    $('form#review_ajax').submit(function(e){
     var type = $('#type').val();
      e.preventDefault();
      var form = $(this);
      $.ajax({
      url:"<?php echo base_url('get_product_review'); ?>",
      type:"POST",
      data:form.serialize(),
      beforeSend:function(){
            $('#btn_load').html('Loding...');   
      },
      
      success:function(data){
        var obj = JSON.parse(data);
        if(obj.status==1){
            $('#my__List').append(obj.ss); 
            $('#offset').val(obj.offset);
        
            $('#btn_load').html(obj.msg);  

             $('#btn_load').blur();

             $(".star-rating-box").each(function(){
               var rating = $(this).attr("data-rating");
               var rating_split = rating.split(".");
               var rating_one = rating_split[0];
               var rating_two = rating_split[1];
               $(this).find("span:nth-child("+rating_one+")").addClass("fill");
               $(this).find("span:nth-child("+rating_one+")").prevAll().addClass("fill");
               if(rating_two <= 5 && rating_two > 0){
                   $(this).find("span:nth-child("+rating_one+")").next().addClass("hfill");
               }else if(rating_two > 5){
                   $(this).find("span:nth-child("+rating_one+")").next().addClass("fill");
               }
            });
             
        }else{
            
            $('#btn_load').html(obj.msg); 
              if(type=='load'){
                $('#btn_load').blur();  
              }
          }
      },

    });
});
    
</script>
<?php $this->endSection(); ?>

