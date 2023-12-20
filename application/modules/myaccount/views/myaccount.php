 
<?php
//echo 'myaccount';
//$user = $this->session->userdata('logged_in');
//print_r($user);
?>

<div class="tb-main-content-wrap">

		<div class="tb-myacnt-cover">

			<img src="<?php echo base_url()?>assets/public/img/tb-cover.png">

		</div>

		<div class="tb-accnt-tab-bay">

			<div class="container">

				<div class="tb-cover-detail">

					<div class="tb-cover-side">

						<div class="tb-cover-profile-photo">

							<!--<img src="<?php echo base_url().$user->image; ?>">-->

							<img src="<?php echo base_url();?>assets/public/img/default.png">

						</div>

						<div class="tb-cover-name">

							<h1><?php echo $user->first_name." ".$user->last_name; ?></h1>

							<h2><?php echo $user->phone; ?></h2>

						</div>

					</div>

					<!-- <div class="tb-cover-side">

						<button class="tb-gplus"></button>

						<button class="tb-fbk"></button>

					</div> -->	

				</div>

				<div class="tb-accnt-tab-bay-ul">

					<ul>

						<li class="active"><a data-toggle="tab" href="#mywallet">MY WALLET</a></li>

						<li><a data-toggle="tab" href="#bookinghistory">BOOKING HISTORY</a></li>

						<li><a data-toggle="tab" href="#quickpay">QUICKPAY</a></li>

						<li><a data-toggle="tab" href="#settings">SETTINGS</a></li>

					</ul>

				</div>

			</div>

		</div>

		<div class="container">

			<div class="my-accnt-tab-content">

				<div class="my-accnt-space" style="height:50px !important"></div>

				<div class="tab-content">

					<div id="mywallet" class="tab-pane fade in active border-none">

					<div class="alert alert-info">

				 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  <strong>Info!</strong> These features are not available currently, You could expect it in the next realise .

