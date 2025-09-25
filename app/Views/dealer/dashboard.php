<?php 
$this->extend('layout/dealer_layout');
$this->section('page');
 ?>
 
<div class="col-md-9">
				<div class="dashboard-block">
					<div class="dashboard-head">
						<h5>Profile Settings</h5>
					</div>
					<div class="dashboard-body">
						<div class="tab-content show" data="my-profile" data-tab="account">
							<form method="post" class="form-data" data="user-profile">
								<div class="profile-box mb-4" >
									<div class="profile-image">
										<img src="assets/images/profile-image.jpg" alt="profile-image" />
										<label for="profile-image" disabled>Upload</label>
										<input type="file" accept=".png,.jpg,.jpeg" class="edit-field" disabled="" id="profile-image" />
									</div>
									<h3>Dealership</h3>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Name</label>
											<input type="text" value="Rahul Singh" name="fullname" class="edit-field" disabled="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Email</label>
											<input type="email" value="rahulsingh007@gmail.com" name="email" disabled="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Registered Mobile</label>
											<input type="tel" value="+91 9654135696" name="phone" class="edit-field" disabled="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="row edit-row" data="user-profile">
											<div class="col-md-3">
												<div class="input-box fill  mt-0 mb-0">
													<button type="button" class="theme-btn full edit-data" data="user-profile"><span>Edit Profile</span></button>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-box fill mt-0 mb-0">
													<button type="button" class="theme-btn tab-btn full outline"  data="my-profile" data-tab="password"><span>Change Password</span></button>
												</div>
											</div>
										</div>
										<div class="row save-data d-none" data="user-profile">
											<div class="col-md-2">
												<a href="javascript:void(0);" onclick="location.reload()" class="theme-btn full save-data" data="user-address"><span>Back</span></a>
											</div>
											<div class="col-md-3">
												<button type="submit" class="theme-btn full save-data" data="user-address"><span>Save Profile</span></button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-content" data="my-profile" data-tab="password">
							<form method="post">
								<div class="row">
									<div class="col-md-12">
										<div class="input-box fill mt-0">
											<button type="button" class="theme-btn tab-btn"  data="my-profile" data-tab="account"><span>Back to Profile</span></button>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box white fill mt-0">
											<label>New Password</label>
											<input type="password" value="" name="password">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box white fill mt-0">
											<label>Confirm Password</label>
											<input type="password" value="" name="cpassword">
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-3">
												<div class="input-box fill mt-0 mb-0">
													<button type="button" class="theme-btn full"><span>Change Password</span></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="dashboard-block">
					<div class="dashboard-head">
						<h5>Address</h5>
					</div>
					<div class="dashboard-body">
						<form method="post" class="form-data" data="user-address">
							<div class="row">
								<div class="col-md-12">
									<div class="input-box fill white mt-0">
										<label>Address Line</label>
										<input type="text" class="edit-field" value="325/1, Street No. 5, District Market, Vasant Kunj" name="address" disabled="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-box fill white mt-0">
										<label>State</label>
										<input type="text" class="edit-field" value="New Delhi" name="state" disabled="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-box fill white mt-0">
										<label>Pincode</label>
										<input type="number" class="edit-field" value="110065" name="pincode" disabled="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-box fill white mt-0">
										<label>Country</label>
										<input type="text" class="edit-field" value="India" name="country" disabled="">
									</div>
								</div>
								<div class="col-md-12">
									<div class="row edit-row" data="user-address">
										<div class="col-md-3">
											<div class="input-box fill mt-0 mb-0">
												<button type="button" class="theme-btn full edit-data" data="user-address"><span>Edit Address</span></button>
											</div>
										</div>
									</div>
									<div class="row save-data d-none"  data="user-address">
										<div class="col-md-2">
											<a href="javascript:void(0);" onclick="location.reload()" class="theme-btn full save-data" data="user-address"><span>Back</span></a>
										</div>
										<div class="col-md-3">
											<button type="submit" class="theme-btn full save-data" data="user-address"><span>Save Address</span></button>
										</div>
									</div>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>
											
<?php $this->endSection();?>