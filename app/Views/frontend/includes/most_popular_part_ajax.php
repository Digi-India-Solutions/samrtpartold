 <?php if (!empty($product)) { foreach ($product as $key => $row) {?>
                       
    <div class="col-xl-4 col-lg-6 col-sm-6">
        <div class="product-block">
            <div class="product-image">
               <a href="<?php echo base_url('product/'.$row['product_seo_url']); ?>"> <img src="<?php echo @$row['image']?base_url($row['image']):base_url($config_logo); ?>" alt="<?php echo $row['name']; ?>" /></a>
            
                <span onclick="add_to_wishlist('<?php echo encrypt_url($row['id']); ?>')" class="product-wishlist <?php echo @in_array($row['id'], $wishlist)?'added':'';?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><a href="javascript:void();"><i class="fa fa-heart"></i></a></span>
                 
            </div>
            <div class="product-info">
                <a href="<?php echo base_url('product/'.$row['product_seo_url']); ?>"><h2><?php echo $row['name']; ?></h2></a>
                <p><?php echo substr(strip_tags($row['description']),0,100); ?></p>
                <span class="product_number">Part Number : <b><?php echo $row['part_no']; ?></b></span>
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="star-rating-box" data-rating="<?php echo @$row['rating']?$row['rating']:0; ?>">
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                    <div class="col-md-5 pr-0">
                        <a href="<?php echo base_url('product/'.$row['product_seo_url']); ?>#review">Read Review</a>
                    </div>
                </div>
                <div class="product-price">
                    <div class="row">
                        <div class="col-md-7 pr-0">
                            <?php if(!empty($row['price'])){?>
                            <p>$ <?php echo $row['price']; ?> 
                            <?php } ?>

                            <?php if (!empty($row['save_percentage'])): ?>
                                 <span class="discount"><?php echo $row['save_percentage']; ?> % Off</span>
                            <?php endif ?>
                           
                        </p>
                        </div>
                        <?php if (!empty($row['old_price'])): ?>
                             <div class="col-md-5 text-right">
                            <p><strike>$ <?php echo $row['old_price']; ?></strike></p>
                        </div>
                        <?php endif ?>
                       
                    </div>
                </div>
                <a href="<?php echo base_url('product/'.$row['product_seo_url']); ?>" class="theme-btn full">SHOP NOW</a>
            </div>
        </div>
    </div>

<?php } } ?>
