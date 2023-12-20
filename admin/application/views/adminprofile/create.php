
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Profile 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-user"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>admin">Your Details</a></li>
         <li class="active">Edit Profile</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <?php
               if($this->session->flashdata('message')) {
               $message = $this->session->flashdata('message');
               ?>
            <div class="alert alert-<?php echo $message['class']; ?>">
               <button class="close" data-dismiss="alert" type="button">×</button>
               <?php echo $message['message']; ?>
            </div>
            <?php
               }
               ?>
         </div>
         <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Personel Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               
                  <div class="box-body">
                      <div class="col-md-7">
					  <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
					   
                    <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">First Name</label>
                      <input type="text" class="form-control required" name="name" value="<?php echo $data->name; ?>" id="firstname" data-parsley-pattern="^[a-zA-Z\  \/]+$" placeholder="Enter your name" data-parsley-minlength="3" data-parsley-maxlength="25" required =" " >
<span class="glyphicon  form-control-feedback"></span>                   
				   </div>

					<div class="form-group has-feedback">
                       <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control required" name="email" value="<?php echo $data->email; ?>" id="email"  placeholder="Enter email" data-parsley-trigger="change" data-parsley-type="email" required="" class="form-control" >
                    <span class="glyphicon  form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
                     <label for="exampleInputEmail1">Phone</label>
                      <input type="text" class="form-control required" name="phone" value="<?php echo $data->phone; ?>" id="phone" placeholder="Enter phone" class="form-control"  data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="16" required =" ">
                    <span class="glyphicon  form-control-feedback"></span>
					</div>
					<div class="form-group">
                      <label for="file">Display Image</label>
                      <input type="file" id="image" name="image"  >
                      <img src="<?php echo $data->image;?>" width="70px" height="70px" alt="Picture Not Found" />
					  <span class="glyphicon  form-control-feedback"></span>
                    </div>
					 <div class="box-footer">
                     <button type="submit" name="save" class="btn btn-primary">Update</button>
                  </div>
               </form>
					 </div>
				   
				   
				   
				   </div>
				   </div>
            <!-- /.box -->
         </div>
		 <div class="col-md-6">
					<div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Change Password</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               
                  <div class="box-body">
				  
				  		  
                     <div class="col-md-7">
					<form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
				   	<div class="form-group has-feedback">
                      <label for="exampleInputEmail1">Current Password</label>
                      <input type="password" class="form-control required" name="password_c" id="password_c"  placeholder="Enter Your Current Password" data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-required="true">
                    <span class="glyphicon  form-control-feedback"></span>
					</div>
						<div class="form-group has-feedback">
                      <label for="exampleInputEmail1">New Password</label>
                      <input type="password" class="form-control required" name="password_n" id="password_n"  placeholder="Enter New Password" data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-required="true">
                    <span class="glyphicon  form-control-feedback"></span>
					</div>
						<div class="form-group has-feedback">
                      <label for="exampleInputEmail1">Confirm New Password</label>
                      <input type="password" class="form-control required" name="password_cn" id="password_cn"  placeholder="Confirm New Password" data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-required="true">
                    <span class="glyphicon  form-control-feedback"></span>
					</div>
				    <div class="box-footer">
                     <button type="submit" name="update" class="btn btn-primary">Update</button>
                  </div>
               </form>
					 </div>
                 
                  </div>
                  <!-- /.box-body -->
                  
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

