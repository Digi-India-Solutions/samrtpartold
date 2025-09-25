<?php 
$this->extend('layout/master');
$this->section('page');
 ?>
 
 
 <style type="text/css">
     input.required.nofillout{
  border-color: #f70101 !important;
}

select.required.nofillout{
 border-color: #f70101 !important;
}
</style>
<section class="page-title-section">
    <div class="title-banner">
        <img src="<?php echo $meta->image?base_url($meta->image):base_url($config_logo); ?>" alt="title-banner" />
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-block text-center">
                        <h2><?php echo $meta->name; ?></h2>
                        <div class="breadcrumb">
                            <ul class="nav">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><?php echo $meta->name; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php if (!empty($lifeat)) {

$arr = explode(' ', $heading->heading);
$first = $arr[0];
$text2 = $arr[1];
$text3 = $arr[2];
$text4 = $arr[3];

  ?>

<section class="section-space smart-section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head mb-5">
                  <h2><?php echo $first; ?> <span><?php echo $text2; ?> <?php echo $text3; ?></span> <?php echo $text4; ?></h2>
                </div>
              </div>
             <?php foreach ($lifeat as $key => $value) {?>
         
              <div class="col-md-6">
                  <div class="point-info-block">
                      <span class="pointer"></span>
                      <h4><?php echo $value->title; ?></h4>
                      <p><?php echo $value->description; ?></p>
                  </div>
              </div>

           <?php } ?>
           
            </div>
        </div>
    </div>
</section>
<?php } ?>

<section class="section-space smart-section light-blue-bg min-space" id="counter">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
             

              <div class="col-lg-3 col-sm-6 col-6">
                    <div class="counter-block">
                  <h4><span class="counter-value" data-count="<?php echo $heading->cv1; ?>">0</span>L+</h4>
                  <p><?php echo $heading->ch1; ?></p>
                </div>
              </div>


                <div class="col-lg-3 col-sm-6 col-6">
                    <div class="counter-block">
                  <h4><span class="counter-value" data-count="<?php echo $heading->cv2; ?>">0</span>+</h4>
                  <p><?php echo $heading->ch2; ?></p>
                </div>
              </div>
                <div class="col-lg-3 col-sm-6 col-6">
                    <div class="counter-block">
                  <h4><span class="counter-value" data-count="<?php echo $heading->cv3; ?>">0</span>+</h4>
                  <p><?php echo $heading->ch3; ?></p>
                </div>
              </div>
                <div class="col-lg-3 col-sm-6 col-6">
                    <div class="counter-block">
                  <h4><span class="counter-value" data-count="<?php echo $heading->cv4; ?>">0</span>+</h4>
                  <p><?php echo $heading->ch4; ?></p>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($career_gallery)) {?>

<div class="swiper office-career-slider">
    <div class="swiper-wrapper">
       <?php foreach ($career_gallery as $key => $value) {?>
     
        <div class="swiper-slide">
            <a href="<?php echo base_url($value->image); ?>" data-lightbox="office">
                <img src="<?php echo base_url($value->image); ?>"/>
            </a>
        </div>
      <?php } ?>
    </div>
</div>

<?php } ?>

<section class="section-space smart-section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head mb-5">
                  <h2>Apply <span>Now</span></h2>
                </div>
                <form id="career_form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control txtOnly required" placeholder="Name" name="name"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control required" placeholder="Email Address*" name="email"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="tel" class="form-control required" placeholder="Phone Number*" name="phone" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-select required" name="designation">
                                    <option value="">Select Job Designation</option>
                                    <option value="ceo">CEO</option>
                                    <option value="manager">Manager</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group resume-upload">
                                <label for="resume">
                                    <img src="assets/frontend/images/file-upload-icon.png"/>
                                    <div>
                                    <h5 class="file-name-upload">Upload your Resume</h5>
                                    <p>MS Word, JPEG, PDF, Max 2 MB</p>
                                    </div>
                                    <input type="file"  accept=".doc,.docx,.jpg,.jpeg,.pdf"  id="resume" name="resume"/>
                                    
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 mx-auto mt-4">
                            <button type="submit" class="theme-btn full" id="btn_enq">Submit</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</section>
<script>
$("#resume").change(function(){
    var fileInput = document.getElementById('resume');   
    var filename = fileInput.files[0].name; 
    $(".file-name-upload").text(filename);
});
</script>
<?php $this->endSection(); ?>