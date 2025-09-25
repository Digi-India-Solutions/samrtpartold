<?php 
$this->extend('layout/master');
$this->section('page');
 ?>

<section class="common-banner overflow-hidden">
	<div class="container-fluid mt-md-5 mt-0 pt-md-5 pt-0">
		<div class="container">
			<div class="row">
				<div class="col-xl-5 col-lg-6 col-md-7 col-sm-12">
					<div class="banner-content">
						<div data-aos="fade-down" data-aos-duration="600">
							<h1>India's Most Trusted Car Marketplace</h1>
						</div>
						<form method="post" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
							<div class="select-vehicle-type">
								<label for="new_vehicle" class="active tab-btn" data="vehicle-type"><input type="radio" name="vehicle_type" checked="" id="new_vehicle">New</label>
								<label for="used_vehicle" class="tab-btn" data="vehicle-type"><input type="radio" name="vehicle_type" id="used_vehicle">Used</label>
							</div>
							<div class="input-box checkbox">
								<label for="bybrand" class="active tab-btn" data="vehicle-budget"><input type="radio" name="vehicle_budget" checked="" id="bybrand">By Brand</label>
								<label for="bydudget" class="tab-btn" data="vehicle-budget"><input type="radio" name="vehicle_budget" id="bydudget">By Budget</label>
							</div>
							<div class="input-box shadow search">
								<select name="brand" required class="select2">
									<option value="" selected="selected" disabled="disabled">Select Brand</option>
									<option value="Audi">Audi</option>
									<option value="BMW">BMW</option>
								</select>
								<select name="model" required class="select2">
									<option value="" selected="selected" disabled="disabled">Select Model</option>
									<option value="Audi 01">Audi</option>
									<option value="BMW 02">BMW</option>
								</select>
								<button type="submit"><i class="las la-search rotate-y-180"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-xl-6 offset-xl-1 col-lg-6 col-md-5 col-sm-12">
					<div class="banner-image" data-aos="fade-left" data-aos-duration="600" data-aos-delay="500">
						<img src="<?php echo CATALOG; ?>images/four-wheeler.png" alt="banner-image" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-space">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Recommended Cars</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="tab-panel mb-3">
						<button type="button" class="tab-btn active" data="popular" data-tab="recommended">Popular</button>
						<button type="button" class="tab-btn" data="popular" data-tab="most-searched">Most Searched</button>
						<button type="button" class="tab-btn" data="popular" data-tab="new-launched">New Launched</button>
					</div>
				</div>
				<div class="col-md-12" data-aos="fade-up" data-aos-duration="600">
					<div class="tab-content show"  data="popular" data-tab="recommended">
						<div class="recommended-slider arrow-btn owl-carousel">
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-1.jpg" alt="product" /></a>
									<span class="tag new">New Launched</span>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Hyundai i20 N Line</a></h4>
										</div>
										<div class="col-md-4 pe-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 9.50 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-2.jpg" alt="product" /></a>
									<span class="tag pre">EV</span>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Honda Amaze 2021</a></h4>
										</div>
										<div class="col-md-4 pe-0 ps-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 13.62 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-3.jpg" alt="product" /></a>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Honda Amaze 2021</a></h4>
										</div>
										<div class="col-md-4 pe-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 6.32 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-1.jpg" alt="product" /></a>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Hyundai i20 N Line</a></h4>
										</div>
										<div class="col-md-4 pe-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 9.50 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content"  data="popular" data-tab="most-searched">
						<div class="recommended-slider arrow-btn owl-carousel">
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-1.jpg" alt="product" /></a>
									<span class="tag new">New Launched</span>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Hyundai i20 N Line</a></h4>
										</div>
										<div class="col-md-4 pe-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 9.50 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-2.jpg" alt="product" /></a>
									<span class="tag pre">EV</span>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Honda Amaze 2021</a></h4>
										</div>
										<div class="col-md-4 pe-0 ps-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 13.62 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-3.jpg" alt="product" /></a>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Honda Amaze 2021</a></h4>
										</div>
										<div class="col-md-4 pe-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 6.32 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-1.jpg" alt="product" /></a>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Hyundai i20 N Line</a></h4>
										</div>
										<div class="col-md-4 pe-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 9.50 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content"  data="popular" data-tab="new-launched">
						<div class="recommended-slider arrow-btn owl-carousel">
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-1.jpg" alt="product" /></a>
									<span class="tag new">New Launched</span>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Hyundai i20 N Line</a></h4>
										</div>
										<div class="col-md-4 pe-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 9.50 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-2.jpg" alt="product" /></a>
									<span class="tag pre">EV</span>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Honda Amaze 2021</a></h4>
										</div>
										<div class="col-md-4 pe-0 ps-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 13.62 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-3.jpg" alt="product" /></a>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Honda Amaze 2021</a></h4>
										</div>
										<div class="col-md-4 pe-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 6.32 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-block">
								<div class="img-box">
									<a href="#"><img src="<?php echo CATALOG; ?>images/product-1.jpg" alt="product" /></a>
								</div>
								<div class="product-info">
									<div class="row">
										<div class="col-md-8">
											<h4><a href="#">Hyundai i20 N Line</a></h4>
										</div>
										<div class="col-md-4 pe-0">
											<span class="rating">
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star fill"></i>
												<i class="las la-star"></i>
											</span>
										</div>
									</div>
									<div class="row mt-3 align-items-center">
										<div class="col-md-7">
											<div class="product-price">
												<h5>(Ex-Showroom price)</h5>
												<div class="price">₹ 9.50 Lakhs <span>onwards</span></div>
											</div>
										</div>
										<div class="col-md-5 pe-0 ps-0">
											<a href="#" class="theme-btn full outline"><span>View Offers <i class="las la-angle-right"></i></span></a>
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

