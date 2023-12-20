 <?php
   @ob_start();
          if($this->session->userdata('super_admin') == 1||$this->session->userdata('super_admin') == 0)
   
{
  $display_image=$this->session->userdata['backend_logged_in']['image'];
  $name=$this->session->userdata['backend_logged_in']['name'];
  $title=$this->session->userdata['backend_logged_in']['title'];
  $title_short=$this->session->userdata['backend_logged_in']['title_short'];
  ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>welcome" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo $title_short;?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $title;?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
              <img src="<?php echo $display_image;?>"  class="user-image user_image">
              <span class="hidden-xs"><?php echo $name;?></span>
            </a>
            <ul class="dropdown-menu">

               <li class="user-header user_header">
                    <img src="<?php echo $display_image?>" class="img-circle user_image" >
                    
                  </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>admin" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <?php } ?>