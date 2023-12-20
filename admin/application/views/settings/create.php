<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>settings"><i class="fa fa-dashboard"></i>Settings</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Settings</h3>
            </div>
                <div class="col-md-12">
                  <?php
                        if($this->session->flashdata('message')) {
                        $message = $this->session->flashdata('message');
                      ?>
                      <div class="alert alert-<?php echo $message['class']; ?>">
                      <button class="close" data-dismiss="alert" type="button">×</button>
                      <?php echo $message['message']; 
                      ?>
                      </div>
                      <?php
                      }                        
                      ?>
               </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
              <div class="box-body">

           
           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Site Title</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Input title" required="" value="<?php echo $data->title;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

                  <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Title Abbreviation</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="title_short" placeholder="Input shortform" required="" value="<?php echo $data->title_short;?>" data-parsley-maxlength="5">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>



        <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3">Logo</label>
                       <div class="col-sm-5">
                      <input type="file" id="images" name="logo" class="form-control">
                      <img src="<?php echo base_url();?><?php echo $data->logo;?>" width="40" height="40" alt="No Image">
                      <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    </div>

         <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3">Fav Icon</label>
                       <div class="col-sm-5">
                      <input type="file" id="images" name="favicon" class="form-control">
                      <img src="<?php echo base_url();?><?php echo $data->favicon;?>" width="40" height="40" alt="No Image">

                      <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    </div>
           

           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Country</label>
             <div class="col-sm-5">
                    <select class="form-control" data-placeholder="Select a State" style="width: 100%;" name="country">
                    <?php
                      foreach ($list as $value) { ?>
                       <option <?php if ($value->name == $data->country) echo 'selected="SELECTED"'; ?> value="<?php echo $value->name;?>"><?php echo $value->name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

               <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Payment Options</label>
             <div class="col-sm-5">
                  <?php $payment_options = explode(",",$data->payment_options); ?>

                <label>

                  <input type="checkbox" class="minimal" name="payment_options[]" value="paypal" <?php if(in_array("paypal",$payment_options)) echo 'checked'; ?>>Paypal
                </label>
                 <label>
                  <input type="checkbox" class="minimal" name="payment_options[]" value="cash" <?php if(in_array("cash",$payment_options)) echo 'checked'; ?>>Cash
                </label>
                  <label>
                  <input type="checkbox" class="minimal" name="payment_options[]" value="credit_card" <?php if(in_array("credit_card",$payment_options)) echo 'checked'; ?>>Credit card
                </label>
              </div>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>

                <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Paypal</label>
             <div class="col-sm-5">
                    <select class="form-control" data-placeholder="Select a State" style="width: 100%;" name="paypal">
                  <option value="live"  <?php if($data->paypal == 'live') echo "SELECTED";?>>Live</option>
                  <option value="sandbox" <?php if($data->paypal == 'sandbox') echo "SELECTED";?>>Sandbox</option>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

                      <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Paypal ID</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="paypalid" placeholder="Input paypalid" required="" value="<?php echo $data->paypalid;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

              <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Admin :- email</label>
             <div class="col-sm-5">
                    <input type="email" class="form-control" id="title" name="admin_email" placeholder="Input email" required="" value="<?php echo $data->admin_email;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

              <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Smtp Username</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="smtp_username" placeholder="Input Smtp Username" required="" value="<?php echo $data->smtp_username;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

              <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Smtp Host</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="smtp_host" placeholder="Input Smtp Host" required="" value="<?php echo $data->smtp_host;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

              <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Smtp Password</label>
             <div class="col-sm-5">
                    <input type="password" class="form-control" id="title" name="smtp_password" placeholder="Input Smtp Password" required="" value="<?php echo $data->smtp_password;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

              <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">App Secret Key</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="app_secret_key" placeholder="Input Secret Key" required="" value="<?php echo $data->app_secret_key;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

                 <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Authorize.Net</label>
             <div class="col-sm-5">
                    <select class="form-control" style="width: 100%;" name="authorize_net">
                      <option value="1" <?php if($data->authorize_net == '1') echo "SELECTED";?> >Live</option>
                      <option value="2"  <?php if($data->authorize_net == '2') echo "SELECTED";?>>Sandbox</option>
                    </select>
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

              <div class="form-group">
                 <label for="inputPassword3" class="col-sm-3">Authorize.Net Login Id</label>
                 <div class="col-sm-5">
                        <input type="text" class="form-control" id="title" name="authorize_net_loginid" placeholder="Input Authorize.Net Login Id" required="" value="<?php echo $data->authorize_net_loginid;?>">
                        <span class="glyphicon  form-control-feedback"></span>
                 </div>
              </div>

              <div class="form-group">
                 <label for="inputPassword3" class="col-sm-3">Authorize.Net Transaction Key</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="title" name="transaction_key" placeholder="Input Authorize.Net Transaction Key" required="" value="<?php echo $data->transaction_key;?>">
                        <span class="glyphicon  form-control-feedback"></span>
                    </div>
              </div>
    

              </div>
           
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-6">
               <!--  <button type="submit" class="btn btn-default">Cancel</button> -->
                   <button type="submit" class="btn btn-info pull-right">Update</button>
                </div>               
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

    </section>
    <!-- /.content -->
  </div>


















