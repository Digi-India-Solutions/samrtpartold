<?php
$this->uri = service('uri');
?>

<div class="dashbaord-sidebar">
	<ul>
		<li><a href="<?php echo base_url('user/dashboard'); ?>" class="<?php echo $this->uri->getSegment(2)=='dashboard'?'active':''; ?>"><i class="las la-user-circle"></i>My Account</a></li>
		<li><a href="<?php echo base_url('user/my_wishlist'); ?>" class="<?php echo $this->uri->getSegment(2)=='my_wishlist'?'active':''; ?>"><i class="las la-hand-holding-heart"></i>My Wishlist</a></li> 
		<li><a href="<?php echo base_url('user/my_orders'); ?>" class="<?php echo $this->uri->getSegment(2)=='my_orders'?'active':''; ?>"><i class="las la-shopping-bag"></i>My Orders</a></li>
		<li><a href="<?php echo base_url('user/my_address'); ?>" class="<?php echo $this->uri->getSegment(2)=='my_address'?'active':''; ?>"><i class="las la-map-marker"></i>My Address</a></li>
		<li><a href="<?php echo base_url('logout'); ?>"><i class="las la-file-export"></i>Logout</a></li>

	</ul>
</div>