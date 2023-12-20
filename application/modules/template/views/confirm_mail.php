<!DOCTYPE html>
<html lang="en">
<head>
    <title> Ticket Bazzar </title>
    
	<!-- FONTS -->
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    
</head>
<body style="margin:70px;padding: 25px;">

	<!-- ABOUT-US-TITLE -->
	<div style="border:1px solid #e7e7e7;padding:20px;border-radius: 8px;">
		<div style="width:100%;text-align:center;">
			<img src="<?php echo base_url('assets/public/img/logo/tb-logo.png'); ?>" width="50%">
		</div>
		<!--<div style="margin-top: 20px;margin-bottom: 20px;display:inline-flex;list-style:none;width:100%;font-family: 'Open Sans',sans-serif;font-size:16px;background: #f49aa3; none repeat scroll 0 0;border-radius:5px;color:#fff;">
		<a href="#" style="width:100%;text-decoration:none;color:#fff;"><li style="width:100%;text-align:center;border-right:1px solid #fff;padding-top:10px;padding-bottom:10px;">Buy Product</li></a>
		<a href="#" style="width:100%;text-decoration:none; color:#fff;"><li style="width:100%;text-align:center;border-right:1px solid #fff;padding-top:10px;padding-bottom:10px;">Book Saloon</li></a>
		<a href="#" style="width:100%;text-decoration:none;color:#fff;"><li style="width:100%;text-align:center;padding-top:10px;padding-bottom:10px;">Browse Collections</li></a>
		</div>-->
		<?php
		// print_r($result);
			$booking_date = date("l jS M Y", strtotime($result->date));
			$booking_time = $result->screen_timing;
		?>
		<div style="border-radius: 8px;font-family: 'Open Sans',sans-serif;font-size:16px;line-height:35px;text-align:justify;padding-bottom: 30px;border:1px solid #e7e7e7;margin-bottom:20px;padding: 30px;">
		<b>Hi <?php echo $result->user_name; ?>, </b>
		<br>
		Your booking for <?php echo $result->movie_name; ?> in <?php echo $result->theater_name; ?> ,<?php echo $result->location; ?> on <?php echo $booking_date; ?> at <?php echo $booking_time; ?> is Confirmed! 
		<p style="margin:0;">Your Booking code is <b style="color:#eb4354;"><?php echo $result->booking_id; ?></b></p>
		<hr style="border:1px solid rgb(244, 154, 163);margin-top:20px;margin-bottom:20px;border-bottom:none;">
		<div style="text-align:center;width:100%;font-family: 'Open Sans',sans-serif;color:#eb4354;font-size: 20px;">Your Booking Information</div>
		<hr style="border:1px solid rgb(244, 154, 163);margin-top:20px;margin-bottom:20px;border-bottom:none;">
		<div style="width:100%;">
		<table style="width:100%;">
		<tr style="width:100%;">
		<th style="width:50%;"><b>Booking Code</b></th>
		<th style="width:50%;"><b><?php echo $result->booking_id; ?></b></th>
		</tr>
		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;">Date & Time</td>
		<td style="width:50%;font-size: 15px;"><?php echo $booking_date; ?> at <?php echo $booking_time; ?></td>
		</tr>
		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;">Theater</td>
		<td style="width:50%;font-size: 15px;"><?php echo $result->theater_name; ?> ,<?php echo $result->location; ?> </td>


		</tr>
		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;">Screen</td>
		<td style="width:50%;font-size: 15px;"><?php echo $result->screen_name; ?></td>		
		</tr>

		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;">Seat</td>
		<td style="width:50%;font-size: 15px;"><?php echo $result->seat_no; ?></td>		
		</tr>
        
		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;">Amount</td>
		<td style="width:50%;font-size: 15px;">&#x20B9; &nbsp;<?php echo number_format($result->amount,2); ?></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr style="width:100%;background: #f49aa3;color:#fff;margin-top:20px;margin-bottom:20px;">
		<td style="width:50%;font-size: 15px;padding-left:10px;">Particular</td>
		<td style="width:50%;font-size: 15px;padding-left:10px;">Price</td>
		</tr>
		<tr></tr>
		<tr></tr>		
		</table>
		<hr style="border:1px solid rgb(244, 154, 163);margin-top:20px;margin-bottom:20px;">
		<table style="width:100%;">
		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;">Ticket Rate</td>
		<td style="width:50%;font-size: 15px;"><div style="width:100px; text-align:right;">&#x20B9; &nbsp;<?php echo number_format($result->sub_total,2); ?></div></td>
		</tr>
		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;">Booking Fee</td>
		<td style="width:50%;font-size: 15px;"><div style="width:100px; text-align:right;"><div style="width:100px; text-align:right;">&#x20B9; &nbsp;<?php echo number_format($result->booking_fees,2); ?></div></td>
		</tr>

		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;">Service tax</td>
		<td style="width:50%;font-size: 15px;"><div style="width:100px; text-align:right;"><div style="width:100px; text-align:right;">&#x20B9; &nbsp;<?php echo number_format($result->service_tax,2); ?></div></td>
		</tr>
		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;">Swachh Bharat</td>
		<td style="width:50%;font-size: 15px;"><div style="width:100px; text-align:right;"><div style="width:100px; text-align:right;">&#x20B9; &nbsp;<?php echo number_format($result->swachh_bharat_cess,2); ?></div></td>
		</tr>
		
		</table>
		<hr style="border:1px solid rgb(244, 154, 163);margin-top:20px;margin-bottom:20px;border-bottom:none;">
		<table style="width:100%;">
		<tr style="width:100%;">
		<td style="width:50%;font-size: 15px;"><b>TOTAL</b></td>
		<td style="width:50%;font-size: 15px;"><b><div style="width:100px; text-align:right;">&#x20B9; &nbsp;<?php echo number_format($result->amount,2); ?></div></b></td>
		</tr>
		</table>
		
		

		

		<div style="width:100%;background:#424047;color:#777382;font-family: 'Open Sans',sans-serif;text-align:center;padding-top: 10px;font-size:13px;">
		Copyright &copy; TICKET BAZZAR. All rights reserved. <br>
		<div style="list-style:none;display:inline-flex;padding-top:10px;padding-bottom:10px;">
		<li style="padding:5px"><img src="<?php echo base_url(); ?>assets/public/images/facebook.png"></li>
		<li style="padding:5px"><img src="<?php echo base_url(); ?>assets/public/images/instagram.png"></li>
		<li style="padding:5px"><img src="<?php echo base_url(); ?>assets/public/images/twitter.png"></li>
		<li style="padding:5px"><img src="<?php echo base_url(); ?>assets/public/images/youtube.png"></li>
		</div>
		</div>
	</div>
 

</body>
</html>