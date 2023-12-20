<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Show
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>theatre/viewshow"><i class="fa fa-dashboard"></i>Show</a></li>
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
            <form class="form-horizontal" method="post" data-parsley-validate="" class="validate">
              <div class="box-body">

                     <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Theater</label>
             <div class="col-sm-5">
                    <select class="form-control" style="width: 100%;" name="cinemas_id" id="theatre">
                    <option>Select Theatre</option>
                    <?php
                      foreach ($data as $value) { ?>
                       <option  <?php if($value->id == $result->cinemas_id) echo "SELECTED"; ?> value="<?php echo $value->id;?>"><?php echo $value->theater_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>


                     <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Movie</label>
             <div class="col-sm-5">
                    <select class="form-control" style="width: 100%;" name="movie_name_id" id="movie">
                    <?php
                      foreach ($list as $value) {?>

                       <option  <?php if($value->id == $result->movie_name_id) echo "SELECTED"; ?> value="<?php echo $value->id;?>"><?php echo $value->movie_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>


                     <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">screen</label>
             <div class="col-sm-5">
                    <select class="form-control" style="width: 100%;" name="screen_name" id="screen">
                    <?php
                      foreach ($screen as $value) { ?>
                       <option <?php if($value->id == $result->screen_name) echo "SELECTED"; ?> value="<?php echo $value->id;?>"><?php echo $value->screen_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

                    <div class="form-group">
                <label for="inputPassword3" class="col-sm-3">Date</label>
                 <div class="col-sm-5">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="date" value="<?php echo $result->date;?>">
                </div>
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
                <!-- /.input group -->
              </div>


                   <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3">Time</label>
                    <div class="col-sm-5">
                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="screen_timing"  value="<?php echo $result->screen_timing;?>">
                      
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <span class="glyphicon  form-control-feedback"></span>
                  </div>
                  <!-- <div class="square col-sm-4" id="showsquare" style="margin-top:10px"> <i class="fa fa-plus-square"></i></div> -->
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
  
  












