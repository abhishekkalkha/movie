<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Customers
         <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo base_url(); ?>customer/customer_list"><i class="fa fa-dashboard"></i>Customer</a></li>
         <li class="active">View</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <!-- col -->
      <div class="col-md-12">
         <div class="box box-info">
            <div class="box-header">
               <h3 class="box-title">List</h3>
            </div>
            <!-- Box body-->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>booking Count</th>
                      <!--   <th>Status</th> -->
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($list as $lists) {?>
                     <tr>
                        <td><?php echo $lists->name;?></td>
                        <td><?php echo $lists->gender;?></td>
                        <td><?php echo $lists->phone;?></td>
                        <td><?php echo $lists->email;?></td>
                        <td><?php echo $lists->booking_count;?></td>
                      <!--   <td><?php if($lists->status == 1){echo "Active"; }else{ echo "Inactive"; }?></td> -->
                     </tr>
                     <?php }?>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>booking Count</th>
                       <!--  <th>Status</th> -->
                     </tr>
                  </tfoot>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col --> 
   </section>
   <!-- /.content -->
</div>