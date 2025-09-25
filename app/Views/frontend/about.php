<?php 
$this->extend('layout/master');
$this->section('page');
?>
<section class="page-title-section">
    <div class="title-banner">
        <img src="<?php echo  $meta->image?base_url($meta->image):base_url($config_logo); ?>" alt="<?php echo $meta->name; ?> Banner Image" class="d-md-block d-sm-none d-none" />
        <img src="<?php echo base_url(); ?>/assets/frontend/images/About-us-mobile-new.jpg" class="d-md-none d-sm-block d-block"  alt="About us mobile Banner Image"/>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-block text-center">
                        <h2><?php echo $meta->name; ?></h2>
                        <p><?php echo $meta->sub_heading; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
$str1 = explode(' ',$heading->heading);
$txt1 = $str1[0];
$second = $str1[1];
$txt2 =  implode(' ',array_splice($str1,2)); 
	?>

<section class="smart-section section-space pb-0">
	<div class="container">
		<div class="section-head mb-md-5 mb-2">
			<h2><?php echo $txt1; ?> <span><?php echo $second; ?></span> <?php echo $txt2; ?></h2>
		</div>
	    <div class="section-content">
	        <p><?php echo strip_tags($heading->description); ?></p>
	    </div>
	    <div class="video-box mt-5" data-toggle="modal" data-target="#video-popup">
	        <img src="<?php echo $heading->thumbnail?base_url($heading->thumbnail):base_url($config_logo); ?>" alt="poster" />
	        <span class="video-icon"><i class="play-icon"></i></span>
	    </div>
	</div>
</section>

<?php if (!empty($timeline)) {
$str1 = explode(' ',$heading->heading1);
$end1 = end($str1);
 $txt2 =  implode(' ',array_slice($str1,0,count($str1)-1)); 
	?>

<section class="smart-section section-space main-goals">
	<div class="container">
		<div class="section-head mb-5">
			<h2><?php echo $txt2; ?> <span><?php echo $end1; ?> </span></h2>
		</div>
		<div class="row">
		  
			<?php foreach ($timeline as $key => $value): ?>
							
		    <div class="col-md-4">
		       <div class="choose-grid w-full active ">
				<div class="icon">
					<img src="<?php echo $value->photo?base_url($value->photo):base_url($config_logo); ?>"  alt="<?php echo $value->title; ?>">
				</div>
				<div class="text">
					<h3><?php echo $value->title; ?></h3>
					<p><?php echo $value->description; ?></p>
				</div>
			</div> 
		    </div>
		    <?php endforeach ?>
			
		</div>
	</div>
</section>

<?php } ?>

<?php

$str1 = explode(' ',$heading->oheading);
$end1 = end($str1);
$txt2 =  implode(' ',array_slice($str1,0,count($str1)-1)); 

?>

<section class="smart-section best-marketplace-section pt-0">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-5 pl-0 pr-md-2 pr-0">
					<div class="image-area">
						<img src="<?php echo $heading->oimage?base_url($heading->oimage):base_url($config_logo); ?>" class="img-fluid radius w-100" alt="<?php echo $txt2." ".$end1 ?>">
					</div>
				</div>
				<div class="col-md-7">
					<div class="content-area">
						<div class="section-head">
							<h2><?php echo $txt2; ?> <span><?php echo $end1; ?></span></h2>	
						</div>
						<div class="section-content">
						    <?php echo $heading->odescription; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<?php

$str1 = explode(' ',$heading->wheading);
$end1 = end($str1);
$txt2 =  implode(' ',array_slice($str1,0,count($str1)-1)); 

?>




<section class="smart-section best-marketplace-section reverse pt-0">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-7">
					<div class="content-area">
						<div class="section-head">
							<h2><?php echo $txt2; ?> <span><?php echo $end1; ?></span></h2>	
						</div>
						<div class="section-content">
						    <?php echo $heading->wdescription; ?>
						</div>
					</div>
				</div>
				
				<div class="col-md-5 pr-0 pl-md-2 pl-0">
					<div class="image-area">
						<img src="<?php echo $heading->wimage?base_url($heading->wimage):base_url($config_logo); ?>" class="img-fluid radius w-100" alt="<?=$txt2." ".$end1?>"> 
					</div>
				</div>
			</div>
		</div>
	</section>
	

