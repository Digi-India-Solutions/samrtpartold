<?php
use App\Models\CommonModel;
use App\Models\CartModel;
$this->AdminModel = new CommonModel();
$cartModel = new CartModel();
 if (!empty(session()->get('userDetail'))){
	 $user = $this->AdminModel->fs('user',array('id'=>session()->get('user_id')));
  }	
  
$cart_count = $cartModel->get_cart_count();

$category = $this->AdminModel->all_fetch('category',array('status'=>1));
$tranding_keyword = $this->AdminModel->all_fetch('trending_keyword',array('status'=>1));

$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
foreach ($setting as $key => $value) {
$wconfig[$value->key] = $value->value;
}	

?>





<div class="top-bar">
	<div class="container">
		<p><?php echo $wconfig['cod_message']; ?></p>
	</div>
</div>
<header>
	<div class="container">
		<div class="main-header">
			<div class="logo">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url($wconfig['config_logo']); ?>" class="img-fluid"></a>
			</div>
			<div class="menu">
			 <?php 
               $menu_category = $this->AdminModel->all_fetch('front_menu',array('status'=>1,'header'=>1),'sort_order','asc');
		     	foreach ($menu_category as $key => $value) {?>
				<li><a href="<?php echo base_url($value->link); ?>"><?php echo $value->name; ?></a></li>
				<?php }  ?>
		
			</div>
			<div class="social-menu">
				<li>
					<a href="javascript:void(0);" class="open-search-form">
						<img src="<?php echo CATALOG; ?>images/search-icon.png" class="img-fluid"><br>
						<span>Explore</span>
					</a>
				</li>
				
				<?php if(!empty(session()->has('userDetail'))){?>
					<li>
					<a href="<?php echo base_url('dashboard'); ?>">
						<img src="<?php echo CATALOG; ?>images/user-icon.png" class="img-fluid"><br>
						<span>My Account</span>
					</a>
				</li>
				
				<?php } else {?>
					<li>
					<a href="<?php echo base_url('login'); ?>">
						<img src="<?php echo CATALOG; ?>images/user-icon.png" class="img-fluid"><br>
						<span>Login</span>
					</a>
				</li>
				
				<?php } ?>
				
			
				
				
				<li>
				    <?php if(!empty(session()->get('user_id'))){?>
				    	<a href="<?php echo base_url('cart');?>">
						<img src="<?php echo CATALOG; ?>images/cart-icon.png" class="img-fluid"><br>
						<span>Cart <span class="badge" id="cart_count"><?php echo $cart_count?$cart_count:''; ?></span></span>
					   </a>
				    
				    <?php } else{?>
				    	<a href="<?php echo base_url('login');?>">
						<img src="<?php echo CATALOG; ?>images/cart-icon.png" class="img-fluid"><br>
						<span>Cart <span class="badge" id="cart_count"><?php echo $cart_count?$cart_count:''; ?></span></span>
					</a>
				    <?php } ?>
				    
				     <div id="google_translate_element"></div>   
				
				</li>
				<li>
				    <div class="hamburg-icon">
						<span class="line"></span>
						<span class="line"></span>
						<span class="line"></span>
					</div>
				</li>
			</div>
		</div>
	</div>
</header>

<div class="search-main-section">
    <span class="close-search"><img src="assets/frontend/images/close-arrow.png" alt="close-icon" /></span>
    <div class="search-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  
                        <input type="search" name="search" id="search_top" onkeyup="search();" placeholder="Start Search" required />
                        
                         <div class="searchdiv" id="search_result" ></div>
                    
                    <div class="trending-search-section">
                       <?php if (!empty($tranding_keyword)) {?>
                       
                        <div class="search-block">
                            <h5>Trending Search</h5>
                            <ul>
                            	<?php foreach ($tranding_keyword as $key => $value): ?>
                            		<li><a href="<?php echo $value->url; ?>"><?php echo $value->name; ?></a></li>
                            	<?php endforeach ?>
                                                               
                            </ul>
                        </div>
                    <?php } ?>
                        <div class="search-block image-type">
                            <h5>Top Categories</h5>
                            <ul>
                            	<?php foreach ($category as $key => $value) {?>
                            	
                                <li><a href="<?php echo base_url('category/'.$value->keyword); ?>"><img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($wconfig['config_logo']); ?>" /> <?php echo $value->name; ?></a></li>

                            <?php } ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$('.hamburg-icon').click(function(){
    if($(this).hasClass('active')){
        $(this).removeClass('active')
        $('.main-header .menu').slideUp()
    }
    else {
        $(this).addClass('active')
        $('.main-header .menu').slideDown()
    }
});
    
</script>




<!-- Modal -->
<div class="modal fade" id="regModel" data-backdrop="static"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">You Almost Done !</h5>
      </div>
     <form id="company_form">
      <div class="modal-body">
         <div class="form-group">
                            <input type="radio"  name="reg_type"   value="bussiness" /> &nbsp; Business Card
                            <input type="radio"  name="reg_type"   value="company" /> &nbsp; Company Name
                        </div>

                          <div class="form-group bussiness">
                            <input type="file" name="bussiness_card"   class="form-control" id="bussiness_card1" />
                        </div>

                        <div class="form-group company">
                            <input type="text" name="company_name" placeholder="Company Name"  class="form-control required" id="company_name1"  />
                        </div>
                        
                        <div class="form-group company">
                            <input type="text" name="company_address" placeholder="Company Address"  class="form-control required" id="company_address1" />
                        </div>
                         <div class="form-group phone-tel">
                            <input type="text" value="" name="phone_code" autocomplete="off" class="phone-tel-code" />
                            <input type="tel" placeholder="Whatsapp number" name="mobile" id="phone_reg2"  class="form-control required isnumber" />
                        </div>
                        <input type="hidden"  name="auth_id"  id="auth_id" value="">
                        <input type="hidden"  name="phone_code" id="phone_code2" value="">

                         <div class="form-group">
                            <input type="text" name="website_link" placeholder="Website Link optional"  class="form-control" />
                        </div>

      </div>
      <div class="modal-footer">
            <button type="submit" id="reg_btn2" class="btn btn-primary">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>

