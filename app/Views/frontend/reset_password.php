<?php 
$this->extend('layout/master');
$this->section('page');
?>

<section class="section-space smart-section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <?php if (!$valid){ ?>
                <div class="col-md-12">
                    <div class="section-head text-center subheading-large">
            			<h2>New Password</h2>
            			<p>Reset your password here</p>
            		</div>
                </div>
                <div class="col-xl-5 col-lg-6 col-sm-10 mx-auto mt-4">
                    
                    

                     <form id="reset_form">
                          <input type="hidden" name="email" value="<?php echo @$email; ?>">
                        <div class="form-group">
                            <input type="password" placeholder="New Password" name="password" required class="form-control" />
                            <span class="toggle-password"><i class="fa fa-eye-slash"></i></span>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Confirm Password" name="c_pass" required class="form-control" />
                            <span class="toggle-password"><i class="fa fa-eye-slash"></i></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn full" id="btn_login">Save</button>
                        </div>
                        
                    </form>
                
                </div>
                 <?php }else{ ?>

                    <h2>This link is invalid or expired !</h2>
                  <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>