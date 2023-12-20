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
                    <!-- <div class="row">
                        <form name="myForm">
                          <fieldset>
                            <legend>Upload on form submit</legend>
                            Username:
                            <input type="text" name="userName" ng-model="username" size="31" required>
                            <i ng-show="myForm.userName.$error.required">*required</i>
                            <br>Photo:
                            <input type="file" ngf-select ng-model="picFile" name="file"
                                   accept="image/*" ngf-max-size="2MB" required
                                   ngf-model-invalid="errorFile">
                            <i ng-show="myForm.file.$error.required">*required</i><br>
                            <i ng-show="myForm.file.$error.maxSize">File too large
                                {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
                            <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> <button ng-click="picFile = null" ng-show="picFile">Remove</button>
                            <br>
                            <button ng-disabled="!myForm.$valid"
                                    ng-click="uploadPic(picFile)">Submit</button>

                            <div ng-show="picFile.progress >= 0" class="progress-bar progress-bar-success" style="width:{{picFile.progress}}%" ng-bind="picFile.progress + '%'"></div>
                            <span ng-show="picFile.result">Upload Successful</span>
                            <span class="err" ng-show="errorMsg">{{errorMsg}}</span>
                          </fieldset>
                          <br>
                        </form>
                    </div> -->
                    <div class="row" ng-show="chnimas">


                      <button data-target=".cinema" data-toggle="modal" class="btn btn-primary" type="button">Add New</button>
                      <div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade cinema bs-example-modal-lg " style="display: none;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                            <div class="modal-header">
                              <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                              </button>
                              <h4 id="myModalLabel2" class="modal-title">Add New Chinema's</h4>
                            </div>
                            <div class="modal-body">
                              <form name="edit_form" ng-submit="edit_form_submitted && add_cinemas(cinema.image)" ng-init="form_edit_table='<?php //echo $table;?>'">
                                <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                                  <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.name.$error.required}">
                                    <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" ng-model="cinema.name" class="form-control col-md-7 col-xs-12 " required="required" name="name" >
                                    </div>
                                    <span class="alert" ng-show="edit_form_submitted && edit_form.name.$error.required">This field is required</span>
                                  </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.image.$error.required || edit_form.image.$error.maxSize}">
                                    <label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  ngf-select  type="file" ng-model="cinema.image" class="form-control col-md-7 col-xs-12 "  ngf-max-size="2MB" required="required" accept="image/*"  name="image" ngf-model-invalid="errorFile" >
                                        {{errorFile}}
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12" style="display:inline-flex" ng-show="cinema.image">
                                      <img  ngf-thumbnail="cinema.image" style="width: 150px; height: 150px;float: none;position: relative;"> <button style="height:25px;" ng-click="cinema.image = null" ng-show="cinema.image">X</button>
                                    </div>
                                    <span class="alert"  ng-show="edit_form_submitted && edit_form.image.$error.required">This field is required</span>
                                    <span class="alert"  ng-show="edit_form.image.$error.maxSize">File too large : max 2MB</span>
                                  </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.location.$error.required}">
                                    <label for="location" class="control-label col-md-3 col-sm-3 col-xs-12">Location<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" ng-init="get_location()">
                                    <select class="form-control col-md-7 col-xs-12 " ng-model="cinema.location">
                                            <option ng-repeat="selectingvalueslocation in select_location"
                                            value="{{selectingvalueslocation.id}}">{{selectingvalueslocation.location}}</option>
                                  </select>
                                    </div>
                                    <span class="alert" ng-show="edit_form_submitted && edit_form.location.$error.required">This field is required</span>
                                  </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.city_dup.$error.required}">
                                    <label for="city_dup" class="control-label col-md-3 col-sm-3 col-xs-12">City <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" ng-model="cinema.city_dup" class="form-control col-md-7 col-xs-12 " required="required" name="address" >
                                    </div>
                                    <span class="alert" ng-show="edit_form_submitted && edit_form.city_dup.$error.required">This field is required</span>
                                  </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.address.$error.required}">
                                    <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" ng-model="cinema.address" class="form-control col-md-7 col-xs-12 " required="required" name="address" >
                                    </div>
                                    <span class="alert" ng-show="edit_form_submitted && edit_form.address.$error.required">This field is required</span>
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
                            <th>name</th>
                            <th>location</th>
                            <th>address</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($content as $key => $value) {?>
                            <tr style="text-align:center">
                              <td><?php echo $value->id;?></td>
                              <td><?php echo $value->name;?></td>
                              <td><?php echo $value->location;?></td>
                              <td><?php echo $value->address;?></td>
                              <td>
                                <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg" ng-click="get_chinema(<?php echo $value->id;?>)"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="javascript:void(0);" ng-click="get_screen(<?php echo $value->id;?>);chnimas=false;"><i class="fa fa-building" aria-hidden="true"></i></a>
                              </td>
                            </tr>
                          <?php }
                          ?>
                        </tbody>
                      </table>
                    </div>

    <!--**********************immanu **********************-->

    <!--**********************immanu **********************-->













                    <div class="row" ng-show="no_screen || screen ">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <button  data-target=".screen_popup" data-toggle="modal" class="btn btn-primary" type="button">Add New</button>

                        <button class="btn btn-default" type="button" ng-click="chnimas=true;no_screen=false;screen=false;">cancel</button>
                      </div>


                      <div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade screen_popup bs-example-modal-lg " style="display: none;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                            <div class="modal-header">
                              <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                              </button>
                              <h4 id="myModalLabel2" class="modal-title">Add New Screen</h4>
                            </div>
                            <div class="modal-body">
                              <form name="screen_edit_form" ng-submit="screen_edit_form_submitted && add_screen(cinema_screen)" >
                              <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitted && screen_edit_form.name.$error.required}">
                                    <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" ng-model="cinema_screen.screen_name" class="form-control col-md-7 col-xs-12 " required="required" name="name" >
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitted && screen_edit_form.name.$error.required">This field is required</span>
                                  </div>
                                </div>


                                <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitted && screen_edit_form.location.$error.required}">
                                    <label for="Chinemas" class="control-label col-md-3 col-sm-3 col-xs-12">Chinemas <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" ng-model="cinema_screen.cinemas_id"  class="form-control col-md-7 col-xs-12 " required="required" name="chinemas" readonly>
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitted && screen_edit_form.chinemas.$error.required">This field is required</span>
                                  </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                              <button class="btn btn-primary"  type="submit" ng-click="screen_edit_form_submitted=true" value="submit"  >Save</button>
                              </form>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-sm-12 col-xs-12 thumbnail screen"  ng-show="no_screen">
                        Screens not set.
                      </div>
                      <div class="col-md-55" ng-show="screen" ng-repeat="detail in screen_details">
                        <div class="thumbnail screen">
                            <div class="image view view-first ">
                              {{detail.screen_name}}
                              <div class="mask">
                                <div class="tools tools-bottom">
                                  <a href="javascript:void(0);" ng-click="layout_preview(detail.id)"><i class="fa fa-eye"></i></a>
                                  <a href="javascript:void(0);"  ng-click="edit_layout(detail.id)"><i class="fa fa-pencil"></i></a>
                                  <a href="javascript:void(0);"  ng-click="view_screenDetails(detail.id); view_screenvalues(detail.id)" ><i class="fa fa-film"></i></a>
                                  <a href="javascript:void(0);" ng-click="disable_layout(detail.id)" title="{{ detail.status==1 ? 'disable' : 'enable'}}"><i class="fa " ng-class="{'fa-times':detail.status=='1' , 'fa-check':detail.status=='0'}"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                 </div>



                                <!--immanu Editing-->
                 <div class="row" ng-show="no_screening || screening || screen_moviedetails">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <button  data-target=".screen_popup2" data-toggle="modal" class="btn btn-primary" type="button">Add New</button>

                        <button class="btn btn-default" type="button" ng-click="chnimas=true;no_screening=false;screening=false;">cancel</button>
                      </div>


                      <div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade screen_popup2 bs-example-modal-lg " style="display: none;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                            <div class="modal-header">
                              <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                              </button>
                              <h4 id="myModalLabel2" class="modal-title">Add Show Details</h4>
                            </div>
                            <div class="modal-body">
           <form name="screen_edit_form_details" ng-submit="screen_edit_form_submitteds && screendetails_add(cinema_screen.image)">


                                <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.movie_name_id.$error.required}">
                                    <label for="movie_name_id" class="control-label col-md-3 col-sm-3 col-xs-12">Movie Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" ng-init="get_moviesings()">
                                    <select class="form-control col-md-7 col-xs-12 " ng-model="cinema_screen.movie_name_id">
                                            <option ng-repeat="selectingvalues in select_movies"
                                            value="{{selectingvalues.id}}">{{selectingvalues.movie_name}}</option>
                                    </select>
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.movie_name_id.$error.required">This field is required</span>
                                  </div>
                                </div>



                                <!--div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.cinemas_id.$error.required}">
                                    <label for="cinemas_id" class="control-label col-md-3 col-sm-3 col-xs-12">Cinima ID<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <!--input type="text" ng-model="cinema_screen.cinemas"  class="form-control col-md-7 col-xs-12 " required="required" disabled>

                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.cinemas_id.$error.required">This field is required</span>
                                  </div>
                                </div-->

                                <input type="hidden" ng-model="cinema_screen.cinemas_id"  class="form-control col-md-7 col-xs-12 " required="required" name="cinemas_id" >


                                <!--div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.name.$error.required}">
                                    <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Screen Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" ng-model="cinema_screen.screen" class="form-control col-md-7 col-xs-12 " required="required" disabled>

                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.name.$error.required">This field is required</span>
                                  </div>
                                </div-->

                                <input type="hidden" ng-model="cinema_screen.screen_name" class="form-control col-md-7 col-xs-12 " required="required" name="name" >

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.date.$error.required}">
                                    <label for="date" class="control-label col-md-3 col-sm-3 col-xs-12">Show Date<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="wewewedate"  type="text" ng-model="cinema_screen.date" class="date-picker form-control col-md-7 col-xs-12 " required="required" name="date" >
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.date.$error.required">This field is required</span>
                                  </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.language.$error.required}">
                                    <label for="language" class="control-label col-md-3 col-sm-3 col-xs-12">Language<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" ng-init="get_showlanguage()">
                                    <select class="form-control col-md-7 col-xs-12 " ng-model="cinema_screen.language">
                                            <option ng-repeat="selectinglanguages in select_languages"
                                            value="{{selectinglanguages.id}}">{{selectinglanguages.name}}</option>
                                  </select>
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.language.$error.required">This field is required</span>
                                  </div>
                                </div>

                               <!--<div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.language.$error.required}">
                                    <label for="language" class="control-label col-md-3 col-sm-3 col-xs-12">Tags<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" ng-init="get_showtag()">
                                    <!--<select class="form-control col-md-7 col-xs-12 " ng-model="cinema_screen.tag_id">-->
                                    <!--<select class="select2_multiple form-control"  ng-model="cinema_screen.tag_id" multiple="multiple">
                                            <option ng-repeat="selectingtags in select_tags"
                                            value="{{selectingtags.id}}">{{selectingtags.tag_name}}</option>
                                  </select>
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.language.$error.required">This field is required</span>
                                  </div>
                                </div>-->

                                <!--<div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.language.$error.required}">
                                    <label for="language" class="control-label col-md-3 col-sm-3 col-xs-12">Format<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" ng-init="get_showformat()">
                                    <select class="form-control col-md-7 col-xs-12 " ng-model="cinema_screen.format">
                                            <option ng-repeat="selectingtformat in select_format"
                                            value="{{selectingtformat.id}}">{{selectingtformat.format_name}}</option>
                                  </select>
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.language.$error.required">This field is required</span>
                                  </div>
                                </div>-->

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.language.$error.required}">
                                    <label for="language" class="control-label col-md-3 col-sm-3 col-xs-12">Location<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" ng-init="get_showlocation()">
                                    <select class="form-control col-md-7 col-xs-12 " ng-model="cinema_screen.city_id">
                                            <option ng-repeat="selectingtlocation in select_location"
                                            value="{{selectingtlocation.id}}">{{selectingtlocation.location}}</option>
                                  </select>
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.language.$error.required">This field is required</span>
                                  </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.facebook_link.$error.required}">
                                    <label for="facebook_link" class="control-label col-md-3 col-sm-3 col-xs-12">Facebook Link <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" ng-model="cinema_screen.facebook_link" class="form-control col-md-7 col-xs-12 " required="required" name="facebook_link" >
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.facebook_link.$error.required">This field is required</span>
                                  </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.google_plus.$error.required}">
                                    <label for="google_plus" class="control-label col-md-3 col-sm-3 col-xs-12">Google+ <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" ng-model="cinema_screen.google_plus" placeholder="Google+" class="form-control col-md-7 col-xs-12 " required="required" name="google_plus" >
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.google_plus.$error.required">This field is required</span>
                                  </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.twiter_link.$error.required}">
                                    <label for="twiter_link" class="control-label col-md-3 col-sm-3 col-xs-12">Twiter Link <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" ng-model="cinema_screen.twiter_link" class="form-control col-md-7 col-xs-12 " required="required" name="twiter_link" >
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.twiter_link.$error.required">This field is required</span>
                                  </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.linkedin_link.$error.required}">
                                    <label for="linkedin_link" class="control-label col-md-3 col-sm-3 col-xs-12">Linked In Link <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" ng-model="cinema_screen.linkedin_link" class="form-control col-md-7 col-xs-12 " required="required" name="linkedin_link" >
                                    </div>
                                    <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.linkedin_link.$error.required">This field is required</span>
                                  </div>
                                </div>




                                 <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                                  <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.image.$error.required || screen_edit_form_details.image.$error.maxSize}">
                                    <label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  ngf-select  type="file" ng-model="cinema_screen.image" class="form-control col-md-7 col-xs-12 "  ngf-max-size="2MB" required="required" accept="image/*"  name="image" ngf-model-invalid="errorFile" >
                                        {{errorFile}}
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12" style="display:inline-flex" ng-show="cinema_screen.image">
                                      <img  ngf-thumbnail="cinema_screen.image" style="width: 150px; height: 150px;float: none;position: relative;"> <button style="height:25px;" ng-click="cinema_screen.image = null" ng-show="cinema_screen.image">X</button>
                                    </div>
                                    <span class="alert"  ng-show="screen_edit_form_submitteds && screen_edit_form_details.image.$error.required">This field is required</span>
                                    <span class="alert"  ng-show="screen_edit_form_details.image.$error.maxSize">File too large : max 2MB</span>
                                  </div>
                                </div>

                          <div class="row multi-field-wrapper">
                            <div class="multi-fields">
                              <div class="multi-field">
                                <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                                 <div class="item form-group" ng-class="{'bad' : screen_edit_form_submitteds && screen_edit_form_details.screen_timing.$error.required}">
                                    <label for="screen_timing" class="control-label col-md-3 col-sm-3 col-xs-12">Screen Timeing<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 bootstrap-timepicker">
                                        <input type="text" name="showtime[]" class="timepickering form-control col-md-7 col-xs-12" required="required"  >
                                    </div>

                                        <div class="input-group">
                                         <span class="input-group-btn">
                                            <button class="btn btn-default add-field" type="button">+</button>
                                         </span>
                                         <span class="input-group-btn">
                                            <button class="btn btn-default remove-field" type="button">-</button>
                                         </span>
                                        </div>
                                   <span class="alert" ng-show="screen_edit_form_submitteds && screen_edit_form_details.screen_timing.$error.required">This field is required</span>
                                  </div>
                               </div>


                               </div>
                              </div>

                             </div>


                            </div>
                            <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                              <button class="btn btn-primary"  type="submit" ng-click="screen_edit_form_submitteds=true" value="submit"  >Save</button>
                              </form>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-sm-12 col-xs-12 thumbnail screening"  ng-show="no_screening">
                        Screens not seted.
                      </div>


                    <div class="row" ng-show="screen_moviedetails">
                      <table id="datatable-responsive"  class="table table-striped responsive-utilities jambo_table bulk_action" >
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Movie Name</th>
                            <th>Theater Name</th>
                            <th>Screen</th>
                            <th>Location</th>
                            <th>show Date</th>
                            <th>Show Time</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                         <tr style="text-align:center" ng-repeat="playlises in screenviewing">

                           <td>{{screenviewing.id}}</td>
                           <td>{{screenviewing.movie_name}}</td>
                           <td>{{screenviewing.name}}</td>
                           <td>{{screenviewing.screen_name}}</td>
                           <td>{{screenviewing.location}}</td>
                           <td>{{screenviewing.date}}</td>
                           <td>{{screenviewing.screen_timing}}</td>
                           <td>
                           <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg" ng-click="get_screnns(playlisting.id)">
                           <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                &nbsp;&nbsp;&nbsp;
                              <a href="javascript:void(0);" ng-click="get_screen(<?php echo $value->id;?>);chnimas=false;"><i class="fa fa-building" aria-hidden="true"></i></a>
                              </td>
                            </tr>


                        </tbody>
                      </table></li>
                    </div>



        <!--immanu editing -->

                </div>







                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="full_page" ng-show="theater_edit">
      <div class="row">
                <div class="col-md-12"  ng-show="theater_design==false && theater_preview_html==false">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><?php //echo $title; ?></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12" >

                        <form class="form-horizontal form-label-left" data-parsley-validate="" id="theater_form" novalidate="" name="theater_align_form" ng-submit=" theater_align_form.$valid && theater_align_fun()">

                          <div class="item form-group" ng-class="{'bad' : align_submit && theater_align_form.columns.$error.required}">
                              <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Columns <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" ng-model="theater.column" class="form-control col-md-7 col-xs-12 " required="required" name="columns" >
                              </div>
                              <span class="alert" ng-show="align_submit && theater_align_form.columns.$error.required">This field is required</span>
                          </div>

                          <div class="item form-group" ng-class="{'bad' : align_submit && theater_align_form.rows.$error.required}">
                              <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Rows <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text"  ng-model="theater.row"  class="form-control col-md-7 col-xs-12 " required="required" name="rows" >
                              </div>
                              <span class="alert" ng-show="align_submit && theater_align_form.rows.$error.required">This field is required</span>
                          </div>

                          <div class="item form-group" ng-class="{'bad' : align_submit && theater_align_form.alignment_type.$error.required}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Chair alignment <span class="required">*</span></label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div data-toggle="buttons" class="btn-group" id="gender">
                                  <input type="radio" name="alignment_type"  ng-model="theater.chair_align"  required value="left" name="chair_alignment"> <i class="fa fa-align-left" aria-hidden="true"></i>&nbsp;&nbsp;From Left&nbsp;&nbsp;
                                  <input type="radio" name="alignment_type"  ng-model="theater.chair_align" required checked value="right" name="chair_alignment" > <i class="fa fa-align-right" aria-hidden="true"></i>&nbsp;&nbsp;From Right&nbsp;&nbsp;
                                </div>
                            </div>
                            <span class="alert" ng-show="align_submit && theater_align_form.alignment_type.$error.required">This field is required</span>
                          </div>

                          <div class="ln_solid"></div>

                          <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12 ">
                                  <button class="btn btn-primary pull-right" type="button" ng-click="theater_edit=false">Cancel</button>
                                  <button class="btn btn-success pull-right" type="submit" ng-click="align_submit=true">Submit</button>
                              </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- theater alignment -->
                <div class="col-md-12 col-sm-12 col-xs-12" ng-show="theater_design">
                  <div class="x_panel">
                    <div class="x_title">
                        <h2>Theater Design </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12" >
                        <table class="table" ng-form="theater_alignment">
                          <tbody>
                            <tr >
                              <th></th>
                              <th style="text-align:center;">Row Name</th>
                              <th style="text-align:center;">Row Price</th>
                              <th style="text-align:center;">Row Type</th>
                              <th style="text-align:center;" ng-repeat="columns in column"  ng-click="checkAllColumn(columns)">{{columns}}
                                &nbsp;<i class="fa fa-chevron-down" alt="click to check all"></i></th>
                            </tr>
                            <tr ng-repeat="columns in theater_align" ng-model="rows.columns.column">
                              <td ng-click="checkAllRow(rows[$index].row_index)">
                                {{rows[$index].row_index}}
                                &nbsp;<i class="fa fa-chevron-right" alt="click to check all"></i>
                              </td>
                              <td>
                                <input type="text" class="form-control " style="text-align:center;" ng-required="rows[$index].rowname.disable==false" name="rowname_{{$index}}"  ng-model="rows[$index].rowname.value" ng-disabled="rows[$index].rowname.disable">
                                <span class="error_block" ng-show="theater_alignment.rowname_{{$index}}.$error.required">This filed is required</span>
                              </td>
                              <td>
                                <input type="text" class="form-control " style="text-align:center;" ng-required="rows[$index].price.disable==false" name="price_{{$index}}"  ng-model="rows[$index].price.value" ng-disabled="rows[$index].price.disable">
                                <span class="error_block" ng-show="theater_alignment.price_{{$index}}.$error.required">This filed is required</span>
                              </td>
                              <td>
                                <input type="text" class="form-control " style="text-align:center;" ng-required="rows[$index].price.disable==false" name="type_{{$index}}"  ng-model="rows[$index].type.value" ng-disabled="rows[$index].type.disable">
                                <span class="error_block" ng-show="theater_alignment.type_{{$index}}.$error.required">This filed is required</span>
                              </td>
                              <td ng-repeat="c in columns.row track by $index" class="chair_row" style="text-align:center;">
                                <label ng-class="{'blk': rows[$parent.$index][$index].check,'disb' : !rows[$parent.$index][$index].check}">
                                  {{r.number}}
                                </label>
                                <input type="checkbox" class="chair" ng-class="{'blk': rows[$parent.$index][$index].check,'disb' : !rows[$parent.$index][$index].check}" ng-value='{{c}}' row='{{c}}' column='{{rows[$parent.$index][$index].check}}' ng-click="checkAll()"  ng-model="rows[$parent.$index][$index].check"/>
                              </td>
                            </tr>

                          </tbody>
                        </table>

                        <div class="ln_solid"></div>

                          <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12 ">
                                  <button class="btn btn-primary pull-right" type="button" ng-click="theater_preview_html=false;theater_design=false">Cancel</button>
                                  <button ng-disabled="theater_alignment.$invalid" class="btn btn-success pull-right" type="button" ng-click="theater_preview()">Preview</button>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- theater alignment -->

                <!-- theater preview -->
                <div class="col-md-12 col-sm-12 col-xs-12" ng-show="theater_preview_html">
                  <div class="x_panel">
                    <div class="x_title">
                        <h2>Theater Preview </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12" >

                        <table class="table preview" ng-repeat="(key,columns) in preview_rows  track by $index">
                          <tr>
                            <th></th>
                            <th colspan="{{theater.column}}">
                              <p class="class_type">{{key}}</p>
                            </th>
                          </tr>
                          <tr ng-repeat="rows in columns  track by $index">
                            <td>{{rows.rowname.value}}</td>
                            <td class="chair_row" ng-repeat="r in rows  track by $index" ng-show="r.check==true || r.check==false">
                              <label ng-class="{'blk': r.check,'disb' : !r.check}">
                                {{r.number}}
                              </label>
                              <input type="checkbox" class="chair" ng-class="{'blk': r.check,'disb' : !r.check}" ng-model="r.check" />
                            </td>
                          </tr>
                        </table>
                        <div class="ln_solid"></div>

                          <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12 ">
                                  <button class="btn btn-primary pull-right" type="button" ng-click="theater_preview_html=false;theater_design=true">Cancel</button>
                                  <button class="btn btn-success pull-right" type="button" ng-click="theater_submit()">Submit</button>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- theater alignment -->

              </div>
    </div>

    <div class="full_page" ng-show="theater_preview_var">
      <div class="row">
        <!-- theater preview -->
        <div class="col-md-12 col-sm-12 col-xs-12" >
          <div class="x_panel">
            <div class="x_title">
                <h2>Theater Preview </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li ng-click="theater_preview_var=false"><a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="col-md-12 col-sm-12 col-xs-12 thumbnail screen"  ng-show="no_preview">
                  No Preview.
                </div>
            <!--{{preview_rows}}-->
                <table class="table preview" ng-show="no_preview==false" ng-repeat="(key,columns) in preview_rows  track by $index">
                  <tr>
                    <th></th>
                    <th colspan="{{theater.column}}">
                      <p class="class_type">{{key}}</p>
                    </th>
                  </tr>
                  <tr ng-repeat="rowz in columns  track by $index">
                    <td>{{rowz.rowname.value}}</td>
                    <td class="chair_row" ng-repeat="r in rowz  track by $index" ng-show="r.check==true || r.check==false">
                      <label ng-class="{'blk': r.check,'disb' : !r.check}">
                        {{r.number}}
                      </label>
                      <input type="checkbox" class="chair" ng-class="{'blk': r.check,'disb' : !r.check}" ng-model="r.check" />
                    </td>
                  </tr>
                </table>
                <div class="ln_solid"></div>

              </div>
            </div>
          </div>
        </div>
        <!-- theater alignment -->
      </div>
    </div>














