<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Actors
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>actors/create"><i class="fa fa-dashboard"></i>Actor</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="col-md-12">
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create</h3>
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
                <div class="col-sm-10">
                  <div class="col-sm-7" >
                     <div class="form-group">
                        <label for="inputPassword3">Name</label>
                          <input type="text" class="form-control" id="name" name="actors_name" placeholder="Input name" required="">
                          <span class="glyphicon  form-control-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label>Date of Birth</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker2" name="dob">
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                       <label>Description</label>
                         <div class="box box-info">
                           <div class="box-body pad">
                              <textarea id="editor1" name="description" rows="10" cols="80"> </textarea>
                           </div>
                         </div>
                     </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <label for="file">Upload Photo(jpg|jpeg|png)(Max 1MB)</label>
                       <input type="file" id="images" name="image" class="form-control" required="">
                      <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                          <select class="form-control select2" multiple="multiple" data-placeholder="Select Role" style="width: 100%;" name="role[]" required="">
                             <?php
                              foreach($data as $list){
                             ?>
                            <option value="<?php echo $list->id;?>"><?php echo $list->role_name;?></option>
                              <?php
                              }
                              ?>
                         </select>
                         <span class="glyphicon  form-control-feedback"></span>
                    </div>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-6">
                   <button type="submit" class="btn btn-info pull-right">Add</button>
                </div>               
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
</div>
    </section>
    <!-- /.content -->
  </div>


















