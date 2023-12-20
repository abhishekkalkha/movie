<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Actors
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>actors"><i class="fa fa-dashboard"></i>Actors</a></li>
        <li class="active">View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
         <div class="box box-info">
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
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
         <th>Id</th>
          <th>Name</th>
          <th>Date of Birth</th>
          <th>Image</th>
          <th>Category</th>
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
                    <td><?php echo $result->actors_name;?></td>
                     <td><?php echo $result->dob;?></td>
                    <td><img src="<?php echo $result->image;?> " width="30" height="30"></td>
                    <td><?php echo $result->role_name;?></td>
                    <td>     

                    <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>actors/edit_actors/<?php echo $result->id; ?>">
                        
                   <i class="fa fa-fw fa-edit"></i>
                       Edit
                        </a>
                         <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>actors/delete_actor/<?php echo $result->id; ?>" onClick="return doconfirm()">
                        
                   <i class="fa fa-fw fa-remove"></i>
                       Delete
                        </a>

                        </td>
                </tr>
                <?php $i++;  } ?>
         
        </tbody>
        <tfoot>
        <tr>
          <th>Id</th>
         <th>Name</th>
           <th>Date of Birth</th>
          <th>Image</th>
          <th>Category</th>
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








