<?php 
$this->extend('layout/user_layout');
$this->section('page');
?>
<div class="col-lg-9 col-sm-12">
<div class="dashboard-block">
    <div class="dashboard-head">
        <h5>My Wishlist</h5>
    </div>
    <div class="dashboard-body">
        <div class="row">
           

                <?php if (!empty($wishlist)) { foreach ($wishlist as $key => $row) { if(!empty($row)){ ?>
                       
                        <div class="col-xl-4 col-lg-6 col-sm-6" id="wish<?php echo encrypt_url($row['id']); ?>">
                            <div class="product-block">
                                <span class="remove-wishlist" onclick="return confirm('Are you sure to delete?') && remove_wishlist('<?php echo encrypt_url($row['id']); ?>')"><i class="las la-times"></i></span>
                                <div class="product-image">
                                   <a href="<?php echo base_url('product-detail/'.$row['product_seo_url']); ?>"> <img src="<?php echo $row['image']?base_url($row['image']):base_url($config_logo); ?>" alt="<?php echo $row['name']; ?>" /></a>

                                </div>
                                <div class="product-info">
                                    <a href="<?php echo base_url('product-detail/'.$row['product_seo_url']); ?>"><h2><?php echo $row['name']; ?></h2></a>
                                    <p><?php echo substr(strip_tags($row['description']),0,100); ?></p>
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <div class="star-rating-box" data-rating="<?php echo $row['rating'];?>">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 pr-0">
                                            <a href="<?php echo base_url('product-detail/'.$row['product_seo_url']); ?>#review">Read Review</a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <div class="row">
                                            <div class="col-md-7 pr-0">
                                                <p>$ <?php echo $row['price']; ?> 

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
                                    <a href="<?php echo base_url('product-detail/'.$row['product_seo_url']); ?>" class="theme-btn full">SHOP NOW</a>
                                </div>
                            </div>
                        </div>

                    <?php } } } ?>


        </div>
    </div>
    </div>
    </div>

<?php $this->endSection();?>