<section class="section-space">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Popular Brands</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="brand-slider arrow-btn owl-carousel">
						<div class="single-brand">
							<div>
								<img src="<?php echo CATALOG; ?>images/maruti-suzuki-logo.png" alt="brand-logo" />
								<h5>Maruti Suzuki</h5>
							</div>
						</div>
						<div class="single-brand">
							<div>
								<img src="<?php echo CATALOG; ?>images/kia.jpg" alt="brand-logo" />
								<h5>KIA</h5>
							</div>
						</div>
						<div class="single-brand">
							<div>
								<img src="<?php echo CATALOG; ?>images/bmw.jpg" alt="brand-logo" />
								<h5>BMW</h5>
							</div>
						</div>
						<div class="single-brand">
							<div>
								<img src="<?php echo CATALOG; ?>images/honda.jpg" alt="brand-logo" />
								<h5>Honda</h5>
							</div>
						</div>
						<div class="single-brand">
							<div>
								<img src="<?php echo CATALOG; ?>images/mg.jpg" alt="brand-logo" />
								<h5>MG</h5>
							</div>
						</div>
						<div class="single-brand">
							<div>
								<img src="<?php echo CATALOG; ?>images/ford.jpg" alt="brand-logo" />
								<h5>Ford</h5>
							</div>
						</div>
						<div class="single-brand">
							<div>
								<img src="<?php echo CATALOG; ?>images/maruti-suzuki-logo.png" alt="brand-logo" />
								<h5>Maruti Suzuki</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center mt-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
					<a href="#" class="theme-btn"><span>View All <i class="las la-angle-right"></i></span></a>
				</div>
			</div>
		</div>	
	</div>
</section>

