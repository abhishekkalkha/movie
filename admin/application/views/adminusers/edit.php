<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Admin users
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>adminuser"><i class="fa fa-dashboard"></i>Adminusers</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create</h3>
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
            <form class="form-horizontal" method="post" data-parsley-validate="" class="validate"  enctype="multipart/form-data">
              <div class="box-body">

             <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Name</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="name" placeholder="Input name" required="" value="<?php echo $datas->name;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>


                <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Email</label>
             <div class="col-sm-5">
                    <input type="email" class="form-control" id="title" name="email" placeholder="Input email" required=""  data-parsley-type="email" value="<?php echo $datas->email;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>
               <div class="form-group">
                <label for="inputPassword3" class="col-sm-3">Role</label>
                <div class="col-sm-5">
                <select class="form-control" data-placeholder="Select Certificate" style="width: 100%;" name="user_type" required="">
                <option value="-1">Select Usertype</option>
               <?php
                              foreach($data as $list){
                             ?>
                 <option <?php if( $list->id == $datas->user_type) echo "SELECTED";?> value="<?php echo $list->id;?>"><?php echo $list->name;?></option>
                             <?php
                             }
                 ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
          </div>
              </div>
       <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Phone</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="phone" placeholder="Input phone" required=""  data-parsley-type="number" value="<?php echo $datas->phone;?>" >
                    <span class="glyphicon  form-control-feedback"></span>
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


















