<?php

?>

<div class="row">
           <!-- theater alignment -->
            <div class="col-md-12 col-sm-12 col-xs-12" ng-controller="ticketCtrl">
              <div class="x_panel">
                <div class="x_title">
                    <h2>Add promocode </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="col-md-12 col-sm-12 col-xs-12" >

                  	<form class="form-horizontal form-label-left" data-parsley-validate="" id="theater_form" novalidate="" name="theater_align_form">

                      <div class="item form-group">
                          <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Movie name<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12" ng-init="get_movies()" style="margin-top:5px">
							  <select name="name" ng-model="name">
							    <option ng-repeat="val in movies" value="{{val.id}}">{{val.movie_name}}</option>
							  </select>
                          </div>
                          <span class="alert">This field is required</span>
                      </div>
					  <div class="item form-group">
                          <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12" ng-init="get_category()" style="margin-top:5px">
							  <select name="name" ng-model="cat">
							    <option ng-repeat="val in category" value="{{val.id}}">{{val.name}}</option>
							  </select>
                          </div>
                          <span class="alert">This field is required</span>
                      </div>
                      <div class="item form-group">
                          <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Promocode <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12 " required="required" name="code" 
							  ng-model="code" placeholder="Promocode" />
                          </div>
                          <span class="alert">This field is required</span>
                      </div>  
					            <div class="item form-group">
                          <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Valid from <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <!--<input type="text" class="form-control col-md-7 col-xs-12 " required="required" name="code" 
							  ng-model="vfrom" placeholder="Valid from" />-->
							  <input type="vfrom" class="picker" ng-model="vfrom" name="DOB" mydatepicker>
							  <br/>
                          </div>
                          <span class="alert">This field is required</span>
                      </div>  
					   <div class="item form-group">
                          <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Valid to <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <!--<input type="text" class="form-control col-md-7 col-xs-12 " required="required" name="code" 
							  ng-model="vto" placeholder="Valid to" />-->
							  <input type="vto" class="picker" ng-model="vto" name="DOB" mydatepicker1>
                          </div>
                          <span class="alert">This field is required</span>
                      </div>
					  <div class="item form-group">
                          <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Discount % <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12 " required="required" name="discount"
							  ng-model="discount" placeholder="Discount" />
                          </div>
                          <span class="alert">This field is required</span>
                      </div>  
					  <div class="item form-group">
                          <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Minimum amount <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12 " required="required" name="minamt" 
							  ng-model="minamt" placeholder="Minimum amount" />
                          </div>
                          <span class="alert">This field is required</span>
                      </div>  
					  <div class="item form-group">
                          <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Maximum amount <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12 " required="required" name="maxamt" 
							  ng-model="maxamt" placeholder="Maximum amount" />
                          </div>
                          <span class="alert">This field is required</span>
                      </div>  
                      <div class="form-group" style="margin-left: 292px;">
                          <div class="col-md-12 col-sm-12 col-xs-12 ">
                              <button class="btn btn-primary" type="button">Cancel</button>
                              <button class="btn btn-success" type="button" ng-click="addpromocode()">Submit</button>
                          </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- theater alignment -->


          </div>