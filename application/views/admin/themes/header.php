<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Movie Ticket | Home</title>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

  <link href="<?php echo base_url();?>assets/admin/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url();?>assets/admin/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php echo base_url();?>assets/admin/css/icheck/flat/green.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/admin/css/floatexamples.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/admin/css/ticket_bazzar.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-timepicker.min.css">
	
	    <link  href="<?php echo base_url(); ?>assets/admin/css/select2.min.css" rel="stylesheet">
		<link  href="<?php echo base_url(); ?>assets/admin/css/custom.min.css" rel="stylesheet">
	<!-- jVectorMap -->
    <link href="<?php echo base_url();?>assets/admin/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
	<!-- jVectorMap -->
	
  <script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>


  <!-- angular js-->
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/config.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/ng-fil-upload-shim.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/ng-fil-upload.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/app.js"></script>

   <script>var base_url = '<?php echo base_url(); ?>'</script>


</head>
<!-- <div id="mydiv" data-loading >
    <img src="http://dummyimage.com/64x64/000/fff.gif&text=LOADING" class="ajax-loader"/>
    <div class="loader"></div>
  </div> -->
  <div id="mydiv" ng-if="loader" >
    <div class="spinner" >    </div>
  </div>
</div>
<?php $logged_user=$this->session->userdata('loggeduser');?>
  <body class="nav-md"  ng-app="ticket" id="ticketCtrl"  ng-controller="ticketCtrl">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col ">

          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url();?>admin/" class="site_title"><i class="fa fa-ticket"></i> 
			 <!--<span>Ticket Bazzar</span>-->
			 <!--<span><?php //$title = $this->session->userdata('title'); echo $title['title']; ?> </span>-->
			     <span><?php $title = $this->session->userdata('title'); echo $title['title'];?></span>
			</a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <!--<img src="<?php //echo base_url(). $logged_user->image;?> ">-->

			     <!--<img src="<?php //echo base_url(). $this->session->userdata('image');?> ">-->
				   <img src="<?php echo base_url(). $this->session->userdata('image');?> ">
				   
			
              <!--<img src="<?php //echo base_url();?>assets/admin/images/img.jpg" alt="..." class="img-circle profile_img">-->
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php 
                    echo $logged_user->first_name." ".$logged_user->last_name;
                  ?></h2>
            </div>
          </div>
		  <div class="clearfix"></div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" ng-init="get_menu_items()">

            <?php if($logged_user->user_type==1){ ?>
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu" >
                <!-- <li ng-repeat="menu in menu_items track by $index">{{menu.menu_name}}</li> -->
                <li ng-if="menu_item.in_menu==1" ng-repeat="menu_item in menu_items track by $index">
                  <a>
                    <i ng-class="menu_item.icon"></i> {{menu_item.menu_name}} 
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu" style="display: none">
                    <li ng-if="menu_item.new_link==1">
                      <a href="<?php echo base_url();?>admin/edit/{{menu_item.table_name}}" >Add New</a>
                    </li>
                    <li ng-if="menu_item.view_all_link==1">
                      <a href="<?php echo base_url();?>admin/listing/{{menu_item.table_name}}">View All</a>
                    </li>
                  </ul>
                </li>
				 <!-- theater -->
	            <li><a><i class="fa fa-ticket"></i>Cinema Theater Details <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li>
                      <a href="<?=base_url()?>admin/view_theater">View All</a>
                    </li>
                  </ul>
                </li>
				 <!-- theater -->
              </ul>
            </div>

            <div class="menu_section">
              <h3>Live On</h3>
              <ul class="nav side-menu">
              <!-- tables -->
			    <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?=base_url()?>admin/table_list">View All</a>
                    </li>
                  </ul>
                </li>
			  <!-- tables -->
			  
               <!--<li><a><i class="fa fa-table"></i> Promocode <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<//?=///base_url()?>admin/add_promocode">Add</a>
                    </li>
                  </ul>
                </li>-->
                

                <!-- theater -->
    
                <!-- theater -->
				<!-- gallery -->
                <li><a><i class="fa fa-ticket"></i> Gallery <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li>
                      <a href="<?=base_url()?>admin/add_gallery">Add New</a>
                    </li>
                    <li>

					   <a href="<?=base_url()?>admin/view_gallery">View All</a>
                    </li>
                  </ul>
                </li>
				
				
				<li><a><i class="fa fa-cog" aria-hidden="true"></i>Settings <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li>
                      <a href="<?=base_url()?>admin/settings">View Settings</a>
                    </li>
                  </ul>
                </li>
				
				
				
				<!--<li><a><i class="fa fa-cog" aria-hidden="true"></i>Settings <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li>
                      <a href="<?=base_url()?>admin/settingspage_view">Add New</a>
                    </li>
                  </ul>
                </li>-->
                <!-- gallery -->
              </ul>
            </div>
            <?php } ?>

            <?php if($logged_user->user_type==3){ ?>
            <div class="menu_section">
              <h3>Live On</h3>
              <ul class="nav side-menu">
                <!-- theater -->
                <li><a><i class="fa fa-ticket"></i> Theater <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">

                    <li>
                      <a href="<?=base_url()?>admin/view_theater">View All</a>
                    </li>
                  </ul>
                </li>
				
				<!--<li><a><i class="fa fa-book"></i>Booking Details<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li>
                      <a href="<?=base_url()?>admin/view_bookingdetails">View All</a>
                    </li>
                  </ul>
                </li>-->		
                <!-- theater -->
              </ul>
            </div>
            <?php } ?>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small" >
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="fa fa-arrows-alt" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="fa fa-eye-slash" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="fa fa-power-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>


            <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
   
				  
				    <img src="<?php echo base_url(). $this->session->userdata('image');?> ">
                  <?php 
                    
                    echo $logged_user->first_name." ".$logged_user->last_name;
                  ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                 <!-- <li>
				      <a href="<?=base_url()?>admin/listing/tbz_users" data-toggle="modal" ng-click="()">Profile</a>
                  </li>-->
				  
				   <li>
				      <?php
					  $profile_link = ($logged_user->user_type==1) ? base_url()."admin/profile_view" : base_url()."admin/profile_view";
					  ?>
				       <a href="<?php echo $profile_link; ?>" data-toggle="modal">Profile</a>
				  </li>
				    
                  <li>
					  <a href="<?=base_url()?>admin/settings">Settings</a>
                    </a>
                  </li>
				
                  <li><a href="<?php echo base_url();?>auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->

            <!-- page content -->
      <div class="right_col" role="main">
                <br />
        <div class="">