<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Movies to Theatres
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>theatre/viewmovie"><i class="fa fa-dashboard"></i>Theatres</a></li>
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
             <label for="inputPassword3" class="col-sm-3">Movie</label>
             <div class="col-sm-5">
                    <select class="form-control select2" style="width: 100%;" name="movie_id">
                    <?php
                      foreach ($list as $value) { ?>
                       <option <?php if($value->id == $lists->movie_id) echo "SELECTED";?> value="<?php echo $value->id;?>"><?php echo $value->movie_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

                     <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Theater</label>
             <div class="col-sm-5">
                   <select class="form-control select2" data-placeholder="Select a theatre" style="width: 100%;" name="theatre_id">
                    <?php
                      foreach ($data as $value) { ?>
                       <option <?php if (in_array($value->id, $lists->theatre_id)) echo 'selected="SELECTED"'; ?> value="<?php echo $value->id;?>"><?php echo $value->theater_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
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
  
  












