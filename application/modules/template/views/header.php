<!DOCTYPE html>	

<html lang="en">

<head>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" href="<?php echo base_url();?>assets/public/img/fav.png">

	  <?php

$query=$this->db->get('tbz_settings');

$query=$query->row();
$title=$query->title;

?>

    <title><?php echo $title;?></title>

	

	<!-- GENERAL-CSS -->

	

    <link href="<?php echo base_url();?>assets/public/css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/public/css/cascade.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/public/css/animate.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/public/css/hover.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/public/css/animations.css" rel="stylesheet">

	<link href="<?php echo base_url();?>assets/public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300' rel='stylesheet' type='text/css'>

	<link href="<?php echo base_url();?>assets/public/css/YouTubePopUp.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/public/css/pop-up-video.css" rel="stylesheet">
	

    

    <!-- GENERAL-JS -->

    <script type="text/javascript">

    	var site_url = '<?php echo base_url(); ?>';



    </script>

    <!--script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script-->

	<script type="text/javascript" src="<?php echo base_url();?>assets/public/js/jquery.js"></script>



    <script src="<?php echo base_url();?>assets/public/js/bootstrap.js"></script>

	<script src="<?php echo base_url();?>assets/public/js/ie10-viewport-bug-workaround.js"></script>

	<script src="<?php echo base_url();?>assets/public/js/ie-emulation-modes-warning.js"></script>

	<script src="<?php echo base_url();?>assets/public/js/jquery.cycle.all.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/jquery.timeago.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/public/js/tb-custom.js"></script>

	<script src="<?php echo base_url();?>assets/public/js/twGallery.js"></script>

	<script src="<?php echo base_url();?>assets/public/js/tw1slider.js"></script>

	<script src="http://maps.googleapis.com/maps/api/js"></script> 

	<script src="<?php echo base_url()?>assets/public/js/jquery.raty.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/parsley.min.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/angular.min.js"></script>

	<script src="<?php echo base_url();?>assets/public/js/custom.js"></script>

	<script src="<?php echo base_url();?>assets/public/js/animate.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/controllers/loginCtrl.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/controllers/filter.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/controllers/directive.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/controllers/homeCtrl.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/controllers/movieCtrl.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/controllers/allmovieCtrl.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/controllers/bookCtrl.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/controllers/bookedmovieCtrl.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/script.js"></script>

	<script src="<?php echo base_url()?>assets/public/js/unslider.js"></script>

	<script> var base_url = '<?php echo base_url(); ?>'</script>

	

	

</head>



<body ng-app="myapp">



	<!-- HEADER -->

	

	<!-- <div class="tb-alert">

		<a href="#" data-toggle="popover"  data-placement="bottom" data-content="This feature is not yet avialable,We are working on it !">Toggle popover</a>

	</div> -->

  

	<div class="tb-top-space" ></div>

	<div class="tb-top" ng-controller="signinCtrl"  ng-init='get_user_data();'>

	

	  <?php

$query=$this->db->get('tbz_settings');

$query=$query->row();
$logo=$query->logo;

