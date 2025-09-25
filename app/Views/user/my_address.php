<?php 
$this->extend('layout/user_layout');
$this->section('page');
?>

<style type="text/css">	
.addDelete{
	float: right;
    cursor: pointer;
}

</style>
<div class="col-lg-9 col-sm-12">
<div class="dashboard-block">
	<div class="dashboard-head">
		<h5><?php echo $page_title; ?></h5>
	</div>
	<div class="dashboard-body">
	    
	    
	 <?php if ($success = session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong><?php echo $success; ?></strong> </a>
    </div>
    <?php endif ?>

    <?php if ($error = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong><?php echo $error; ?></strong> </a>
    </div>
    <?php endif ?>
    
		    <div class="row">
		        <?php if (!empty($list)) { $i=1; foreach ($list as $key => $value) {?>
		        <div class="col-lg-6 col-sm-12">
		            <div class="address_block">
						<div class="row">
							<div class="col-md-12 "> <span class="addDelete" onclick="return confirm('Are you sure to delete address?') && remove_address('<?php echo $value->id; ?>');"><i  class="fa fa-trash"></i></span>
								<h5>Address <?php echo $i++; ?></h5>
							</div>
							<div class="col-md-12">
							    <label>Name</label>
							    <p><?php echo $value->firstname.' '.$value->lastname; ?></p>
							</div>
							<div class="col-md-12">
								<label>Email</label>
								<p><?php echo $value->email; ?></p>
							</div>
							<div class="col-md-12">
								<label>Phone</label>
								<p><?php echo $value->phone; ?></p>
							</div>
							<div class="col-md-12">
								<label>Address</label>
								<p><?php echo $value->address1; ?></p>
							</div>
							<div class="col-md-5">
								<label>City</label>
								<p><?php echo $value->city; ?></p>
							</div>
							<div class="col-md-12">
								<label>Zip Postal Code</label>
								<p><?php echo $value->pincode; ?></p>
							</div>
							<div class="col-md-12">
								<a href="<?php echo base_url('user/add_address/'.$value->id); ?>" class="theme-btn sml edit_address"><span>Edit Address</span></a>
							</div>
						</div>
					</div>
		        </div>
		        <?php } } ?>
		        <div class="col-md-12 mt-3">
		            <a href="<?php echo base_url('user/add_address'); ?>" class="theme-btn sml">Add New Address</a>
		        </div>
		    </div>
			<!--<table class="table">
				<tr>
					<td>S.No</td>
					<td>Name</td>
					<td>Email</td>
					<td>Phone</td>
					<td>Address</td>
					<td>City</td>
					<td>Postcode</td>
					
					<td>Action</td>
				</tr>

				<?php if (!empty($list)) { $i=1; foreach ($list as $key => $value) {?>
				
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $value->firstname.' '.$value->lastname; ?></td>
					<td><?php echo $value->email; ?></td>
					<td><?php echo $value->phone; ?></td>
					<td><?php echo $value->address1; ?></td>
					<td><?php echo $value->city; ?></td>
					<td><?php echo $value->pincode; ?></td>
				
					<td><button class="btn">Edit</button></td>
				</tr>
			<?php } } ?>-->

			</table>
		

		
	
		  
		</div>
	</div>
	</div>
	</div>

<script type="text/javascript">
	
	function remove_address(id){
		if (id) {
			$.ajax({
				url:"<?php echo base_url('delete_user_address') ?>",
				type:"POST",
				data:{id:id},
				success:function(data){
					if(data){
					    toastr.success('Address Delete Successfully !');
					    setInterval(function(){location.reload()},2000);
					    
					}
				}
			});
		}
	}
</script>
			
<?php $this->endSection();?>