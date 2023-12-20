<?php
  $id = $this->uri->segment(3);
?>	
	<!-- TITLE-BANNER -->

	<div class="tb-main-content-wrap" ng-controller="singlemovieCtrl" ng-init="movieDetails(<?php echo $id;?>);getreviews(<?php echo $id;?>);peopleViewed(<?php echo $id; ?>);leadCast(<?php echo $id; ?>);movieDetails_comming(<?php echo $id; ?>);leadCrew(<?php echo $id; ?>)  ">
		<div class="tb-main-video-banner">
			<div class="tb-video-slider">
				<img ng-hide="moviedetailsssss.path" src="<?php echo base_url('admin/');?>{{moviedetailsssss.image}}" style="width:100%;height:550px">
		  	  <iframe ng-show="moviedetailsssss.path"  width="100%" height="570px" src="{{moviedetailsssss.trailer | trustUrl}}" style="border:none;" allowfullscreen></iframe> 
			</div>

			<div class="tb-inner-video-banner">
			<div class="container">
				<div class="row">
					<div class="col-md-2 padding0">
						<div class="tb-profile-pic">
							<img src="<?php echo base_url('admin/');?>{{moviedetailsssss.image}}">
						</div>
					</div>
					<div class="col-md-10 padding0">
						<div class="tb-banner-r">
							<div class="tb-video-banner-right">
								<div class="tb-movie-banner-btm-left">
									<div class="tb-movie-title">
										<h3>{{moviedetailsssss.movie_name|uppercase}}</h3>
									</div>
								</div>
								<div class="tb-movie-banner-btm-left">
									<div class="tb-movie-certification">
										{{moviedetailsssss.certificate}}
									</div>
									<div class="tb-movie-genere">
										<!--<li>{{moviedetailsssss.tags_select|uppercase}}</li>-->
										<div class="tb-gen" ng-repeat="item in moviedetailsssss.tags_select.split(',')">{{item}}</div>									
										<li>{{moviedetailsssss.name|uppercase}}</li>
										<div class="clearfix"></div>
										<!-- <li>DRAMA</li> -->
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="tb-movie-banner-btm-left">
								<div class="tb-video-btm-banner-right">
									<div class="tb-movie-voting font-black">
										0{{moviedetailsssss.number}} VOTES
									</div>
									<div class="tb-movie-rating">
										{{moviedetailsssss.percentage}}%
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							
								<div class="tb-video-btm-banner-right">
									<div class="tb-ratting1">
										<span ng-repeat="i in counter(on) track by $index">
											<img src="<?php echo base_url();?>assets/public/images/star-on.png">	
										</span>
										<span ng-repeat="i in counter(off) track by $index">
											<img src="<?php echo base_url();?>assets/public/images/star-off.png">
										</span>
									</div>
									<div class="tb-social">
										<li><a href="{{moviedetailsssss.facebook_link}}" ng-show="(moviedetailsssss.facebook_link!='')" target="_blank" rel="nofollow" title="Like Us on Facebook"><img src="<?php echo base_url();?>assets/public/img/fb.png"></a></li>
										
										<li><a href="{{moviedetailsssss.google_plus}}" ng-show="(moviedetailsssss.google_plus!='')" target="_blank" rel="nofollow" title="Like Us on Googleplus"><img src="<?php echo base_url();?>assets/public/img/g+.png"></a></li>
										
										<li><a href="{{moviedetailsssss.twiter_link}}" ng-show="(moviedetailsssss.twiter_link!='')" target="_blank" rel="nofollow" title="Like Us on Googleplus"><img src="<?php echo base_url();?>assets/public/img/twit.png"></a></li>
										
										<li><a href="{{moviedetailsssss.linkedin_link}}" ng-show="(moviedetailsssss.linkedin_link!='')" target="_blank" rel="nofollow" title="Like Us on Googleplus"><img src="<?php echo base_url();?>assets/public/img/ink.png"></a></li>
									<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>

		</div>

		<div class="tb-clear-space"></div>
		<div class="container">
			<div class="tb-movie-details">
				<div class="row">
					<div class="col-md-8">
						<div class="tb-movie-details1">
							<ul>
								<li>
									<ul class="tb-movie-parent-ul-1">
										<li class="child-1">Director</li>
										<li class="child-2">:</li>
										<li class="child-3">{{director}}</li>
										<div class="clearfix"></div>
									</ul>
								</li>
								<li>
									<ul class="tb-movie-parent-ul-1">
										<li class="child-1">Film Hours</li>
										<li class="child-2">:</li>
										<li class="child-3">{{moviedetailsssss.total_hours}}</li>
										<div class="clearfix"></div>
									</ul>
								</li>
						<!-- 		<li>
									<ul class="tb-movie-parent-ul-1">
										<li class="child-1">Budget</li>
										<li class="child-2">:</li>
										<li class="child-3">{{moviedetailsssss.film_budget}}</li>
										<div class="clearfix"></div>
									</ul>
								</li>
								<li>
									<ul class="tb-movie-parent-ul-1">
										<li class="child-1">Screenplay</li>
										<li class="child-2">:</li>
										<li class="child-3">
										 {{moviedetailsssss.screen_playnames}}
										</li>
										<div class="clearfix"></div>
									</ul>
								</li> -->
							</ul>
							<hr>
						</div>
						<div class="tb-movie-tab">
							<ul>
								<li class="active padding-btm-5"><a data-toggle="tab" href="#summary">SUMMARY</a></li>
								<li><a data-toggle="tab" href="#review">REVIEWS</a></li>
								<div class="clearfix"></div>
							</ul>
							<div class="tb-movie-content-tab">
								<div class="tab-content">
									<div id="summary" class="tab-pane fade in active border-none">
										{{moviedetailsssss.description}}
									</div>
									<div id="review" class="tab-pane fade border-none">	
										<div class="tb-review-ul-wrap">
											<ul ng-repeat="view_rate in reviewss" style="padding:0px;">
												<li>
													<div class="tb-review-prof">
														<img src="<?php echo base_url();?>{{view_rate.image}}">
													</div>
													<div class="tb-review-det">
														<h1>
															<span>{{view_rate.first_name}}
														</h1>
														<p>{{view_rate.title}}:&nbsp;
												{{view_rate.comments}}</p>
													</div>
												</li>
											</ul>
										</div>									
									</div>
								</div>
							</div>
						</div>
						<div class="tb-movie-cast">
							<h1>LEAD CAST</h1>
							<!--<div class="leadcast-slider">
								<div class="leadcast-slider-item">
									<ul id="leadcast-slider-ul" class="leadcast-slider-ul">
										<li ng-repeat="leadCast in leadcast.castand_crews_values">
											<div class="leadcast-box">
												<div class="leadcast-overlay">
													<p>{{leadCast.name}}</p>
												</div>
												<img src="<?php echo base_url();?>{{leadCast.act_image}}">
											</div>
										</li>
									</ul>
								</div>
							</div>-->
							<div class="leadcast-slider">
		<div class="leadcast-slider-item">
            <ul id="leadcast-slider-ul" class="leadcast-slider-ul">
                <li ng-repeat="leadCast in leadcast.castand_crews_values">
				<div class="leadcast-box">
					<!-- <div class="leadcast-overlay"><p>{{leadCast.name}}</p></div> -->
					<a  href="<?php echo base_url();?>movie/view_details/{{leadCast.id}}">
					<img src="<?php echo base_url('admin/');?>{{leadCast.act_image}}">
					<div class="actors_name"><p>{{leadCast.name}}</p></div>
				</div>
				</li>
             </ul>
        </div>
	</div>	
	<h1>LEAD CREW</h1>
						<div class="leadcrew-slider">
		<div class="leadcrew-slider-item">
            <ul id="leadcrew-slider-ul" class="leadcrew-slider-ul">
                <li ng-repeat="leadCast in leadcrew.film_crews">
				<div class="leadcast-box">
					<!-- <div class="leadcast-overlay"><p><b>{{leadCast.actor_name}}</b><br>{{leadCast.role}}</p></div> -->
					<a  href="<?php echo base_url();?>movie/view_details/{{leadCast.id}}">
					<img src="<?php echo base_url('admin/');?>{{leadCast.image}}">
					<div class="actors_name"><p><b>{{leadCast.actor_name}}</b><br>{{leadCast.role}}</p></div>
				</div>
				</li>
             </ul>
        </div>
	</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="tb-show-right1" ng-init="glry(<?php echo $id;?>)">
							<div class="tb-show-right-head">
								GALLERY
							</div>
							<div class="tb-gallery">
								<div class="gallery"  ng-repeat="getgallery in gallery_view">
									<a href="<?php echo base_url();?>{{getgallery.image}}">
										<img src="<?php echo base_url('admin/');?>{{getgallery.image}}" alt="" title="Beautiful Image" />
									</a>
								</div>
								<div class="clearfix"></div>
								<!--<div class="tb-show-right-head">
									BOOK NOW
								</div>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		<div class="tb-movie-prof-slider" >
			<h1>PEOPLE WHO VIEWED THIS ALSO VIEWED</h1>
			<div class="tb-hr"></div>
			<div class="tb-prf-slider-wrap">
				<ul id="tb-prf-slider" class="tb-prf-slider">
					<li ng-repeat="pplMovies in peopleMovies">
						<div class="tb-poster">
							<div class="tb-poster-overlay">
								<div class="ua">{{pplMovies.certificate}}</div>
							</div>
							<img src="<?php echo base_url('admin/');?>{{pplMovies.image}}">
						</div>
						<div class="tb-poster-btm">
							<div class="tb-movie-rating tbratting">{{pplMovies.percentage}}%</div>
							<div class="tb-vote">{{pplMovies.number}} VOTES</div>
							<!-- <a href="<?php echo base_url();?>home/singleMovie/{{pplMovies.id}}"> -->
								<h2>{{pplMovies.movie_name|uppercase}}</h2>
							<!-- </a> -->
							<div class="tb-gen-wrap">
								<!--<div class="tb-gen">{{pplMovies.ple_select|uppercase}}</div>-->
									
								<div class="tb-gen" ng-repeat="item in pplMovies.ple_select | split | limitTo: 1">{{item}}</div>
								<div class="tb-gen">{{pplMovies.name|uppercase}}</div>
							</div>
						</div>
					</li>
					
				</ul>
			</div>
		</div>
	</div>


		

	
	