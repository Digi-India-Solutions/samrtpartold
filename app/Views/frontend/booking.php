<?php 
$this->extend('layout/master');
$this->section('page');
 ?>
 
<section class="header-space" id="overview">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-sm-12 pe-lg-5 pe-sm-3">
					<div class="title">
						<h3>Booking for Hyundai i20</h3>
					</div>
					<div class="row">
					    <div class="col-lg-12 col-sm-6">
					        <div class="radius-image mb-3">
        						<img src="<?php echo CATALOG; ?>images/product4.jpg" alt="car" />
        					</div>
					    </div>
					    <div class="col-lg-12 col-sm-6">
					        <div class="grey-img-box type2 head">
        						<h5>Note</h5>
        						<p>On cancellation there will be 70% amount returned</p>
        						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        						<p>Lorem Ipsum is simply dummy text of the printing</p>
        					</div>
					    </div>
					</div>
				</div>
				<div class="col-lg-7 col-sm-12 mt-lg-0 mt-sm-4 mt-4">
					<h5>Please enter our details to confirm the booking</h5>
					<form method="post" class="mt-4">
						<div class="row">
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>First name</label>
									<input type="text" name="first_name" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>Last name</label>
									<input type="text" name="last_name" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>Email</label>
									<input type="email" name="email" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>Mobile</label>
									<input type="tel" name="mobile" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>Brand</label>
									<select name="brand" class="select2">
										<option>AUDI</option>
										<option>Maruti</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>Model</label>
									<select name="model" class="select2">
										<option>All New i20 </option>
										<option>All New i10 </option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>Fuel Type</label>
									<select name="fuel_type" class="select2">
										<option>Diesel</option>
										<option>Petrol</option>
										<option>CNG</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>Variant</label>
									<select name="variant" class="select2">
										<option>N6 iMT Dual Tone (Petrol) 9.99 Lakh*</option>
										<option>N8 iMT (Petrol) 10.87 Lakh*</option>
										<option>N8 iMT Dual tone (Petrol) 11.02 Lakh*</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>Dealer</label>
									<input type="text" name="dealer" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-box fill float-label mt-0">
									<label>Date</label>
									<input type="date" name="date" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-12">
								<h4><b>Booking amount for Hyundai All New i20 is ₹5,000</b></h4>
							</div>
							<div class="col-md-6 mt-4">
								<button type="submit" class="theme-btn full big"><span>Confirm Booking <i class="las la-angle-right"></i></span></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $this->endSection(); ?>
