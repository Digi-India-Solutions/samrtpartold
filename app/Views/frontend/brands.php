<?php 
$this->extend('layout/master');
$this->section('page');
?>
<section class="page-title-section">
    <div class="title-banner">
        <img src="<?php echo $meta->image?base_url($meta->image):base_url($config_logo); ?>" alt="<?php echo $meta->name; ?>"  title="Banner Image" alt="<?php echo ($meta->name)." ".($meta->sub_heading); ?> Image"/>
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
<?php if (!empty($brands)) {?>
<section class="smart-section brands-section" style="">
		<div class="container">
			<div class="help-you-choose-grids mt-0">
				<?php foreach ($brands as $key => $value) {?>
				
				<div class="brand-grid">
					<div class="icon">
						<img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" class="img-fluid" title="<?php echo $value->name; ?>" alt="<?php echo $value->name; ?> Image">
					</div>
					<p><?php echo $value->name; ?></p>
				</div>
				
				<?php } ?>
			
			</div>
		</div>
</section>

<?php } ?>

<?php $this->endSection(); ?>