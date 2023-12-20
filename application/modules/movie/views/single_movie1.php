<?php
   $id = $this->uri->segment(3);
  // $user = $this->session->userdata('logged_in');
  // print_r($user);

?>
	
	<div class="tb-main-content-wrap" ng-controller="singlemovieCtrl" ng-init="movieDetails(<?php echo $id;?>);getreviews(<?php echo $id;?>);peopleViewed(<?php echo $id; ?>);leadCast(<?php echo $id; ?>);movieDetails_comming(<?php echo $id; ?>);leadCrew(<?php echo $id; ?>);get_theatre_details(<?php echo $id; ?>,'') ;">
		<div class="tb-main-video-banner">
			<!-- <img src="<?php echo base_url()?>assets/public/img/tb-video-banner.png" class="video_height"> -->
	
<div  class="video_pic" style="background:url('{{moviedetailsssss.banner_image}}');">
			<div class="youtubeV">
			<div class="videoThum"> 
				<!-- <a rel="" class="youTubeVideo"  data-toggle="modal" data-target="#nowshow_popup" data-toggle="modal" data="nowshowPopup"> -->
					<a href="javascript:;" rel="{{moviedetailsssss.trailer | trustUrl}}" class="youTubeVideo" data-toggle="modal" data-target="#nowshow_popup" data-toggle="modal" data="nowshowPopup" >
					<div class="trailer_play_icon"></div>
				</a>
			</div>
		</div>
			<!-- <div class="play_icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div> -->
		</div> 
		
	<div class="tb-inner-video-banner">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
				
						<div class="tb-profile-pic">
						 <img ng-src="{{moviedetailsssss.image}}"> 
						</div>
					</div>
					<div class="col-md-10">
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
								<div class="tb-gen" ng-repeat="item in moviedetailsssss.tags_select.split(',')">{{item}}</div>									
									<li>{{moviedetailsssss.name|uppercase}}</li>
									<div class="clearfix"></div>
						    </div>
						 </div>
					  </div>
					  <div class="tb-movie-banner-btm-left">
						<div class="tb-video-btm-banner-right">
							<div class="votes">
								<div class="tb-movie-voting font-black">
									{{moviedetailsssss.number}} VOTES
								</div>
								<div class="tb-movie-rating">
									{{moviedetailsssss.percentage}}%
								</div>
							</div>
							<div class="booking" ng-show="movie_details.length != 0">
								<a href="<?php echo base_url()?>book/bookMovie/{{moviedetailsssss.id}}">
									<div class="book_now hvr-shrink">BOOK NOW</div>
								</a>
							</div>
						</div>
					  </div>
					  <div class="tb-movie-banner-btm-left">
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
								<li><a href="{{moviedetailsssss.facebook}}" ng-show="(moviedetailsssss.facebook!='')" target="_blank" rel="nofollow" title="Like Us on Facebook"><img src="<?php echo base_url();?>assets/public/img/fb.png"></a></li>
										
								<li><a href="{{moviedetailsssss.googleplus}}" ng-show="(moviedetailsssss.googleplus!='')" target="_blank" rel="nofollow" title="Like Us on Googleplus"><img src="<?php echo base_url();?>assets/public/img/g+.png"></a></li>
										
								<li><a href="{{moviedetailsssss.twitter}}" ng-show="(moviedetailsssss.twitter!='')" target="_blank" rel="nofollow" title="Like Us on Twitter"><img src="<?php echo base_url();?>assets/public/img/twit.png"></a></li>
										
								<!-- <li><a href="{{moviedetailsssss.linkedin_link}}" ng-show="(moviedetailsssss.linkedin_link!='')" target="_blank" rel="nofollow" title="Like Us on Googleplus"><img src="<?php echo base_url();?>assets/public/img/ink.png"></a></li> -->
							</div>
						</div>
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
										<li class="child-3">{{directors}}</li>
									</ul>
								</li>
								<li>
									<ul class="tb-movie-parent-ul-1">
										<li class="child-1">Film hours</li>
										<li class="child-2">:</li>
										<li class="child-3">{{moviedetailsssss.total_hours}}</li>
									</ul>
								</li>
							</ul>
							<hr>
						</div>
						<div class="tb-movie-tab">
							<ul>
								<li class="active padding-btm-5"><a data-toggle="tab" href="#summary">SUMMARY</a></li>
								<li><a data-toggle="tab" href="#review">REVIEWS</a></li>
							</ul>
							<div class="tb-movie-content-tab">
								<div class="tab-content">
									<div id="summary" class="tab-pane fade in active border-none">
										<div class="summary1">
                                            {{moviedetailsssss.description | htmlToPlaintext}}
										</div>
									
									</div>
									<div id="review" class="tab-pane fade border-none">
									   <div class="tb-review-ul-wrap">
											<ul ng-repeat="view_rate in reviewss" style="padding:0px;">
												<li>

												
													<div class="tb-review-prof">
														 <img ng-src="<?php echo base_url();?>{{view_rate.image}}"> 
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
						  	<div class="leadcast-slider">
		                        <div class="leadcast-slider-item">
                                 <ul id="leadcast-slider-ul" class="leadcast-slider-ul">

                                      <li ng-repeat="leadCast in leadcast.castand_crews_values">
                                      
				                           <div class="leadcast-box">
					                       <a  href="<?php echo base_url();?>movie/view_details/{{leadCast.id}}">
					                      <img ng-src="{{leadCast.act_image}}">

					                       <div class="actors_name"><p>{{leadCast.name}}</p></div></a>
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
					                  <a  href="<?php echo base_url();?>movie/view_details/{{leadCast.id}}">
					                 <img class="leadcastimage" ng-src="{{leadCast.image}}" >
					                  <div class="actors_name"><p><b>{{leadCast.actor_name}}</b><br>{{leadCast.role}}</p></div></a>
				                   </div>
				                  </li>
                               </ul>
                             </div>
	                      </div>
					  </div>
					</div>
					<div class="col-md-4">
						<div class="tb-show-right1"  ng-init="glry(<?php echo $id;?>)">
							<div class="tb-show-right-head">
							  GALLERY
							</div>
							<div class="tb-gallery">
								<div class="gallery" ng-repeat="getgallery in gallery_view">
									<a href="{{go_image_path(getgallery.image)}}">
										<img ng-src="{{go_image_path(getgallery.image)}}" alt="" /> 
									</a>
								</div>
								 <div class="galleryimage" ng-show="gallery_view.length == 0">No Images found!</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tb-movie-prof-slider">
			<h1>PEOPLE WHO VIEWED THIS ALSO VIEWED</h1>
			<div class="tb-hr"></div>
			<div class="tb-prf-slider-wrap">
			  <ul id="tb-prf-slider" class="tb-prf-slider">
				<li ng-repeat="pplMovies in peopleMovies">
					<div class="tb-poster">
					  <div class="tb-poster-overlay">
					     <div class="ua">{{pplMovies.certificate}}</div>
					  </div>
					<img ng-src="{{pplMovies.image}}"> 
					</div>
					<div class="tb-poster-btm">
						<div class="tb-movie-rating tbratting">{{pplMovies.percentage}}%</div>
						<div class="tb-vote">{{pplMovies.number}} VOTES</div>
						<h2>{{pplMovies.movie_name|uppercase}}</h2>
						<div class="tb-gen-wrap">
							<div class="tb-gen" ng-repeat="item in pplMovies.ple_select | split | limitTo: 1">{{item}}</div>
							<div class="tb-gen">{{pplMovies.name|uppercase}}</div>
						</div>
					</div>
				</li>
			  </ul>
			</div>
		</div>
	


	<!-- ========================================VIDEO POPUP -->
