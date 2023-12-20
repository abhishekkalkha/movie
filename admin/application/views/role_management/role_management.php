<?php

    $id = $this->session->userdata['backend_logged_in']['user_type'];


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Role Management
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>rolemanagement"><i
                        class="fa fa-dashboard"></i>Rolemanagement</a></li>
            <li class="active">Role management</li>
        </ol>
    </section>

    <!-- Main content -->
        <section class="content">
       <div class="box box-info">
            <div class="box-header with-border">

              <h3 class="box-title">Set Permission</h3>
            </div>

                <div class="col-md-12">
                 <div class="result-role" style="background-color: white;width: 100%;height: 50px;color: green;font-size: 18px">
                    <!-- <button class="close" data-dismiss="alert" type="button" style="color: red">×</button> -->
                 </div>
                  <!-- <?php
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
                      ?>-->
               </div> 
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" data-parsley-validate="" class="validate" id="permission">
            <?php
            $count =0;
            ?>

                <table class="table">
                <?php 

                foreach ($newarray as $rs) {
               
                if($count%3==0){?>
                  <tr>

                     
                     
                <?php }
                 ++$count;
                  ?>
                   <td>
                    
                     

                        <div class="box-body" style="padding-left: 80px;width: 280px">
                              <label><input type="checkbox"   <?php foreach($rs->functions as $res){if(in_array($res->id, $access)) { echo "checked";}break;}  ?>  id="<?php echo $rs->controller_name ;?>" onclick="check_fun($(this));"> <?php echo $rs->controller_name ;?></label>
                                <?php

                                 
                                    foreach ($rs->functions as $res) {
                                  
                                  ?>
                                    <div class="form-group">
                                      <div class="col-sm-10">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox"  <?php if(in_array($res->id, $access)) { echo "checked";} ?>  id="<?php echo $rs->controller_name ;?><?php echo $res->id;?>" class="<?php echo $rs->controller_name;?>" name="<?php echo $rs->controller_name ;?>[]" value="<?php echo $res->id;?>" onclick="check_sub($(this));" > <?php echo $res->label;?>                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <?php }?>
                                    
                                </div>  </td>
                                <?php
                                if($count%3==0){?>
                  
                      
                    </tr>
                <?php }

                  ?>
                            
                      
                    <?php
                    }
                   ?>

                   <?php
                                if($count%3!=0){?>
                  
                      
                    </tr>
                <?php } ?>

                </table>
                <div class="box-footer">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                </div>

            </form>

        </div>
    </section>
    <!-- /.content -->

</div>