<?php if (!empty($team)) {
$str = explode(' ',$heading->mheading);
$end = end($str);
$txt1 =  array_pop($str);
?>
	
<section class="smart-section section-space">
	<div class="container">
		<div class="section-head mb-5">
			<h2><?php echo $txt1; ?> <span><?php echo $end; ?></span></h2>
		</div>
		<div class="row">
		    <div class="col-md-12">
		       <div class="swiper navigatin-space leadership-slider">
		           <div class="swiper-wrapper">
		              
		              <?php foreach ($team as $key => $value): ?>
		              	
		              

		               <div class="swiper-slide">
		                   <div class="team-block" data-toggle="modal" data-target="#team-detail">
		                       <div class="img-box">
		                           <img src="<?php echo $value->photo?base_url($value->photo):base_url($config_logo); ?>" alt="team-image" />
		                       </div>
		                       <div class="team-info">
		                           <h3><?php echo $value->name; ?></h3>
		                           <h5><?php echo $value->designation; ?></h5>
		                       </div>
		                   </div>
		               </div>
		          	<?php endforeach ?>
		               
		           </div>
		           <div class="swiper-arrows next-arrow-popular">
        				<img src="assets/frontend/images/slider-arrow-right.png"  alt="slider right arrow">
        			</div>
        			<div class="swiper-arrows prev-arrow-popular">
        				<img src="assets/frontend/images/slider-arrow-left.png"    alt="slider left arrow">
        			</div>
		       </div> 
		    </div>
		</div>
	</div>
</section>

<?php } ?>


<?php if (!empty($reviews)) {

$str = explode(' ',$heading->cheading);
$txt1 = $str[1];
$first = $str[0];

?>

<section class="smart-section section-space light-blue-bg">
	<div class="container">
		<div class="section-head mb-5">
			<h2><?php echo $first; ?> <span><?php echo $txt1; ?></span></h2>
		</div>
	</div>
    <div class="swiper review-slider">
        <div class="swiper-wrapper">
            
            <?php foreach ($reviews as $key => $value): ?>
            	          
            <div class="swiper-slide">
                <div class="reviews-block">
                    <div class="img-box">
                        <img src="<?php echo $value->photo?base_url($value->photo):base_url($config_logo); ?>" alt="<?php echo $value->name; ?> logo image" />
                    </div>
                    <div class="review-content">
                        <p><?php echo $value->description; ?></p>
                        <h4><?php echo $value->name; ?></h4>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<?php } ?>


	<section class="smart-section contact-us-stripe-section">
		<div class="container">
			<div class="contact-stripe-flex" style="background-image: url('<?php echo $home_heading->sup_image?base_url($home_heading->sup_image):base_url($config_logo); ?>');">
				<div class="section-head">
					<h5 class="label"><?php echo $home_heading->sup_heading; ?></h5>
					<h2><?php echo $home_heading->sup_sub_heading; ?></h2>
					<p><?php echo $home_heading->sup_des; ?></p>
				</div>
				<div class="button">
					<a href="<?php echo base_url($home_heading->link); ?>" class="theme-btn">Contact Us</a>
				</div>
			</div>
		</div>
	</section>



<div class="modal fade video-popup" id="video-popup" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $heading->vtitle; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <video loop controls id="value-video">
          <source src="<?php echo base_url($heading->video); ?>" type="video/mp4">
        </video>
      </div>
    </div>
  </div>
</div>

<div class="modal fade team-detail" id="team-detail" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ayumu Nakashima</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="img-box">
                   <img src="assets/frontend/images/team-image.jpg" alt="team-image" />
                   <h5>Engineering</h5>
               </div>
            </div>
            <div class="col-md-8">
                <div class="team-info">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
               </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$('#video-popup').on('hidden.bs.modal', function () {
  var videoPlayer = document.getElementById('value-video');
  videoPlayer.pause()
})
</script>




<?php $this->endSection(); ?>