</div>

						<div class="tb-accnt-tab-bay tb-accnt-tab-bay-ul1">



							<ul>





								<li class="active"><a data-toggle="tab" href="#trans">TRANSACTION HISTORY</a></li>



								<li><a data-toggle="tab" href="#transtobnk">TRANSFER TO BANK</a></li>

								<li><a data-toggle="tab" href="#settings1">SETTINGS</a></li>

								<div class="tb-moneybag">

									<img src="<?php echo base_url()?>assets/public/img/9.png">

								</div>

							</ul>

						</div>

						<div class="my-accnt-tab-content">

							<div class="tab-content">

								<div id="trans" class="tab-pane fade in active  border-none">

										

									<div class="tb-wallet-bal">

										<h1>TOTAL WALLET BALANCE</h1>

										<h2>RS . 1280.00</h2>

									</div>

									<div class="tb-history">

										<ul>

											<li>

												<ul class="tb-transhis-child-ul">

													<li class="tb-child-1">DEBIT FOR AMAR AKBAR ANTHONY (U)<br>20-10-2015 08:46:40</li>

													<li class="tb-child-2">20-10-2015 08:46:40- Rs. 30.00<br>DEBIT</li>

													<li class="tb-child-2">RS. 0.00<br>BALANCE</li>

												</ul>

											</li>

											<li>

												<ul class="tb-transhis-child-ul">

													<li class="tb-child-1">DEBIT FOR AMAR AKBAR ANTHONY (U)<br>20-10-2015 08:46:40</li>

													<li class="tb-child-2">20-10-2015 08:46:40- Rs. 30.00<br>DEBIT</li>

													<li class="tb-child-2">RS. 0.00<br>BALANCE</li>

												</ul>

											</li>

										</ul>

										<div class="tb-history-btn-bay">

											<button class="tb-add-cash-btn" data-toggle="modal" data-target="#addcash">ADD CASH</button>

											

											<!-- ADD-CASH-POP-UP -->

											

											<div id="addcash" class="modal fade" role="dialog">

												<div class="modal-dialog tb-add-cash-pop">

													<div class="modal-content tb-add-cash-pop-content">

														<button class="net-close" data-dismiss="modal"></button>

														<div class="modal-body">

															<div class="ad-btn-bay">

																<button class="ad-btn">+ Rs.50</button>

																<button class="ad-btn">+ Rs.100</button>

																<button class="ad-btn">+ Rs.500</button>

															</div>

															<input class="ad-input" type="text" placeholder="ENTER YOUR AMOUNT">

															<button class="tb-add-cash-btn" data-toggle="modal" data-target="#addcash">ADD CASH</button>

														</div>

													</div>

												</div>

											</div>

											

										</div>

									</div>

								</div>

								<div id="transtobnk" class="tab-pane fade in border-none">

									<div class="tb-wallet-bal">

										<h1>TOTAL WALLET BALANCE</h1>

										<h2>RS . 1280.00</h2>

									</div>

									<div class="tb-wallet-oops">

										<div class="tb-wallet-1">

											<h1>OOPS!</h1>

											<p>

											You need to have a minimum cash balance of Rs. 110.00<br>

											to be able to transfer to the bank.<br>

											Please check T&Cs and FAQs for more details<br>

											</p>

										</div>

									</div>

								</div>

								<div id="settings1" class="tab-pane fade in border-none">

									<div class="tb-wallet-bal">

										<h1>TOTAL WALLET BALANCE</h1>

										<h2>RS . 1280.00</h2>

									</div>

									<div class="tb-wallet-oops">

										<div class="tb-wallet-1">

											<h2><div class="tb-tick"><img src="<?php echo base_url()?>assets/public/img/check.png"></div>INSTANT REFUNDS TO MYWALLET</h2>

											<p>

											Your default settings for refunds, in case of transaction failures,<br> 

											is NOT SET to MyWallet

											</p>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="tb-terms">

							<ul>

								<li>TERMS & CONDITIONS</li>

								<li>FAQS</li>

							</ul>

						</div>

					</div>

					<div id="bookinghistory" class="tab-pane fade  border-none">

						<div class="tb-booking-history-wrap">

							<ul>

							<?php
                                if(count($booking) == 0){?>
                                  
                                   <div class="booknghstry_length"> No Result found</div>
                             <?php   }
                             else{
								foreach ($booking as $rs) {									

							?>

								<li>

									<div class="tb-ticket-inner">

										<div class="tb-ticket-grey">

											<div class="tb-ticket-poster">

												<div class="tb-ticket-poster-inner">

													 <img ng-src="<?php echo $rs->image;?>"> 

												</div>

												<div class="tb-ticket-ratting">

													ADD YOUR RATTING

													<div class="tick-rate" style="margin:0 auto;" id="book_<?php echo $rs->id; ?>"></div>

													

												</div>

											</div>

											<div class="tb-ticket-details">

												<h4><?php echo $rs->movie_name." (".$rs->certificate.")"; ?></h4>

												<ul>

													<li><?php echo $rs->name.", ".$rs->location; ?></li>

													<li></li>

												</ul>

												<ul>

													<li><?php echo $rs->screen_timing; ?> | <?php echo $rs->date; ?></li>

													<li></li>

												</ul>

												<ul>

													<li>QUANTITY:<?php echo $rs->no_ticket; ?></li>

													<li></li>

												</ul>

													<hr>

												<ul>

													<li>TICKET PRICE</li>

													<li>RS.<?php echo $rs->sub_total; ?></li>

												</ul>

												<ul>

													<li class="grey">CONVENIENCE FEES</li>

													<li></li>

												</ul>

												<ul>

													<li>BOOKING</li>

													<li>RS.<?php echo $rs->booking_fees; ?></li>

												</ul>

												<ul>

													<li>SERVICE TAX</li>

													<li>RS.<?php echo $rs->service_tax; ?></li>

												</ul>

												<ul>

													<li>SWACHH BHARAT</li>

													<li>RS.<?php echo $rs->swachh_bharat_cess; ?></li>

												</ul>

												<hr>

												<div class="l1">

													<div class="l2">

													AMOUNT PAID

													</div>

													<div class="l2">

													<strong>RS.<?php echo $rs->amount; ?></strong>

													</div>

												</div>

											</div>

										</div>

										<div class="tb-ticket-red">
										
										
											<div class="tb-code-div">

												<!-- <img ng-src="<?php echo base_url().$rs->qr_code?>"> -->
												<?php if($rs->qr_code!=''){ ?>
												<img src="<?php echo base_url().$rs->qr_code;?>">
												<?php } ?>
											</div>
											

											<hr>

											<div class="tb-code-btm">

												<h1>BOOKING ID</h1>

												<p><?php echo $rs->booking_id; ?></p>

											</div>

										</div>

									</div>

								</li>

								<?php } }
								?>
							

								

							</ul>

								
						</div>

					</div>

					<div id="quickpay" class="tab-pane fade  border-none">

					<div class="alert alert-info">

				 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  <strong>Info!</strong> These features are not available currently, You could expect it in the next realise.

