<?php 
$this->extend('layout/user_layout');
$this->section('page');
 ?>
<div class="col-lg-9 col-sm-12">
	<div class="dashboard-block">
		<div class="dashboard-head">
			<h5>Cashback</h5>
		</div>
		<div class="dashboard-body">
			<div class="dashbaord-table">
				<div class="dashbaord-table-head">
					<div class="row">
						<div class="col-md-5">
							<h5>Vehicle</h5>	
						</div>
						<div class="col-md-3">
							<h5>Date</h5>
						</div>
						<div class="col-md-2">
							<h5>Cashback</h5>
						</div>
						<div class="col-md-2">
							<h5>Status</h5>
						</div>
					</div>
				</div>
				<div class="dashbaord-table-body">
					<div class="dashbaord-table-data">
						<div class="row align-items-center">
							<div class="col-md-5">
								<p>Maruti Ciaz Zxi(Petrol)</p>
							</div>
							<div class="col-md-3">
								<p>13/10/2021</p>
							</div>
							<div class="col-md-2">
								<p><b>₹ 10,000</b></p>
							</div>
							<div class="col-md-2">
								<p class="pending-status"><i class="las la-history"></i> Pending</p>
							</div>
						</div>
					</div>
					<div class="dashbaord-table-data">
						<div class="row align-items-center">
							<div class="col-md-5">
								<p>Maruti Ciaz Zxi(Petrol)</p>
							</div>
							<div class="col-md-3">
								<p>13/10/2021</p>
							</div>
							<div class="col-md-2">
								<p><b>₹ 10,000</b></p>
							</div>
							<div class="col-md-2">
								<p class="success-status"><i class="las la-check"></i> Validated</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dashboard-mobile-table">
    		    <div class="table-row">
    		        <div class="row">
    		            <div class="col-sm-4 col-4">
    		                <h5>Vehicle</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p>Maruti Ciaz Zxi(Petrol)</p>
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
    		                <h5>Cashback</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p><b>₹ 10,000</b></p>
    		            </div>
    		        </div>
    		        <div class="row">
    		            <div class="col-sm-4 col-4">
    		                <h5>Status</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p class="success-status"><i class="las la-check"></i> Validated</p>
    		            </div>
    		        </div>
    		    </div>
    		    <div class="table-row">
    		        <div class="row">
    		            <div class="col-sm-4 col-4">
    		                <h5>Vehicle</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p>Maruti Ciaz Zxi(Petrol)</p>
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
    		                <h5>Cashback</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p><b>₹ 10,000</b></p>
    		            </div>
    		        </div>
    		        <div class="row">
    		            <div class="col-sm-4 col-4">
    		                <h5>Status</h5>
    		            </div>
    		            <div class="col-sm-8 col-8">
    		                <p class="pending-status"><i class="las la-history"></i> Pending</p>
    		            </div>
    		        </div>
    		    </div>
		    </div>
		    
			
			<hr/>
			<p>Confirm your cashback by uploading your documents</p>
			<label class="theme-btn" id="upload-document-btn" for="upload-document"><span>Upload Documents</span></label>
			<input type="file" id="upload-document" accept=".pdf,.jpg,.jpeg" class="d-none">
			<div class="upload-doc-row">
				<div class="upload-doc-row-section"></div>
				<div class="col-md-12">
					<div class="row">
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
							<div class="input-box fill mt-0">
								<button type="button" class="theme-btn full"><span>Save</span></button>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
							<div class="input-box fill mt-0">
								<label class="theme-btn" for="upload-document"><span>+ Add More</span></labrl>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="upload-doc-row">
				<div class="document-row">
					<div class="row align-items-center">
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-4 col-6">
							<div class="upload-thumb">
								<img src="assets/images/document-thumb.jpg" alt="thumb" />
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-8 col-6">
							<div class="upload-actions">
								<ul>
									<li><a href="#" class="view-doc"><i class="las la-search-plus rotate-y-180"></i> View</a></li>
									<li><span class="success-status"><i class="las la-check"></i> Uploaded succesfully</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="document-row">
					<div class="row align-items-center">
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-4 col-6">
							<div class="upload-thumb">
								<img src="assets/images/document-thumb.jpg" alt="thumb" />
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-8 col-6">
							<div class="upload-actions">
								<ul>
									<li><a href="#" class="view-doc"><i class="las la-search-plus rotate-y-180"></i> View</a></li>
									<li><span class="success-status"><i class="las la-check"></i> Uploaded succesfully</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
							<div class="input-box fill mt-0">
								<button type="button" class="theme-btn full"><span>Edit</span></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

											
<?php $this->endSection();?>

<?php $this->section('javascript');?>
<script>
var imgInp = document.getElementById("upload-document");
//var blah = document.getElementById("blah");
imgInp.onchange = evt => {
const [file] = imgInp.files
$("#upload-document-btn").hide();
$(".upload-doc-row").show();
if (file) {
var img_url = URL.createObjectURL(file);
var upload_row = `<div class="document-row">
					<div class="row align-items-center">
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-4 col-6">
							<div class="upload-thumb">
								<img src="${img_url}" alt="thumb" />
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-8 col-6">
							<div class="upload-actions">
								<ul>
									<li><a href="#" class="view-doc"><i class="las la-search-plus rotate-y-180"></i> View</a></li>
									<li><a href="#"><i class="las la-trash-alt"></i> Delete</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>`;
$(".upload-doc-row-section").append(upload_row);
}
}
</script>
<?php $this->endSection();?>