<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Banners
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>banners/index"><i class="fa fa-dashboard"></i>Banners</a></li>
        <li class="active">Create</li>
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
            <form class="form-horizontal" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
              <div class="box-body">

                      <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3">Upload Photo(Max 2MB)</label>
                       <div class="col-sm-5">
                      <input type="file" id="images" name="banner_images" class="form-control" required="">
                      <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-6">
                   <button type="submit" class="btn btn-info pull-right">Add</button>
                </div>               
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

    </section>
    <!-- /.content -->
  </div>


















