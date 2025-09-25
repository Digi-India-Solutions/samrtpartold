<?php 
$this->extend('layout/master');
$this->section('page');
 ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<section class="common-banner curve-bg overflow-hidden">
	<div class="container-fluid mt-md-5 mt-0 pt-md-5 pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-sm-12">
					<div class="banner-content">
						<div data-aos="fade-down" data-aos-duration="600">
							<h1>Get <span>Upto 100%</span> Loan on Your Vehicle</h1>
							<p>Get amazing cashback on your vehicle finance</p>
						</div>
						<ul class="list-icon full-fill">
							<li data-aos="fade-down" data-aos-duration="600" data-aos-delay="100"><i class="las la-star"></i>Loan disbursal in 48 hrs*</li>
							<li data-aos="fade-down" data-aos-duration="600" data-aos-delay="300"><i class="las la-star"></i>EMI starting from ₹1,600/lakh*</li>
							<li data-aos="fade-down" data-aos-duration="600" data-aos-delay="500"><i class="las la-star"></i>India's leading auto lending platform</li>
						</ul>
						<a href="finance-application.php" class="theme-btn big mt-4 min-width"><span>Start Application <i class="las la-angle-right"></i></span></a>
					</div>
				</div>
				<div class="col-lg-6 offset-lg-1 col-sm-10 col-10 mx-auto">
					<div class="banner-image" data-aos="fade-left" data-aos-duration="600" data-aos-delay="500">
						<img src="<?php echo CATALOG; ?>images/finance-banner-image.png" alt="banner-image" />
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
						<h2>Benefits with Us</h2>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
					<div class="statistics-block info-box" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
						<div class="row align-items-center">
							<div class="col-md-3 col-6 mx-auto">
								<div class="img-box">
									<img src="<?php echo CATALOG; ?>images/loan-icon.png" alt="icon">
								</div>
							</div>
							<div class="col-md-9 col-12">
								<p>Loan upto 100% of On-Road Price</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
					<div class="statistics-block info-box" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
						<div class="row align-items-center">
							<div class="col-md-3 col-6 mx-auto">
								<div class="img-box">
									<img src="<?php echo CATALOG; ?>images/interest-rate.png" alt="icon">
								</div>
							</div>
							<div class="col-md-9 col-12">
								<p>Attractive Interest Rates</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
					<div class="statistics-block info-box" data-aos="fade-up" data-aos-duration="600" data-aos-delay="500">
						<div class="row align-items-center">
							<div class="col-md-3 col-6 mx-auto">
								<div class="img-box">
									<img src="<?php echo CATALOG; ?>images/emi-tenure.png" alt="icon">
								</div>
							</div>
							<div class="col-md-9 col-12">
								<p>Flexible EMI Tenure</p>
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
				<div class="col-lg-6 offset-lg-3 col-sm-10 mx-auto">
					<div class="title text-center">
						<h2>Loan EMI Calculator</h2>
						<p>EMIs make your loan repayment much easier and a peaceful process but a car loan EMI is somewhat capable of making a dent in your monthly budget.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-12 mb-lg-0 mb-sm-4 mb-4">
					<div class="border-box fill-grey">
						<p>Loan Amount</p>
					    <div class="slider" id="emi_range" data-min="100000" data-max="5000000" data-value="1100000">
						    <div class="ui-slider-handle"><span class="emi-range-price"></span></div>
						</div>
						<div class="row mt-3">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
								<span class="emi-amt d-inline-block">
									₹ 1,00,000<br>Min Loan Amount
								</span>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-end">
								<span class="emi-amt text-start d-inline-block">
									₹ 50,00,000<br>Max Loan Amount
								</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="input-box fill white mt-0">
									<input type="number" pattern="[0-9.]+"  min="100000" max="5000000" id="emi-amount" required="" maxlength="7" name="">
									<span class="error-message" id="loan_error_message">Minimun Value 100,000 and Maximum Value 50,00,000</span>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
								<div class="input-box fill white mt-0 mb-0">
									<label>Tenure</label>
									<select class="select2" id="interest-tenure">
										<option value="1">1 Year</option>
										<option value="2">2 Year</option>
										<option value="3">3 Year</option>
										<option value="4">4 Year</option>
										<option value="5">5 Year</option>
										<option value="6">6 Year</option>
										<option value="7" selected="">7 Year</option>
										<option value="8">8 Year</option>
										<option value="9">9 Year</option>
										<option value="10">10 Year</option>
									</select>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
								<div class="input-box fill white mt-0 mb-0">
									<label>Interest Rate</label>
									<select class="select2" id="interest-rate">
										<option value="1">1%</option>
										<option value="2">2%</option>
										<option value="3">3%</option>
										<option value="4">4%</option>
										<option value="5">5%</option>
										<option value="6">6%</option>
										<option value="7">7%</option>
										<option value="8">8%</option>
										<option value="9" selected="">9%</option>
										<option value="10">10%</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-12">
					<div class="border-box">
						<h5 class="emi_headline"><span class="price">₹ <font id="monthly_emi">00000</font></span> EMI for <font id="emi_year">0</font> years @<font id="emi_interest">0</font>% interest rate</h5>
						<p>Interest Rates shown are indicative and will vary as per your credit score across different lenders.</p>
						<hr/>
						<div class="row">
							<div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 col-12">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 border-end">
										<div class="emi-amount-break">
											<ul>
												<li class="emi-info interets">Total Interest Payable</li>
												<li class="emi-info principle">Principal Loan Amount</li>
												<li><b>Total Amount Payable</b></li>
											</ul>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<div class="emi-amount-break total-amount">
											<ul>
												<li>₹ <span id="total_int_amt">000000</span></li>
												<li>₹ <span id="principle_amt">000000</span></li>
												<li><b>₹ <span id="total_amt">000000</span></b></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-sm-4 col-6 mx-auto">
								<canvas id="emi-pie-chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center mt-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
					<a href="finance-application.php" class="theme-btn"><span>Start Application <i class="las la-angle-right"></i></span></a>
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
					<div class="title text-center">
						<h2>Popular Finance Companies</h2>
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
					<a href="#" class="theme-btn"><span>Compare Rates <i class="las la-angle-right"></i></span></a>
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

