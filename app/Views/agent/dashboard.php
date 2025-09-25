<?php 
$this->extend('layout/agent_layout');
$this->section('page');
?>

<div class="col-md-9">
<div class="dashboard-block">
<div class="dashboard-head">
<h5>My Cars</h5>
</div>
<div class="dashboard-body">
<form class="mt-2" method="post">
<div class="row">
<div class="col-md-9">
<div class="input-box fill btn-inline icon white mt-0">
	<input type="search" required="" placeholder="Search Vehicles" name="">
	<i class="las la-search rotate-y-180"></i>
</div>
</div>
<div class="col-md-3">
<div class="input-box fill icon white mt-0">
	<button type="submit" class="theme-btn full big"><span>Search</span></button>
</div>
</div>
</div>
</form>
<div class="dashbaord-seprator"><hr/></div>
<div class="row">
<div class="col-md-3"><a href="add-vehicle.php" class="theme-btn full"><span>+ Add New Vehicle</span></a></div>
</div>
<div class="dashbaord-seprator"><hr/></div>
<div class="dashbaord-table table-data">
<div class="dashbaord-table-head">
<div class="row">
<div class="col-md-2 pe-0 text-center">
	<h5>Vehicle</h5>	
</div>
<div class="col-md-2 text-center">
	<h5>Name</h5>
</div>
<div class="col-md-2 text-center">
	<h5>Brand</h5>
</div>
<div class="col-md-2 text-center">
	<h5>Status</h5>
</div>
<div class="col-md-2 text-center">
	<h5>KM's</h5>
</div>
<div class="col-md-2 text-center">
	<h5>Action</h5>