<section class="section-space mt-5 pt-0 section-bg white-half-bg position-relative" style="background-image:url(<?php echo CATALOG; ?>images/how-it-work-bg.jpg);">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-6 position-relative">
					<div class="title">
						<h2>How It Works</h2>
					</div>
					<div class="how-it-work-slider owl-carousel">
						<div class="process-block">
							<div class="process-num text-bg-ani" style="background-image:url(<?php echo CATALOG; ?>images/how-it-work-bg.jpg);">
								<h2>1</h2>
							</div>
							<div class="process-info">
								<h4>Take a test drive at your Home or at our Hub</h4>
								<p>Sanitised cars for every test drive. Executives trained for COVID protection.</p>
								<a href="#" class="theme-btn"><span>Book a Test Drive <i class="las la-angle-right"></i></span></a>
							</div>
						</div>
						<div class="process-block">
							<div class="process-num text-bg-ani" style="background-image:url(<?php echo CATALOG; ?>images/how-it-work-bg.jpg);">
								<h2>2</h2>
							</div>
							<div class="process-info">
								<h4>Take a test drive at your Home or at our Hub</h4>
								<p>Sanitised cars for every test drive. Executives trained for COVID protection.</p>
								<a href="#" class="theme-btn"><span>Book a Test Drive <i class="las la-angle-right"></i></span></a>
							</div>
						</div>
						<div class="process-block">
							<div class="process-num text-bg-ani" style="background-image:url(<?php echo CATALOG; ?>images/how-it-work-bg.jpg);">
								<h2>3</h2>
							</div>
							<div class="process-info">
								<h4>Take a test drive at your Home or at our Hub</h4>
								<p>Sanitised cars for every test drive. Executives trained for COVID protection.</p>
								<a href="#" class="theme-btn"><span>Book a Test Drive <i class="las la-angle-right"></i></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-space mt-xl-5 mt-lg-5 mt-md-0 overflow-hidden">
	<div class="container-fluid">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title big">
						<h4>2021</h4>
						<h2><b>Electric</b> Revolution</h2>
						<p>The global EV market grew 43% annually on average over the last five years, and   the  worldwide  automobile  market  penetration  rate of  EVs  stood at about 2.6% in 2020.</p>
						<a href="#" class="theme-btn mt-4"  data-aos="fade-right" data-aos-delay="100" data-aos-duration="600"><span>Explore Electric Cars <i class="las la-angle-right"></i></span></a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content-image" data-aos="fade-left" data-aos-duration="600">
						<img src="<?php echo CATALOG; ?>images/how-it-work.jpg" alt="image" />
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>

