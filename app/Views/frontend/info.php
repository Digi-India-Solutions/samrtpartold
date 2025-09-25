<?php 
$this->extend('layout/master');
$this->section('page');
 ?>

<?php if (!empty($faq)) {?>

<section class="page-title-section">
    <div class="title-banner">
        <img src="<?php echo  $detail->top_image?base_url($detail->top_image):base_url($config_logo); ?>" alt="<?php echo $detail->m_title; ?>" />
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-block text-center">
                        <h2><?php echo $detail->title; ?></h2>
                        <p><?php echo @$detail->sub_heading; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if (empty($faq)) {?>

<section class="section-space">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   
                 <div class="section-head mb-4">
                   <h2>  <?php echo $detail->title; ?></h2>
                 </div>

                </div>
                <div class="col-md-12">
                    <div class="common-content">
                       <?php echo $detail->description; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>


<?php if (!empty($faq)) {?>

<section class="section-space smart-section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head mb-md-5 mb-2">
                        <h2>Frequently <span>Asked</span> Questions</h2>
                    </div>

                    <div class="accordion faq-section" id="accordionExample">
                     
                    <?php foreach ($faq as $key => $value) {?>
                    
                      <div class="card">
                        <div class="card-header" id="headingOne<?php echo $value->id; ?>">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $value->id; ?>" aria-expanded="<?php echo $key==0?'true':''; ?>" aria-controls="collapseOne<?php echo $value->id; ?>">
                              <?php echo $value->question; ?>
                            </button>
                          </h2>
                        </div>
                    
                        <div id="collapseOne<?php echo $value->id; ?>" class="collapse <?php echo $key==0?'show':''; ?>" aria-labelledby="headingOne<?php echo $value->id; ?>" data-parent="#accordionExample">
                          <div class="card-body">
                           <?php echo $value->answer; ?>
                          </div>
                        </div>
                      </div>
                  <?php } ?>
                     
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php echo $this->endSection(); ?>