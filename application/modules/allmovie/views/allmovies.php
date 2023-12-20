<!-- TITLE-VIDEO SLIDER -->
<?php
   $id = $this->uri->segment(3);
  // $user = $this->session->userdata('logged_in');
  // print_r($user);

?>	
<div class="tb-main-content-wrap" ng-controller="allmovieCtrl" ng-init="getAllmovies();getImages()">
	<div class="tb-video-slider" ng-init="coming_soon()">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li class="" data-target="#myCarousel" data-slide-to="1"></li>
				<li class="" data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div id="myCarousel" class="carousel slide vertical">
				<div class="carousel-inner" >
					<div class="item" ng-class="{'active':key==0}" role="listbox" ng-repeat="(key,images) in banner_images">
						 <img ng-src="{{go_image_path(images.banner_images)}}" class="banner_height">
					</div>
					<!-- <div class="item">
						<img src="<?php echo base_url()?>assets/public/img/slide2.jpg">
					</div>
					<div class="item">
						<img src="<?php echo base_url()?>assets/public/img/slide3.jpg">
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<div class="tb-movies-head">
		<div class="tb-catagories">
			<h1>MOVIES</h1>
			<div class="tb-hr"></div>
		</div>
		<div class="tb-video-out-wrap">
			<ul class="tb-movie-tab1">
				<li class="active"><a data-toggle="tab" href="#home">NOW SHOWING</a></li>
				<li><a data-toggle="tab" href="#menu1" ng-click="coming_soon()">COMING SOON</a></li>
				<div class="clearfix"></div>
			</ul>
		</div>
	</div>
		
	<!-- MAIN-TAB-CONTENT -->
		
	<div class="tb-movies-content">
		<div class="container">
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active active1 bgtrans border-none">
					<div class="row">
						<div class="col-md-3">
							<div class="tb-movie-tab-cntnt-colapse">
								<div class="tb-movie-search-box">
									<input type="text" class="tb-search2" ng-model="searchText" placeholder="Search">
								</div>
								<ul>
									<li data-toggle="collapse" data-target="#lang">LANGUAGE</li>
									<div id="lang" class="collapse">
										<ul class="inner-ul acc-check">
											<li ng-repeat="language in languages">
												<input type="checkbox" ng-click="langFIlter(language.id)" id="test{{language.id}}" />
												<label for="test{{language.id}}"></label>
												{{language.name}}
											</li>
										</ul>
									</div>
									<li data-toggle="collapse" data-target="#genere">GENRE</li>
									<div id="genere" class="collapse">
										<ul class="inner-ul acc-check">
											<li ng-repeat="genr in genere"><input type="checkbox" ng-click="includeGenere(genr.id)" id="genr{{genr.id}}" /><label for="genr{{genr.id}}"></label>{{genr.tag_name}}</li>
										</ul>
									</div>
									<li data-toggle="collapse" data-target="#format">FORMAT</li>
									<div id="format" class="collapse">
										<ul class="inner-ul acc-check">
											<li ng-repeat="format in formats"><input type="checkbox" ng-click="includeFormat(format.id)" id="form{{format.id}}" /><label for="form{{format.id}}"></label>{{format.format_name}}</li>
										</ul>
									</div>
								</ul>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tb-film-list">
								<!-- <div class="searchmoviecategory" ng-show="!cinemas.length">No result found!</div> -->
								<ul>
									<li ng-repeat="films in cinemas |filter:languageFIltering | filter:genereFiltering | filter:formatFiltering | filter:searchText| limitTo: paginationLimit()">
										<div class="tb-poster">
											<div class="tb-poster-overlay">
												<div class="ua hvr-grow">{{films.certificate}}</div>
												
												<div class="tb-ratting2 hvr-grow" ng-show="logged_user" data-toggle="modal" data-target="#tb-ratting" for="rating-input-{{$index}}-5"  role="button"  ng-click="ShowHide(films.id,films.movie_name,5);"  class="rating-star"></div>
											    
											     	<a href="#signin"><div ng-hide="logged_user" class="tb-ratting2 hvr-grow" class="rating-star"></div></a>
											     
											</div>
											
									<img ng-src="{{films.image}}"> 
										</div>
										<div class="tb-poster-btm">
											<div class="tb-movie-rating tbratting1">{{films.percentage}}%</div>
											<div class="tb-vote">{{films.number}} VOTES</div>
											<a href="<?php echo base_url();?>home/singleMovie/{{films.id}}">
												<h2>{{films.movie_name | uppercase}}</h2>
											</a>	
											<div class="tb-gen-wrap">
												<div class="tb-gen" ng-repeat=" in films.select_tags | split | limitTo: 1">{{item}}</div>
												<div class="tb-gen" ng-repeat="skillName in films.tag_name.split(',')">{{skillName}}</div>
												
											</div>
										</div>
										<a  href="<?php echo base_url();?>book/bookMovie/{{films.id}}">
											<div class="tb-poster-book hvr-shrink">BOOK</div>
										</a>
									</li>


								</ul>

								<!-- TB-USER-RATTING -->

								<div id="tb-ratting" class="modal fade" role="dialog">
  									<div class="modal-dialog tb-ratting11-dialog">
   										<div class="modal-content tb-ratting11-modal-content">
     										<div class="modal-header tb-ratting1-header">
       											<button type="button" class="close" data-dismiss="modal">&times;</button>
       											<h4 class="modal-title">How much will you rate?</h4>
    										</div>
											<form method="POST" name="frm_signup" id="frm_signupr" action="" data-parsley-validate="">
     					 						<div class="modal-body tb-ratting1-body">
       												<div class="tb-ticket-ratting1">
														<div class="tick-rate" id="film_{{film_id}}" style="margin:0 auto;"></div>
													</div>
													<h5>Feel free to write your review</h5>
								    				<textarea type="text" rows="4" class="form-control tb-ratting1-input" name="first_name" ng-model="title"
													placeholder="Add your review here" data-parsley-trigger="focusout" data-parsley-required="true"></textarea>									
													<input type="hidden" class="form-control tb-ratting1-input" name="user_id" ng-model="user_id"
													placeholder="REVIEW TITLE" data-parsley-trigger="focusout" data-parsley-required="true" value="<?php echo $this->session->userdata('logged_in')['id'];?>"><br>
												</div>
												<div class="modal-footer tb-ratting1-body-footer">
       												<input type="button" value="SUBMIT" class="tb-rate-submit" ng-click="save_rate(<?php echo $this->session->userdata('logged_in')['id'];?>)"/>
      											</div>
												<div class="rate-success">{{msg}}</div>
											</form>
    									</div>
									</div>
								</div>

								<!---->
								
								<div class="clearfix"></div>
							</div>
							<div class="tb-noresults" ng-show="message" id="nores">
								<img ng-src="<?php echo base_url();?>assets/public/img/unhappy.png">
								<br>Oops Sorry!<br>No Result found
							</div>

							<div class="tb-film-list-close" ng-show="{{cinemas!=''}}">
								<button class="tb-flim-more" ng-show="hasMoreItemsToShow()" ng-click="showMoreItems()">MORE</button>
							</div>
						</div>
					</div>
				</div>
				<div id="menu1" class="tab-pane fade">
					<div class="row">
					<div class="col-md-3">
						<div class="tb-movie-tab-cntnt-colapse">
							<div class="tb-movie-search-box">
								<input type="text" class="tb-search2" ng-model="coming_search" placeholder="Search">
							</div>
						     <ul>
					                <li data-toggle="collapse" data-target="#lang1">LANGUAGE</li>
									<div id="lang1" class="collapse">
										<ul class="inner-ul acc-check">
											<li ng-repeat="languagewe in languagesval">
												<input type="checkbox" ng-click="langFIltersvlaues(languagewe.id)" id="gg{{languagewe.id}}" />
												<label for="gg{{languagewe.id}}"></label>
												{{languagewe.name}}
											</li>
										</ul>
									</div>
									
									<li data-toggle="collapse" data-target="#genere1">GENRE</li>
									<div id="genere1" class="collapse">
										<ul class="inner-ul acc-check">
										<li ng-repeat="genrwe in genereval"><input type="checkbox" ng-click="includeGenereval(genrwe.id)" id="genrwe{{genrwe.id}}" /><label for="genrwe{{genrwe.id}}">
										</label>{{genrwe.tag_name}}</li>
										</ul>
									</div>
									
									<li data-toggle="collapse" data-target="#format1">FORMAT</li>
									<div id="format1" class="collapse">
										<ul class="inner-ul acc-check">
											<li ng-repeat="formatss in formatsval">
												<input type="checkbox" ng-click="includeFormatval(formatss.id)" id="formatss{{formatss.id}}" /><label for="formatss{{formatss.id}}"></label>{{formatss.format_name}}</li>
										</ul>
									</div>
									
								
							 </ul>
							
						</div>
					</div>
						<div class="col-md-9">
							<div class="tb-film-list">						
								<ul>
									<li ng-repeat="view_commingsoon in commingsooncinemas |filter:coming_search |filter:languageFIlteringval | filter:genereFilteringval | filter:formatFilteringval |limitTo: paginationLimit()">
									<div class="tb-poster">
										<div class="tb-poster-overlay">
											<div class="ua">{{view_commingsoon.certificate}}</div>
										</div>
										
										<img ng-src="{{view_commingsoon.image}}">
									</div>
									<div class="tb-poster-btm">
										<div class="tb-movie-rating tbratting1">{{view_commingsoon.percentage}}%</div>
										<div class="tb-vote">{{view_commingsoon.number}} VOTES</div>
										<a href="<?php echo base_url();?>home/singleMovie/{{view_commingsoon.id}}">
											<h2>{{view_commingsoon.movie_name | uppercase}}</h2>
										</a>
										<div class="tb-gen-wrap">
											<!--<div class="tb-gen">{{view_commingsoon.select_tagss}}</div>-->
											<div class="tb-gen" ng-repeat="item in view_commingsoon.select_tagss.split(',')">{{item}}</div>
							
								
											<div class="tb-gen">{{view_commingsoon.name}}</div>
										</div>
									</div>					           						
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="tb-noresults" ng-show="message">
								<img ng-src="<?php echo base_url();?>assets/public/img/unhappy.png"><br>Oops Sorry!<br>No Result found
							</div>
							<div ng-show="{{view_commingsoon!=''}}" class="tb-film-list-close" id="cmng">
								<button class="tb-flim-more">MORE</button>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="tb-main2">
				<div class="row">
					<div class="col-md-3">
						<div class="tb-movies-head1">
							TOP MOVIES
							<div class="tb-hr1"></div>
						</div>
						<div class="tb-trending-list">
							<h2>TOP TRENDING</h2>
							<ul class="tb-trending-ul">
								<li ng-repeat="topmovie in topmovies | orderBy:'-percentage' |limitTo: 5">
									<a href="<?php echo base_url();?>home/singleMovie/{{topmovie.id}}">
										{{topmovie.movie_name}}
									</a>	
									<strong>{{topmovie.percentage}}%</strong>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-9">
						<div class="tb-movies-head1">
							TOP REVIEWS
							<div class="tb-hr1"></div>
						</div>
						<div class="tb-review-ul-wrap">
							<ul>
								<li ng-repeat="topreview in topreviews | limitTo: paginationLimitReview()">
									<div class="tb-review-prof">
									<img ng-src="{{topreview.image}}">
									</div>
									<div class="tb-review-det">
										<div class="tb-review-ratting1">
											<span ng-repeat="rating in ratings">
												<div star-rating rating-value="topreview.rate" max="rating.max" read-only="true"></div> 
												<!--  <div star-rating rating-value="topreview.rate" max="topreview.rate" data-readonly="true" ></div>  -->
											</span>
										</div>
										<h1>
											<span>{{topreview.movie_name}}<strong>({{topreview.certificate}})</strong> 
											<b style="font-weight:500;font-size:10px;color:#929292;padding-left:10px;">{{topreview.time_date| timeAgo }}</b></span>
										</h1>
											<p>{{topreview.title}}:&nbsp;
											{{topreview.comments}}</p>
									</div>
								</li>
								<div class="reviews" ng-show="topreviews.length == 0">No Reviews</div>
							</ul>
						</div>
					</div>
					<div class="tb-film-list-close">
					    	<button class="tb-flim-more" ng-show="MoreItemsToShow()" ng-click="showMoreReviews()">Show more</button>
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