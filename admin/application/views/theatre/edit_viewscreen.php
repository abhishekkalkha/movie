<div class="content-wrapper" ng-app="ticket" ng-controller="ticketCtrl" ng-init="get_data()">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Screen
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>theatre/viewscreen"><i class="fa fa-dashboard"></i>Screen</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit</h3>
            </div>
                 <div class="sign_in_error" ng-show="sign_in_error">
                {{sign_in_error_msg}}
           </div>
                <div class="col-md-12">

                <div class="alert alert-danger alert-dismissible" ng-show="alert3" style="text-align: center;font-size: 16px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"  ng-click="alert3=false" >&times;</button>
               <!--  <h4><i class="icon fa fa-ban"></i> Alert!</h4> -->
               Sorry, This screen already exist
              </div>
                 <!--  <?php
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
                      ?> -->
               </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal form-label-left" data-parsley-validate="" id="theater_form" novalidate="" name="theater_align_form" ng-submit=" theater_align_fun_edit()" method="post">
              <div class="box-body">

                 <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Theatre</label>
             <div class="col-sm-5">

                    <select class="form-control" style="width: 100%;" name="language" required="" ng-model="theater.cinemas_id">
                     <option value="" label="-- Select Theater --"  disabled selected="selected"></option>
                    <?php
                      foreach ($theater as $value) { ?>
                       <option  value="<?php echo $value->id;?>"><?php echo $value->theater_name;?></option>
                        <?php
                      }
                    ?>
                    </select>
      
          <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

           
           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Screen</label>
             <div class="col-sm-5">
                    <input type="text"  valid-number class="form-control" id="screen" name="screen" placeholder="Input Screen"  ng-model="theater.screen_name" required="">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Column</label>
             <div class="col-sm-5">
                    <input type="text"  valid-number ng-model="theater.column" class="form-control col-md-7 col-xs-12 " placeholder="Input column"  required="required" name="column">
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

            
           <div class="form-group">
             <label for="inputPassword3" class="col-sm-3">Row</label>
             <div class="col-sm-5">
                    <input type="text"  valid-number ng-model="theater.row" class="form-control col-md-7 col-xs-12 " placeholder="Input row"  required="required" name="row" >
                    <span class="glyphicon  form-control-feedback"></span>
                </div>
              </div>

     <div class="item form-group">
                            <label class="col-sm-3">Chair alignment </label>
                            <div class="col-sm-5">
                                <div data-toggle="buttons" class="btn-group" id="gender">
                                  <input type="radio" name="alignment_type" ng-checked="true"  ng-model="theater.chair_align"  value="left" name="chair_alignment"> <i class="fa fa-align-left" aria-hidden="true"></i>&nbsp;&nbsp;From Left&nbsp;&nbsp;
                                  <input type="radio" name="alignment_type"  ng-model="theater.chair_align"  value="right" name="chair_alignment" > <i class="fa fa-align-right" aria-hidden="true"></i>&nbsp;&nbsp;From Right&nbsp;&nbsp;
                                </div>
                            </div>
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>

                      
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-6">
               <!--  <button type="submit" class="btn btn-default">Cancel</button> -->
                   <button type="button" ng-click="theater_align_fun_edit(theater_align_form)" class="btn btn-info pull-right">Update</button>
                </div>               
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

    </section>
    <!-- /.content -->


        
        <div class="modal fade"  ng-show="theater_design"  aria-labelledby="myModalLabel" aria-hidden="false" id="myModal" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"  ng-click="close_button2()">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Theater Design</h4>
              </div>
              <div class="modal-body">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                      <br>
                      <h4><b>Theater<b/>: &nbsp;<small>{{theater}}</small></h4><h4><b>Screen</b>: &nbsp;<small>{{screen}}</small></h4>
                  <div class="x_panel">
                    <div class="x_title">
                        <h2>Theater Design </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12" >
                      <div class="preview_main">
                        <table class="table" ng-form="theater_alignment">
                          <tbody>
                            <tr >
                              <th></th>
                              <th style="text-align:center;">Row Name<br><small>(eg:A,B)</small></th>
                              <th style="text-align:center;">Row Price<br><small>(Amount)</small></th>
                              <th style="text-align:center;">Row Type<br><small>(eg:Gold,Diamond)</small></th>
                              <th style="text-align:center;" ng-repeat="columns in column"  ng-click="checkAllColumn(columns)">{{columns}}
                                <i class="fa fa-chevron-down" alt="click to check all"></i></th>
                            </tr>
                            <tr ng-repeat="columns in theater_align" ng-model="rows.columns.column" class="tableclass">
                              <td class="tableclass1" width="40px" ng-click="checkAllRow(rows[$index].row_index)">
                                {{rows[$index].row_index}}
                                &nbsp;<i class="fa fa-chevron-right" alt="click to check all"></i>
                              </td>
                              <td>
                                <input type="text" class="form-control " style="text-align:center;width: 115px" ng-required="rows[$index].rowname.disable==false" name="rowname_{{$index}}"  ng-model="rows[$index].rowname.value" ng-disabled="rows[$index].rowname.disable">
                                <!-- <span class="error_block" ng-show="theater_alignment.rowname_{{$index}}.$error.required" style="color: red;">This filed is required</span> -->
                              </td>
                              <td>
                                <input type="text" valid-number class="form-control " style="text-align:center;width: 115px" ng-required="rows[$index].price.disable==false" name="price_{{$index}}"  ng-model="rows[$index].price.value" ng-disabled="rows[$index].price.disable">
                               <!--  <span class="error_block" ng-show="theater_alignment.price_{{$index}}.$error.required" style="color: red;">This filed is required</span> -->
                              </td>
                              <td>
                                <input type="text" class="form-control " style="text-align:center;width: 115px" ng-required="rows[$index].price.disable==false" name="type_{{$index}}"  ng-model="rows[$index].type.value" ng-disabled="rows[$index].type.disable">
                                <!-- <span class="error_block" ng-show="theater_alignment.type_{{$index}}.$error.required" style="color: red;">This filed is required</span> -->
                              </td>
                              <td ng-repeat="c in columns.row track by $index" class="chair_row" style="text-align:center;">
                                <label ng-class="{'blk': rows[$parent.$index][$index].check,'disb' : !rows[$parent.$index][$index].check}">
                                  {{r.number}}
                                  <input type="checkbox" class="chair" ng-class="{'blk': rows[$parent.$index][$index].check,'disb' : !rows[$parent.$index][$index].check}" ng-value='{{c}}' row='{{c}}' column='{{rows[$parent.$index][$index].check}}' ng-click="checkAll()"  ng-model="rows[$parent.$index][$index].check"/>
                                </label>
                              </td>
                            </tr>

                          </tbody>
                        </table>
                        </div>
                        <div class="ln_solid"></div>

                          <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12 ">
                                <!--   <button class="btn btn-primary pull-right" type="button" ng-click="theater_preview_html=false;theater_design=false">Cancel</button> -->
                                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal" ng-click="close_button2()">Close</button>
                                  <button ng-disabled="theater_alignment.$invalid" class="btn btn-success pull-right" type="button" ng-click="theater_preview()">Preview</button>
                                 

                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


         <div class="modal fade"  ng-show="theater_preview_html"  aria-labelledby="myModalLabel" aria-hidden="false" id="myModal2" data-backdrop="static" data-keyboard="false">
        
          <div class="modal-dialog modal-lg">

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="close_button2();theater_preview_html=false;theater_design=true">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Theatre Preview</h4>
              </div>
               <div class="alert alert-success alert-dismissible" ng-show="alert" style="text-align: center;font-size: 16px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="alert=false">&times;</button>
                <!-- <h4><i class="icon fa fa-check"></i> Alert!</h4> -->
                Inserted Successfully
              </div>
               <div class="alert alert-danger alert-dismissible" ng-show="alert2" style="text-align: center;font-size: 16px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"  ng-click="alert2=false" >&times;</button>
               <!--  <h4><i class="icon fa fa-ban"></i> Alert!</h4> -->
               Sorry Not Inserted
              </div>
              <div class="modal-body">
               <div class="col-md-12 col-sm-12 col-xs-12" >
               <br>
                      <h4><b>Theater<b/>: &nbsp;<small>{{theater}}</small></h4><h4><b>Screen</b>: &nbsp;<small>{{screen}}</small></h4>
                  <div class="x_panel">
                    <div class="x_title">
                        <h2>Theater Preview </h2>
                <!--         <ul class="nav navbar-right panel_toolbox">
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
                        </ul> -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12" >
                         <div class="preview_main">
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
                         <div></div>
                        <div class="eye">All Eyes This Way Please!</div>
                        </div>
                        <div class="ln_solid"></div>

                          <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12 ">
                                 <!--  <button class="btn btn-primary pull-right" type="button" ng-click="theater_preview_html=false;theater_design=true">Cancel</button> -->
                                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal" ng-click="theater_preview_html=false;theater_design=true">Back</button>
                                  <button class="btn btn-success pull-right" type="button" ng-click="theater_submit()">Submit</button>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
               <!--  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        
        <!-- /.modal -->
  </div>