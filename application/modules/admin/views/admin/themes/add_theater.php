<?php

?>
<div class="row">
            <div class="col-md-12"  ng-show="theater_design==false && theater_preview_html==false">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $title; ?></h2>
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
                              <button class="btn btn-primary pull-right" type="button">Cancel</button>
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
                    
                    <!-- <div class="chair" ng-repeat="(key,columns) in preview_rows  track by $index">
                      {{key}}
                      <ul ng-repeat="rows in columns  track by $index">
                        <li>{{rows.rowname.value}}</li>
                        <li class="chair_row" ng-repeat="r in rows  track by $index" ng-show="r.check==true || r.check==false">
                          <label ng-class="{'blk': r.check,'disb' : !r.check}">
                            {{r.number}}
                          </label>
                          <input type="checkbox" class="chair" ng-class="{'blk': r.check,'disb' : !r.check}" ng-model="r.check" />
                        </li>
                      </ul>
                    </div> -->
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
                              <button class="btn btn-success pull-right" type="button" ng-click="theater_preview()">Submit</button>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- theater alignment -->

          </div>