</div>

						<div class="tb-ticket-quickpay">

							<ul>

								<li class="drop-shadow curved-hz-2 curved">

								<div class="quick-head">

									<div class="qh1">Credit/Debit Cards</div>

									<button class="qh2" data-toggle="modal" data-target="#credit">+ Add</button>

									

									<!-- CREDIT-CARD-POP-UP -->

											

											<div id="credit" class="modal fade" role="dialog">

												<div class="modal-dialog tb-credit-pop">

													<div class="modal-content tb-credit-pop-content">

														<button class="credit-close" data-dismiss="modal"></button>

														<div class="modal-body">

															<h1>ADD BANK</h1>

															<div class="tb-pop-hr"></div>

															<div class="tb-credit-row">

															<input class="ad-input2" type="text" placeholder="1">

															<input class="ad-input2" type="text" placeholder="1">

															<input class="ad-input2" type="text" placeholder="1">

															<input class="ad-input2" type="text" placeholder="1">

															</div>

															<div class="tb-credit-row">

																<input class="ad-input3" type="text" placeholder="NAME OF ACCOUNT HOLDER">

															</div>

															<div class="tb-credit-row">

																<input class="ad-input5" type="text" placeholder="11/24">

																<input class="ad-input5" type="text" placeholder="CVV">

															</div>

															<div class="tb-credit-row">

																<input class="ad-input4" type="text" placeholder="NAME ON THE CARD">

															</div>

															<button class="tb-add-cash-btn" data-toggle="modal" data-target="#addcash">SAVE BANK</button>

														</div>

													</div>

												</div>

											</div>

								</div>

								<p>You Don't have any Credit/Debit card added to Quick pay</p>

								</li>

								<li class="drop-shadow curved-hz-2 curved tb-quickpay-middle">

								<div class="quick-head">

									<div class="qh1">Net Banking</div>

									<button class="qh2" data-toggle="modal" data-target="#net">+ Add</button>

									

									<!-- NET-BANKING-POP-UP -->

											

											<div id="net" class="modal fade" role="dialog">

												<div class="modal-dialog tb-net-pop">

													<div class="modal-content tb-net-pop-content">

														<button class="net-close" data-dismiss="modal"></button>

														<div class="modal-body tb-credit-body">

															<h1>ADD BANK</h1>

															<div class="tb-pop-hr"></div>

															<div class="tb-credit-row">

																<ul>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/sib.png">

																</div>

																</li>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/sbh.png">

																</div>

																</li>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/kotak.png">

																</div>

																</li>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/boi.png">

																</div>

																</li>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/citybnk.png">

																</div>

																</li>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/hdfc.png">

																</div>

																</li>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/punjab.png">

																</div>

																</li>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/indus.png">

																</div>

																</li>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/icici1.png">

																</div>

																</li>

																<li>

																<div class="tb-bank">

																	<img src="<?php echo base_url()?>assets/public/img/idbi.png">

																</div>

																</li>

																</ul>

																<div class="clearfix"></div>

															</div>

															<h1>ALL BANK</h1>

															<div class="tb-pop-hr"></div>

															<div class="tb-credit-row">

																<input class="ad-input6" type="text" placeholder="icici Net Banking">

															</div>

															

															

															<button class="tb-add-cash-btn" data-toggle="modal" data-target="#addcash">SAVE BANK</button>

														</div>

													</div>

												</div>

											</div>

								</div>

								<p>You Don't have any Net Banking Options added to Quick pay</p>

								</li>

								<li class="drop-shadow curved-hz-2 curved">

								<div class="quick-head">

									<div class="qh1">Gift Vouchers</div>

									<button class="qh2" data-toggle="modal" data-target="#gift">+ Add</button>

									

									<!-- GIFT-POP-UP -->

											

											<div id="gift" class="modal fade" role="dialog">

												<div class="modal-dialog tb-gift-pop">

													<div class="modal-content tb-gift-pop-content">

														<button class="gift-close" data-dismiss="modal"></button>

														<div class="modal-body">

															<h1>ADD GIFT VOUCHER</h1>

															<div class="tb-pop-hr"></div>

															

															<input class="ad-input1" type="text" placeholder="ENTER YOUR AMOUNT">

															<button class="tb-add-cash-btn" data-toggle="modal" data-target="#addcash">SAVE BANK</button>

														</div>

													</div>

												</div>

											</div>

								</div>

								<p>You Don't have any Gift Vouchers added to Quick pay</p>

								</li>

							</ul>

							<div class="clearfix"></div>

						</div>

						<div class="my-accnt-space" ></div>

					</div>

					<div id="settings" class="tab-pane fade  border-none">

						<div class="tb-settings-wrap">

							 <ul>

								<li class="active"><a data-toggle="tab" href="#edit">EDIT PROFILE</a></li>

								<li><a data-toggle="tab" href="#chnge">CHANGE PASSWORD</a></li>

							</ul>

							<div class="message"></div>

							

							<div class="tb-settings-wrap-content">

								<div class="tab-content">

									<div id="edit" class="tab-pane fade in active border-none">

										<form name="updateForm" id="updateForm" data-parsley-validate="">

										<div class="tb-settings-edit">

											<input class="tb-settings-input" type="text" placeholder="FIRST NAME" value="<?php echo $user->first_name;?>" name="first_name" id="first_name">

											<input class="tb-settings-input" type="text" placeholder="LAST NAME" value="<?php echo $user->last_name;?>" name="last_name" id="last_name">

											<input class="tb-settings-input" type="text" placeholder="EMAIL" name="email" value="<?php echo $user->email;?>">

											<input class="tb-settings-input" type="number" placeholder="MOBILE" name="phone" value="<?php echo $user->phone;?>">

											<h1>GENDER</h1>

											<div class="tb-settings-edit-row">

							   					<div class="tb-check-wrap">

												<!-- <div class="tb-settings-check"></div> -->

												<input id="male" class="tb-settings-check" type="radio"  <?php echo ($user->gender=="male" ? 'checked' : '');?> name="gender" value="male">

												<div class="tb-settings-label">MALE</div>

												<!-- <div class="tb-settings-check"></div> -->

												<input id="female" class="tb-settings-check" type="radio" <?php echo ($user->gender=="female" ? 'checked' : '');?> name="gender" value="female">

												<div class="tb-settings-label">FEMALE</div>

												</div><br>

											</div>

												<h1>DATE OF BIRTH</h1>

												<?php

												$date=$user->date_of_birth;

												$orderdate = explode('-', $date);

												$year = $orderdate[0];

												$month   = $orderdate[1];

												$day  = $orderdate[2]; 

												?>



										<div class="tb-settings-edit-row">

											<div class="tb-check-wrap">

												<input class="tb-dob" type="text" placeholder="DAY" name="day" value="<?php echo $day;?>">

												<input class="tb-dob" type="text" placeholder="MONTH" name="month" value="<?php echo $month;?>" style="margin-left: 10px;margin-right: 10px;">

												<input class="tb-dob" type="text" placeholder="YEAR" name="year" value="<?php echo $year;?>">

											</div>

										</div><br>

									

									

										<br>

										<div class="tb-settings-edit-row">

										<div class="tb-check-wrap">

										

										</div>

										</div><br>

										<div class="tb-settings-edit-row">

											<input type="button" class="tb-add-cash-btn" id="form_submit"  name="submit" value="UPDATE" />

										</div>

									

									</div>

									</form>	

								</div>

								

								

								<div id="chnge" class="tab-pane fade border-none">

									<form id="password_change" >

									<div class="tb-settings-edit">

										<div class="tb-settings-edit-row">

											<input class="tb-settings-input" type="password" name="current_password" placeholder="CURRENT PASSWORD">

											<input class="tb-settings-input" type="password" name="new_password" placeholder="NEW PASSWORD">

											<input class="tb-settings-input" type="password" name="confirm_password" placeholder="CONFIRM PASSWORD">

										</div>

										<div class="tb-settings-edit-row" style="margin-top: 30px;">

											<input type="submit" class="tb-add-cash-btn" id="changePassword" value="UPDATE">

										</div>

									</div>

									</form>

								</div>

							

							</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>   

	</div>



	<script type="text/javascript">

		$('#form_submit').on('click',function(){

			var value=$('#updateForm').serialize();

			var url = '<?php echo base_url("myaccount/updateProfile"); ?>';

			//alert(url);

		    $.ajax({

		        url: url,

		        data:value,

		        type: "POST",

		        success: function(response){

		        	$(".message").show();

		           if(response==0){

		           	$(".message").html('<div class="alert alert-success">Successfully Updated</div>');

		           	setTimeout(function(){$(".message").hide(); }, 3000);

		           }else{

		           	$(".message").html('<div class="alert alert-danger">Email Id or Phone number already exist</div>');

		           	setTimeout(function(){$(".message").hide(); }, 3000);

		           }

		        }

		    }); 



		})

		$('#changePassword').on('click',function(){

			var value=$('#password_change').serialize();

			var url = '<?php echo base_url("myaccount/changePassword"); ?>';

			//alert(url);

		    $.ajax({

		        url: url,

		        data:value,

		        type: "POST",

		        success: function(response){

		          $(".message").show();

		           if(response==1){

		           	$(".message").html('<div class="alert alert-success">Successfully Changed</div>');
		          
		           	  $('input[type="password"]').val('');



		           setTimeout(function(){$(".message").hide(); }, 3000);

		           }else if(response==2){

		           	$(".message").html('<div class="alert alert-danger">New Password and Confirm Password are  not correct</div>');
                     $('input[type="password"]').val('');

		           setTimeout(function(){$(".message").hide(); }, 3000);

		           }else if(response==3){

		           	$(".message").html('<div class="alert alert-danger">Current Password not correct</div>');
                     $('input[type="password"]').val('');
		           setTimeout(function(){$(".message").hide(); }, 3000);

		           }else{

		           	$(".message").html('<div class="alert alert-danger">Error</div>');
                     $('input[type="password"]').val('');
		           setTimeout(function(){$(".message").hide(); }, 3000);

		           }

		        }

		    }); 



		})



	</script>

	<?php
/*echo 'end myaccount';
$user = $this->session->userdata('logged_in');
print_r($user);*/
?>