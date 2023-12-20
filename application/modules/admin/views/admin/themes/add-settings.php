
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
         
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-warning box-main-div">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Setting Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
				 <div class="box-body">
				 <div class="col-md-6">
				 
                        
                                    <div class="form-group">
                                    <label class="intrate">Title</label>
                                    <input class="form-control required regcom" type="text" name="title" data-parsley-trigger="keyup" required="" id="smtp_username" value="<?php echo $result->title; ?>">
                                    </div>
										
								    <div class="form-group">
                                    <label class="intrate">Smtp Username</label>
                                    <input class="form-control required regcom" type="text" name="smtp_username" data-parsley-trigger="keyup" required="" id="smtp_username" value="<?php echo $result->smtp_username; ?>">
                                    </div>	
                                    
									<div class="form-group">
                                    <label  class="intrate">Smtp Host</label>
                                    <input 	class="form-control regcom required" type="text" name="smtp_host" data-parsley-trigger="keyup" required="" id="smtp_host" value="<?php echo $result->smtp_host; ?>" >
                                    </div>
									
									<div class="form-group">
                                    <label  class="intrate">Smtp Password</label>
                                    <input 	class="form-control regcom required" type="text" name="smtp_password" data-parsley-trigger="keyup" required="" id="smtp_password" value="<?php echo $result->smtp_password; ?>" >
                                    </div>
									
									<div class="form-group">
                                    <label  class="intrate">Sender Id</label>
                                    <input 	class="form-control regcom required" type="text" name="sender_id" data-parsley-trigger="keyup" required="" id="sender_id" value="<?php echo $result->sender_id; ?>" >
                                    </div>
									
									<div class="form-group">
                                    <label  class="intrate">Sms username</label>
                                    <input 	class="form-control regcom required" type="text" name="sms_username" data-parsley-trigger="keyup" required="" id="sms_username" value="<?php echo $result->sms_username; ?>" >
                                    </div>
								   
								   
								   
								   
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-success btn-det" value="Save" id="taxiadd">                      
                     </div>
                  </div>
				  
				        <div class="col-md-6">
						          
						            								          
								  <div class="form-group">
                                    <label  class="intrate">Sms Password</label>
                                    <input 	class="form-control regcom required" type="text" name="sms_password" data-parsley-trigger="keyup" required="" id="sms_password" value="<?php echo $result->sms_password; ?>" >
                                    </div> 	
								   
								   
						           <div class="form-group has-feedback">
								   <label for="exampleInputEmail1">Logo</label>
								   <input name="logo" class="" accept="image/*" type="file">
								   <img src="<?php echo base_url().$result->logo; ?>" width="100px" height="100px" alt="Picture Not Found"/>
								   </div>							   
								   
								   <div class="form-group has-feedback">
								   <label for="exampleInputEmail1">Favicon</label>
								   <input name="favicon"  type="file" class="">
								   <img src="<?php echo base_url().$result->favicon; ?>" width="25px" height="25px" alt="Picture Not Found"/>
								   </div>							 		 
		                </div>
				  
				  
		         
		           
				   
				   
		
             </div><!-- /.box-body -->
  
                </form>
              </div><!-- /.box -->
            </div>
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
  

	  