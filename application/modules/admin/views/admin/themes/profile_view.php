<?php

?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      	<div class="x_panel">
        	<div class="x_title">
          		<h2></h2>
          		<div class="clearfix"></div>
        	</div>
        	<div class="x_content">
          		<div class="col-md-12 col-sm-12 col-xs-12">

                <div class="row" ng-show="chnimas">


                  <!--<button data-target=".cinemaprofile" data-toggle="modal" class="btn btn-primary" type="button">Add New</button>-->
                  <div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade cinemaprofile bs-example-modal-lg " style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                          </button>
                          <h4 id="myModalLabel2" class="modal-title">Add New Chinema's</h4>
                        </div>
                        <div class="modal-body">
                          <form name="edit_form" ng-submit="edit_form_submitted && add_profiles(cinemaprofile.image)" ng-init="form_edit_table='<?php //echo $table;?>'">
                            <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.first_name.$error.required}">
                                <label for="first_name" class="control-label col-md-3 col-sm-3 col-xs-12">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinemaprofile.first_name" class="form-control col-md-7 col-xs-12 " required="required" name="first_name" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.first_name.$error.required">This field is required</span>
                              </div>
                            </div>
							
							

                            <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.image.$error.required || edit_form.image.$error.maxSize}">
                                <label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">image <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  ngf-select  type="file" ng-model="cinemaprofile.image" class="form-control col-md-7 col-xs-12 "  ngf-max-size="2MB" required="required" accept="image/*"  name="image" ngf-model-invalid="errorFile" >
                                    {{errorFile}}
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12" style="display:inline-flex" ng-show="cinemaprofile.image">
                                  <img  ngf-thumbnail="cinemaprofile.image" style="width: 150px; height: 150px;float: none;position: relative;"> <button style="height:25px;" ng-click="cinemaprofile.image = null" ng-show="cinemaprofile.image">X</button>
                                </div>
                                <span class="alert"  ng-show="edit_form_submitted && edit_form.image.$error.required">This field is required</span>
                                <span class="alert"  ng-show="edit_form.image.$error.maxSize">File too large : max 2MB</span>
                              </div>
                            </div>
							
							
							
			
                          
                        </div>
                        <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-primary"  type="submit" ng-click="edit_form_submitted=true" value="submit">Save</button>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
                <div class="row" ng-show="chnimas">
                  <table id="datatable-responsive"  class="table table-striped responsive-utilities jambo_table bulk_action" >
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach ($content as $key => $value) {?>
                        <tr style="text-align:center">
                          <td><?php echo $value->id;?></td>
                          <td><?php echo $value->first_name;?></td>
                          <td><?php echo $value->last_name;?></td>
                          <td><?php echo $value->email;?></td>
                          <td>
                            <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg" ng-click="get_profiledet(<?php echo $value->id;?>)"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            &nbsp;&nbsp;&nbsp;
                        
                          </td>
                        </tr>
                      <?php }
                      ?>
                    </tbody>
                  </table>
                </div>
	  </div>			
	 </div>			
	</div>			
   </div>			
  </div>			
				
				