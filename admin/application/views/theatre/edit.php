<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Theatres
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>theatre"><i class="fa fa-dashboard"></i>Theatres</a></li>
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
             <label for="inputPassword3" class="col-sm-3">Name</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="theater_name" placeholder="Input title" required="" value="<?php echo $data->theater_name;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

              <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Address</label>
             <div class="col-sm-5">
                    <textarea class="form-control" rows="3" required="" placeholder="Enter your address" name="address"><?php echo $data->address;?></textarea
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

                     <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Location</label>
             <div class="col-sm-5">
                    <select class="form-control" style="width: 100%;" name="city">
                    <?php
                      foreach ($list as $value) { ?>
                       <option <?php if($value->id == $data->city) echo "SELECTED";?> value="<?php echo $value->id;?>"><?php echo $value->location;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

               
               <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Latitude</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Input latitude" required="" value="<?php echo $data->latitude;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                     <span><a href="#" id='pick-map'>Pick from map</a></span>
                </div>
              </div>

                
               <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Longitude</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Input logitude" required="" value="<?php echo $data->longitude;?>">
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
<div class="modal fade modal-wide" id="myModalmaptbz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select location</h4>
                  </div>
                  <div class="modal-body">
                    <div id='map_canvas' style="height:300px"></div>
                    <div id="current">Nothing yet...</div>
                    <input type="hidden" id="pick-lat" />
                    <input type="hidden" id="pick-lng" />
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-custom select-location">Select Location</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>

      

















