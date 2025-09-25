<?php 
$this->extend('layout/user_layout');
$this->section('page');
 ?>
<div class="col-lg-9 col-sm-12">
	<div class="dashboard-block">
		<div class="dashboard-head">
			<h5>Bookings</h5>
		</div>
		<div class="dashboard-body">
			<div class="dashbaord-table">
				<div class="dashbaord-table-head">
					<div class="row">
						<div class="col-md-5">
							<h5>Type</h5>	
						</div>
						<div class="col-md-3">
							<h5>Date</h5>
						</div>
						<div class="col-md-2">
							<h5>Status</h5>
						</div>
						<div class="col-md-2">
							<h5>Details</h5>
						</div>
					</div>
				</div>
				<div class="dashbaord-table-body">
					<div class="dashbaord-table-data">
						<div class="row align-items-center">
							<div class="col-md-5">
								<p>Test Drive</p>
							</div>
							<div class="col-md-3">
								<p>13/10/2021</p>
							</div>
							<div class="col-md-2">
								<p class="pending-status">Pending</p>
							</div>
							<div class="col-md-2">
								<p><a href="#">View Detail</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dashboard-mobile-table">
    		    <div class="table-row">
    		        <div class="row">
    		            <div class="col-sm-4 col-4">
    		                <h5>Type</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p>Test Drive</p>
    		            </div>
    		        </div>
    		        <div class="row">
    		            <div class="col-sm-4 col-4">
    		                <h5>Date</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p>13/10/2021</p>
    		            </div>
    		        </div>
    		        <div class="row">
    		            <div class="col-sm-4 col-4">
    		                <h5>Status</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p class="pending-status">Pending</p>
    		            </div>
    		        </div>
    		        <div class="row">
    		            <div class="col-sm-4 col-4">
    		                <h5>Details</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p><a href="#">View Detail</a></p>
    		            </div>
    		        </div>
    		    </div>
    		 </div>
		</div>
	</div>

	<div class="dashboard-block">
		<div class="dashboard-head">
			<h5>Booking Request</h5>
		</div>
		<div class="dashboard-body">
			<form method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Name</label>
							<input type="text" name="full_name" required="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Email</label>
							<input type="email" name="email" required="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Mobile</label>
							<input type="tel" name="mobile" required="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Service Type</label>
							<select class="select2">
								<option>Test Drive</option>
								<option>Professional Drive</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Vehicle Type</label>
							<select class="select2">
								<option>Four Wheeler</option>
								<option>Two Wheeler</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Brand</label>
							<select class="select2">
								<option>Maruti Suzuki</option>
								<option>BMW</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Model</label>
							<select class="select2">
								<option>Ciaz</option>
								<option>i10</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Fuel Type</label>
							<select class="select2">
								<option>Petrol</option>
								<option>CNG</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Dealer</label>
							<select class="select2">
								<option>KVG Hyundai Motors, Moti Nagar</option>
								<option>KVG Hyundai Motors, America</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-box fill white mt-0">
							<label>Date</label>
							<input type="date" name="date" required="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
								<div class="input-box fill mt-0">
									<button type="submit" class="theme-btn fill full"><span>Confirm Booking</span></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>

<?php $this->endSection();?>
<?php $this->section('javascript');?>
<script>
$("#upload-document").change(function(){
	$("#upload-document-btn").hide();
	$(".upload-doc-row").show();
});
</script>
<?php $this->endSection();?>