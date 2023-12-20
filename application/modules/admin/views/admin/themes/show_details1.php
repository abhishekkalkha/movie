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

                  <button data-target=".cinema" data-toggle="modal" class="btn btn-primary" type="button">Add New</button>
                  <div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade cinema bs-example-modal-lg " style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button aria-label="Close" data-dismiss="modal"  class="close" type="button"><span aria-hidden="true">×</span>
                          </button>
                          <h4 id="myModalLabel2" class="modal-title">Add Show Details</h4>
                        </div>
                        <div class="modal-body">
						
                          <form name="edit_form" ng-submit="edit_form_submitted && add_booking(cinema)"  ng-init="form_edit_table='<?php //echo $table;?>'">
						  
						    <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.movie_name.$error.required}">
                                <label for="movie_name" class="control-label col-md-3 col-sm-3 col-xs-12">Movie Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.movie_name" class="form-control col-md-7 col-xs-12 " required="required" name="movie_name" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.movie_name.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.language.$error.required}">
                                <label for="language" class="control-label col-md-3 col-sm-3 col-xs-12">Language<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.language" class="form-control col-md-7 col-xs-12 " required="required" name="language" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.language.$error.required">This field is required</span>
                              </div>
                            </div>
						  
                            <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.screen.$error.required}">
                                <label for="screen" class="control-label col-md-3 col-sm-3 col-xs-12">Screen<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.screen" class="form-control col-md-7 col-xs-12 " required="required" name="screen" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.screen.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.screen_timing.$error.required}">
                                <label for="screen_timing" class="control-label col-md-3 col-sm-3 col-xs-12">Screen Timing<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.screen_timing" class="form-control col-md-7 col-xs-12 " required="required" name="screen_timing" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.screen_timing.$error.required">This field is required</span>
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
                        <th>Movie Name</th>
						<th>Language</th>
                        <th>Screen</th>                       
                        <th>Screen Timing</th>                       
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach ($content as $key => $value) {?>
                        <tr style="text-align:center">
                          <td><?php echo $value->id;?></td>
                          <td><?php echo $value->movie_name;?></td>
                          <td><?php echo $value->language;?></td>
                          <td><?php echo $value->screen;?></td>
                          <td><?php echo $value->screen_timing;?></td>
                          <td>
						 
                            <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg" ng-click="get_show(<?php echo $value->id;?>)"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="javascript:void(0);" ng-click="get_screen(<?php echo $value->id;?>);chnimas=false;"><i class="fa fa-building" aria-hidden="true"></i></a>
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