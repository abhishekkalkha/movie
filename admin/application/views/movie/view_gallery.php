<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Movies
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>movie"><i class="fa fa-dashboard"></i>Movies</a></li>
        <li class="active">View Gallery</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="box box-info">
            <div class="box-header with-border">

              <h3 class="box-title">Upload</h3>
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
               
     <div class="box-body">
       <form class="form-horizontal" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
         <div class="col-sm-12">
           <div class="col-sm-9">
             <div class="form-group">
                <label for="file" class="col-sm-3">Upload Photo</label>
                    <div class="col-sm-6">
                      <input type="file" id="images" name="image" class="form-control" required="">
                      <span class="glyphicon  form-control-feedback"></span>
                    </div>
            </div>
          </div>

          <div class="col-sm-2">
             <button type="submit" class="btn btn-info pull-right">Add</button>
          </div>  
        </div>
      </form>
  </div>
</div>



<div class="box box-info">
            <div class="box-header with-border">

              <h3 class="box-title">View</h3>
            </div>

     <div class="col-md-12">
      <div class="imageshow" style="background-color: white;width: 100%;height: 50px;color: green;font-size: 18px"></div>
                <!--   <?php
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
                      ?> -->
               </div>
               
     <div class="box-body">
      <?php
       $count = 0;
      ?>
      <table class="table">

             <?php
           
               foreach ($list as $result) { 

              if($count%4==0) {
                 ?>
                <tr>
            <?php  } ++$count;  ?>
                     <td><img src="<?php echo base_url();?><?php echo $result->image;?> " width="70" height="70"><br> <a href="" onClick="return doconfirms(<?php echo $result->id; ?>)">
                       Delete
                        </a></td>
                         <?php
                                if($count%4==0){?>
                  
                </tr>
                <?php  } ?>

                    <?php
                    }
                   ?>

                   <?php
                                if($count%4!=0){?>
                  
                      
                    </tr>
                <?php } ?>
         
       
      </table>

     
    </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>








