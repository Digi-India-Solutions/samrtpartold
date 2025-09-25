<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Forgot Password | MotorKart</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Cyberworx">
<?php include 'includes/top_links.php'; ?>
</head>
<body>
<?php include 'includes/header.php'; ?>

<section class="home-main-banner">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="banner-content">
						<h2>Welcome to</h2>
						<h1>Motorkart</h1>
						<p>India's Most Trusted Marketplace for buying new and used vehicles.</p>
						<ul class="list-icon">
							<li><img src="assets/images/offer-icon.png" alt="icon" />New Offers and Deals</li>
							<li><img src="assets/images/verified-icon.png" alt="icon" />Certified Used Vehicles</li>
							<li><img src="assets/images/support-icon.png" alt="icon" />24x7 Customer Support</li>
						</ul>
					</div>
				</div>
				<div class="col-md-5 offset-md-1 position-relative">
					<div class="banner-form-float mt-5">
						<h5 class="mb-2">Forgot Password / <a href="login.php">Login</a></h5>
						<p>Enter your email / phone to receive password reset link</p>
						<form method="post" class="mt-5">
							<div class="row">
								<div class="col-md-12">
									<div class="input-box fill float-label mt-0">
										<label>Email/Mobile number</label>
										<input type="text" name="email_phone" required />
									</div>
								</div>
								<div class="col-md-12">
									<div class="input-box fill float-label mt-0 mb-3">
										<button type="submit" class="theme-btn full big"><span>Reset Password</span></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="home-road">
	<img src="assets/images/road-v3.png" alt="road" class="road-path" />
</div>
</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>