?>

		<div class="tb-top-left">

			<a href="<?php echo base_url();?>"><img ng-src="<?php echo base_url('admin/').$logo;?>" width="50px;height:50px;"></a>

		</div>

		<div class="tb-top-right">			

		<!-- LOGGED-OUT -->

			



			<?php 

			//if(!$this->session->userdata('logged_in')){

			?>

			<div class="tb-logged-out" ng-hide="logged_user">

				<ul ng-hide="">

					<li><a href="#signin">SIGN IN</a></li>

					<b style="color: #434343;padding-top:5px;float:left;">|</b>

					<li><a href="#signup">SIGN UP</a></li>

					<div class="clearfix"></div>

				</ul>

			</div>



			<!-- LOGGED-IN -->



			<?php 

			//}else{ 

			//$user =$this->session->userdata('logged_in');

			//var_dump($user);

			?>

			<div class="tb-logged-in" ng-show="logged_user">

				<ul>

					<li><a href="#" data-toggle="modal" data-target="#myaccount" style="padding:0px;">{{logged_user.first_name+' '+logged_user.last_name}}</li>

				</ul>

			</div>

			

		</div>

		<div class="clearfix"></div>

	</div>



	<!-- NAV-BAR -->

	

    <nav class="tb-navbar navbar-inverse">

		<div class="container">

			<div class="navbar-header tb-nav-header">

				<div class="tb-collapse-logo">

				<!--<img src="<?php //echo base_url();?>assets/public/img/tb-logo-white.png">-->

				<a href="<?php echo base_url();?>"><img ng-src="<?php echo base_url('admin/').$logo;?>" width="180px;height:73px;"></a>

				</div>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

					<span class="sr-only">Toggle navigation</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

				</button>

			</div>

				<?php 

			/*if(!$this->session->userdata('logged_in')){

			?>			

            <?php 

			}else{ 

			$user =$this->session->userdata('logged_in');*/

			//var_dump($user['id']);

			?>

			<div class="tb-nav-bar-wrap">



				<div id="navbar" class="collapse navbar-collapse" ng-controller="cityCtrl">

					<div class="row">

						<ul class="nav navbar-nav tb-nav-ul">

							<li><a class="hvr-grow" href="<?php echo base_url();?>">HOME</a></li>

							<li class="none"><a href="#">|</a></li>

							<li><a href="#about" data-toggle="modal" data-target="#trailerpop">TRAILERS</a></li>

							<li class="none"><a href="#">|</a></li>

							<li><a class="hvr-grow" href="<?php echo base_url();?>deals">DEALS</a></li>

							<li class="none"><a href="#">|</a></li>

							<li><a class="hvr-grow" href="<?php echo base_url();?>giftcard">GIFTCARDS</a></li>

							<li class="none"><a href="#">|</a></li>

							<li><a class="hvr-grow" href="" data-toggle="modal" data-target="#tab_city"><?php echo get_city(); ?></a></li>

							<li class="none1 none"><a href="#">|</a></li>

							<!--

							<li class="none1"><a href="#signin">SIGN IN</a></li>

							<li class="none1 none"><a href="#">|</a></li>

							<li class="none1"><a href="#signup">SIGN UP</a></li>

							<li class="none1" ng-show="userData">

								<a href="#" data-toggle="modal" data-target="#myaccount">

									<h5>{{userData.first_name+' '+userData.last_name}}</h5>

								</a>

							</li>-->

						</ul>

					</div>

				</div>

			</div>

			<?php //}?>

		</div>

	</nav>

	

	<!-- LOGGED-IN-DROP-DOWN -->

	

	<?php

	/*if($this->session->userdata('logged_in')){

	$user =$this->session->userdata('logged_in');*/

	?>

	

	<div class="modal fade" id="myaccount" role="dialog" ng-controller="signinCtrl">

		<div class="modal-dialog tb-myaccount-pop">

			<div id="triangle-up"></div>

			<div class="modal-content tb-myaccount-pop-content">

				<div class="modal-body tb-myaccount-pop-body">

					<div class="tb-myaccount-pop-head">

						<div class="tb-myaccnt-pic">

							<!--<img src="<?php echo base_url();?>{{sign_data.image}}">-->

							<img src="<?php echo base_url();?>assets/public/img/default.png">

						</div>

						<div class="tb-myaccnt-wel">

							<h6>WELCOME BACK</h6>

							<p>{{logged_user.first_name+' '+logged_user.last_name}}</p>

						</div>

					</div>

					<ul>

						<!--<li class="bg1">MY WALLET</li>-->

						<li class="bg5"><a href="<?php echo base_url();?>myaccount">MY ACCOUNT</a></li>

						<!-- <li class="bg2"><a href="<?php echo base_url();?>myaccount">BOOKING HISTORY</li>

						<li class="bg3"><a href="<?php echo base_url();?>myaccount">QUICK PAY</li>

						<li class="bg4">EXPERIENCES</li>

						<li class="bg5"><a href="<?php echo base_url();?>myaccount">SETTINGS</li> -->

						<li class="bg6"><a href="<?php echo base_url();?>login/logout" ng-click="logout()">SIGN OUT</a></li>

					</ul>

				</div>

			</div>

		</div>

	</div>

	<?php

	//}

	?>

	

	<!-- TRAILER-POP-UP -->

					

	<div class="modal fade" id="trailerpop" role="dialog" ng-controller="trailerCtrl">

		<div class="modal-dialog tb-trailer-pop-wrapper">

			<div class="modal-content tb-trailer-pop-wrapper-inner">

				<div class="modal-body tb-trailer-pop-body">

					<div class="tb-close-bay">

						<div class="tb-trailer-select">

							<button type="button" class="tb-trailer-pop-close" data-dismiss="modal"></button>

						</div>

						<div class="tb-trailer-select">

							<div class="dropdown tb-trailer-select-input">

								<div class="tb-lang"  data-toggle="dropdown">

									LANGUAGES

								</div>

								<ul class="dropdown-menu tb-lang-dropdown">

									<li ng-repeat="languagevalues in trailer_languages">

										<input type="checkbox" ng-click="includelanguages(languagevalues.id)"><b class="padding-left10">{{languagevalues.name}}</b>

									</li>

								</ul>

							</div>

							<select class="tb-trailer-select-input">

								<option>FRESH</option>

							</select>

						</div>
						<div class="clearfix"></div>

					</div>

					<div class="tb-trailer-main-head">

						<h1>MOVIE TRAILERS</h1>

						<div class="tb-hr margin-top20 borderbtm"></div>

					</div>

					<div class="tb-trailer-tab-head">

						<ul class="tb-trailer-tab-ul">

							<li class="active"><a ng-init="trailerMoviews()" data-toggle="tab" href="#nwshwng">NOW SHOWING</a></li>

							<li><a data-toggle="tab" href="#cmngsoon" ng-click="trailerCommingsoon()">COMING SOON</a></li>
							<div class="clearfix"></div>

						</ul>

					</div>

					<div class="tb-trailer-tab-content">

						<div class="tab-content">

							<div id="nwshwng" class="tab-pane fade in active border-none">

								<ul>

									<li ng-repeat="trailerdetails in trailermovie | filter:languagemovieFilter">

								

										<img ng-src="{{trailerdetails.image}}">

										<div class="trailer-overlay">

											<div class="tb-trailer-badge">

												{{trailerdetails.percentage}}%

											</div>

											<div class="youtubeV">

												<div class="videoThum"> 

													<a href="javascript:;" rel="{{trailerdetails.trailer | trustUrl}}" class="youTubeVideo">

														<div class="trailer-play"></div>

													</a>

												</div>

											</div>

											<div class="trailer-play-btm">

												<p>{{trailerdetails.movie_name}}</p>

												<p>{{trailerdetails.name}}</p>

											</div>

										</div>

									</li>

	

									<!-- VIDEO-POP-UP -->

									

									<div style="display: none;" class="tb-video-pop-overlay-bg fade"> </div>

									<div  class="tb-video-popup youtube"> <a class="close" href="javascript:;"></a>

										<div class="video-container">

											<div class="iframe">

												<iframe style="border-radius: 8px;" allowfullscreen="" frameborder="0" height="100%" width="100%;"></iframe>

											</div>

										</div>

									</div>

									<div class="clearfix"></div>

									<div class="tb-noresults nrslt" ng-show="message1"><img src="<?php echo base_url();?>assets/public/img/unhappy.png"><br>Oops Sorry!<br>No Result found</div>

								</ul>

							</div>

							<div id="cmngsoon" class="tab-pane fade border-none">

								<ul>

									<li ng-repeat="commingsoondetails in trailercommingsoon | filter:languagemovieFilter">

	    								<img ng-src="{{commingsoondetails.image}}">

										<div class="trailer-overlay">

											<div class="tb-trailer-badge">

												{{commingsoondetails.percentage}}%

											</div>

											<div class="youtubeV">

												<div class="videoThum"> 

													<a href="javascript:;" rel="{{commingsoondetails.trailer | trustUrl}}" class="youTubeVideo">

														<div class="trailer-play"></div>

													</a>

												</div>

											</div>

											<div class="trailer-play-btm" >

												<p>{{commingsoondetails.movie_name}}</p>

												<p>{{commingsoondetails.name}}</p>

											</div>

										</div>

									</li>

									

									<!-- VIDEO-POP-UP -->

									

									<div style="display: none;" class="tb-video-pop-overlay-bg fade"> </div>

									<div  class="tb-video-popup youtube"> <a class="close" href="javascript:;"></a>

										<div class="video-container">

											<div class="iframe">

												<iframe style="border-radius: 8px;" allowfullscreen="" frameborder="0" height="100%" width="100%;"></iframe>

											</div>

										</div>

									</div>

									<div class="clearfix"></div>

										<div class="tb-noresults nrslt" ng-show="message1"><img src="<?php echo base_url();?>assets/public/img/unhappy.png"><br>Oops Sorry!<br>No Result found</div>

								</ul>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

  

	<!-- SIGN-IN -->

		<!--<div id="signin" class="tb-log" ng-hide='status == "success"' ng-controller="signinCtrl">-->

	<div id="signin" class="tb-log" ng-controller="signinCtrl">

	

		<a href="#tb-log-close" title="Close" class="tb-log-close">X</a>

		<div class="tb-log-logo">

			<!--<img src="<?php //echo base_url();?>assets/public/img/tb-logo.png">-->

			<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/public/img/tb-logo.png"></a>

		</div>

		<div class="tb-log-wrap">

			<div class="tb-log-head">SIGN IN</div>

				<form method="POST" id="frm_signin" action="" data-parsley-validate="">

					<div class="tb-log-inner">

						<input class="tb-sign-input1" type="email" id="email" ng-model="email" placeholder="E-MAIL" data-parsley-trigger="focusout" required><br>

						<div class="tb-log-hr"></div>

						<input class="tb-sign-input2" type="password" id="password" ng-model="password" placeholder="PASSWORD" data-parsley-trigger="focusout" required>

						<input type="button" class="tb-in" ng-click="signin()" />

					</div>
               <div class="sign_up_error">
                   	{{message}}
               </div>
				

				</form>	

			<div class="tb-log-btm">

				Forgot your password <a href="#forgot"><u>Click here</u></a>

			</div>

		</div>

	</div>

						

	<!-- SIGN-UP -->

						

	<div id="signup" class="tb-log">

		<a href="#tb-log-close" title="Close" class="tb-log-close">X</a>

		<div class="tb-log-logo">

			<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/public/img/tb-logo.png"></a>

		</div>

		<div class="tb-log-wrap" ng-controller="signupCtrl">

			
          
			<form method="POST" name="frm_signup" id="frm_signup" action="" data-parsley-validate="" >

				<div class="tb-log-head">SIGN UP</div>

					<div class="tb-log-inner">

						<input class="tb-sign-input1" type="text" name="first_name" ng-model="first_name" placeholder="FIRST NAME" data-parsley-trigger="focusout" data-parsley-required="true"><br>

						<div class="tb-log-hr"></div>

						<input class="tb-sign-input1" type="text" name="last_name" ng-model="last_name" placeholder="LAST NAME" data-parsley-trigger="focusout" data-parsley-required="true"><br>

						<div class="tb-log-hr"></div>

						<input class="tb-sign-input1" type="email" name="email" ng-model="email" placeholder="EMAIL"  data-parsley-trigger="focusout" data-parsley-required="true"><br>

						<div class="tb-log-hr"></div>

						<input class="tb-sign-input2" type="password" id="passcheck" name="password" ng-model="password" placeholder="PASSWORD" data-parsley-required="true" data-parsley-trigger="focusout" data-parsley-minlength="6" data-parsley-maxlength="20" required><br>

						<div class="tb-log-hr"></div>

						<input class="tb-sign-input2" type="password" name="cpassword" placeholder="CONFIRM PASSWORD" data-parsley-required="true" data-parsley-equalto="#passcheck" data-parsley-trigger="focusout" id="passcheck1"><br>

						<input type="button" class="tb-in1" value="" ng-click="signup()">

					</div>

					
					<div class="sign_up_error" ng-show="sign_up_error">
					{{sign_up_error_msg}}
				</div>

					<div class="tb-log-btm">

						<input type="checkbox" id="test6" name="agree" required/><label for="test6"></label>I agree the terms of Service

					</div>

			</form>	

		</div>

	</div>

						

	<!-- FORGOT -->
	

						
	<div id="forgot" class="tb-log">
	<form  action="" method="post">
		<a href="#tb-log-close" title="Close" class="tb-log-close">X</a>
		<div class="tb-log-logo">
			<img src="<?php echo base_url();?>assets/public/img/tb-logo.png">
		</div>
		<div class="tb-log-wrap">
			<div class="tb-log-head">FORGOT PASSWORD</div>
			<div class="tb-log-inner">
				<input class="tb-sign-input1" type="text" id="femail" placeholder="EMAIL"><br>
				<div class="tb-in2" id="forgetspw"></div>
			</div>
			<div class="errormsgdown">
			</div>
			
			
			<div class="tb-log-btm">
			
				<a href="#signin" ><u>back to login</u></a>
			</div>
		</div>
	 	</form>
	</div>
			

						

						

	

	<!-- TOP-SEARCH -->

	

	<div class="tb-overlay-bar" ng-controller="searchCtrl">

		<div class="container">

			<div class="tb-search-box-wrap">

				<div class="tb-search">

					<div class="c1">

						<input type="text" class="tb-search-box" ng-change="searchMovies()" ng-model="data.search" placeholder="Search Cinema">

                        <li  class="tb-auto-complete"  ng-repeat="movienames in movie_names|filter:data.search" ng-click="data.search=movienames.movie_name;selectMovies(movienames.id)">

                        	{{movienames.movie_name}}

                        </li>

                        <div class="searchmoviecategory" ng-show="(movie_names | filter:data.search).length == 0"><p>No search result found</p></div>

					</div>

					 <div class="dropdown tb-ticket-cat">

					<button class="tb-ticket-cat-btn" data-toggle="dropdown">CATEGORIES

					<span class="caret"></span></button>

						<ul class="tb-ticket-cat-btn-ul dropdown-menu">

							<li  data-toggle="modal" data-target="#warning"><a class="hvr-grow" href="<?php echo base_url();?>allmovie">MOVIES</a><div class="hr-1"></div></li>

							<li  data-toggle="modal" data-target="#warning"><a class="hvr-grow" href="<?php echo base_url();?>event" >EVENTS</a><div class="hr-1"></div></li>

							<li  data-toggle="modal" data-target="#warning"><a class="hvr-grow" href="<?php echo base_url();?>sports" >SPORTS</a><div class="hr-1"></div></li>

							<li  data-toggle="modal" data-target="#warning"><a class="hvr-grow" href="<?php echo base_url();?>festival">FESTIVAL</a></li>

						</ul>

					</div>
					<div class="clearfix"></div>

				</div>

			</div>

		 </div>

	</div>



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







	<!-- SELECT-CITY-MODAL -->



	<?php /*

	$city = get_cookie('tb_search');

	if($city==""){

	?>

	<div class="modal fade" id="tb-selectcity" role="dialog" ng-controller="cityCtrl">

		<div class="modal-dialog tb-city-modal">

			<div class="modal-content tb-city-modal-inner">

				<h4>SELECT YOUR CITY</h4>

				<div class="modal-body tb-city-modal-body">

					<input auto-complete ui-items="cities_name" ng-change="getcity()" ng-model="datas.search" type="text" class="tb-search-box" placeholder="Eg:-Kochi">

					<li class="auto-complete" ng-repeat="selectcity in cities_name|filter:datas.search" ng-click="datas.search=selectcity.location;cityBasedMovie(selectcity.id)">{{selectcity.location}}</li>

					<li>{{selectcity}}</li>

				</div>

			</div>

		</div>

	</div>

	<?php

	}*/

	 ?>



	  <div class="modal fade" id="tab_city" role="dialog" ng-controller="cityCtrl" data-keyboard="false" data-backdrop="static">

		<div class="modal-dialog tb-city-modal">

			<div class="modal-content tb-city-modal-inner">

				<h4>SELECT YOUR CITY</h4>

				<div class="modal-body tb-city-modal-body">

					<input auto-complete ui-items="cities_name" ng-change="getcity()" ng-model="datas.search" type="text" class="tb-search-box1" placeholder="Eg:-Kochi">

					<li  class="auto-complete" ng-repeat="selectcity in cities_name|filter:datas.search" ng-click="datas.search=selectcity.location;cityBasedMovie(selectcity.id)">{{selectcity.location}}</li>

					<li>{{selectcity}}</li>

					<!--  <li class="auto-complete" ng-if="selectcity.location!=datas.search">No result</li> -->

                       <div class="searchmoviecategory" ng-show="(cities_name | filter:datas.search).length == 0">No search result found!</div>
				</div>

			</div>

		</div>

	</div>







	



	

