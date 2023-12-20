<?php
 $id = $this->uri->segment(3);

?>
	
<div class="tb-main-content-wrap" ng-controller="bookCtrl" ng-init="getMovieDetails(<?php echo $id;?>);getTheaterdata(<?php echo $id;?>,'');settings();">

	<div class="tb-slider">
		<div class="tb-movie-select-banner">
			<img ng-src="{{selected_movie.banner_image}}" style="width:100%;height:550px;">
			<div class="tb-movie-banner-btm">
				<div class="container">
					<div class="row">

						<div class="col-md-6">
							<div class="tb-movie-banner-btm-left">
								<div class="tb-movie-title">
									<a href="<?php echo base_url();?>home/singleMovie/<?php echo $id;?>">
									<h3>{{selected_movie.movie_name|uppercase}}</h3></a>
								</div>
								<div class="tb-movie-rating">
									{{selected_movie.percentage}}%
								</div>
							</div>
							<div class="tb-movie-banner-btm-left">
								<div class="tb-movie-certification">
									{{selected_movie.certificate}}
								</div>
								<div class="tb-movie-voting">
									{{selected_movie.number}} VOTES
								</div>
								<div class="tb-movie-genere">
									<li ng-repeat="skillName in selected_movie.tag_name.split(',')">
										<!-- <div class="tb-gen" ng-repeat=" in films.select_tags | split | limitTo: 1">{{item}}</div> -->
												<div>{{skillName}}</div></li>
									<!-- <li>THRILLER</li>
									<li>DRAMA</li> -->
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="tb-movie-banner-btm-right">
								<div class="tb-director align-right" style="border-right:2px solid #fff;">
									<h5>DIRECTOR</h5>
									<div class="tb-character">
										<div class="circle">
											<img class="leadcastimage" ng-src="{{image}}">
										    <h4>{{directors}}</h4>
									    </div>
									</div>
								</div>
								<div class="tb-director">
									<h5>CAST & CREW</h5>
									<div class="tb-character align-left border-none flex">
										<div class="circle" ng-repeat="selected_castcrewsw in selected_movie.cast | limitTo: 5" ng-show="selected_castcrewsw.role!='Director'">

                                          <img  ng-src="{{selected_castcrewsw.image}}">
                                            <h4>{{selected_castcrewsw.actor_name|limitTo:18}}</h4>
                                            <!-- <h4>{{stripAddr(selected_castcrewsw.actor_name)}}</h4> -->
										</div>
									</div>
									
									
									<!--div class="tb-character align-left border-none flex">
										<div ng-repeat="selected_castcrewsw in selected_movie.castandcrews">
											
										</div>
									</div-->
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- MAIN-TAB-CONTENT -->

	<input name="date_value" id="date_value" type="hidden" ng-model="date_value" value="<?php echo date('d-m-Y'); ?>">
	<div class="tb-movie-select-tab-div" ng-init="getdate()">
		<div class="tb-movie-tab-head">
			<div class="tb-movie-badge">
				<h6>{{day}}</h6>
				{{month | date: 'MMM'}}
				<input type="hidden" name="select_date" ng-model="select_date">
			</div>
			<div class="container">
				<div class="col-md-12">
					<div class="tb-date-tabs">
						<ul>
							<li class="active"><a data-toggle="tab" href="#today" ng-click="getTheaterdata(<?php echo $id;?>,month);"><strong>{{day}}</strong><h6>TODAY</h6></a></li>
							<li><a data-toggle="tab" href="#today" ng-click="getTheaterdata(<?php echo $id;?>,nextsDate);"><strong>{{nday}}</strong><h6>TOM</h6></a></li>
							<li><a data-toggle="tab" href="#today" ng-click="getTheaterdata(<?php echo $id;?>,nextssDate);"><strong>{{nday1}}</strong><h6>NEXT</h6></a></li>
							<li class="tb-static-tab">{{selected_movie.name}}-{{selected_movie.format_name}}</li>
							<li class="tb-static-tab">
								<select class="tb-tab-select" ng-model="selected_price" ng-change="call_Theaterdata(<?php echo $id;?>);">
									<option selected="selected" value="">Filter Price Range</option>
									<option ng-repeat="price in show_filterprice">{{price}}</option>
								</select>
							</li>
							<li class="tb-static-tab">
								<select class="tb-tab-select" ng-model="selected_time" ng-change="call_Theaterdata(<?php echo $id;?>);">
									<option selected="selected" value="">Filter Show Timing</option>
									<option ng-repeat="time in show_filtertime" value="{{time.shift}}">{{time.value}}</option>
								</select>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="tb-movie-tab-content">
			<div class="container">
				<div class="col-md-12 padding0">
					<div class="tb-tab-content">
						<div class="tab-content">
							<div id="today" class="tab-pane fade in active border-none" ng-show="num_result>0">
								<ul>
									<li ng-repeat="theater in show_theater">
										<div class="tb-show-row">
											<div class="row">
												<div class="col-md-2 padding0">
													<div class="tb-show show-head">{{theater.name}}</div>
												</div>
												
												<div class="col-md-1 padding0" ng-repeat="time in theater.time">
                                              
													<div class="tb-show tb-show-div">
														<a href="#" ng-show="time.status=='active'" data-toggle="modal" data-target="#pickseat" ng-click="get_seat_layout(time.show_id)">{{time.time}}</a>
														<a href="#" ng-show="time.status=='inactive'" data-toggle="modal" style="color:#CBCBCB">{{time.time}}</a>
													</div>
												</div>
								
											</div>
										</div>
									</li>
								</ul>
							
							<!-- PICK-SEAT-MODAL -->
							
							<div id="pickseat" class="modal tb-pickseat-modal fade" role="dialog">
								<div class="modal-dialog tb-pickseat-dialog">
									<div class="modal-content tb-pickseat-content">
										<div class="tb-pickseat-header">
											 <button type="button" class="close" data-dismiss="modal">&times;</button>	
											<div class="row">
												<div class="col-md-1">
													<div class="tb-pick-seat-photo">
														<img ng-src="{{selected_movie.image}}"> 
													</div>
												</div>
												<div class="col-md-5">
													<h4>{{show_theater_info.movie_name}}</h4>
													<div class="tb-bottom-pickseat">
														<p>{{show_theater_info.language}} | {{show_theater_info.format_name}}<br>
														{{show_theater_info.theater}} : {{show_theater_info.location}}<br>
														Screen : {{show_theater_info.screen_name}}
														</p>
														<div class="ua" style="position:inherit;top:0px;right:0px;float:left;">{{show_theater_info.certificate}}</div>
														<div class="clearfix"></div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-3"></div>
														<div class="col-md-3">Show time :<br>
															<ul class="tb-pickseat-ul">
																<li>{{show_theater_info.screen_timing}}</li>
																<div class="clearfix"></div>
															</ul>
														</div>
														<div class="col-md-3">Total :<br>
															<ul class="tb-pickseat-ul">
																<li>RS {{price}}</li>
																<div class="clearfix"></div>
															</ul>
														</div>
														<div class="col-md-3"><br>
														
															<span ng-show="logged_user"><button class="tb-process-button"  ng-click="payment_process()" ng-show="price>0" data-toggle="modal" data-target="#process">PROCEED</button></span>
														
															<a href="#signin" ng-hide="logged_user" ng-click="hideModal()"><button class="tb-process-button"  ng-show="price>0">PROCEED</button></a>
														

														<input type="hidden" ng-modek="show_id" name="show_id">

														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="container">
											<div class="modal-body tb-pickseat-body">
													
												<table class="table preview" ng-repeat="(key,columns) in front_preview_rows  track by $index">
                      							<tr>
                        							<th colspan="100%" class="tb-seat-class" >
                         								 <p>{{key}}</p>
                       								 </th><br>
                      							</tr>
                     							<tr ng-repeat="rows in columns  track by $index">
                       								<td class="tb-pickseat-row-value">LANE :{{rows.rowname.value}}</td>
                      								<td class="chair_row" ng-repeat="r in rows  track by $index" ng-show="r.check==true || r.check==false">
                          								<label ng-show="r.check" ng-class="{'blk': r.check,'disb' : !r.check}" class="{{rows.rowname.value+$index}}">
                           									 {{r.number}}
                          								</label>
                         								<input ng-show="r.check" type="checkbox" class="chair" ng-class="{'blk': r.check,'disb' : !r.check}" id="{{rows.rowname.value+$index}}" ng-click="selectSeat(rows.rowname.value+$index,rows.rowname.value+r.number,rows.price.value)" />
                       								</td>
                      							</tr>
                   								<!-- <tr>
                        							<td colspan="100%" class="" >
                         								 SCREEN PLAY STAGE
                       								 </td><br>
                   				
                   								</tr> -->
                   								</table>

											</div>
											<div class="tb-pickseat-screen">
                   									SCREEN PLAY STAGE
                   								</div>
										</div>
									</div>
								</div>
							</div>

							<!-- PROCESS-MODAL -->

							<div id="process" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  								<div class="modal-dialog tb-process-dialogue">
									<div class="modal-content">
										<div class="tb-show-right">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="close_button()">
                                                <span aria-hidden="true">&times;</span></button>
													<div class="tb-show-right-head" data-toggle="collapse" data-target="#summary">
														BOOKING SUMMARY

													</div>
											<div class="tb-show-right-content-wrap collapse in" id="summary">
												<div class="tb-show-right-content">
													<div class="tb-sml-badge">
														<p>₹</p>
														{{payment_info.price}}
													</div>
													<ul>
														<li class="child1" style="width:100% !important;">SCREEN {{show_theater_info.screen_name}} &nbsp;&nbsp;</li>
														<li class="child2"></li>
													</ul>
													<ul class="paddingtop0">
														<li class="child1">Seat No: {{payment_info.seat}}</li>									
													</ul>
												</div>
												<div class="tb-show-right-content">
													<ul>
														<li class="child1 sub">Sub Total</li>
														<li class="child2">{{currency}} {{payment_info.sub_total}}</li>
													</ul>
													<ul class="paddingtop0">
														<li class="child1">Internet handling fees</li>
														<li class="child2">{{currency}} {{payment_info.internet_fee}}</li>
													</ul>
													
													<ul class="paddingtop0 orange-sub">
														<li class="child1 orange-sub">Booking fees</li>
														<li class="child2 orange-sub">{{currency}} {{payment_info.booking_fees}}</li>
													</ul>
													<ul class="paddingtop0 orange-sub">
														<li class="child1 orange-sub">Service Tax @ .14%</li>
														<li class="child2 orange-sub">{{currency}} {{payment_info.service_tax}}</li>
													</ul>
													<ul class="paddingtop0 orange-sub">
														<li class="child1 orange-sub">Swachh Bharat Cess @ 0.50%</li>
														<li class="child2 orange-sub">{{currency}} {{payment_info.swachh_bharat}}</li>
													</ul>
													
													<ul class="paddingtop0">
														<li class="child1">Promocode</li>
														<li class="child2">
															<!-- <input type='hidden' name='total_amount' id="off" value='off'> -->
															<div class="tb_pay10"></div></li>
													</ul>
												
												</div>
												<div class="tb-show-right-content border-none ">
													<ul class="paddingtop30">
														<li class="child1">Amount Payable</li>
														<li class="child2 tb_pay1"><input type='hidden' ng-model='total_amount' id="total_amount" value='{{payment_info.price}}'>{{currency}} {{payment_info.price}}</li>
														<!-- <li class="child2">Rs.{{payment_info.price}}</li> -->
													</ul>
												</div>
											</div>
											<!--<div class="tb-show-right-head" >
											PROMO CODE
											</div>
											<div class="tb-show-right-content-wrap">
												<div class="tb-show-right-content border-none">
													<input class="tb-input1" type="text" placeholder="Enter your promo code here">
												</div>
											</div>-->
											<div class="tb-show-right-head" style="margin-top:10px;">
												PAYMENT OPTIONS
											</div>

											
			                              

											<form name="form" ng-submit="pay_submit()">
											<div class="tb-show-right-content-wrap" id="payment_sec" style="display:none;">
												<div class="tb-show-right-content border-none">

													<div class="promo_code">
			                                  <input id="code" type="text"  class="payment-input" value="" name="promocode" placeholder=" Input promocode">
			                                  <div id="user_id" ng-hide="true" value="{{payment_info.user_id}}">{{payment_info.user_id}}</div>
			                                  <button id="promo_check"  class="promo_butto">Check</button>

			                                  <span id="promo_status" style="color:red"></div>
			                                  		<div class="tb-show-right-content border-none ">
													<ul class="paddingtop30">
														<li class="child1">Amount Payable</li>
														<li class="child2 tb_pay1" id="total" value="total_amount">{{currency}} {{payment_info.price}}</li>
														<!-- <li class="child2">Rs.{{payment_info.price}}</li> -->
													</ul>
												</div>

													<div class="tb-payment">
														<div class="b1"></div>
														<div class="b2">CREDIT CARD/DEBIT CARD</div>
														<div class="b3"><input type="radio" ng-model="payment" name="payment" value="card" id="card" data-toggle="collapse" data-target="#card1"></div>
													</div>

													<div id="card1" class="collapse">
													<div class="tb-payment-detail">
														Card Number<br>	
														<input type="text" class="payment-input" placeholder="CREDIT CARD NO" ng-pattern="/^(0|[0-9][0-9]*)$/" name="card_no" ng-model="card_no" ng-minlength='{{user.card_no.minlength}}' ng-maxlength="{{user.card_no.maxlength}}" />
					          							<span ng-show="form.card_no.$error.minlength || form.card_no.$error.maxlength || form.card_no.$error.pattern">Invalid Card no!</span>
					   								</div>

					   								<div class="tb-payment-detail">
														Name on the card<br>
														<input class="payment-input" type="text" placeholder="Name ON CARD" ng-model="card_name" name="card_name">
													</div>
													<div class="tb-payment-detail flex">
														<div>
															Expiry<br>
															<input class="payment-input width35" type="text" placeholder="09" ng-pattern="/^(0|[0-9][0-9]*)$/" ng-model="card_month" name="card_month" ng-minlength='{{user.card_month.minlength}}' ng-maxlength="{{user.card_month.maxlength}}">
															<span ng-show="form.card_month.$error.minlength || form.card_month.$error.maxlength || form.card_month.$error.pattern" style="color:red">Invalid Card Month</span>
														</div>
														<div>
															<br>
															<input class="payment-input width35" type="text" placeholder="28" ng-pattern="/^(0|[0-9][0-9]*)$/" ng-model="card_year" name="card_year" ng-minlength='{{user.card_year.minlength}}' ng-maxlength="{{user.card_year.maxlength}}">
															<span ng-show="form.card_year.$error.minlength || form.card_year.$error.maxlength || form.card_year.$error.pattern" style="color:red">Invalid Card Year</span>
														</div>
														<div style="width:58px;"></div>
														<div>
															CVV<br>
															<input class="payment-input width35" ng-model="card_cvv" type="text" ng-pattern="/^(0|[0-9][0-9]*)$/" placeholder="CVV" ng-minlength='{{user.card_cvv.minlength}}' ng-maxlength="{{user.card_cvv.maxlength}}" name="card_cvv">
															<span ng-show="form.card_cvv.$error.minlength || form.card_cvv.$error.maxlength || form.card_cvv.$error.pattern" style="color:red">Invalid Card CVV</span>
														</div>

														
														
													</div>
													<div class="tb-payment-detail">
															<span style="color:red">{{error_message}}</span>
					   								</div>
													
													</div>
													<!-- <input type='hidden' ng-model="total_amount" name="total_amount" id="total_amount" value='{{payment_info.price}}'> -->


													<div class="tb-payment" id="paypal_sec" data-target="#paypal">
														<div class="b4"></div>
														<div class="b2">PAYPAL</div>
														<div class="b3"><input type="radio" ng-model="payment" name="payment" value="paypal" id="paypal"></div>
													</div>
													<div id="card" class="collapse">
													<div class="tb-payment-detail" >
														<!-- <input type="hidden" name="amount" ng-model="amount"> -->
													</div>
													</div>

													<div class="tb-payment" id="cash_on_delivery" data-target="#cashdelivery1">
														<div class="b1"></div>
														<div class="b2">CASH ON DELIVERY</div>
														<div class="b3"><input type="radio" ng-model="payment" name="payment" value="cashondelivery" id="cashondelivery"></div>
													</div>
													<div id="cashdelivery1" class="collapse">
												        <div class="tb-payment-detail" >
														  <!-- <input type="hidden" name="total_amount" ng-model="total_amount"> -->
													    </div>
					   							    </div>


													<div class="tb-payment-detail" >
														<input type="submit" ng-disabled="form.$invalid" class="tb-prcd" value="Proceed" >
													</div>
												</div>
											</div>
											</form>
										</div>
     									
    								</div>
								</div>
							</div>


							</div>
<!--
							<div id="tom" class="tab-pane fade border-none">
							ghujghughu
							</div>
							<div id="nxt" class="tab-pane fade border-none">
							djjje
							</div>
							-->
							<div class="tb-noshow" ng-show="num_result==0">
								Oops ! Sorry No show available.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
 
<?php
  // $id = $this->uri->segment(3);
  // $user = $this->session->userdata('logged_in');
  // print_r($user);

?>