<?php
$this->extend('layout/master');
$this->section('page');
?>

<section class="page-title-section">
    <div class="title-banner">
        <img src="<?php echo base_url($meta->image); ?>" alt="title-banner" />
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

 <section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-links">
              <?php foreach($breadcrumbs as $key => $value){ echo $key==0?'':'/';  ?>
            
              <a href="<?php echo $value['href']; ?>"><?php echo $value['text']; ?> </a>  
            <?php } ?>
        </div>
    </div>
</section>

	
	<?php if (!empty($list)) {  ?>
	
	<section class="smart-section categories-section pt-5">
		<div class="container">
			 <div class="section-head">
				<h2>All <span>Categories</span></h2>
			</div> 
			<div class="help-you-choose-grids space">
				
				<?php foreach ($list as $key => $value) {?>
				

				<div class="category-grid">
					<a href="<?php echo base_url('category/'.$value->keyword); ?>">
					<div class="icon">
						<img src="<?php echo base_url($value->thumbnail); ?>" class="img-fluid">
					</div>
					<p><?php echo $value->name; ?></p>
					</a>
				</div>

			  <?php } ?>
			
			</div>
		</div>
	</section>

	<?php } ?>


<?php echo $this->endSection(); ?>