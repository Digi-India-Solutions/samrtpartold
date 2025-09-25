<?php 
$this->extend('layout/master');
$this->section('page');
?>
<!--<section class="page-title-section">
    <div class="title-banner">
        <img src="<?php echo base_url(); ?>/assets/frontend/images/about-banner.jpg" />
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-block text-center">
                        <h2><?php echo $detail->title; ?></h2>
                        <div class="breadcrumb">
                            <ul class="nav">
                                <li><a href="<?php echo base_url('blogs'); ?>">Blog</a></li>
                                <li><?php echo $detail->title; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->

<section class="section-space  blog-detail pt-5">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-block dark">
                        <div class="section-head">
                          <h2><?php echo $detail->title; ?></h2>
                        </div>
                        <div class="breadcrumb mb-3">
                            <ul class="nav justify-content-start">
                                <li><a href="<?php echo base_url('blogs'); ?>">Blog</a></li>
                                <li><?php echo $detail->title; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-blog-image">
                        <img src="<?php echo $detail->image?base_url($detail->image):base_url($config_logo); ?>" class="radius" alt="blog-image" />
                    </div>
                    <div class="blog-info">
                        <ul>
                            <!--<li><?php echo $detail->title; ?></li>-->
                            <li><?php echo date('M d, Y',strtotime($detail->create_date)); ?></li>
                        </ul>
                    </div>
                    <div class="section-content blog-detail">
                        <?php echo $detail->descri; ?>
                      
                        <?php if (!empty($detail->note)) {?>
                        <div class="blockquote">
                            <img src="assets/frontend/images/quote-icon.png" alt="icon" />
                            <p><?php echo $detail->note; ?></p>
                        </div>
                        <?php } ?>
                        

                        <?php echo $detail->description2; ?>	
<!-- 
                        <b>Lacus modem elementum</b>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <ul>
                            <li>We make auto repair more convenient for you</li>
                            <li>We are a friendly and professional group of people</li>
                            <li>We are a friendly and professional group of people</li>
                            <li>We get the job done right — the first time</li>
                        </ul> -->
                        <div class="social">
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo current_url(); ?>" target="_blank" class="fb"><i class="fab fa-facebook"></i></a>
                    	  <a href="http://twitter.com/share?url=<?php echo current_url(); ?>&text=My Munchkin &hashtags=My_Munchkin" target="_blank" class="tw"><i class="fab fa-twitter"></i></a>
                         <a target="_blank " href="https://api.whatsapp.com/send?phone=&text=<?php echo current_url(); ?>" class="wt"><i class="fab fa-whatsapp"></i></a>

                            <!-- <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a> -->
                        </div>
                    </div>
                    <div class="row mt-5">
                    
                        <div class="col-md-6 ">
                            <a href="<?php echo base_url('blog/'.$pre->link); ?>" class="post-navigation prev">
                                <i class="fa fa-angle-left"></i>
                                <div>
                                <h5>PREVIOUS POST</h5>
                                <h3><?php echo $pre->title; ?></h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="<?php echo base_url('blog/'.$next->link); ?>" class="post-navigation next">
                                <i class="fa fa-angle-right"></i>
                                <div>
                                <h5>NEXT POST</h5>
                                <h3><?php echo $next->title; ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php if (!empty($recent)) {?>
<section class="smart-section section-space pt-0">
	<div class="container">
		<div class="section-head mb-5">
			<h2>Related <span>Post</span></h2>
		</div>
		<div class="row setup-three-blog">
		    
			<?php foreach ($recent as $key => $value) {?>
			
		    <div class="col-lg-4 col-sm-6">
		        <div class="blog-block">
                    <div class="img-box">
                        <a href="<?php echo base_url('blog/'.$value->link); ?>">
                            <img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" alt="<?php echo $value->title; ?>" />
                        </a>
                    </div>
                    <div class="blog-info">
                        <div class="date"><?php echo date('M d, Y',strtotime($value->create_date)); ?></div>
                        <h2><a href="<?php echo base_url('blog/'.$value->link); ?>"><?php echo $value->title; ?></h2>
                        <p><?php echo substr($value->descri,0,100).'....'; ?></p>
                        <a href="<?php echo base_url('blog/'.$value->link); ?>" class="theme-btn sml">Read More</a>
                    </div>
                </div>
		    </div>

		   <?php } ?>
		
		</div>
		
	</div>
</section>

<?php } ?>

<?php $this->endSection(); ?>