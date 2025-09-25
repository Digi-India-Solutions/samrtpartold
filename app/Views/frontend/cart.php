<?php 
$this->extend('layout/master');
$this->section('page');
 ?>

<section class="smart-section cart-page-section">
  <div class="container">
      <div class="section-head">
      <h2>My <span>Cart</span></h2>
    </div>
    <div class="cart-container main_cart_div1">
       
               
          <?php if (!empty($carts)) {

            $cart_count = count($carts);
            $subtotal = 0;
            $save_on = 0;
            $profit = 0;
           foreach ($carts as $key => $product) {
              $subtotal +=  $product['price']*$product['p_quantity'];
              $profit = $product['old_price'] - $product['price'];
              $save_on += $profit*$product['p_quantity'];
              
            ?>
            <div class="cart-item-div">
              <div class="white-wrapper">
                <div class="cart-item-inner">
                    <div class="cart-item-image">
                         <a href="<?php echo  base_url('product/'.$product['product_seo_url']); ?>"><div class="image" style="background-image: url('<?php echo $product['image']?base_url($product['image']):base_url($config_logo);  ?>')"></div></a>
                    </div>
                    <div class="cart-item-info">
                        <div class="cart-item-name"><?php echo $product['name']; ?></div>
                        <div class="cart-item-brand-price">
                            <div class="cart-item-brand-img">
                                <div class="image" style="background-image: url('<?php echo $product['brand_image']?base_url($product['brand_image']):base_url($config_logo);  ?>')"></div>
                            </div>
                            <div class="cart-item-price-div">
                                <div class="cart-item-price">$ <?php echo $product['price']*$product['p_quantity']; ?> 

                               <?php if (!empty($product['save_percentage'])): ?>
                                <span>MRP $ <?php echo $product['old_price']; ?></span>
                                  <?php endif ?>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="cart-item-basic-info-div">
                            <div class="cart-item-basic-info">
                                <div class="cart-item-part-number">
                                    <label>Part Number</label>
                                    <div class="label-info"><?php echo $product['part_no']; ?></div>
                                </div>
                                <div class="cart-item-class">
                                    <label>Class</label>
                                    <div class="label-info"><?php echo $product['class']; ?></div>
                                </div>
                                <div class="cart-item-quantity-div">
                                    <div class="cart-item-quantity">
                                        <div class="quantity-circle minus" onclick="decreaseValue(<?php echo $product['cart_id']; ?>)">-</div>
                                        <input type="number" id="item<?php echo $product['cart_id']; ?>"  class="quantity-input" value="<?php echo $product['p_quantity']; ?>">
                                        <div class="quantity-circle plus" onclick="increaseValue(<?php echo $product['cart_id']; ?>)">+</div>
                                        <span class="update-qty" onclick="update_cart(<?php echo $product['cart_id']; ?>)"><i class="fas fa-sync-alt" title="Update item"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-item-discount-delete-div">
                                <div>
                              <?php if (!empty($product['save_percentage'])): ?>
                                <div class="cart-item-discount"><?php echo $product['save_percentage']; ?>%</div>
                              <?php endif ?>
                               </div>
                                <div class="cart-item-delete" onclick="return remove_item(<?php echo $product['cart_id'];  ?>)"><i class="fa fa-trash-alt"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
            </div>
        
        <?php }  ?>

           
        <div class="white-wrapper">
            <div class="continue-shopping-cta-div">
                <div class="cart-cta-div">
                    <a href="<?php echo base_url(); ?>" class="theme-btn outline">CONTINUE SHOPPING</a>
                </div>
                <div class="cart-cta-div checkout-cta-div">
                    <div class="cart-cta-div-area">
                        <div class="subtotal-div-label">SUBTOTAL ( <?php echo $cart_count; ?> item): <span class="price">$ <?php echo $subtotal; ?></span></div>
                        <div class="subtotal-div-label-info">Total Savings ( <?php echo $cart_count; ?> item):  <span class="price">MRP $ <?php echo $save_on; ?></span></div>
                    </div>
                    <a href="<?php echo base_url('checkout'); ?>" class="theme-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    <?php }else{ ?>
           <div class="white-wrapper">
            <div class="continue-shopping-cta-div">
               
                <div class="cart-cta-div">
                 <p>Your Cart is Empty Please add items in cart</p>
                    <a href="<?php echo base_url('#oem-brands'); ?>" class="theme-btn outline">CONTINUE SHOPPING</a>
                </div>
                
            </div>
        </div>

    <?php } ?>


    </div>
  </div>
</section>

<script>
    
function increaseValue(id) {
    var qty = $('#item'+id).val();
    var value = parseInt(document.getElementById('item'+id).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('item'+id).value = value;
    update_cart(id);
}

function decreaseValue(id) {
    var qty = $('#item'+id).val();
    var value = parseInt(document.getElementById('item'+id).value, 10);
    value = isNaN(value)  ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    if (value > 0) {
    document.getElementById('item'+id).value = value;
    update_cart(id);
    }
}    
</script>



<?php $this->endSection(); ?>