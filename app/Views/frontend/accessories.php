<?php 
$this->extend('layout/master');
$this->section('page');
 ?>

<section class="common-banner curve-bg overflow-hidden">
	<div class="container-fluid mt-md-5 mt-0 pt-md-5 pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-7 col-12">
					<div class="banner-content">
						<div data-aos="fade-down" data-aos-duration="600">
							<h1>Find Your Vehicle Accessories</h1>
						</div>
						<form method="post" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
							<div class="select-vehicle-type">
								<label for="four-wheeler" class="active tab-btn" data="acc-wheel"><input type="radio" name="acc-wheel" checked="" id="four-wheeler">Four Wheeler</label>
								<label for="two-wheeler" class="tab-btn" data="acc-wheel"><input type="radio" name="acc-wheel" id="two-wheeler">Two Wheeler</label>
							</div>
							<div class="input-box checkbox">
								<label for="by-accessory" class="active tab-btn" data="by-acc"><input type="radio" name="by-acc" checked="" id="by-accessory">By Accessory</label>
								<label for="by-model" class="tab-btn" data="by-acc"><input type="radio" name="by-acc" id="by-model">By Model</label>
							</div>
							<div class="input-box shadow search">
								<input type="search" name="search" autocomplete="off" placeholder="Search for accessories.." required="">
								<button type="submit"><i class="las la-search rotate-y-180"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6 offset-lg-1 col-md-5 col-10 mx-auto">
					<div class="banner-image" data-aos="fade-left" data-aos-duration="600" data-aos-delay="500">
						<img src="<?php echo CATALOG; ?>images/accessories-image.png" alt="banner-image" />
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
					<div class="title mb-2">
						<h2>Popular Products</h2>
					</div>
				</div>
				<div class="col-md-12" data-aos="fade-up" data-aos-duration="600">
					<div class="recommended-slider arrow-btn owl-carousel">
						<div class="product-block">
							<div class="img-box">
								<a href="#"><img src="<?php echo CATALOG; ?>images/accessories1.jpg" alt="product" /></a>
							</div>
							<div class="product-info">
								<div class="row">
									<div class="col-md-12">
										<h4><a href="#">7D Car Matts Anti Skid</a></h4>
									</div>
								</div>
								<div class="row mt-3 align-items-center">
									<div class="col-md-12">
										<div class="product-price">
											<div class="price">₹ 1150</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="product-block">
							<div class="img-box">
								<a href="#"><img src="<?php echo CATALOG; ?>images/accessories2.jpg" alt="product" /></a>
							</div>
							<div class="product-info">
								<div class="row">
									<div class="col-md-12">
										<h4><a href="#">Steering Wheel Anti-skid Sleeve Cover</a></h4>
									</div>
								</div>
								<div class="row mt-3 align-items-center">
									<div class="col-md-12">
										<div class="product-price">
											<div class="price">₹ 950</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="product-block">
							<div class="img-box">
								<a href="#"><img src="<?php echo CATALOG; ?>images/accessories3.jpg" alt="product" /></a>
							</div>
							<div class="product-info">
								<div class="row">
									<div class="col-md-12">
										<h4><a href="#">Rear Diffuser</a></h4>
									</div>
								</div>
								<div class="row mt-3 align-items-center">
									<div class="col-md-12">
										<div class="product-price">
											<div class="price">₹ 950</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="product-block">
							<div class="img-box">
								<a href="#"><img src="<?php echo CATALOG; ?>images/accessories1.jpg" alt="product" /></a>
							</div>
							<div class="product-info">
								<div class="row">
									<div class="col-md-12">
										<h4><a href="#">7D Car Matts Anti Skid</a></h4>
									</div>
								</div>
								<div class="row mt-3 align-items-center">
									<div class="col-md-12">
										<div class="product-price">
											<div class="price">₹ 1150</div>
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