<section>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mb-xl-0 mb-lg-0 mb-sm-4 mb-4">
					<div class="grey-img-box equal">
						<div class="row align-items-center">
							<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
								<div class="title mb-0">
									<h4>Check Your Eligibility</h4>
									<p>You are eligible to avail a car loan if you meet the below criteria</p>
								</div>
								<a href="#" class="theme-btn mt-4"><span>Check Now <i class="las la-angle-right"></i></span></a>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 offset-md-1">
								<div class="banner-image">
									<img src="<?php echo CATALOG; ?>images/card-board.png" alt="image">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="grey-img-box equal">
						<div class="row align-items-center">
							<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
								<div class="title mb-0">
									<h4>Get Assistance on New Vehicle Loan</h4>
									<p>Get assistant from our experts for a finance</p>
								</div>
								<a href="#" class="theme-btn mt-4"><span>Get Assistance <i class="las la-angle-right"></i></span></a>
							</div>
							<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 p-0">
								<div class="banner-image">
									<img src="<?php echo CATALOG; ?>images/get-assistent.png" alt="image">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>

var principle_amt, totalinterest;

function emi_calculation(update_amt, update_tenure, updated_rate){
if(update_amt === undefined) {
	principle_amt = document.getElementById("emi_range").getAttribute("data-value");
}else{
	principle_amt = update_amt;
}
document.getElementById("principle_amt").innerHTML = principle_amt;

if(update_tenure === undefined) {
	var emi_tenure_rate = document.getElementById("interest-tenure").value * 12;
}else{
	var emi_tenure_rate = update_tenure * 12;
}
document.getElementById("emi_year").innerHTML = emi_tenure_rate / 12;

if(updated_rate === undefined) {
	var emi_interest_rate = document.getElementById("interest-rate").value / 1200;
}else{
	var emi_interest_rate = updated_rate / 1200;
}
document.getElementById("emi_interest").innerHTML = emi_interest_rate * 1200;
var monthly_emi = Math.round(((principle_amt * emi_interest_rate) / (1 - Math.pow(1 / (1 + emi_interest_rate), emi_tenure_rate))) * 100) / 100;

document.getElementById("monthly_emi").innerHTML = Math.round(monthly_emi);

document.getElementById("total_amt").innerHTML = Math.round(Math.round(document.getElementById("monthly_emi").innerHTML * document.getElementById("interest-tenure").value * 100 * 12) / 100);
document.getElementById("total_int_amt").innerHTML = Math.round(Math.round((document.getElementById("total_amt").innerHTML * 1 - principle_amt * 1) * 100) / 100);
totalinterest = Math.round(Math.round((document.getElementById("total_amt").innerHTML * 1 - principle_amt * 1) * 100) / 100);
}
emi_calculation();

