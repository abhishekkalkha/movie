<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reviews
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>reviews"><i class="fa fa-dashboard"></i>Reviews</a></li>
        <li class="active">View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
         <div class="box box-info">
     <div class="box-header">
      <h3 class="box-title">Reviews</h3>
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
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>User Name</th>
          <th>Movie Name</th>
          <th>Title</th>
          <th>Comments</th>
          <th>Rating</th>
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
                   <td><?php echo $result->name;?></td>
                   <td><?php echo $result->movie_name;?></td>
                   <td><?php echo $result->title;?></td>
                   <td><?php echo $result->comments;?></td>
                   <td><?php echo $result->rate;?></td>
                   <td>
                      <?php
                      if( $result->status=='0'){?>
                          <a class="btn btn-sm label-danger" href="<?php echo base_url();?>reviews/status/<?php echo $result->id; ?>" > 
                          <i class="fa fa-folder-open"></i> Enable </a>           
                          <?php
                      }                                
                      else
                      {
                      ?>
                        <a class="btn btn-sm label-success" href="<?php echo base_url();?>reviews/status_active/<?php echo $result->id; ?>"> 
                        <i class="fa fa-folder-o"></i> Disable </a>
                        <?php
                      } ?> </td>
                </tr>
                <?php $i++;  } ?>
        </tbody>
        <tfoot>
        <tr>
          <th>Id</th>
          <th>User Name</th>
          <th>Movie Name</th>
          <th>Title</th>
          <th>Comments</th>
          <th>Rating</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
      </div>
      <!-- /.row (main row) -->
</div>
    </section>
    <!-- /.content -->
  </div>