<section class="section-space pt-0">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Four Wheeler Accessories</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="tab-panel mb-3">
						<button type="button" class="tab-btn active" data="four-wheeler-accessories" data-tab="interior">Interior</button>
						<button type="button" class="tab-btn" data="four-wheeler-accessories" data-tab="exterior">Exterior</button>
						<button type="button" class="tab-btn" data="four-wheeler-accessories" data-tab="car-parts">Car Parts</button>
						<button type="button" class="tab-btn" data="four-wheeler-accessories" data-tab="styling">Styling</button>
						<button type="button" class="tab-btn" data="four-wheeler-accessories" data-tab="lighting">Lighting</button>
						<button type="button" class="tab-btn" data="four-wheeler-accessories" data-tab="car-care">Car Care</button>
					</div>
				</div>
				<div class="col-md-12" data-aos="fade-up" data-aos-duration="600">
					<div class="tab-content show"  data="four-wheeler-accessories" data-tab="interior">
						<div class="accessory-sections">
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/seat.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/sunshades.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/floor-mattes.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/steering-cover.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/gear-knob.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/center-arm-rest.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/pedal-kit.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/mobile-holder.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
						</div>
						<div class="col-md-12 text-center mt-5">
							<a href="#" class="theme-btn"><span>View All <i class="las la-angle-right"></i></span></a>
						</div>
					</div>
					<div class="tab-content"  data="four-wheeler-accessories" data-tab="exterior">
						<div class="accessory-sections">
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/seat.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/sunshades.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/floor-mattes.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/steering-cover.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/gear-knob.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/center-arm-rest.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/pedal-kit.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/mobile-holder.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
						</div>
						<div class="col-md-12 text-center mt-5">
							<a href="#" class="theme-btn"><span>View All <i class="las la-angle-right"></i></span></a>
						</div>
					</div>
					<div class="tab-content"  data="four-wheeler-accessories" data-tab="car-parts">
						<div class="accessory-sections">
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/seat.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/sunshades.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/floor-mattes.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/steering-cover.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/gear-knob.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/center-arm-rest.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/pedal-kit.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/mobile-holder.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
						</div>
						<div class="col-md-12 text-center mt-5">
							<a href="#" class="theme-btn"><span>View All <i class="las la-angle-right"></i></span></a>
						</div>
					</div>
					<div class="tab-content"  data="four-wheeler-accessories" data-tab="styling">
						<div class="accessory-sections">
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/seat.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/sunshades.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/floor-mattes.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/steering-cover.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/gear-knob.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/center-arm-rest.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/pedal-kit.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/mobile-holder.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
						</div>
						<div class="col-md-12 text-center mt-5">
							<a href="#" class="theme-btn"><span>View All <i class="las la-angle-right"></i></span></a>
						</div>
					</div>
					<div class="tab-content"  data="four-wheeler-accessories" data-tab="lighting">
						<div class="accessory-sections">
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/seat.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/sunshades.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/floor-mattes.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/steering-cover.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/gear-knob.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/center-arm-rest.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/pedal-kit.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/mobile-holder.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
						</div>
						<div class="col-md-12 text-center mt-5">
							<a href="#" class="theme-btn"><span>View All <i class="las la-angle-right"></i></span></a>
						</div>
					</div>
					<div class="tab-content"  data="four-wheeler-accessories" data-tab="car-care">
						<div class="accessory-sections">
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/seat.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/sunshades.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/floor-mattes.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/steering-cover.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/gear-knob.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/center-arm-rest.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/pedal-kit.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/mobile-holder.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
						</div>
						<div class="col-md-12 text-center mt-5">
							<a href="#" class="theme-btn"><span>View All <i class="las la-angle-right"></i></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-space pt-0">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Two Wheeler Accessories</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="tab-panel mb-3">
						<button type="button" class="tab-btn active" data="two-wheeler-accessories" data-tab="aftermarket">Aftermarket</button>
						<button type="button" class="tab-btn" data="two-wheeler-accessories" data-tab="bike-parts">Bike Parts</button>
					</div>
				</div>
				<div class="col-md-12" data-aos="fade-up" data-aos-duration="600">
					<div class="tab-content show"  data="two-wheeler-accessories" data-tab="aftermarket">
						<div class="accessory-sections">
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/body-cover.jpg" alt="accessory" />
									<h5>Body Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/seat-cover.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/disc-lock.jpg" alt="accessory" />
									<h5>Disc Locks</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/mobile-holder3.jpg" alt="accessory" />
									<h5>Mobile Holder</h5>
								</a>
							</div>
						</div>
						<div class="col-md-12 text-center mt-5">
							<a href="#" class="theme-btn"><span>View All <i class="las la-angle-right"></i></span></a>
						</div>
					</div>
					<div class="tab-content"  data="two-wheeler-accessories" data-tab="bike-parts">
						<div class="accessory-sections">
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/body-cover.jpg" alt="accessory" />
									<h5>Body Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/seat-cover.jpg" alt="accessory" />
									<h5>Seat Covers</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/disc-lock.jpg" alt="accessory" />
									<h5>Disc Locks</h5>
								</a>
							</div>
							<div class="accessory-box">
								<a href="#">
									<img src="<?php echo CATALOG; ?>images/mobile-holder3.jpg" alt="accessory" />
									<h5>Mobile Holder</h5>
								</a>
							</div>
						</div>
						<div class="col-md-12 text-center mt-5">
							<a href="#" class="theme-btn"><span>View All <i class="las la-angle-right"></i></span></a>
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
						<h2>Search by Brand</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="tab-panel mb-3">
						<button type="button" class="tab-btn active" data="brand" data-tab="four-wheeler">Four Wheeler</button>
						<button type="button" class="tab-btn" data="brand" data-tab="two-wheeler">Two Wheeler</button>
					</div>
				</div>
				<div class="col-md-12">
					<div class="tab-content show"  data="brand" data-tab="four-wheeler">
						<div class="brand-slider arrow-btn owl-carousel">
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/maruti-suzuki-logo.png" alt="brand-logo" />
									<h5>Maruti Suzuki</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/kia.jpg" alt="brand-logo" />
									<h5>KIA</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/bmw.jpg" alt="brand-logo" />
									<h5>BMW</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/honda.jpg" alt="brand-logo" />
									<h5>Honda</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/mg.jpg" alt="brand-logo" />
									<h5>MG</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/ford.jpg" alt="brand-logo" />
									<h5>Ford</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/maruti-suzuki-logo.png" alt="brand-logo" />
									<h5>Maruti Suzuki</h5>
								</a></div>
							</div>
						</div>
					</div>
					<div class="tab-content"  data="brand" data-tab="two-wheeler">
						<div class="brand-slider arrow-btn owl-carousel">
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/maruti-suzuki-logo.png" alt="brand-logo" />
									<h5>Maruti Suzuki</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/kia.jpg" alt="brand-logo" />
									<h5>KIA</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/bmw.jpg" alt="brand-logo" />
									<h5>BMW</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/honda.jpg" alt="brand-logo" />
									<h5>Honda</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/mg.jpg" alt="brand-logo" />
									<h5>MG</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/ford.jpg" alt="brand-logo" />
									<h5>Ford</h5>
								</a></div>
							</div>
							<div class="single-brand">
								<div><a href="#">
									<img src="<?php echo CATALOG; ?>images/maruti-suzuki-logo.png" alt="brand-logo" />
									<h5>Maruti Suzuki</h5>
								</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</section>

