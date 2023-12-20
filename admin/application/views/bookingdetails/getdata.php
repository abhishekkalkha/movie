<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Booking Details
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>bookingdetails"><i class="fa fa-dashboard"></i>BookingDetails</a></li>
        <li class="active">View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
     <div class="box-header">
      <h3 class="box-title">List</h3>
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
      <table id="example1" class="table table-bordered table-striped datatable">
        <thead>
        <tr>
         <th>Date</th>
          <th>Screen</th>
          <th>Time</th>

          <th>Action</th>

        </tr>
        </thead>
        <tbody>
               <?php foreach($list as $data) { ?>
                <tr>

                     <td><?php echo  $data->date;?></td>
                    <td><?php echo $data->screen_name;?></td>
                    <td><?php echo $data->screen_timing;?></td>

                    <td>     

                    <a class="btn btn-sm btn-primary viewbutton" id="viewbutton<?php echo $data->id; ?>" data-bookingid="<?php echo  $data->id;?>" >
                        
                   <i class="fa fa-eye"></i>
                       View Booking Details
                        </a>
                   
                        </td>
                </tr>
             <?php } ?>
         
        </tbody>
        <tfoot>
        <tr>
           <th>Date</th>
          <th>Screen</th>
          <th>Time</th>

          <th>Action</th>

       
        </tr>
        </tfoot>
      </table>
    </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
         <div class="modal fade modal-wide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Booking Details</h4>
              </div>
              <div class="modal-body">
                  <div class="box-body">
      
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
             <!--    <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->









