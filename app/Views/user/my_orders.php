<?php 
$this->extend('layout/user_layout');
$this->section('page');
?>

<style>
    .theme-btn.sml {
        padding: 10px 15px;
    }

</style>
<div class="col-lg-9 col-sm-12">
<div class="dashboard-block">
	<div class="dashboard-head">
		<h5>All Orders</h5>
	</div>
	<div class="dashboard-body">
		<div class="dashbaord-table">
			<div class="dashbaord-table-head">
				<div class="row">
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
						<h5>Order ID</h5>	
					</div>
				<!--	<div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-12">
						<h5>Order Id</h5>
					</div>-->
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
						<h5>Status</h5>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
						<h5>Total</h5>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
						<h5>Date</h5>
					</div>
					<div class="col-xl-4 col-lg-2 col-md-2 col-sm-2 col-12">
						<h5>View</h5>
					</div>
				</div>
			</div>
			<div class="dashbaord-table-body">
				
				<?php if (!empty($orders)) { foreach ($orders as $key => $value) {?>
				

				<div class="dashbaord-table-data">
					<div class="row align-items-center">
						<!-- <div class="col-md-5">
							<div class="order-info">
								<div class="img-box">
									<img src="<?php echo base_url($config_logo); ?>" alt="product-image" />
								</div>
								<div class="text"><h5><?php echo $value->id; ?></h5></div>
							</div>	
						</div> -->
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
							<p>#<?php echo $value->id; ?></p>
						</div>
						<!--<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
							<p><?php echo $value->txnid; ?></p>
						</div>-->
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
							<p class="success-status"><?php echo $value->order_status_name; ?></p>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
							<p><b>$ <?php echo $value->total; ?></b></p>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
							<p><?php echo $value->date_added; ?></p>
						</div>
						<div class="col-xl-4 col-lg-2 col-md-2 col-sm-2 col-12">
							<a href="<?php echo base_url('user/invoice/'.encrypt_url($value->id));?>" class="theme-btn sml">View</a>
							
							<a href="<?php echo base_url('user/swift_code/'.encrypt_url($value->id));?>" class="theme-btn sml"><i class="fa fa-download"></i> Swift code</a>
						</div>
					</div>
				</div>

			<?php } } ?>
							
				
			</div>
		</div>


		<div class="dashboard-mobile-table">
		    <div class="table-row">
		        <div class="row">
		            <div class="col-sm-4 col-4">
		                <h5>Item</h5>
		            </div>
		            <div class="col-sm-8 col-8">
		                <div class="order-info">
							<div class="img-box">
								<img src="assets/frontend/images/popular-parts-2.jpg" alt="product-image" />
							</div>
							<div class="text"><h5>Ford Ecosport Air Filter</h5></div>
						</div>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-sm-4 col-4">
		                <h5>Order Id</h5>
		            </div>
		            <div class="col-sm-8 col-8">
		                <p>#566463</p>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-sm-4 col-4">
		                <h5>Status</h5>
		            </div>
		            <div class="col-sm-8 col-8">
		                <p class="success-status">Completed</p>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-sm-4 col-4">
		                <h5>Price</h5>
		            </div>
		            <div class="col-sm-8 col-8">
		                <p><b>₹ 1,000</b></p>
		            </div>
		        </div>
		    </div>
		    
		    
		   
		</div>
		
		
	</div>
	</div>
	</div>

			
<?php $this->endSection();?>