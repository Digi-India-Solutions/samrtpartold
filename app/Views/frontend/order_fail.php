<?php 
$this->extend('layout/master');
$this->section('page');
 ?>

<section class="smart-section success-page-section">
	<div class="container">
		<div class="success-message-container">
		    <div class="success-icon-container">
		        <img src="assets/frontend/images/thank-you-img.png" class="success-icon">
		    </div>
        	<div class="section-head">
    			<h2>Order Place Failed !</h2>
    			<p>Your Order has been placed unsuccess.</p>
    		</div>
		</div>
	</div>
</section>

<?php $this->endSection(); ?>