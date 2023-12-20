<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promocode
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>promocode"><i class="fa fa-dashboard"></i>Promocode</a></li>
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
             <label for="inputPassword3" class="col-sm-3">Code</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="promocode" placeholder="Input code" required="" value="<?php echo $data->promocode;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>


      <div class="form-group">
                 <label for="inputPassword3" class="col-sm-3">Date range:</label>
                <div class="col-sm-5">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" name="valid_from" value="<?php echo $data->valid_from;?>">
                  <input type="hidden" class="form-control pull-right" id="reservation_dub" value="<?php echo $data->valid_from;?>">
                </div>
                <!-- /.input group -->
                 <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

                <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Type</label>
             <div class="col-sm-5">
                    <select class="form-control" style="width: 100%;" name="promocode_type">
                  <option value="Fixed" <?php if($data->promocode_type == 'Fixed') echo "SELECTED";?>>Fixed</option>
                  <option value="Percentage" <?php if($data->promocode_type == 'Percentage') echo "SELECTED";?>>Percentage</option>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

                      <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Off</label>
             <div class="col-sm-5">
                    <input type="number" class="form-control" id="title" name="off" placeholder="Input off" required="" value="<?php echo $data->off;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

                 <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Status</label>
             <div class="col-sm-5">
                    <select class="form-control" style="width: 100%;" name="status">
                      <option value="1" <?php if($data->status == '1') echo "SELECTED";?>>Active</option>
                      <option value="2" <?php if($data->status == '2') echo "SELECTED";?>>Inactive</option>
                    </select>
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


