function int_to_comma(emi_integer){
	emi_integer.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	return emi_integer;
}


var ctx = document.getElementById('emi-pie-chart');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Principal Loan Amount', 'Total Interest Payable'],
        datasets: [{
            data: [principle_amt, totalinterest],
            backgroundColor: [
                '#00BF73',
                '#FFCC00',
            ]
        }]
    },
    options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
      },
      title: {
        display: true,
      }
    }
  },
});

function update_pie_chart(principle, total_interest){
	myChart.data.datasets[0].data = [principle, total_interest];
	myChart.update(); 
}

$("#emi_range").each(function() {
    var self = $(this);
    var min_value = Number($("#emi_range").attr("data-min"));
    var max_value = Number($("#emi_range").attr("data-max"));
    var slider = self.slider({
        range: 'min',
        min: min_value,
        max: max_value,
        value: principle_amt,
        step: 1000,
        create: function() {
            $('.emi-range-price').text("₹ "+self.slider('value').toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"");
            $("#emi-amount").val(self.slider('value'));
        },
        slide: function(event, ui) {
            $('.emi-range-price').text("₹ "+ui.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"");
            $("#emi-amount").val(ui.value);	
            emi_calculation(ui.value);
        },
        stop: function (event, ui) {
			update_pie_chart(ui.value, totalinterest);
	    },
    });
});

$("#interest-tenure").change(function(){
	var updated_pri = $("#emi-amount").val();
	var new_tenure = $(this).val();
	emi_calculation(updated_pri, new_tenure);
	update_pie_chart(updated_pri, totalinterest);
});

$("#interest-rate").change(function(){
	var updated_pri = $("#emi-amount").val();
	var new_tenure = $("#interest-tenure").val();
	var new_rate = $(this).val();
	var min_amt = Number($("#emi-amount").attr("min"));
	var max_amt = Number($("#emi-amount").attr("max"));
	emi_calculation(updated_pri, undefined, new_rate);
	update_pie_chart(updated_pri, totalinterest);
});

$("#emi-amount").keyup(function(){
	var update_amt = $(this).val();
	var new_rate = $("#interest-rate").val();
	var new_tenure = $("#interest-tenure").val();
	var min_amt = Number($(this).attr("min"));
	var max_amt = Number($(this).attr("max"));
	if(update_amt >= min_amt && update_amt <= max_amt){
		emi_calculation(update_amt, new_tenure, new_rate);
		update_pie_chart(update_amt, totalinterest);
		$(this).removeClass("error");
		$("#loan_error_message").hide();
		$("#emi_range").slider( "option", "value", update_amt );
		$('.emi-range-price').text('₹ '+update_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'');
	}else{
		$(this).val("100000")
		$(this).addClass("error");
		$("#loan_error_message").show();
		$("#emi_range").slider( "option", "value", 100000 );
		$('.emi-range-price').text("₹ 100,000");
		update_pie_chart(100000, totalinterest);
	}
});




</script>
<?php $this->endSection(); ?>