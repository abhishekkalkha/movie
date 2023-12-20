
<div class="tb-space"></div>
<div class="gc-payment">
<div class="success">
<img src="<?php echo base_url();?>assets/public/img/success.png">
</div>
<h1>Payment Successful</h1>
<p>Your payment has been successful,<br>
Thank you for your purchase</p>
<ul>
<li>Booking ID</li>
<li><?php echo $result->booking_id; ?></li>
<div class="clearfix"></div>
</ul>
<ul>
<li>Seat No</li>
<li><?php echo $result->seat_no; ?></li>
<div class="clearfix"></div>
</ul>
<ul>
<li>Amount Paid</li>
<li><?php echo $result->amount; ?></li>
<div class="clearfix"></div>
</ul>
<ul>
<li>Payment Status</li>
<li>Success</li>
<div class="clearfix"></div>
</ul>
<button class="gc-update-btn2" onclick="window.location='<?php echo base_url(); ?>'">Go Home </button>
</div>