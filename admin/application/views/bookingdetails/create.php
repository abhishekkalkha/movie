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
         <th>Id</th>
          <th>Theatre</th>
          <th>Movies</th>
          <th>Action</th>

        </tr>
        </thead>
        <tbody>
             <?php
                $i=1;
               foreach ($list as $result) { 
                 ?>
                <tr>

                     <td><?php echo $i;?></td>
                    <td><?php echo $result->theater_name;?></td>
                    <td><?php echo $result->movie_name;?></td>
                    <td>     

                    <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>bookingdetails/get_data/<?php echo $result->movie_id; ?>/<?php echo $result->theatre_id; ?>">
                        
                   <i class="fa fa-eye"></i>
                       View
                        </a>
                   
                        </td>
                </tr>
                <?php $i++;  } ?>
         
        </tbody>
        <tfoot>
        <tr>
             <th>Id</th>
          <th>Theatre</th>
          <th>Movies</th>
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








