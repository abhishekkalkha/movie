<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Movie
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>movie"><i class="fa fa-dashboard"></i>Movie</a></li>
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
            <form class="form-horizontal" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
              <div class="box-body">

           
           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Name</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="movie_name" placeholder="Input Movie Name" required="" value="<?php echo $data->movie_name?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>


           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Certificate</label>
                <div class="col-sm-5">
                    <select class="form-control" data-placeholder="Select Certificate" style="width: 100%;" name="certificate" required="">
                        <option <?php if($data->certificate == 'U') echo "SELECTED";?> value="U">U</option>
                        <option <?php if($data->certificate == 'A') echo "SELECTED";?> value="A">A</option>
                        <option <?php if($data->certificate == 'UA') echo "SELECTED";?> value="UA">UA</option>
                    </select>
                    <span class="glyphicon  form-control-feedback"></span>
               </div>
           </div>


           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Language</label>
             <div class="col-sm-5">
                    <select class="form-control" data-placeholder="Select Language" style="width: 100%;" name="language" required="">
                    <?php
                      foreach ($language as $value) { ?>
                       <option <?php if($data->language == $value->id) echo "SELECTED";?> value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

           
                  <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Format</label>
             <div class="col-sm-5">
                    <select class="form-control" data-placeholder="Select Format" style="width: 100%;" name="format" required="">
                     <option value="-1">Select Format</option>
                    <?php
                      foreach ($format as $value) { ?>
                       <option  <?php if($data->format == $value->format_name) echo "SELECTED";?> value="<?php echo $value->format_name;?>"><?php echo $value->format_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>


                    <div class="form-group">
                <label for="inputPassword3" class="col-sm-3">Release Date</label>
                 <div class="col-sm-5">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="release_date" required="" value="<?php echo $data->release_date;?>">
                </div>
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
                <!-- /.input group -->
              </div>


           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Length</label>
             <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="total_hours" placeholder="Input Film Length" required="" value="<?php echo $data->total_hours;?>">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>
               <div class="form-group">
                      <label for="file" class="col-sm-3">Banner Image</label>
                      <div class="col-sm-5">
                      <input type="file" id="images" name="banner_image" class="form-control" >
                      <img src="<?php echo $data->banner_image;?>" width="50" height="50">
                      <span class="glyphicon  form-control-feedback"></span>
                      </div>
                    </div>


            <div class="form-group">
                      <label for="file" class="col-sm-3">Image</label>
                      <div class="col-sm-5">
                      <input type="file" id="images" name="image" class="form-control" >
                       <img src="<?php echo $data->image;?>" width="50" height="50">
                      <span class="glyphicon  form-control-feedback"></span>
                      </div>
                    </div>
                     <div class="form-group">
                <label for="inputPassword3" class="col-sm-3">Trailer</label>
                 <div class="col-sm-5">

                    <textarea class="form-control" name="trailer" rows="3"placeholder="Trailer Url"><?php echo $data->trailer;?></textarea>

             <span class="glyphicon  form-control-feedback"></span>
          </div>
          </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3">Tag</label>
                 <div class="col-sm-5">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;" name="tag_id[]" required="">
               <?php
                              foreach($tag as $list){
                             ?>
                 <option <?php if (in_array($list->id, $data->tag_id)) echo 'selected="SELECTED"'; ?> value="<?php echo $list->id;?>"><?php echo $list->tag_name;?></option>
                             <?php
                             }
                 ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
              </div>
          </div>

          <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Facebook Link</label>
             <div class="col-sm-5">
                    <input type="url" class="form-control" id="name" name="facebook" value= "<?php echo $data->facebook;?>" placeholder="Input facebook Link" data-parsley-type="url" >
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>


           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Twitter Link</label>
             <div class="col-sm-5">
                    <input type="url" class="form-control" id="name" name="twitter" value="<?php echo $data->twitter;?>" placeholder="Input Twitter Link" data-parsley-type="url" >
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>


           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Google Plus Link</label>
             <div class="col-sm-5">
                    <input type="url" class="form-control" id="name" name="googleplus" value="<?php echo $data->googleplus;?>" placeholder="Input googleplus Link" data-parsley-type="url" >
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>


              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3">Cast</label>
                 <div class="col-sm-5">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select cast" style="width: 100%;" name="cast[]" required="">
               <?php
                              foreach($cast as $list){
                             ?>
                 <option  <?php if (in_array($list->id, $data->cast)) echo 'selected="SELECTED"'; ?> value="<?php echo $list->id;?>"><?php echo $list->actors_name;?></option>
                             <?php
                             }
                 ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
              </div>
          </div>
            <?php 
            if(count($data->role)>0){ 
           for($i =0;$i<count($data->role);$i++){
      /*      print_r($data->role[$i]);*/
             $s=$data->role[$i]; 
             $t = $data->actors[$i];
             ?>
           <div class="crewrow">
           <div class="form-group">
           <?php if($i == 0){?>
             <label for="inputPassword3" class="col-sm-3">Crew</label>
           <?php } 
            else{
              ?>
               <label for="inputPassword3" class="col-sm-3"></label>
           <?php
            }
           ?>
             <div class="col-sm-4">
                    <select class="form-control roleid" style="width: 100%;" name="role[]" required="" id="role_id<?php echo $i+1;?>">
                     <option value="-1">Select role</option>
                    <?php
                      foreach ($role as $value) { ?>
                       <option  <?php if ($value->id == $s) echo "SELECTED"; ?> value="<?php echo $value->id;?>"><?php echo $value->role_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>


                <div class="col-sm-4">
                    <select class="form-control actorsid" style="width: 100%;" name="actors[]" required="" id="actors_id<?php echo $i+1;?>">
  <!--                    <option value="-1">Select actor</option> -->
                    <?php
                      foreach ($actors as $value) { ?>
                       <option <?php if ($value->id==$t) echo "SELECTED"; ?> value="<?php echo $value->id;?>"><?php echo $value->actors_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
               <?php if($i == 0){?>
                <div class="square col-sm-1" id="addone" style="margin-top:10px"> <i class="fa fa-plus-square">&nbsp;Add</i></div>
                <?php }
                else{
                  ?>
                  <div class="square col-sm-1" id="closeone" style="margin-top:10px"> <i class="fa fa-times-circle"></i></div>
                  <?php
                }
                ?>
              </div>
              </div>
              <input type="hidden" value="<?php echo $i;?>" id="x">
               <?php } } else {?>

                <div class="crewrow">
           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Crew</label>
             <div class="col-sm-4">
                    <select class="form-control roleid" style="width: 100%;" name="role[]" required="" id="role_id">
                     <option value="-1">Select role</option>
                    <?php
                      foreach ($role as $value) { ?>
                       <option value="<?php echo $value->id;?>"><?php echo $value->role_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>


                <div class="col-sm-4">
                    <select class="form-control actorsid" style="width: 100%;" name="actors[]" required="" data-id="actors_id">
                     <option value="-1">Select actor</option>
                    <?php
                      foreach ($actors as $value) { ?>
                       <option value="<?php echo $value->id;?>"><?php echo $value->actors_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
                <div class="square col-sm-1" id="addone" style="margin-top:10px"> <i class="fa fa-plus-square">&nbsp;Add</i></div>
              </div>
              </div>
              <input type="hidden" value="1" id="x" class="x">

               <?php } ?>
               

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


















