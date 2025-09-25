<?php 
$this->extend('layout/dealer_layout');
$this->section('page');
 ?>
							<div class="col-md-9">
								<div class="dashboard-block">
									<div class="dashboard-head">
										<h5>Inventory</h5>
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
										<form class="mt-2" method="post">
											<div class="row">
												<div class="col-md-2">
													<div class="input-box text-select mt-0 mb-0">
														<select class="select2">
															<option value="" selected="" disabled="">By Brand</option>
															<option>BMW</option>
															<option>Audi</option>
														</select>
													</div>
												</div>
												<div class="col-md-2">
													<div class="input-box text-select mt-0 mb-0">
														<select class="select2">
															<option value="" selected="" disabled="">By Model</option>
															<option>i 10</option>
															<option>i 20</option>
														</select>
													</div>
												</div>
												<div class="col-md-2">
													<div class="input-box text-select mt-0 mb-0">
														<select class="select2">
															<option value="" selected="" disabled="">By Color</option>
															<option>RED</option>
															<option>GREY</option>
														</select>
													</div>
												</div>
											</div>
										</form>
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
														<h5>Name</h5>
													</div>
													<div class="col-md-2 text-center">
														<h5>Brand</h5>
													</div>
													<div class="col-md-2 text-center">
														<h5>Variants</h5>
													</div>
													<div class="col-md-2 text-center">
														<h5>Stock</h5>
													</div>
													<div class="col-md-2 text-center">
														<h5>Location</h5>
													</div>
												</div>
											</div>
											<div class="dashbaord-table-body color-row">
												<div class="dashbaord-table-data">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>All New i20</p>
														</div>
														<div class="col-md-2 text-center">
															<p>Hyundai</p>
														</div>
														<div class="col-md-2 text-center">
															<div class="input-box text-select mt-0 mb-0">
																<select class="select2">
																	<option>Asta(OS)</option>
																	<option>Asta(MS)</option>
																</select>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<input type="number" class="min-width" value="150">
														</div>
														<div class="col-md-2 text-center">
															<p>North Avenue</p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>All New i20</p>
														</div>
														<div class="col-md-2 text-center">
															<p>Hyundai</p>
														</div>
														<div class="col-md-2 text-center">
															<div class="input-box text-select mt-0 mb-0">
																<select class="select2">
																	<option>Asta(OS)</option>
																	<option>Asta(MS)</option>
																</select>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<input type="number" class="min-width" value="150">
														</div>
														<div class="col-md-2 text-center">
															<p>North Avenue</p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>All New i20</p>
														</div>
														<div class="col-md-2 text-center">
															<p>Hyundai</p>
														</div>
														<div class="col-md-2 text-center">
															<div class="input-box text-select mt-0 mb-0">
																<select class="select2">
																	<option>Asta(OS)</option>
																	<option>Asta(MS)</option>
																</select>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p class="danger-status">Out of Stock</p>
														</div>
														<div class="col-md-2 text-center">
															<p>North Avenue</p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>All New i20</p>
														</div>
														<div class="col-md-2 text-center">
															<p>Hyundai</p>
														</div>
														<div class="col-md-2 text-center">
															<div class="input-box text-select mt-0 mb-0">
																<select class="select2">
																	<option>Asta(OS)</option>
																	<option>Asta(MS)</option>
																</select>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<input type="number" class="min-width" value="150">
														</div>
														<div class="col-md-2 text-center">
															<p>North Avenue</p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>All New i20</p>
														</div>
														<div class="col-md-2 text-center">
															<p>Hyundai</p>
														</div>
														<div class="col-md-2 text-center">
															<div class="input-box text-select mt-0 mb-0">
																<select class="select2">
																	<option>Asta(OS)</option>
																	<option>Asta(MS)</option>
																</select>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<input type="number" class="min-width" value="150">
														</div>
														<div class="col-md-2 text-center">
															<p>North Avenue</p>
														</div>
													</div>
												</div>
												<div class="dashbaord-table-data">
													<div class="row align-items-center">
														<div class="col-md-2 text-center right-checkbox position-relative">
															<div class="product-image">
																<input type="checkbox" data-get="vehicle">
																<img src="assets/images/car-img.jpg" alt="product-image">
															</div>
														</div>
														<div class="col-md-2 text-center">
															<p>All New i20</p>
														</div>
														<div class="col-md-2 text-center">
															<p>Hyundai</p>
														</div>
														<div class="col-md-2 text-center">
															<div class="input-box text-select mt-0 mb-0">
																<select class="select2">
																	<option>Asta(OS)</option>
																	<option>Asta(MS)</option>
																</select>
															</div>
														</div>
														<div class="col-md-2 text-center">
															<input type="number" class="min-width" value="150">
														</div>
														<div class="col-md-2 text-center">
															<p>North Avenue</p>
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