<section class="section-space">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Cars by Lifestyle</h2>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="lifestyle-block" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
						<a href="#">
							<img src="<?php echo CATALOG; ?>images/lifestyle-image.jpg" alt="lifestyle" />
							<div class="text">
								<h4>Family</h4>
								<p>Take everyone along</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="lifestyle-block" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
						<a href="#">
							<img src="<?php echo CATALOG; ?>images/lifestyle-image2.jpg" alt="lifestyle" />
							<div class="text">
								<h4>Adventure</h4>
								<p>Take everyone along</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="lifestyle-block" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">
						<a href="#">
							<img src="<?php echo CATALOG; ?>images/lifestyle-image3.jpg" alt="lifestyle" />
							<div class="text">
								<h4>Value</h4>
								<p>Easy economics value</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="lifestyle-block" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
						<a href="#">
							<img src="<?php echo CATALOG; ?>images/lifestyle-image4.jpg" alt="lifestyle" />
							<div class="text">
								<h4>Commuter</h4>
								<p>Your daily companion</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="lifestyle-block" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
						<a href="#">
							<img src="<?php echo CATALOG; ?>images/lifestyle-image5.jpg" alt="lifestyle" />
							<div class="text">
								<h4>Luxury</h4>
								<p>Announce your arrival</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="lifestyle-block" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">
						<a href="#">
							<img src="<?php echo CATALOG; ?>images/lifestyle-image6.jpg" alt="lifestyle" />
							<div class="text">
								<h4>Feature Packed</h4>
								<p>Everything you need</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-space">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Match Your Choice</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="tab-panel mb-4">
						<button type="button" class="tab-btn active" data="match-choice" data-tab="body-type">Body Type</button>
						<button type="button" class="tab-btn" data="match-choice" data-tab="budget">Budget</button>
						<button type="button" class="tab-btn" data="match-choice" data-tab="fule-type">Fuel Type</button>
						<button type="button" class="tab-btn" data="match-choice" data-tab="seating-capacity">Seating Capacity</button>
					</div>
				</div>
				<div class="col-md-12">
					<div class="tab-content show"  data="match-choice" data-tab="body-type">
						<div class="choices-section">
							<div class="row">
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<img src="<?php echo CATALOG; ?>images/sedan-icon.png" alt="car" />
											<h5>Sedan</h5>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<img src="<?php echo CATALOG; ?>images/hatch-icon.png" alt="car" />
											<h5>Hatchback</h5>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<img src="<?php echo CATALOG; ?>images/suv-icon.png" alt="car" />
											<h5>SUV</h5>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<img src="<?php echo CATALOG; ?>images/convertible.png" alt="car" />
											<h5>Convertible</h5>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<img src="<?php echo CATALOG; ?>images/muv-icon.png" alt="car" />
											<h5>MUV</h5>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<img src="<?php echo CATALOG; ?>images/minivan-icon.png" alt="car" />
											<h5>Minivan</h5>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<img src="<?php echo CATALOG; ?>images/couple-icon.png" alt="car" />
											<h5>Coupe</h5>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<img src="<?php echo CATALOG; ?>images/pickup-icon.png" alt="car" />
											<h5>Pickup</h5>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content"  data="match-choice" data-tab="budget">
						<div class="choices-section">
							<div class="row">
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">5 - 10 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">5 - 10 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">8 - 10 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">10 - 12 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">12 - 15 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">15 - 20 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">20 - 25 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">25 - 30 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">30 - 35 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">35 - 40 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">40 - 50 Lakh</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">Above 50 Lakh</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content"  data="match-choice" data-tab="fule-type">
						<div class="choices-section">
							<div class="d-flex flex-wrap align-items-center justify-content-xl-between">
								<div class="single-choice">
									<a href="#">
										<span class="icon-link">
											<img src="<?php echo CATALOG; ?>images/diesel.png" alt="icon" />Diesel<i class="las la-angle-right"></i>
										</span>
									</a>
								</div>
								<div class="single-choice">
									<a href="#">
										<span class="icon-link">
											<img src="<?php echo CATALOG; ?>images/petrol.png" alt="icon" />Petrol<i class="las la-angle-right"></i>
										</span>
									</a>
								</div>
								<div class="single-choice">
									<a href="#">
										<span class="icon-link">
											<img src="<?php echo CATALOG; ?>images/cng.png" alt="icon" />CNG<i class="las la-angle-right"></i>
										</span>
									</a>
								</div>
								<div class="single-choice">
									<a href="#">
										<span class="icon-link">
											<img src="<?php echo CATALOG; ?>images/cng-petrol.png" alt="icon" />CNG + Petrol<i class="las la-angle-right"></i>
										</span>
									</a>
								</div>
								<div class="single-choice">
									<a href="#">
										<span class="icon-link">
											<img src="<?php echo CATALOG; ?>images/electric.png" alt="icon" />Electric<i class="las la-angle-right"></i>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content"  data="match-choice" data-tab="seating-capacity">
						<div class="choices-section">
							<div class="row justify-content-xl-center">
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">2 Seater</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">5 Seater</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">6 Seater</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">7 Seater</span>
										</a>
									</div>
								</div>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6">
									<div class="single-choice">
										<a href="#">
											<span class="tab-pill">8 Seater</span>
										</a>
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

