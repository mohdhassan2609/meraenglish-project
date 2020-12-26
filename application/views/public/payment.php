<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<style>
		.bg {
		  width: 480px;
		  overflow: hidden;
		  margin: 0 auto;
		  box-sizing: border-box;
		  padding: 0 40px;
		  margin-top: 40px;
		}
		.card {
		  background-color: #fff;
		  width: 100%;
		  float: left;
		  margin-top: 40px;
		  border-radius: 5px;
		  box-sizing: border-box;
		  padding: 80px 30px 25px 30px;
		  text-align: center;
		  position: relative;
		  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
		}
		.card__success {
		  position: absolute;
		  top: -50px;
		  left: 145px;
		  width: 100px;
		  height: 100px;
		  border-radius: 100%;
		  background-color: #60c878;
		  border: 5px solid #fff;
		}
		.card__success i {
		  color: #fff;
		  line-height: 100px;
		  font-size: 45px;
		}
		.card__msg {
		  text-transform: uppercase;
		  color: #55585b;
		  font-size: 18px;
		  font-weight: 500;
		  margin-bottom: 5px;
		}
		.card__submsg {
		  color: #959a9e;
		  font-size: 16px;
		  font-weight: 400;
		  margin-top: 0px;
		}
		.card__body {
		  background-color: #f8f6f6;
		  border-radius: 4px;
		  width: 100%;
		  margin-top: 30px;
		  float: left;
		  box-sizing: border-box;
		  padding: 30px;
		}
		.card__avatar {
		  width: 50px;
		  height: 50px;
		  border-radius: 100%;
		  display: inline-block;
		  margin-right: 10px;
		  position: relative;
		  top: 7px;
		}
		.card__recipient-info {
		  display: inline-block;
		}
		.card__recipient {
		  color: #232528;
		  text-align: left;
		  margin-bottom: 5px;
		  font-weight: 600;
		}
		.card__email {
		  color: #838890;
		  text-align: left;
		  margin-top: 0px;
		}
		.card__price {
		  color: #232528;
		  font-size: 60px;
		  margin-top: 25px;
		  margin-bottom: 30px;
		}
		.card__price span {
		  font-size: 60%;
		}
		.card__method {
		  color: #d3cece;
		  text-transform: uppercase;
		  text-align: left;
		  font-size: 11px;
		  margin-bottom: 5px;
		}
		.card__payment {
		  background-color: #fff;
		  border-radius: 4px;
		  width: 100%;
		  height: 100px;
		  box-sizing: border-box;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		}
		.card__credit-card {
		  width: 50px;
		  display: inline-block;
		  margin-right: 15px;
		}
		.card__card-details {
		  display: inline-block;
		  text-align: left;
		}
		.card__card-type {
		  text-transform: uppercase;
		  color: #232528;
		  font-weight: 600;
		  font-size: 12px;
		  margin-bottom: 3px;
		}
		.card__card-number {
		  color: #838890;
		  font-size: 12px;
		  margin-top: 0px;
		}
		.card__tags {
		  clear: both;
		  padding-top: 15px;
		}
		.card__tag {
		  text-transform: uppercase;
		  background-color: #f8f6f6;
		  box-sizing: border-box;
		  padding: 3px 5px;
		  border-radius: 3px;
		  font-size: 10px;
		  color: #d3cece;
		}
	</style>
	
	<!-- Begin  Breadcrumb Area -->
	<!-- <div class="breadcrumb-area">
		<div class="container">
			<div class="breadcrumb-content">
				<ul>
					<li><a href="<?=base_url()?>">Home</a></li>
					<li class="active">Payment</li>
				</ul>
			</div>
		</div>
	</div> -->
	<!--  Breadcrumb Area End Here -->
	<div class="privacy-policy_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="bg">
  
						<div class="card">
						
							<h1 class="card__msg">Payment Pending</h1>
							<h2 class="card__submsg">Order: <?=$order_id?></h2>
							
							<div class="card__body">
							  
							  <div class="card__recipient-info">
								<p class="card__recipient"><?=$order_details->contact?></p>
								<p class="card__email"><?=$order_details->email?></p>
							  </div>
							  
							  <h1 class="card__price"><span>₹</span><?=substr($order_details->amount, 0, -2)?><span>.00</span></h1>
							  <button type="button" class="umino-btn umino-btn_dark umino-btn_sm" onclick="pay_now()">Pay Now</button>
							</div>
							
							<div class="card__tags">     
								<span class="card__tag">Verified by Razorpay</span>        
							</div>
						
						</div>
					  
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		function pay_now()
		{
			var options = {
				"key": "<?=$this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_key'", "value")?>",
				"amount": '<?=$order_details->amount?>',
				"currency": "INR",
				"name": "Mera English",
				"description": "Payment for <?=$order_id?>",
				 "image": "<?php echo base_url() ?>assets/front/img/mera-logo.jpg",
				
				"handler": function (response){
					$.ajax({
						type: 'POST',
						url: baseURL + "product-order/update-payment-details",
						data: "payment-id=" + response.razorpay_payment_id + "&order-id=<?=$order_id?>",
						dataType: "json",
						success: function(responses){
							console.log(responses);
							if(responses.result == 1)
							{
								window.location.assign(baseURL + "payment-success/" + responses.order_id);
							}
							else
							{
								window.location.assign(baseURL + "payment-failure");
							}
						}
					});
				},
				"prefill": {
					"name": "<?=ucfirst($user_details->first_name)?> <?=ucfirst($user_details->last_name)?>",
					"contact": "<?=$user_details->phone_number?>"
				},
				"theme": {
					"color": "#fcb800"
				}
			};
			var rzp1 = new Razorpay(options);
			rzp1.open();
		}
	</script>