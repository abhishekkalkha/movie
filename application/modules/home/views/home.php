	
	<!-- TITLE-SLIDER -->
	
	<div class="tb-main-content-wrap" ng-controller="imageCtrl">
		<div class="tb-video-slider">
			<!--<div id="wrap">
				<div id="next"><img src="<?php echo base_url();?>assets/public/img/tb-arw2.png"></div>
				<div id="prev"><img src="<?php echo base_url();?>assets/public/img/tb-arw1.png"></div>
				<div id="slider">
					<img src="<?php echo base_url();?>assets/public/img/1.jpg">
					<img src="<?php echo base_url();?>assets/public/img/1.jpg">
				</div>
			</div>-->
			<div id="myCarousel" class="carousel slide" data-ride="carousel"  ng-init="getImages()">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li class="" data-target="#myCarousel" data-slide-to="1"></li>
				<li class="" data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div id="myCarousel" class="carousel slide vertical">
				<div class="carousel-inner">
					<div class="item" ng-class="{'active':key==0}" role="listbox" ng-repeat="(key,images) in banner_images">
						<img ng-src="{{go_image_path(images.banner_images)}}" class="banner_height">
					</div>
				<!-- 	<div class="item">
						<img src="<?php echo base_url();?>assets/public/img/slide2.jpg">
					</div>
					<div class="item">
						<img src="<?php echo base_url();?>assets/public/img/slide3.jpg">
					</div> -->
				</div>
			</div>
		</div>
		</div>

	<!-- CATAGORIES -->
	
	<div class="container">
		<div class="tb-catagories">
			<h1>CATAGORIES</h1>
			<div class="tb-hr">
			</div>
			<div class="tb-catagory-inner">
				<div class="row">
					<div class="col-md-12">
						<div class="tb-view-mre">
						VIEW MORE
						</div>
					</div>
				
				</div>
				<div class="row">
					<div class="col-md-3 animatedParent"  ng-controller="toptrendingCtrl">
						<div class="tb-trending-list">
						<h2>TOP TRENDING</h2>
						<ul class="tb-trending-ul">
						<li class="animated fadeInDown" ng-repeat="topmovie in topmovies | orderBy:'-percentage'">
						<a href="<?php echo base_url();?>home/singleMovie/{{topmovie.id}}">
													{{topmovie.movie_name}}
												</a>	
                       <strong>{{topmovie.percentage}}%</strong>
						</li>
						
						</ul>
						</div>
						
						</div>
					
					<div class="col-md-9 animatedParent" data-sequence="500">
						<!--<div class="tb-main-cata">
						<li><div class="overlay1"><h4>MOVIES</h4></div><img src="img/tb-movies.png"></li>
						<li><div class="overlay1"><h4>MOVIES</h4></div><img src="img/tb-events.png"></li>
						<li><div class="overlay1"><h4>MOVIES</h4></div><img src="img/tb-sports.png"></li>
						<li><div class="overlay1"><h4>MOVIES</h4></div><img src="img/tb-fest.png"></li>
						</div>-->
						<div class="tb-main-cata">
						<li class="animated flipInX" data-id="1">
							<a href="<?php echo base_url();?>allmovie">
							 <img src="<?php echo base_url();?>assets/public/img/tb-movies.png">
						    </a>
						</li>
						<li class="animated flipInX" data-id="2" data-toggle="modal" data-target="#warning">
                            <a href="<?php echo base_url();?>event">
							<img src="<?php echo base_url();?>assets/public/img/tb-events.png">
						    </a>
					   </li>
						<li class="animated flipInX" data-id="3">
                            <a href="<?php echo base_url();?>sports">
							<img src="<?php echo base_url();?>assets/public/img/tb-sports.png">
                            </a>
						</li>
						<li class="animated flipInX" data-id="4">
                            <a href="<?php echo base_url();?>festival">
							<img src="<?php echo base_url();?>assets/public/img/tb-fest.png">
                            </a>
						</li>

						<!--FEATURE-NOT-AVIALABLE-MODAL-->

						<div id="warning" class="modal fade" role="dialog">
  							<div class="modal-dialog tb-warning-dialogue">
    							<div class="modal-content tb-warning-content">
     								<div class="modal-header tb-warning-header">
       									<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title">OOPS !</h4>
     								</div>
     								<div class="modal-body tb-warning-body">
     									<img src="<?php echo base_url();?>assets/public/img/unhappy.png">
        								<p>This Feature is currently not avialable,<br>
        									We are working on this feature and let you know when its ready.</p>
      								</div>
      								<div class="modal-footer tb-warning-footer">
        								<button class="tb-warning-ok" data-dismiss="modal">OK</button>
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
	
	<!-- FEATURE TRENDS -->
	
	<div class="tb-catagories none">
		<div class="container">
			<h1>FEATURED TRENDING</h1>
			<div class="tb-hr">
			</div>
			
		</div>
		<div class="featured-slider">
		<div class="feature-slider-item">
		<h6> VIEW MORE</h6>
            <ul id="feature-slider-ul" class="feature-slider-ul">
                <li>
				<div class="featured-box">
					<div class="featured-overlay"><p>VIEW</P></div>
					<img src="<?php echo base_url();?>assets/public/img/f1.png">
				</div>
				</li>
				<li>
				<div class="featured-box">
					<div class="featured-overlay"><p>VIEW</P></div>
					<img src="<?php echo base_url();?>assets/public/img/f2.png">
				</div>
				</li>
				<li>
				<div class="featured-box">
					<div class="featured-overlay"><p>VIEW</P></div>
					<img src="<?php echo base_url();?>assets/public/img/f3.png">
				</div>
				</li>
				<li>
				<div class="featured-box">
					<div class="featured-overlay"><p>VIEW</P></div>
					<img src="<?php echo base_url();?>assets/public/img/f4.png">
				</div>
				</li>
				 <li>
				<div class="featured-box">
					<div class="featured-overlay"><p>VIEW</P></div>
					<img src="<?php echo base_url();?>assets/public/img/f1.png">
				</div>
				</li>
				<li>
				<div class="featured-box">
					<div class="featured-overlay"><p>VIEW</P></div>
					<img src="<?php echo base_url();?>assets/public/img/f2.png">
				</div>
				</li>
             </ul>
        </div>
	</div>	
	
	</div>
	
	<!-- OFFER-ZONE -->
	
		<div class="tb-catagories1">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="tb-cata-box">
							<h1>GIFTCARDS</h1>
							<div class="hr-cata-box"></div>
							<p>
							With GiftMyShow cards, you can gift your 
							friends & family movie & play tickets, 
							concert passes, whatever it is they love for 
							their birthdays, anniversaries or simply 
							for no reason other than how you feel 
							about them. Pretty sweet, 
							aint it? 
							</p>
							<div class="tb-ef-div">
								<img src="<?php echo base_url();?>assets/public/img/tb-gift.png">
							</div>
							<button class="tb-offr-btn hvr-pulse-grow">BUY GIFTCARS</button>
						</div>
					</div>
					<div class="col-md-4">
					<div class="tb-cata-box">
							<h1>OFFERS</h1>
							<div class="hr-cata-box"></div>
							<p>
							Delight yourself with crazy offers while 
							you book your tickets. Whether its cashback,
							freebies or discounts you’re after, there’s a 
							can’t-miss bargain for every 
							single one of you. 
							</p>
							<div class="tb-ef-div">
								<img src="<?php echo base_url();?>assets/public/img/tb-perc.png">
							</div>
							<button class="tb-offr-btn hvr-pulse-grow">VIEW OFFERS</button>
						</div>
					</div>
					<div class="col-md-4">
					<div class="tb-cata-box">
							<h1>MOBILE APP</h1>
							<div class="hr-cata-box"></div>
							<p>
							Book your tickets on the go, only with a couple of clicks. 
							Choose from a whopping 3,000+ cinema screens 
							across India  and book as late as 
							20 minutes before  showtime for 
							those spur-of-the- moment plans. 
							</p>
							<div class="tb-ef-div">
								<img src="<?php echo base_url();?>assets/public/img/tb-phne.png">
							</div>
							<button class="tb-offr-btn hvr-pulse-grow">DOWNLOAD NOW</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		