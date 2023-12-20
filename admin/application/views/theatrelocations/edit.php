<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Theatre Locations
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>theatrelocations"><i class="fa fa-dashboard"></i>Theatrelocations</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit</h3>
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
             <label for="inputPassword3" class="col-sm-3">Name</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="location" placeholder="Input Location" required="" value="<?php echo $data->location;?>">
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


















