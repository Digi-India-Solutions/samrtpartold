<?php 
$this->extend('layout/master');
$this->section('page');
?>

<section class="section-space smart-section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center subheading-large">
            			<h2>Forgot Password</h2>
            			<p>Already have an account? <a href="<?php echo base_url('login') ?>"><b>Login</b></a></p>
            		</div>
                </div>
                <div class="col-xl-5 col-lg-6 col-sm-10 mx-auto mt-4">
                    <form id="forget_form">
                        <div class="form-group">
                            <input type="email" placeholder="Email Address" name="email" required class="form-control" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn full" id="btn_login">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>