<div class="modal fade" id="nowshow_popup" role="dialog">
   <div class="modal-dialog tb-trailer-pop-wrapper" style=" margin:100px 0px !important;">
      <div class="modal-content tb-trailer-pop-wrapper-inner">
         <div class="modal-body tb-trailer-pop-body">
            <div class="tb-close-bay" style="text-align:right; padding:0px;" >
               <div class="tb-trailer-select">
                  <button type="button" class="tb-trailer-pop-close" data-dismiss="modal"></button>
               </div>
               <div class="clearfix"></div>
            </div>
            <!-- VIDEO-POP-UP -->          
            <div  class="tb-video-popup youtube"> 
               <div class="video-container">
               	<!-- <iframe ng-show="moviedetailsssss.path"  width="100%" height="570px" src="{{moviedetailsssss.path | trustUrl}}" style="border:none;" allowfullscreen></iframe>  -->
                  <div class="iframe">
					<!-- <img ng-hide="moviedetailsssss.path" ng-src="{{go_image_path(moviedetailsssss.image)}}" style="width:100%;height:495px"> -->
				  	<iframe style="border-radius: 8px;" width="100%" height="495px" frameborder="0" allowfullscreen=""></iframe>

				  <!-- 	<iframe style="border-radius: 8px;" allowfullscreen="" frameborder="0" height="100%" width="100%;"></iframe> -->
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="tb-noresults nrslt" ng-show="message1"><img src="<?php echo base_url();?>assets/public/img/unhappy.png"><br>Oops Sorry!<br>No Result found</div>
          </div>
       </div>
    </div>
 </div>
 


	<!-- ==========================================VIDEO POPUP -->
</div>
<?php
  // $id = $this->uri->segment(3);
  // $user = $this->session->userdata('logged_in');
  // print_r($user);
?>
	

