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
                  <div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade cinema_settings bs-example-modal-lg " style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                          </button>
                          <h4 id="myModalLabel2" class="modal-title">Add New Chinema's</h4>
                        </div>
                        <div class="modal-body">
                          <!--<form name="edit_form" ng-submit="edit_form_submitted && add_profiles(cinemaprofile.image)" ng-init="form_edit_table='<?php //echo $table;?>'">-->
						    <form name="edit_formss" ng-submit="edit_form_submittedsetting && add_settings(cinema_settings.favicon,cinema_settings.logo)" ng-init="form_edit_table='<?php //echo $table;?>'">
							
                            <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.title.$error.required}">
                                <label for="title" class="control-label col-md-3 col-sm-3 col-xs-12">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.title" class="form-control col-md-7 col-xs-12 " required="required" name="title" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.title.$error.required">This field is required</span>
                              </div>
                            </div>
							
							 <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.logo.$error.required || edit_formss.logo.$error.maxSize}">
                                <label for="logo" class="control-label col-md-3 col-sm-3 col-xs-12">Logo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  ngf-select  type="file" ng-model="cinema_settings.logo" class="form-control col-md-7 col-xs-12 "  ngf-max-size="2MB" required="required" accept="logo/*"  name="logo" ngf-model-invalid="errorFile">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12" style="display:inline-flex" ng-show="cinema_settings.logo">
                                  <img  ngf-thumbnail="cinema_settings.logo" style="width: 150px; height: 150px;float: none;position: relative;"> <button style="height:25px;" ng-click="cinema_settings.logo = null" ng-show="cinema_settings.logo">X</button>
                                </div>
                                <span class="alert"  ng-show="edit_form_submittedsetting && edit_formss.logo.$error.required">This field is required</span>
                                <span class="alert"  ng-show="edit_formss.logo.$error.maxSize">File too large : max 2MB</span>
                              </div>
                            </div>
							
							
							 <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.favicon.$error.required || edit_formss.favicon.$error.maxSize}">
                                <label for="favicon" class="control-label col-md-3 col-sm-3 col-xs-12">Favicon <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  ngf-select  type="file" ng-model="cinema_settings.favicon" class="form-control col-md-7 col-xs-12 "  ngf-max-size="2MB" required="required" accept="favicon/*"  name="favicon" ngf-model-invalid="errorFile">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12" style="display:inline-flex" ng-show="cinema_settings.favicon">
                                  <img  ngf-thumbnail="cinema_settings.favicon" style="width: 150px; height: 150px;float: none;position: relative;"> <button style="height:25px;" ng-click="cinema_settings.favicon = null" ng-show="cinema_settings.favicon">X</button>
                                </div>
                                <span class="alert"  ng-show="edit_form_submittedsetting && edit_formss.favicon.$error.required">This field is required</span>
                                <span class="alert"  ng-show="edit_formss.favicon.$error.maxSize">File too large : max 2MB</span>
                              </div>
                            </div>
							
								<div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.smtp_username.$error.required}">
                                <label for="smtp_username" class="control-label col-md-3 col-sm-3 col-xs-12">Smtp Username <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.smtp_username" class="form-control col-md-7 col-xs-12 " required="required" name="smtp_username" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.smtp_username.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.smtp_host.$error.required}">
                                <label for="smtp_host" class="control-label col-md-3 col-sm-3 col-xs-12">Smtp Host <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.smtp_host" class="form-control col-md-7 col-xs-12 " required="required" name="smtp_host" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.smtp_host.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.smtp_password.$error.required}">
                                <label for="smtp_password" class="control-label col-md-3 col-sm-3 col-xs-12">Smtp Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.smtp_password" class="form-control col-md-7 col-xs-12 " required="required" name="smtp_password" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.smtp_password.$error.required">This field is required</span>
                              </div>
                            </div>
						
						
						    <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.admin_email.$error.required}">
                                <label for="admin_email" class="control-label col-md-3 col-sm-3 col-xs-12">Admin Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.admin_email" class="form-control col-md-7 col-xs-12 " required="required" name="admin_email" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.admin_email.$error.required">This field is required</span>
                              </div>
                            </div>
							
						    <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.sender_id.$error.required}">
                                <label for="sender_id" class="control-label col-md-3 col-sm-3 col-xs-12">Sender Id <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.sender_id" class="form-control col-md-7 col-xs-12 " required="required" name="sender_id" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.sender_id.$error.required">This field is required</span>
                              </div>
                            </div>
							
							 <div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.sms_username.$error.required}">
                                <label for="sms_username" class="control-label col-md-3 col-sm-3 col-xs-12">Sms Username <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.sms_username" class="form-control col-md-7 col-xs-12 " required="required" name="sms_username" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.sms_username.$error.required">This field is required</span>
                              </div>
                            </div>
							
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.sms_password.$error.required}">
                                <label for="sms_password" class="control-label col-md-3 col-sm-3 col-xs-12">Sms Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.sms_password" class="form-control col-md-7 col-xs-12 " required="required" name="sms_password" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.sms_password.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.paypal.$error.required}">
                                <label for="paypal" class="control-label col-md-3 col-sm-3 col-xs-12">Paypal <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.paypal" class="form-control col-md-7 col-xs-12 " required="required" name="paypal" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.paypal.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row">
                              <div class="item form-group" ng-class="{'bad' : edit_form_submittedsetting && edit_formss.paypalid.$error.required}">
                                <label for="paypalid" class="control-label col-md-3 col-sm-3 col-xs-12">Paypal Id <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema_settings.paypalid" class="form-control col-md-7 col-xs-12 " required="required" name="paypalid" >
                                </div>
                                <span class="alert" ng-show="edit_form_submittedsetting && edit_formss.paypalid.$error.required">This field is required</span>
                              </div>
                            </div>
							
							
                          
                        </div>
                        <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-primary"  type="submit" ng-click="edit_form_submittedsetting=true" value="submit">Save</button>
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
                        <th>title</th>
                        <th>SmtpUsername</th>
                        <th>SmtpHost</th>
                        <th>smtppassword</th>
                        <th>admin email</th>
                        <th>Senderid</th>
                        <th>SmsUsername</th>
                        <th>SmsPassword</th>
                        <th>Paypal</th>
                        <th>Paypalid</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach ($content as $key => $value) {?>
                        <tr style="text-align:center">
                          <td><?php echo $value->id;?></td>
                          <td><?php echo $value->title;?></td>
                          <td><?php echo $value->smtp_username;?></td>
                          <td><?php echo $value->smtp_host;?></td>
                          <td><?php echo $value->smtp_password;?></td>
                          <td><?php echo $value->admin_email;?></td>
                          <td><?php echo $value->sender_id;?></td>
                          <td><?php echo $value->sms_username;?></td>
                          <td><?php echo $value->sms_password;?></td>
                          <td><?php echo $value->paypal;?></td>
                          <td><?php echo $value->paypalid;?></td>
                          <td>
                            <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg" ng-click="get_settings(<?php echo $value->id;?>)"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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
				
				