<section class="section-space">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>News & Events</h2>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 p-0">
					<div class="product-block news" data-aos="fade-up" data-aos-duration="700" data-aos-delay="100">
						<div class="img-box">
							<a href="#"><img src="<?php echo CATALOG; ?>images/news-image.jpg" alt="news-image" /></a>
						</div>
						<div class="product-info">
							<h4><a href="#">How ADA Automobile is re- defining the pre-owned car market</a></h4>
							<a href="#">Read More <i class="las la-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 p-0">
					<div class="product-block news" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
						<div class="img-box">
							<a href="#"><img src="<?php echo CATALOG; ?>images/news-image2.jpg" alt="news-image" /></a>
						</div>
						<div class="product-info">
							<h4><a href="#">How ADA Automobile is re- defining the pre-owned car market</a></h4>
							<a href="#">Read More <i class="las la-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 p-0">
					<div class="product-block news" data-aos="fade-up" data-aos-duration="700" data-aos-delay="300">
						<div class="img-box">
							<a href="#"><img src="<?php echo CATALOG; ?>images/news-image3.jpg" alt="news-image" /></a>
						</div>
						<div class="product-info">
							<h4><a href="#">How ADA Automobile is re- defining the pre-owned car market</a></h4>
							<a href="#">Read More <i class="las la-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 p-0">
					<div class="product-block news" data-aos="fade-up" data-aos-duration="700" data-aos-delay="400">
						<div class="img-box">
							<a href="#"><img src="<?php echo CATALOG; ?>images/news-image4.jpg" alt="news-image" /></a>
						</div>
						<div class="product-info">
							<h4><a href="#">How ADA Automobile is re- defining the pre-owned car market</a></h4>
							<a href="#">Read More <i class="las la-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center">
					<a href="#" class="theme-btn mt-4"><span>View All <i class="las la-angle-right"></i></span></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-space">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-sm-6">
					<div class="grey-img-box mt-lg-0 mt-sm-0 mt-3" data-aos="fade-down" data-aos-duration="600">
						<h4>Check On Road Price in Your City</h4>
						<a href="#" class="theme-btn mt-4"><span>Check Now <i class="las la-angle-right"></i></span></a>
						<img src="<?php echo CATALOG; ?>images/road-price.png" alt="icon" />
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="grey-img-box mt-lg-0 mt-sm-0 mt-3" data-aos="fade-up" data-aos-duration="600">
						<h4>Sell Your Car Instantly</h4>
						<a href="#" class="theme-btn mt-4"><span>Sell Now <i class="las la-angle-right"></i></span></a>
						<img src="<?php echo CATALOG; ?>images/sell-icon.png" alt="icon" />
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mt-lg-0 mt-sm-3 mt-3">
					<div class="grey-img-box" data-aos="fade-down" data-aos-duration="600">
						<h4>Get Help from Our Experts</h4>
						<a href="#" class="theme-btn mt-4"><span>Contact Us <i class="las la-angle-right"></i></span></a>
						<img src="<?php echo CATALOG; ?>images/contact-us-icon.png" alt="icon" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-space">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Frequently Asked Questions</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="faq-section">
						<div class="single-faq show">
							<div class="faq-head">
								<h5><span>Q.</span> How do I make a booking for my chosen car?</h5>
							</div>
							<div class="faq-content" style="display:block;">
								<p>You can book a car of your liking for up to 5 days by putting a refundable deposit of Rs. 10,000/- on it. If you complete the purchase of the vehicle within the holding period, the deposit will be applied towards the purchase otherwise the booking amount will be  refunded back to you and the booking cancelled.</p>
							</div>
						</div>
						<div class="single-faq">
							<div class="faq-head">
								<h5><span>Q.</span> How do I make a booking for my chosen car?</h5>
							</div>
							<div class="faq-content">
								<p>You can book a car of your liking for up to 5 days by putting a refundable deposit of Rs. 10,000/- on it. If you complete the purchase of the vehicle within the holding period, the deposit will be applied towards the purchase otherwise the booking amount will be  refunded back to you and the booking cancelled.</p>
							</div>
						</div>
						<div class="single-faq">
							<div class="faq-head">
								<h5><span>Q.</span> Will ADA Automobile help me in arranging for finance?</h5>
							</div>
							<div class="faq-content">
								<p>You can book a car of your liking for up to 5 days by putting a refundable deposit of Rs. 10,000/- on it. If you complete the purchase of the vehicle within the holding period, the deposit will be applied towards the purchase otherwise the booking amount will be  refunded back to you and the booking cancelled.</p>
							</div>
						</div>
						<div class="single-faq">
							<div class="faq-head">
								<h5><span>Q.</span> How can I avail the money back guarantee?</h5>
							</div>
							<div class="faq-content">
								<p>You can book a car of your liking for up to 5 days by putting a refundable deposit of Rs. 10,000/- on it. If you complete the purchase of the vehicle within the holding period, the deposit will be applied towards the purchase otherwise the booking amount will be  refunded back to you and the booking cancelled.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center">
					<a href="#" class="theme-btn mt-5"><span>Contact Us <i class="las la-angle-right"></i><span></a>
				</div>
			</div>
		</div>
	</div>
</section>


<?php $this->endSection(); ?>