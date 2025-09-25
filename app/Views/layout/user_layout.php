<?php
use App\Models\CommonModel;
use App\Models\CartModel;
$this->AdminModel = new CommonModel();
$cartModel = new CartModel();
 if (!empty(session()->get('userDetail'))){
	 $user = $this->AdminModel->fs('user',array('id'=>session()->get('user_id')));
  }	
  
$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
foreach ($setting as $key => $value) {
$wconfig[$value->key] = $value->value;
}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $meta_title; ?></title>
<link rel="icon" type="image/x-icon" href="<?php echo base_url($wconfig['config_favicon']); ?>">
<base href="<?php echo base_url(); ?>/" id="base" data-base="<?php echo base_url(); ?>/">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<?php if (!empty($meta_description)): ?>
<meta name="description" content="<?php echo $meta_description; ?>">	
<?php endif ?>
<?php if (!empty($meta_keyword)): ?>
<meta name="keywords" content="<?php echo $meta_keyword; ?>">
<?php endif ?>
<meta name="author" content="Smart parts exports">
<meta name="p:domain_verify" content="ff55db63285c2aceeef95ba6aa900fbb"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo $this->include('frontend/includes/topCss'); ?>

</head>
<body>

<?php echo $this->include('frontend/includes/header'); ?>

<?php
 if (!empty(session()->get('userDetail'))){
	 $user = $this->AdminModel->fs('user',array('id'=>session()->get('user_id')));
  }						   
?>

<section class="dashboard-space dashboard-bg pt-4">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="dashboard-section">
						<div class="row">
							<div class="col-md-12">
								<div class="dashboard-strip">
									<h2>Hi, <?php echo ucwords($user->first_name.' '.$user->last_name);?></h2>
									<span class="sidebar-toggle-btn"><i class="fa fa-bars"></i></span>
								</div>
							</div>
							<div class="col-md-3">
								<?php echo $this->include('user/sidebar'); ?>
							</div>
							

                           <?= $this->renderSection('page'); ?>

                     	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php echo $this->include('frontend/includes/footer'); ?>

<?= $this->renderSection('javascript'); ?>


</body>
</html>