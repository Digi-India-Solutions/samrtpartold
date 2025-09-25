<?php 
$this->extend('layout/master');
$this->section('page');
?>
<section class="page-title-section">
    <div class="title-banner">
        <img src="<?php echo base_url(); ?>/assets/frontend/images/blog-banner.jpg" alt="title-banner" />
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-block text-center">
                        <h2>Blogs</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="row">
                       
                        <?php if (!empty($blogs)) { foreach ($blogs as $key => $value) {?>
                     
                        <div class="col-md-6">
                            <div class="blog-block">
                                <div class="img-box">
                                    <a href="<?php echo base_url('blog/'.$value->link); ?>">
                                        <img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" alt="blog-image" />
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <div class="date"><?php echo date('M d, Y',strtotime($value->create_date)); ?></div>
                                    <h2><a href="<?php echo base_url('blog/'.$value->link); ?>"><?php echo $value->title; ?></a></h2>
                                  <p><?php echo substr(strip_tags($value->descri),1,120).'...'; ?></p>
                                    <a href="<?php echo base_url('blog/'.$value->link); ?>" class="theme-btn sml">Read More</a>
                                </div>
                            </div>
                        </div>
                   
                       <?php } } ?>
                    
                        <div class="col-md-12">
                            <div class="item-pagination">
                                
                                <ul class="nav">
                                     <?php if ($pager):?>    
                        			  <?php echo $pager->links(); ?>
                        			   <?php endif; ?>
                        			   
                                    <!--<li><a href="#" class="page-move-btn"><i class="fa fa-angle-left"></i> <b>...</b></a></li>-->
                                    <!--<li><a href="#" class="active">1</a></li>-->
                                    <!--<li><a href="#">2</a></li>-->
                                    <!--<li><a href="#">3</a></li>-->
                                    <!--<li><a href="#">4</a></li>-->
                                    <!--<li><a href="#">5</a></li>-->
                                    <!--<li><a href="#" class="page-move-btn"><b>...</b> <i class="fa fa-angle-right"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 mt-lg-0 mt-sm-4 mt-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-block">
                            <h4>Categories</h4>
                            <ul>
                                <?php if (!empty($blog_category)) { foreach ($blog_category as $key => $value) {?>
                                <li><a href="<?php echo current_url().'?category='.$value->link;?>"><?php echo $value->name; ?></a></li>
                               <?php } } ?>
                              
                            </ul>
                        </div>
                        <div class="sidebar-block">
                            <h4>Latest Post</h4>
                            <?php if (!empty($recent)) { foreach ($recent as $key => $value) {?>

                            <div class="blog-grid blog-grid-small">
                				<a href="<?php echo base_url('blog/'.$value->link); ?>" class="cover-link"></a>
                				<div class="image" style="background-image: url('<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>');"></div>
                				<div class="content">
                					<h4><?php echo $value->title; ?></h4>
                					<p><?php echo date('M d, Y',strtotime($value->create_date)); ?></p>
                				</div>
                			</div>

                        <?php } } ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->endSection(); ?>