</div>
</div>
</div>
<div class="dashbaord-table-body color-row no-border">
<div class="dashbaord-table-data  dashbaord-seprator">
<div class="table-row">
	<div class="row align-items-center">
		<div class="col-md-2 text-center">
			<div class="product-image">
				<img src="<?php echo CATALOG; ?>images/car-img.jpg" alt="product-image">
			</div>
		</div>
		<div class="col-md-2 text-center">
			<p>All New i20</p>
		</div>
		<div class="col-md-2 text-center">
			<p>Hyundai</p>
		</div>
		<div class="col-md-2 text-center">
			<p class="pending-status"><i class="las la-history"></i>Pending</p>
		</div>
		<div class="col-md-2 text-center">
			<p>15,000</p>
		</div>
		<div class="col-md-2 text-center">
			<p class="action-btn">
				<a href="#"><i class="las la-edit"></i></a>
				<a href="javascript:void(0)" class="delete-item"><i class="las la-trash-alt"></i></a>
			</p>
		</div>
	</div>
	<div class="car-detail">
		<div class="detail-head">
			<span>View All Details <i class="las la-angle-down"></i></span>
		</div>
		<div class="car-detail-content">
			<div class="row">
				<div class="col">
					<h5>Owner Name</h5>
					<p>Rahul Singh</p>
				</div>
				<div class="col">
					<h5>Name on the RC</h5>
					<p>Rahul Singh</p>
				</div>
				<div class="col">
					<h5>Registered State</h5>
					<p>New Delhi</p>
				</div>
				<div class="col">
					<h5>Registered Date</h5>
					<p>2017</p>
				</div>
				<div class="col">
					<h5>Color</h5>
					<p>Blue</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h5>Variant</h5>
					<p>Rahul Singh</p>
				</div>
				<div class="col">
					<h5>Service Record</h5>
					<p>Yes</p>
				</div>
				<div class="col">
					<h5>Insurance</h5>
					<p>Zero Dep<br><span>(Valid upto Oct 2022)</span></p>
				</div>
				<div class="col">
					<h5>Owner</h5>
					<p>First Owner</p>
				</div>
				<div class="col">
					<h5>Fuel Type</h5>
					<p>Petrol</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="table-row">
	<div class="row align-items-center">
		<div class="col-md-2 text-center">
			<div class="product-image">
				<img src="<?php echo CATALOG; ?>images/car-img.jpg" alt="product-image">
			</div>
		</div>
		<div class="col-md-2 text-center">
			<p>All New i20</p>
		</div>
		<div class="col-md-2 text-center">
			<p>Hyundai</p>
		</div>
		<div class="col-md-2 text-center">
			<p class="success-status"><i class="las la-check-circle"></i> Completed</p>
		</div>
		<div class="col-md-2 text-center">
			<p>15,000</p>
		</div>
		<div class="col-md-2 text-center">
			<p class="action-btn">
				<a href="#"><i class="las la-edit"></i></a>
				<a href="javascript:void(0)" class="delete-item"><i class="las la-trash-alt"></i></a>
			</p>
		</div>
	</div>
	<div class="car-detail">
		<div class="detail-head">
			<span>View All Details <i class="las la-angle-down"></i></span>
		</div>
		<div class="car-detail-content">
			<div class="row">
				<div class="col">
					<h5>Owner Name</h5>
					<p>Rahul Singh</p>
				</div>
				<div class="col">
					<h5>Name on the RC</h5>
					<p>Rahul Singh</p>
				</div>
				<div class="col">
					<h5>Registered State</h5>
					<p>New Delhi</p>
				</div>
				<div class="col">
					<h5>Registered Date</h5>
					<p>2017</p>
				</div>
				<div class="col">
					<h5>Color</h5>
					<p>Blue</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h5>Variant</h5>
					<p>Rahul Singh</p>
				</div>
				<div class="col">
					<h5>Service Record</h5>
					<p>Yes</p>
				</div>
				<div class="col">
					<h5>Insurance</h5>
					<p>Zero Dep<br><span>(Valid upto Oct 2022)</span></p>
				</div>
				<div class="col">
					<h5>Owner</h5>
					<p>First Owner</p>
				</div>
				<div class="col">
					<h5>Fuel Type</h5>
					<p>Petrol</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="table-row">
	<div class="row align-items-center">
		<div class="col-md-2 text-center">
			<div class="product-image">
				<img src="<?php echo CATALOG; ?>images/car-img.jpg" alt="product-image">
			</div>
		</div>
		<div class="col-md-2 text-center">
			<p>All New i20</p>
		</div>
		<div class="col-md-2 text-center">
			<p>Hyundai</p>
		</div>
		<div class="col-md-2 text-center">
			<p class="success-status"><i class="las la-check-circle"></i> Completed</p>
		</div>
		<div class="col-md-2 text-center">
			<p>15,000</p>
		</div>
		<div class="col-md-2 text-center">
			<p class="action-btn">
				<a href="#"><i class="las la-edit"></i></a>
				<a href="javascript:void(0)" class="delete-item"><i class="las la-trash-alt"></i></a>
			</p>
		</div>
	</div>
	<div class="car-detail">
		<div class="detail-head">
			<span>View All Details <i class="las la-angle-down"></i></span>
		</div>
		<div class="car-detail-content">
			<div class="row">
				<div class="col">
					<h5>Owner Name</h5>
					<p>Rahul Singh</p>
				</div>
				<div class="col">
					<h5>Name on the RC</h5>
					<p>Rahul Singh</p>
				</div>
				<div class="col">
					<h5>Registered State</h5>
					<p>New Delhi</p>
				</div>
				<div class="col">
					<h5>Registered Date</h5>
					<p>2017</p>
				</div>
				<div class="col">
					<h5>Color</h5>
					<p>Blue</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h5>Variant</h5>
					<p>Rahul Singh</p>
				</div>
				<div class="col">
					<h5>Service Record</h5>
					<p>Yes</p>
				</div>
				<div class="col">
					<h5>Insurance</h5>
					<p>Zero Dep<br><span>(Valid upto Oct 2022)</span></p>
				</div>
				<div class="col">
					<h5>Owner</h5>
					<p>First Owner</p>
				</div>
				<div class="col">
					<h5>Fuel Type</h5>
					<p>Petrol</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php $this->endSection();?>
