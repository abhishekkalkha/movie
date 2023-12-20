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
                          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                          </button>
                          <h4 id="myModalLabel2" class="modal-title">Add Booking Details</h4>
                        </div>
                        <div class="modal-body">
                          <form name="edit_form" ng-submit="edit_form_submitted && add_booking_detail(cinema.image)" ng-init="form_edit_table='<?php //echo $table;?>'">
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
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.day.$error.required}">
                                <label for="day" class="control-label col-md-3 col-sm-3 col-xs-12">Day<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.day" class="form-control col-md-7 col-xs-12 " required="required" name="day" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.day.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.theater_name.$error.required}">
                                <label for="theater_name" class="control-label col-md-3 col-sm-3 col-xs-12">Theater Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.theater_name" class="form-control col-md-7 col-xs-12 " required="required" name="theater_name" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.theater_name.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.ticket.$error.required}">
                                <label for="ticket" class="control-label col-md-3 col-sm-3 col-xs-12">Ticket<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.ticket" class="form-control col-md-7 col-xs-12 " required="required" name="ticket" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.ticket.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.ticket_number.$error.required}">
                                <label for="ticket_number" class="control-label col-md-3 col-sm-3 col-xs-12">Ticket Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.ticket_number" class="form-control col-md-7 col-xs-12 " required="required" name="ticket_number" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.ticket_number.$error.required">This field is required</span>
                              </div>
                            </div>
							
					        <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.booking_id.$error.required}">
                                <label for="booking_id" class="control-label col-md-3 col-sm-3 col-xs-12">Booking ID<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.booking_id" class="form-control col-md-7 col-xs-12 " required="required" name="booking_id" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.booking_id.$error.required">This field is required</span>
                              </div>
                            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                              <div class="item form-group" ng-class="{'bad' : edit_form_submitted && edit_form.amount.$error.required}">
                                <label for="amount" class="control-label col-md-3 col-sm-3 col-xs-12">Amount<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" ng-model="cinema.amount" class="form-control col-md-7 col-xs-12 " required="required" name="amount" >
                                </div>
                                <span class="alert" ng-show="edit_form_submitted && edit_form.amount.$error.required">This field is required</span>
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
                        <th>Date</th>						
                        <th>Day</th>						
                        <th>Theater Name</th>						
                        <th>Tickets</th>						
                        <th>Ticket Number</th>
                        <th>Booking ID</th>						
                        <th>Amount</th>						
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach ($content as $key => $value) {?>
                        <tr style="text-align:center">
                          <td><?php echo $value->id;?></td>
                          <td><?php echo $value->movie_name;?></td>
                          <td><?php echo $value->date;?></td>
                          <td><?php echo $value->day;?></td>
                          <td><?php echo $value->theater_name;?></td>
                          <td><?php echo $value->how_many_tickets;?></td>
                          <td><?php echo $value->ticket_number;?></td>
                          <td><?php echo $value->booking_id;?></td>
                          <td><?php echo $value->amount;?></td>
                          <td>
						 
                     
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