<section class="section-space section-bg dark-bg" style="background-image:url(<?php echo CATALOG; ?>images/light-greybg.jpg);">
	<div class="container-fluid">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-5 text-center position-relative">
					<div class="title mb-3">
						<h2>Exclusive<br>Combo Offer</h2>
						<p>Organizers  | car care Products | CAR ALLOYS  </p>
					</div>
					<p class="red-tag m-0">10% OFF ON EVERY ACCESSORIES<br>INCLUDED in combo</p>
				</div>
				<div class="col-md-7">
					<div class="section-image">
						<img src="<?php echo CATALOG; ?>images/accessories-collection.png" alt="accessories" />
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
						<h2>Customer Review</h2>
					</div>
					<div class="customer-review-slider arrow-btn owl-carousel">
						<div class="single-review">
							<span class="quote-icon">
								<img src="<?php echo CATALOG; ?>images/quote-icon.png" alt="icon" />
							</span>
							<h5>Rahul Singh</h5>
							<p>Lorem Ipsum  is  simply  dummy text  of  the printing   and   typesetting  industry.  Lorem Ipsum   has   been  the    industry's  standard dummy text   ever since  the 1500s, when an unknown  printer took  a galley of  type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
						</div>
						<div class="single-review">
							<span class="quote-icon">
								<img src="<?php echo CATALOG; ?>images/quote-icon.png" alt="icon" />
							</span>
							<h5>Rahul Singh</h5>
							<p>Lorem Ipsum  is  simply  dummy text  of  the printing   and   typesetting  industry.  Lorem Ipsum   has   been  the    industry's  standard dummy text   ever since  the 1500s, when an unknown  printer took  a galley of  type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
						</div>
						<div class="single-review">
							<span class="quote-icon">
								<img src="<?php echo CATALOG; ?>images/quote-icon.png" alt="icon" />
							</span>
							<h5>Rahul Singh</h5>
							<p>Lorem Ipsum  is  simply  dummy text  of  the printing   and   typesetting  industry.  Lorem Ipsum   has   been  the    industry's  standard dummy text   ever since  the 1500s, when an unknown  printer took  a galley of  type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
						</div>
						<div class="single-review">
							<span class="quote-icon">
								<img src="<?php echo CATALOG; ?>images/quote-icon.png" alt="icon" />
							</span>
							<h5>Rahul Singh</h5>
							<p>Lorem Ipsum  is  simply  dummy text  of  the printing   and   typesetting  industry.  Lorem Ipsum   has   been  the    industry's  standard dummy text   ever since  the 1500s, when an unknown  printer took  a galley of  type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-space grey-bg">
	<div class="container-fluid">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12">
					<div class="title text-center">
						<h2>Check Stock Avaibility</h2>
					</div>
					<form method="post">
						<div class="row">
							<div class="col-md-4 pe-md-4 pe-2">
								<div class="input-box underline">
									<label>First Name <span class="required">*</span></label>
									<input type="text" name="first_name" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-4 ps-md-4 pe-md-4 ps-2 pe-2">
								<div class="input-box underline">
									<label>Last Name <span class="required">*</span></label>
									<input type="text" name="last_name" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-4 ps-md-4 ps-2">
								<div class="input-box underline">
									<label>Phone <span class="required">*</span></label>
									<input type="tel" name="phone" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-4 pe-md-4 pe-2">
								<div class="input-box underline">
									<label>Email <span class="required">*</span></label>
									<input type="email" name="email" placeholder="Type Here" required />
								</div>
							</div>
							<div class="col-md-4 ps-md-4 pe-md-4 ps-2 pe-2">
								<div class="input-box underline">
									<label>Select Vehicle Type  <span class="required">*</span></label>
									<select class="select2" name="vehicle_type">
										<option value="" disabled selected>Select</option>
										<option>4 Vehicle</option>
										<option>2 Vehicle</option>
									</select>
								</div>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-4 pe-md-4 pe-2">
								<div class="input-box underline">
									<label>Select Brand</label>
									<select class="select2" name="vehicle_type">
										<option value="" disabled selected>Select</option>
										<option>Audi</option>
										<option>BMW</option>
									</select>
								</div>
							</div>
							<div class="col-md-4 ps-md-4 pe-md-4 ps-2 pe-2">
								<div class="input-box underline">
									<label>Model </label>
									<select class="select2" name="vehicle_type">
										<option value="" disabled selected>Select</option>
										<option>007</option>
										<option>008</option>
									</select>
								</div>
							</div>
							<div class="col-md-4 ps-md-4 ps-2">
								<div class="input-box underline">
									<label>Accessory</label>
									<select class="select2" name="vehicle_type">
										<option value="" disabled selected>Select</option>
										<option>Clutch Plates</option>
										<option>Brakes</option>
									</select>
								</div>
							</div>
							<div class="col-md-12 text-center">
								<button type="submit" class="theme-btn min-width"><span>Submit Request <i class="las la-angle-right"></i></span></button>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</div>
</section>

<?php $this->endSection(); ?>