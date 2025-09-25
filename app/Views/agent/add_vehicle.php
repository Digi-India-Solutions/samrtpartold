<?php 
$this->extend('layout/agent_layout');
$this->section('page');
?>
				<div class="col-md-9">
					<div class="dashboard-block">
						<div class="dashboard-head">
							<h5>Add New Vehicle</h5>
						</div>
						<div class="dashboard-body">
							<h5 class="mt-2"><b>Sell Your Vehicle at Best Price</b></h5>
							<p>Fill the details below about your vehicle and get the approval for best price</p>
							<form class="mt-5" method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Your Name</label>
											<input type="text" required="" name="seller_name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Phone</label>
											<input type="tel" required="" name="seller_phone">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Email</label>
											<input type="email" required="" name="seller_email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Vehicle Ownership</label>
											<select class="select2" name="vehicle_ownership">
											<option value>Select</option>
											<?php foreach ($vehicle_owner_list as $key => $value): ?>
											 <option <?php echo $value->id; ?>><?php echo $value->name; ?></option>	
											<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Brand</label>
											<select class="select2" name="brand">
											<option value>Select</option>
											<?php foreach ($brand_list as $key => $value): ?>
											<option <?php echo $value->id; ?>><?php echo $value->name; ?></option>	
											<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Model</label>
											<select class="select2" name="model">
												<option value=""> Select</option>
												
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Vehicle Number</label>
											<input type="text" required="" name="vehicle_no">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Registration year</label>
											<select class="select2" name="reg_year">
											<option value>Select</option>
											<?php foreach ($years_list as $key => $value): ?>
											<option <?php echo $value->id; ?>><?php echo $value->name; ?></option>	
											<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Name on the RC</label>
											<input type="text" required="" name="name_on_rc">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Registered State</label>
											<input type="text" required="" name="reg_state">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Kilometers Driven</label>
											<input type="text" placeholder="Eg.10000 KM" required="" name="km_drive">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Fuel Type</label>
											<select class="select2" name="fuel_type">
											<option value>Select</option>
											<?php foreach ($fuel_type_list as $key => $value): ?>
											<option <?php echo $value->id; ?>><?php echo $value->name; ?></option>	
											<?php endforeach ?>
											</select>
											
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Service Record</label>
											<select class="select2" name="service_record">
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-box fill white mt-0">
											<label>Insurance</label>
											<select class="select2" name="insurance">
											<option value>Select</option>
											<?php foreach ($insurance_list as $key => $value): ?>
											<option <?php echo $value->id; ?>><?php echo $value->name; ?></option>	
											<?php endforeach ?>
											
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box fill white mt-0 mb-0">
											<label>Upload Images (max 10 images)</label>
											<div class="car-gallery">
												<div class="single-car-image add-new-image">
													<label>
														<span><i class="las la-plus"></i> Upload</span>
														<input type="file" id="new-car-image" accept=".png,.jpg,.jpeg" name="images[]">
													</label>
												</div>	
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-box checkbox mb-4 mt-3">
											<label><input type="checkbox" name="rember">I agree to all the <a href="terms-conditions.php" target="_blank">terms and conditions</a></label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-box checkbox mt-0 mb-4">
											<button type="submit" class="theme-btn full big"><span>Submit</span></button>
										</div>
									</div>
								</div>
							</form>
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

<?php $this->section('javascript');?>
<script>
var car_input_image = document.getElementById("new-car-image");
car_input_image.onchange = evt => {
const [file] = car_input_image.files;
const gallery_img_value = car_input_image.value;
var total_image = $(".gallery-car-thumb").length;
if (file && total_image < 10) {
var img_url = URL.createObjectURL(file);
var new_gallery_thumb = `<div class="single-car-image gallery-car-thumb">
		<div class="car-image">
			<img src="${img_url}" alt="car-image" />
		</div>
		<span class="action-btn">
			<a href="${img_url}" data-lightbox="image-1" ><i class="las la-search-plus"></i></a>
			<a href="javascript:void(0)" class="delete-item delete-car-image"><i class="las la-trash-alt"></i></a>
		</span>
		<input type="hidden" value="${gallery_img_value}" name="images[]" />
	</div>`;
$(".car-gallery").prepend(new_gallery_thumb);
}else{
alert("Max 10 Images");
}
}

$(".car-gallery").on( "click", ".delete-car-image", function() {
$(this).parents(".single-car-image").remove();
});
</script>
<?php $this->endSection();?>