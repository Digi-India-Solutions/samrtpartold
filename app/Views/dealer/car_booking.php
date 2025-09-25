<?php 
$this->extend('layout/dealer_layout');
$this->section('page');
 ?>
							<div class="col-md-9">
								<div class="dashboard-block">
									<div class="dashboard-head">
										<h5>Bookings</h5>
									</div>
									<div class="dashboard-body">
										<form class="mt-2" method="post">
											<div class="row">
												<div class="col-md-9">
													<div class="input-box fill btn-inline icon white mt-0">
														<input type="search" placeholder="Search Vehicles" name="">
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
										<div class="col-md-12">
											<div class="tab-panel mb-3">
												<button type="button" class="tab-btn active" data="dealer-booking" data-tab="*">All</button>
												<button type="button" class="tab-btn" data="dealer-booking" data-tab="completed">Completed</button>
												<button type="button" class="tab-btn" data="dealer-booking" data-tab="pending">Pending</button>
											</div>
										</div>
										<div class="dashbaord-seprator"><hr/></div>
										<form method="post">
											<div class="row align-items-center">
												<div class="col-md-2 pe-0">
													<div class="input-box checkbox mt-0 mb-0">
														<label><input type="checkbox">Out of Stock</label>
													</div>
												</div>
												<div class="col-md-2">
													<div class="input-box checkbox mt-0 mb-0">
														<label><input type="checkbox">Remove</label>
													</div>
												</div>
												<div class="col-md-8 text-end">
													<button type="submit" class="theme-btn big"><span>Update</span></button>
												</div>
											</div>
										</form>
										<div class="dashbaord-seprator"><hr/></div>
										<div class="dashbaord-table table-data inventory-data dashbaord-seprator">
											<div class="dashbaord-table-head">
												<div class="row">
													<div class="col-md-2 pe-0 text-center right-checkbox position-relative">
														<h5><input type="checkbox" class="select-all-checkbox" data-for="vehicle"> Vehicle</h5>	
													</div>
													<div class="col-md-2 text-center">
														<h5>Customer Name</h5>
													</div>
													<div class="col-md-2 text-center">
														<h5>Booking ID</h5>
													</div>
													<div class="col-md-2 text-center">
														<h5>Date</h5>
													</div>
													<div class="col-md-2 text-center">
														<h5>Status</h5>
													</div>
													<div class="col-md-2 text-center">
														
													</div>
												</div>
											</div>
											<div class="dashbaord-table-body color-row">
												<div class="dashbaord-table-data tab-content show" data="dealer-booking" data-tab="pending">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
																<p>All New i20</p>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>Nitin Sharma</p>
														</div>
														<div class="col-md-2 text-center">
															<p>#1458745</p>
														</div>
														<div class="col-md-2 text-center">
															<p>02/10/2021</p>
														</div>
														<div class="col-md-2 text-center">
															<p class="pending-status"><i class="las la-history"></i> Visit Pending</p>
														</div>
														<div class="col-md-2 text-center">
															<p><a href="#">View details</a></p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data tab-content show" data="dealer-booking" data-tab="completed">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
																<p>All New i20</p>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>Nitin Sharma</p>
														</div>
														<div class="col-md-2 text-center">
															<p>#1458745</p>
														</div>
														<div class="col-md-2 text-center">
															<p>02/10/2021</p>
														</div>
														<div class="col-md-2 text-center">
															<p class="success-status"><i class="las la-check-circle"></i> Completed</p>
														</div>
														<div class="col-md-2 text-center">
															<p><a href="#">View details</a></p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data tab-content show" data="dealer-booking" data-tab="completed">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
																<p>All New i20</p>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>Nitin Sharma</p>
														</div>
														<div class="col-md-2 text-center">
															<p>#1458745</p>
														</div>
														<div class="col-md-2 text-center">
															<p>02/10/2021</p>
														</div>
														<div class="col-md-2 text-center">
															<p class="success-status"><i class="las la-check-circle"></i> Completed</p>
														</div>
														<div class="col-md-2 text-center">
															<p><a href="#">View details</a></p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data tab-content show" data="dealer-booking" data-tab="completed">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
																<p>All New i20</p>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>Nitin Sharma</p>
														</div>
														<div class="col-md-2 text-center">
															<p>#1458745</p>
														</div>
														<div class="col-md-2 text-center">
															<p>02/10/2021</p>
														</div>
														<div class="col-md-2 text-center">
															<p class="success-status"><i class="las la-check-circle"></i> Completed</p>
														</div>
														<div class="col-md-2 text-center">
															<p><a href="#">View details</a></p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data tab-content show" data="dealer-booking" data-tab="completed">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
																<p>All New i20</p>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>Nitin Sharma</p>
														</div>
														<div class="col-md-2 text-center">
															<p>#1458745</p>
														</div>
														<div class="col-md-2 text-center">
															<p>02/10/2021</p>
														</div>
														<div class="col-md-2 text-center">
															<p class="success-status"><i class="las la-check-circle"></i> Completed</p>
														</div>
														<div class="col-md-2 text-center">
															<p><a href="#">View details</a></p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data tab-content show" data="dealer-booking" data-tab="completed">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
																<p>All New i20</p>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>Nitin Sharma</p>
														</div>
														<div class="col-md-2 text-center">
															<p>#1458745</p>
														</div>
														<div class="col-md-2 text-center">
															<p>02/10/2021</p>
														</div>
														<div class="col-md-2 text-center">
															<p class="success-status"><i class="las la-check-circle"></i> Completed</p>
														</div>
														<div class="col-md-2 text-center">
															<p><a href="#">View details</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row align-items-center">
											<div class="col-md-2">
												<div class="input-box mb-0">
													<a href="#" class="theme-btn full outline disabled"><span>Previous</span></a>
												</div>
											</div>
											<div class="col-md-2">
												<div class="input-box mb-0">
													<a href="#" class="theme-btn full"><span>Next</span></a>
												</div>
											</div>
											<div class="col-md-3 offset-md-5	">
												<div class="dashboard-pagination">
													Page <input type="number" value="1" name="" /> of 150
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
	</div>
</section>

<?php $this->endSection();?>