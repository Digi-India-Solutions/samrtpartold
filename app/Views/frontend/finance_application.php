<?php 
$this->extend('layout/master');
$this->section('page');
 ?>

<section class="header-space min pb-4">
	<div class="container-fluid">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="banner-image">
						<img src="<?php echo CATALOG; ?>images/finance-image.png" alt="banner" />
					</div>
				</div>
				<div class="col-md-5">
					<div class="tab-panel type3 mb-0">
						<button type="button" class="tab-btn active" data="finance-form" data-tab="new">New</button>
						<button type="button" class="tab-btn" data="finance-form" data-tab="used">Used</button>
					</div>
					<div class="banner-form-float still grey-bg">
						<div class="tab-content show" data="finance-form" data-tab="new">
							<form method="post">	
								<h5>Get Personalized Finance Quotes</h5>
								<p>We only ask these once and your details are safe with us.</p>
								<div class="row">
									<div class="col-md-12">
										<div class="input-box underline">
											<label>Select City</label>
											<select class="select2" name="select_city">
												<option>New Delhi</option>
												<option>Mumbai</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline mt-0">
											<label>Select Model</label>
											<select class="select2" name="select_model">
												<option>Maruti Boleno</option>
												<option>Maruti 800</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline mt-0">
											<label>Full Name as per PAN Card</label>
											<input type="text" required="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline otp-num mt-0">
											<label>Mobile Number</label>
											<span class="num-prefix">+91</span>
											<input type="tel" maxlength="10" class="enter-otp-mob" required="">
											<a href="#" id="send-otp" class="d-none send-otp">Send OTP</a>
											<p>Enter registered mobile banking number and verify with OTP</p>
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline mt-0">
											<button type="submit" disabled="" class="theme-btn full big"><span>View Finance Offers <i class="las la-angle-right"></i></span></button>
										</div>
									</div>
									<p class="tnc-line">By proceeding ahead you agree to Motorkart Visitor Agreement, <a href="#">Parivacy Policy</a> and <a href="#">Terms and Conditions</a>. This site is protected by reCAPTCHA and Google <a href="#">Terms of Service</a> apply</p>
								</div>
							</form>
							<form method="post" class="otp-enter-form d-none">
								<h5 class="mb-2">Enter OTP sent on +91 9565413214</h5>
								<p>OTP will remain valid for next 5 minutes. If not received <a href="#">click here</a> to resend</p>
								<div class="row">
									<div class="col-md-12">
										<div class="input-box border-bottom otp-num-enter underline mt-0">
											<label>Enter OTP</label>
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline mb-4 mt-0">
											<button type="submit" disabled="" class="theme-btn full big"><span>Proceed <i class="las la-angle-right"></i></span></button>
										</div>
									</div>
									<div class="col-md-12 text-center">
										<a href="javascript:void();" class="back-to-from">Back</a>
									</div>
								</div>
							</form>
						</div>

						<div class="tab-content" data="finance-form" data-tab="used">
							<form method="post">	
								<h5>Get Personalized Finance Quotes</h5>
								<p>We only ask these once and your details are safe with us.</p>
								<div class="row">
									<div class="col-md-12">
										<div class="input-box underline">
											<label>Select City</label>
											<select class="select2" name="select_city">
												<option>New Delhi</option>
												<option>Mumbai</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline mt-0">
											<label>Select Model</label>
											<select class="select2" name="select_model">
												<option>Maruti Boleno</option>
												<option>Maruti 800</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline mt-0">
											<label>Full Name as per PAN Card</label>
											<input type="text" required="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline otp-num mt-0">
											<label>Mobile Number</label>
											<span class="num-prefix">+91</span>
											<input type="tel" maxlength="10" class="enter-otp-mob" required="">
											<a href="#" id="send-otp" class="d-none send-otp">Send OTP</a>
											<p>Enter registered mobile banking number and verify with OTP</p>
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline mt-0">
											<button type="submit" disabled="" class="theme-btn full big"><span>View Finance Offers <i class="las la-angle-right"></i></span></button>
										</div>
									</div>
									<p class="tnc-line">By proceeding ahead you agree to Motorkart Visitor Agreement, <a href="#">Parivacy Policy</a> and <a href="#">Terms and Conditions</a>. This site is protected by reCAPTCHA and Google <a href="#">Terms of Service</a> apply</p>
								</div>
							</form>
							<form method="post" class="otp-enter-form d-none">
								<h5 class="mb-2">Enter OTP sent on +91 9565413214</h5>
								<p>OTP will remain valid for next 5 minutes. If not received <a href="#">click here</a> to resend</p>
								<div class="row">
									<div class="col-md-12">
										<div class="input-box border-bottom otp-num-enter underline mt-0">
											<label>Enter OTP</label>
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
											<input type="tel" pattern= "[0-9]" maxlength="1" name="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box underline mb-4 mt-0">
											<button type="submit" disabled="" class="theme-btn full big"><span>Proceed <i class="las la-angle-right"></i></span></button>
										</div>
									</div>
									<div class="col-md-12 text-center">
										<a href="javascript:void();" class="back-to-from">Back</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->endSection(); ?>