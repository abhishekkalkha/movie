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

         <!--<button data-target=".cinema" data-toggle="modal" class="btn btn-primary" type="button">Add New</button>-->
         <!--<div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade cinema bs-example-modal-lg " style="display: none;">-->
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"></span>
                          </button>
						 
                          <h4 id="myModalLabel2" class="modal-title">Add Gallery</h4>
                        </div>
                        <div class="modal-body">
                          <form name="edit_form" ng-submit="edit_form_submitted && add_galleries(cinema_gallery.image)" ng-init="form_edit_table='<?php //echo $table;?>'">
						  
						  
                            <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.movie.$error.required}">
                                <label for="movie" class="control-label col-md-3 col-sm-3 col-xs-12">Movie Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12" ng-init="get_movies_name()">
                                   <select class="form-control col-md-7 col-xs-12 " ng-model="cinema_gallery.movie">
									    <option ng-repeat="selectmoviess in view_moviesname" 
										value="{{selectmoviess.id}}">{{selectmoviess.movie_name}}</option>
                                   </select>	
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.movie.$error.required">This field is required</span>
                              </div>
                            </div>
							
						
							
	

                            <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.image.$error.required || edit_form.image.$error.maxSize}">
                                <label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">image <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  ngf-select  type="file" ng-model="cinema_gallery.image" class="form-control col-md-7 col-xs-12 "  ngf-max-size="2MB" required="required" accept="image/*"  name="image[]" ngf-model-invalid="errorFile">
                              
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12" style="display:inline-flex" ng-show="cinema_gallery.image">
                                  <img  ngf-thumbnail="cinema_gallery.image" style="width: 150px; height: 150px;float: none;position: relative;"> <button style="height:25px;" ng-click="cinema_gallery.image = null" ng-show="cinema_gallery.image">X</button>
                                </div>
                                <span class="alert"  ng-show="edit_form_submitted && edit_form.image.$error.required">This field is required</span>
                                <span class="alert"  ng-show="edit_form.image.$error.maxSize">File too large : max 2MB</span>
                              </div>
                            </div>
						
			
							
					

                         

                          
                        </div>
                        <div class="modal-footer">
                          <!--<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>-->
                          <button class="btn btn-primary"  type="submit" ng-click="edit_form_submitted=true" value="submit">Save</button>
                          </form>
                        </div>

                      </div>
                    </div>
                  <!--</div>-->
          		</div>
				
				
      		</div>
  		</div>
  	</div>
</div>
</div>