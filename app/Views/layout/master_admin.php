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
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title><?php echo $page_title; ?></title>
<link rel="icon" type="image/x-icon" href="<?php echo base_url($wconfig['config_favicon']); ?>">
<base href="<?php echo base_url(); ?>/">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="<?php echo $wconfig['config_name'];?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php echo $this->include('admin/header'); ?>

<?php echo $this->renderSection('page'); ?>

<?php echo $this->include('admin/footer'); ?>

<?php echo  $this->renderSection('javascript'); ?>

</body>
</html>