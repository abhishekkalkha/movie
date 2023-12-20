<!-- TITLE-SLIDER -->
	
	<div class="tb-main-content-wrap">
		<div class="tb-myacnt-cover">
			<img src="<?php echo base_url();?>assets/public/img/tb-cover.png">
		</div>
		<div class="tb-accnt-tab-bay">
			<div class="container">
				<div class="tb-cover-detail">
					<div class="tb-cover-side">
						<div class="tb-cover-profile-photo">
							<img src="<?php echo base_url();?>assets/public/img/wayne.png">
						</div>
						<div class="tb-cover-name">
							<h1>BRUCE WAYNE</h1>
							<h2>9539757996</h2>
						</div>
					</div>
					<div class="tb-cover-side">
						<button class="tb-gplus"></button>
						<button class="tb-fbk"></button>
					</div>	
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
				<div class="my-accnt-space"></div>
				<div class="tab-content">
					<div id="mywallet" class="tab-pane fade in active border-none">
						<div class="tb-accnt-tab-bay tb-accnt-tab-bay-ul1">
							<ul>
								<li class="active"><a data-toggle="tab" href="#trans">TRANSACTION HISTORY</a></li>
								<li><a data-toggle="tab" href="#transtobnk">TRANSFER TO BANK</a></li>
								<li><a data-toggle="tab" href="#settings1">SETTINGS</a></li>
								<div class="tb-moneybag">
									<img src="<?php echo base_url();?>assets/public/img/9.png">
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
														<button class="add-cash-close" data-dismiss="modal"></button>
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
								<div id="transtobnk" class="tab-pane fade in active border-none">
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
								<div id="settings1" class="tab-pane fade in active  border-none">
									<div class="tb-wallet-bal">
										<h1>TOTAL WALLET BALANCE</h1>
										<h2>RS . 1280.00</h2>
									</div>
									<div class="tb-wallet-oops">
										<div class="tb-wallet-1">
											<h2><div class="tb-tick"><img src="img/check.png"></div>INSTANT REFUNDS TO MYWALLET</h2>
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
								<li>
									<div class="tb-ticket-inner">
										<div class="tb-ticket-grey">
											<div class="tb-ticket-poster">
												<div class="tb-ticket-poster-inner">
													<img src="<?php echo base_url();?>assets/public/img/a2.jpg">
												</div>
												<div class="tb-ticket-ratting">
													ADD YOUR RATTING
													<div id="tick-rate"></div>
													
												</div>
											</div>
											<div class="tb-ticket-details">
												<h4>HARRY POTTER AND SOCCERES STONE (U/A)</h4>
												<ul>
													<li>PVR: LULU MALL, EDAPALLY</li>
													<li></li>
												</ul>
												<ul>
													<li>07:50PM | 12-FEB-2016</li>
													<li></li>
												</ul>
												<ul>
													<li>QUANTITY:2</li>
													<li></li>
												</ul>
													<hr>
												<ul>
													<li>TICKET PRICE</li>
													<li>RS.280.0</li>
												</ul>
												<ul>
													<li class="grey">CONVENIENCE FEES</li>
													<li></li>
												</ul>
												<ul>
													<li>SERVICE TAX</li>
													<li>RS.365.2</li>
												</ul>
												<ul>
													<li>MERCHANDISE</li>
													<li>RS.2.00</li>
												</ul>
												<hr>
												<div class="l1">
													<div class="l2">
													AMOUNT PAID
													</div>
													<div class="l2">
													<strong>695.00</strong>
													</div>
												</div>
											</div>
										</div>
										<div class="tb-ticket-red">
											<div class="tb-code-div">
												<img src="<?php echo base_url();?>assets/public/img/code.png">
											</div>
											<hr>
											<div class="tb-code-btm">
												<h1>BOOKING ID</h1>
												<p>WQ3ER0T</p>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="tb-ticket-inner">
										<div class="tb-ticket-grey">
											<div class="tb-ticket-poster">
												<div class="tb-ticket-poster-inner">
													<img src="<?php echo base_url();?>assets/public/img/a2.jpg">
												</div>
												<div class="tb-ticket-ratting">
													ADD YOUR RATTING
													<div id="tick-rate"></div>
													
												</div>
											</div>
											<div class="tb-ticket-details">
												<h4>HARRY POTTER AND SOCCERES STONE (U/A)</h4>
												<ul>
													<li>PVR: LULU MALL, EDAPALLY</li>
													<li></li>
												</ul>
												<ul>
													<li>07:50PM | 12-FEB-2016</li>
													<li></li>
												</ul>
												<ul>
													<li>QUANTITY:2</li>
													<li></li>
												</ul>
													<hr>
												<ul>
													<li>TICKET PRICE</li>
													<li>RS.280.0</li>
												</ul>
												<ul>
													<li class="grey">CONVENIENCE FEES</li>
													<li></li>
												</ul>
												<ul>
													<li>SERVICE TAX</li>
													<li>RS.365.2</li>
												</ul>
												<ul>
													<li>MERCHANDISE</li>
													<li>RS.2.00</li>
												</ul>
												<hr>
												<div class="l1">
													<div class="l2">
													AMOUNT PAID
													</div>
													<div class="l2">
													<strong>695.00</strong>
													</div>
												</div>
											</div>
										</div>
										<div class="tb-ticket-red">
											<div class="tb-code-div">
												<img src="<?php echo base_url();?>assets/public/img/code.png">
											</div>
											<hr>
											<div class="tb-code-btm">
												<h1>BOOKING ID</h1>
												<p>WQ3ER0T</p>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="tb-ticket-inner">
										<div class="tb-ticket-grey">
											<div class="tb-ticket-poster">
												<div class="tb-ticket-poster-inner">
													<img src="<?php echo base_url();?>assets/public/img/a2.jpg">
												</div>
												<div class="tb-ticket-ratting">
													ADD YOUR RATTING
													<div id="tick-rate"></div>
													
												</div>
											</div>
											<div class="tb-ticket-details">
												<h4>HARRY POTTER AND SOCCERES STONE (U/A)</h4>
												<ul>
													<li>PVR: LULU MALL, EDAPALLY</li>
													<li></li>
												</ul>
												<ul>
													<li>07:50PM | 12-FEB-2016</li>
													<li></li>
												</ul>
												<ul>
													<li>QUANTITY:2</li>
													<li></li>
												</ul>
													<hr>
												<ul>
													<li>TICKET PRICE</li>
													<li>RS.280.0</li>
												</ul>
												<ul>
													<li class="grey">CONVENIENCE FEES</li>
													<li></li>
												</ul>
												<ul>
													<li>SERVICE TAX</li>
													<li>RS.365.2</li>
												</ul>
												<ul>
													<li>MERCHANDISE</li>
													<li>RS.2.00</li>
												</ul>
												<hr>
												<div class="l1">
													<div class="l2">
													AMOUNT PAID
													</div>
													<div class="l2">
													<strong>695.00</strong>
													</div>
												</div>
											</div>
										</div>
										<div class="tb-ticket-red">
											<div class="tb-code-div">
												<img src="<?php echo base_url();?>assets/public/img/code.png">
											</div>
											<hr>
											<div class="tb-code-btm">
												<h1>BOOKING ID</h1>
												<p>WQ3ER0T</p>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="tb-ticket-inner">
										<div class="tb-ticket-grey">
											<div class="tb-ticket-poster">
												<div class="tb-ticket-poster-inner">
													<img src="<?php echo base_url();?>assets/public/img/a2.jpg">
												</div>
												<div class="tb-ticket-ratting">
													ADD YOUR RATTING
													<div id="tick-rate"></div>
													
												</div>
											</div>
											<div class="tb-ticket-details">
												<h4>HARRY POTTER AND SOCCERES STONE (U/A)</h4>
												<ul>
													<li>PVR: LULU MALL, EDAPALLY</li>
													<li></li>
												</ul>
												<ul>
													<li>07:50PM | 12-FEB-2016</li>
													<li></li>
												</ul>
												<ul>
													<li>QUANTITY:2</li>
													<li></li>
												</ul>
													<hr>
												<ul>
													<li>TICKET PRICE</li>
													<li>RS.280.0</li>
												</ul>
												<ul>
													<li class="grey">CONVENIENCE FEES</li>
													<li></li>
												</ul>
												<ul>
													<li>SERVICE TAX</li>
													<li>RS.365.2</li>
												</ul>
												<ul>
													<li>MERCHANDISE</li>
													<li>RS.2.00</li>
												</ul>
												<hr>
												<div class="l1">
													<div class="l2">
													AMOUNT PAID
													</div>
													<div class="l2">
													<strong>695.00</strong>
													</div>
												</div>
											</div>
										</div>
										<div class="tb-ticket-red">
											<div class="tb-code-div">
												<img src="<?php echo base_url();?>assets/public/img/code.png">
											</div>
											<hr>
											<div class="tb-code-btm">
												<h1>BOOKING ID</h1>
												<p>WQ3ER0T</p>
											</div>
										</div>
									</div>
								</li>
								
							</ul>
						</div>
					</div>
					<div id="quickpay" class="tab-pane fade  border-none">
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
																	<img src="<?php echo base_url();?>assets/public/img/sib.png">
																</div>
																</li>
																<li>
																<div class="tb-bank">
																	<img src="<?php echo base_url();?>assets/public/img/sbh.png">
																</div>
																</li>
																<li>
																<div class="tb-bank">
																	<img src="<?php echo base_url();?>assets/public/img/kotak.png">
																</div>
																</li>
																<li>
																<div class="tb-bank">
																	<img src="<?php echo base_url();?>assets/public/img/boi.png">
																</div>
																</li>
																<li>
																<div class="tb-bank">
																	<img src="<?php echo base_url();?>assets/public/img/citybnk.png">
																</div>
																</li>
																<li>
																<div class="tb-bank">
																	<img src="<?php echo base_url();?>assets/public/img/hdfc.png">
																</div>
																</li>
																<li>
																<div class="tb-bank">
																	<img src="<?php echo base_url();?>assets/public/img/punjab.png">
																</div>
																</li>
																<li>
																<div class="tb-bank">
																	<img src="<?php echo base_url();?>assets/public/img/indus.png">
																</div>
																</li>
																<li>
																<div class="tb-bank">
																	<img src="<?php echo base_url();?>assets/public/img/icici1.png">
																</div>
																</li>
																<li>
																<div class="tb-bank">
																	<img src="<?php echo base_url();?>assets/public/img/idbi.png">
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
						<div class="my-accnt-space"></div>
					</div>
					<div id="settings" class="tab-pane fade  border-none">
						<div class="tb-settings-wrap">
							 <ul>
								<li class="active"><a data-toggle="tab" href="#edit">EDIT PROFILE</a></li>
								<li><a data-toggle="tab" href="#chnge">CHANGE PASSWORD</a></li>
							</ul>
							<div class="tb-settings-wrap-content">
							<div class="tab-content">
								<div id="edit" class="tab-pane fade in active border-none">
									<div class="tb-settings-edit">
										<input class="tb-settings-input" type="text" placeholder="FIRST NAME">
										<input class="tb-settings-input" type="text" placeholder="LAST NAME">
										<input class="tb-settings-input" type="text" placeholder="EMAIL">
										<input class="tb-settings-input" type="text" placeholder="MOBILE">
										<h1>GENDER</h1>
										<div class="tb-settings-edit-row">
										<div class="tb-check-wrap">
										<div class="tb-settings-check"></div>
										<div class="tb-settings-label">MALE</div>
										<div class="tb-settings-check"></div>
										<div class="tb-settings-label">FEMALE</div>
										</div>
										</div><br>
										<h1>DATE OF BIRTH</h1>
										<div class="tb-settings-edit-row">
											<div class="tb-check-wrap">
												<input class="tb-dob" type="text" placeholder="DAY">
												<input class="tb-dob" type="text" placeholder="MONTH" style="margin-left: 10px;margin-right: 10px;">
												<input class="tb-dob" type="text" placeholder="YEAR">
											</div>
										</div><br>
										<h1>MARRIED</h1>
										<div class="tb-settings-edit-row">
										<div class="tb-check-wrap">
										<div class="tb-settings-check"></div>
										<div class="tb-settings-label">YES</div>
										<div class="tb-settings-check"></div>
										<div class="tb-settings-label">NO</div>
										</div>
										</div><br>
										<div class="tb-settings-edit-row">
										<div class="tb-check-wrap">
										<div class="tb-settings-check"></div>
										<div class="tb-settings-label1">Get Alerts on mobile for new movies and events. </div>
										</div>
										</div><br>
										<div class="tb-settings-edit-row">
											<button class="tb-add-cash-btn">UPDATE</button>
										</div>
										
									</div>
								</div>
								<div id="chnge" class="tab-pane fade border-none">
									<div class="tb-settings-edit">
										<div class="tb-settings-edit-row">
											<input class="tb-settings-input" type="text" placeholder="CURRENT PASSWORD">
											<input class="tb-settings-input" type="text" placeholder="NEW PASSWORD">
											<input class="tb-settings-input" type="text" placeholder="CONFIRM PASSWORD">
										</div>
										<div class="tb-settings-edit-row" style="margin-top: 30px;">
											<button class="tb-add-cash-btn">VERIFY</button>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>   
	</div>