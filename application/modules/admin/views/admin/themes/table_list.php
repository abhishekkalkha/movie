	<div class="row" >
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo strtoupper(str_replace("_", " ", $title)); ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                	<?php if(is_null($table)){?>
		            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" ng-show='table_list'>
		              <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Table Name</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	<?php
		              		$i=1;
$data_base = $this->db->database;
$field = 'Tables_in_'.$data_base;
		              		foreach ($content as $key => $value) {

		              	?>
		                <tr>
		                  <td><?php echo $i++;?></td>
		                  <td><?php echo ucfirst(str_replace("_", " ", $value->$field));?></td>
		                  <td>
                      <?php $table = $value->$field;



                      $table = base64_encode($table);

                      $table = str_replace('=','',$table);
                      ?>

		                  	<a href='<?=base_url()?>admin/table_list/<?php echo $table;?>'>
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                            </a>
		                  	&nbsp;&nbsp;
                            <a href="javascript:void(0)">
                                <i class="fa fa-tasks" aria-hidden="true" ng-click="menu_task_form_fields('<?php echo $value->$field;?>');" style="cursor:pointer;"></i>
                            </a>
		                  </td>
		                </tr>
		                <?php } ?>
		              </tbody>
		            </table>

		            <!-- table task block-->
		            <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form2" novalidate="" ng-show='table_task' name="menu_form" ng-submit="menu_form.$valid && menu_function()">

                                        <div class="item form-group" ng-class="{'bad' : menu_form_submit && menu_form.table_name.$error.required}">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Table Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" required="required" readonly name="table_name" ng-model="menu_task.table_name">
                                            </div>
                                            <span class="alert" ng-show="menu_form.table_name.$error.required">This field is required</span>
                                        </div>
                                        <div class="item form-group" ng-class="{'bad' : menu_form_submit && menu_form.menu_name.$error.required}">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Menu Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" required="required"  name="menu_name" ng-model="menu_task.menu_name">
                                            </div>
                                            <span class="alert" ng-show="menu_form.menu_name.$error.required">This field is required</span>
                                        </div>
                                        <div class="item form-group" ng-class="{'bad' : menu_form_submit && menu_form.new_link.$error.required}">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Add New Link</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div data-toggle="buttons" class="btn-group" >
                                                    <input type="radio" required value="1" name="new_link" ng-model="menu_task.new_link"> &nbsp; Enable &nbsp;

                                                    <input type="radio" required value="0" name="new_link" ng-model="menu_task.new_link"> Disable
                                                </div>
                                            </div>
                                            <span class="alert" ng-show="menu_form.new_link.$error.required">This field is required</span>
                                        </div>

                                        <div class="item form-group" ng-class="{'bad' : menu_form_submit && menu_form.view_all_link.$error.required}">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">View All Link</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div data-toggle="buttons" class="btn-group" >
                                                    <input type="radio" required value="1" name="view_all_link" ng-model="menu_task.view_all_link"> &nbsp; Enable &nbsp;

                                                    <input type="radio" required value="0" name="view_all_link" ng-model="menu_task.view_all_link"> Disable
                                                </div>
                                            </div>
                                            <span class="alert" ng-show="menu_form.view_all_link.$error.required">This field is required</span>
                                        </div>

                                        <div class="item form-group" ng-class="{'bad' : menu_form_submit && menu_form.in_menu.$error.required}">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Show in Menu </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div data-toggle="buttons" class="btn-group" id="gender">
                                                    <input type="radio" required value="1" name="in_menu" ng-model="menu_task.in_menu"> &nbsp; Enable &nbsp;

                                                    <input type="radio" required value="0" name="in_menu" ng-model="menu_task.in_menu"> Disable
                                                </div>
                                            </div>
                                            <span class="alert" ng-show="menu_form.in_menu.$error.required">This field is required</span>
                                        </div>

                                        <div class="item form-group" ng-class="{'bad' : menu_form_submit && menu_form.in_menu.$error.required}">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Icon (<i ng-class="menu_task.icon"></i>) </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <div aria-multiselectable="true" role="tablist" id="accordion" class="accordion table_task">
                                                    <div class="panel">
                                                      <a aria-controls="collapseOne" aria-expanded="true" href="#collapseOne" data-parent="#accordion" data-toggle="collapse" id="headingOne" role="tab" class="panel-heading">
                                                        <h4 class="panel-title">Font awesome icons</h4>
                                                      </a>
                                                      <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse in" id="collapseOne" aria-expanded="true" style="">
                                                        <div class="panel-body">

                                                            <section id="web-application">
                                                                <h2 class="page-header">Web Application Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-adjust'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-adjust"></i> fa-adjust</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-anchor'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-anchor"></i> fa-anchor</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-archive'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-archive"></i> fa-archive</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-area-chart'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-area-chart"></i> fa-area-chart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrows'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrows"></i> fa-arrows</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrows-h'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrows-h"></i> fa-arrows-h</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrows-v'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrows-v"></i> fa-arrows-v</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-asterisk'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-asterisk"></i> fa-asterisk</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-at'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-at"></i> fa-at</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-automobile'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-automobile"></i> fa-automobile </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-ban'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ban"></i> fa-ban</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bank'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bank"></i> fa-bank </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bar-chart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bar-chart"></i> fa-bar-chart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bar-chart-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bar-chart-o"></i> fa-bar-chart-o 
                                                                  </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-barcode'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-barcode"></i> fa-barcode</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bars'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bars"></i> fa-bars</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-beer'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-beer"></i> fa-beer</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bell'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bell"></i> fa-bell</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bell-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bell-o"></i> fa-bell-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bell-slash'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bell-slash"></i> fa-bell-slash</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bell-slash-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bell-slash-o"></i> fa-bell-slash-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bicycle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bicycle"></i> fa-bicycle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-binoculars'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-binoculars"></i> fa-binoculars</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-birthday-cake'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-birthday-cake"></i> fa-birthday-cake</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bolt'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bolt"></i> fa-bolt</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bomb'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bomb"></i> fa-bomb</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-book'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-book"></i> fa-book</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-bookmark'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bookmark"></i> fa-bookmark</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bookmark-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bookmark-o"></i> fa-bookmark-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-briefcase'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-briefcase"></i> fa-briefcase</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bug'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bug"></i> fa-bug</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-building'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-building"></i> fa-building</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-building-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-building-o"></i> fa-building-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bullhorn'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bullhorn"></i> fa-bullhorn</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bullseye'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bullseye"></i> fa-bullseye</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-bus'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bus"></i> fa-bus</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-taxi'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cab"></i> fa-cab <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-calculator'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-calculator"></i> fa-calculator</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-calendar'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-calendar"></i> fa-calendar</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-calendar-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-calendar-o"></i> fa-calendar-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-camera'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-camera"></i> fa-camera</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-camera-retro'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-camera-retro"></i> fa-camera-retro</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-car'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-car"></i> fa-car</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-square-o-down"></i> fa-caret-square-o-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-square-o-left"></i> fa-caret-square-o-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-square-o-right"></i> fa-caret-square-o-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-square-o-up"></i> fa-caret-square-o-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc"></i> fa-cc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-certificate'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-certificate"></i> fa-certificate</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-check'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-check"></i> fa-check</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-check-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> fa-check-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-check-circle-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-check-circle-o"></i> fa-check-circle-o</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-check-square'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-check-square"></i> fa-check-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-check-square-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-check-square-o"></i> fa-check-square-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-child'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-child"></i> fa-child</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-circle"></i> fa-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-circle-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> fa-circle-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-circle-o-notch'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-circle-o-notch"></i> fa-circle-o-notch</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-circle-thin'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-circle-thin"></i> fa-circle-thin</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-clock-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-clock-o"></i> fa-clock-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-close'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-close"></i> fa-close </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cloud'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cloud"></i> fa-cloud</a>
                                                                  </div>

                                                                  <div ng-click="menu_form.icon='fa fa-cloud-download'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cloud-download"></i> fa-cloud-download</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cloud-upload'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cloud-upload"></i> fa-cloud-upload</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-code'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-code"></i> fa-code</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-code-fork'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-code-fork"></i> fa-code-fork</a>
                                                                  </div>

                                                                  <div  ng-click="menu_form.icon='fa fa-coffee'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-coffee"></i> fa-coffee</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cog'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cog"></i> fa-cog</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cogs'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cogs"></i> fa-cogs</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-comment'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-comment"></i> fa-comment</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-comment-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-comment-o"></i> fa-comment-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-comments'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-comments"></i> fa-comments</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-comments-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-comments-o"></i> fa-comments-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-compass'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-compass"></i> fa-compass</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-copyright'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-copyright"></i> fa-copyright</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-credit-card'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-credit-card"></i> fa-credit-card</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-crop'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-crop"></i> fa-crop</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-crosshairs'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-crosshairs"></i> fa-crosshairs</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cube'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cube"></i> fa-cube</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cubes'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cubes"></i> fa-cubes</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cutlery'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cutlery"></i> fa-cutlery</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-dashboard'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> fa-dashboard </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-database'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-database"></i> fa-database</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-desktop'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-desktop"></i> fa-desktop</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-dot-circle-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-dot-circle-o"></i> fa-dot-circle-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-download'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-download"></i> fa-download</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-edit'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-edit"></i> fa-edit </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-ellipsis-h'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ellipsis-h"></i> fa-ellipsis-h</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-ellipsis-v'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ellipsis-v"></i> fa-ellipsis-v</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-envelope'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-envelope"></i> fa-envelope</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-envelope-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-envelope-o"></i> fa-envelope-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-envelope-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-envelope-square"></i> fa-envelope-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-eraser'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-eraser"></i> fa-eraser</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-exchange'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-exchange"></i> fa-exchange</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-exclamation'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-exclamation"></i> fa-exclamation</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-exclamation-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-exclamation-circle"></i> fa-exclamation-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-exclamation-triangle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-exclamation-triangle"></i> fa-exclamation-triangle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-external-link'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-external-link"></i> fa-external-link</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-external-link-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-external-link-square"></i> fa-external-link-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-eye'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-eye"></i> fa-eye</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-eye-slash'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-eye-slash"></i> fa-eye-slash</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-eyedropper'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-eyedropper"></i> fa-eyedropper</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-fax'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-fax"></i> fa-fax</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-female'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-female"></i> fa-female</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-fighter-jet'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-fighter-jet"></i> fa-fighter-jet</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-archive-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-archive-o"></i> fa-file-archive-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-audio-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-audio-o"></i> fa-file-audio-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-code-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-code-o"></i> fa-file-code-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-excel-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-excel-o"></i> fa-file-excel-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-image-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-image-o"></i> fa-file-image-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-movie-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-movie-o"></i> fa-file-movie-o </a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-file-pdf-o'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-pdf-o"></i> fa-file-pdf-o</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-fa-file-photo-o'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-photo-o"></i> fa-file-photo-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-picture-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-picture-o"></i> fa-file-picture-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-powerpoint-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-powerpoint-o"></i> fa-file-powerpoint-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-sound-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-sound-o"></i> fa-file-sound-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-video-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-video-o"></i> fa-file-video-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-word-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-word-o"></i> fa-file-word-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-zip-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-zip-o"></i> fa-file-zip-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-film'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-film"></i> fa-film</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-filter'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-filter"></i> fa-filter</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-fire'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-fire"></i> fa-fire</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-fire-extinguisher'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-fire-extinguisher"></i> fa-fire-extinguisher</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-flag'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-flag"></i> fa-flag</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-flag-checkered'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-flag-checkered"></i> fa-flag-checkered</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-flag-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-flag-o"></i> fa-flag-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-flash'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-flash"></i> fa-flash </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-flask'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-flask"></i> fa-flask</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-folder'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-folder"></i> fa-folder</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-folder-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-folder-o"></i> fa-folder-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-folder-open'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-folder-open"></i> fa-folder-open</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-folder-open-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-folder-open-o"></i> fa-folder-open-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-frown-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-frown-o"></i> fa-frown-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-futbol-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-futbol-o"></i> fa-futbol-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-gamepad'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-gamepad"></i> fa-gamepad</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-gavel'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-gavel"></i> fa-gavel</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-gear'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-gear"></i> fa-gear <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-gears'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-gears"></i> fa-gears</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-gift'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-gift"></i> fa-gift</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-glass'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-glass"></i> fa-glass</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-globe'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-globe"></i> fa-globe</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-graduation-cap'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-graduation-cap"></i> fa-graduation-cap</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-group'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-group"></i> fa-group </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-hdd-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-hdd-o"></i> fa-hdd-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_form.icon='fa fa-headphones'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-headphones"></i> fa-headphones</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-heart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);heart"><i class="fa fa-heart"></i> fa-heart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-heart-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-heart-o"></i> fa-heart-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-history'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-history"></i> fa-history</a>
                                                                  </div>

                                                                  <div ng-click="menu_form.icon='fa fa-home'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-home"></i> fa-home</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-image'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-image"></i> fa-image </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-inbox'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-inbox"></i> fa-inbox</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-info'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-info"></i> fa-info</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-info-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-info-circle"></i> fa-info-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-institution'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-institution"></i> fa-institution</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-key'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-key"></i> fa-key</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-keyboard-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-keyboard-o"></i> fa-keyboard-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-language'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-language"></i> fa-language</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-laptop'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-laptop"></i> fa-laptop</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-leaf'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-leaf"></i> fa-leaf</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-legal'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-legal"></i> fa-legal </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-lemon-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-lemon-o"></i> fa-lemon-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_form.icon='fa fa-level-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-level-down"></i> fa-level-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-level-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-level-up"></i> fa-level-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-life-bouy'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-life-bouy"></i> fa-life-bouy </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-life-buoy'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-life-buoy"></i> fa-life-buoy </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-life-ring'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-life-ring"></i> fa-life-ring</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-life-saver'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-life-saver"></i> fa-life-saver 
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-lightbulb-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-lightbulb-o"></i> fa-lightbulb-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_form.icon='fa fa-line-chart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-line-chart"></i> fa-line-chart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-location-arrow'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-location-arrow"></i> fa-location-arrow</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-lock'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-lock"></i> fa-lock</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-magic'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-magic"></i> fa-magic</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-magnet'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-magnet"></i> fa-magnet</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-mail-forward'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-mail-forward"></i> fa-mail-forward </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-mail-reply'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-mail-reply"></i> fa-mail-reply <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-mail-reply-all'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-mail-reply-all"></i> fa-mail-reply-all </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-male'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-male"></i> fa-male</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-map-marker'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-map-marker"></i> fa-map-marker</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-meh-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-meh-o"></i> fa-meh-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-microphone'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-microphone"></i> fa-microphone</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-microphone-slash'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-microphone-slash"></i> fa-microphone-slash</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-minus'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-minus"></i> fa-minus</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-minus-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-minus-circle"></i> fa-minus-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-minus-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-minus-square"></i> fa-minus-square</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-minus-square-o'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-minus-square-o"></i> fa-minus-square-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-mobile'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-mobile"></i> fa-mobile</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-mobile-phone'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-mobile-phone"></i> fa-mobile-phone ></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-money'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-money"></i> fa-money</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-moon-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-moon-o"></i> fa-moon-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-mortar-board'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-mortar-board"></i> fa-mortar-board </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-music'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-music"></i> fa-music</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-navicon'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-navicon"></i> fa-navicon </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-newspaper-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);newspaper-o"><i class="fa fa-newspaper-o"></i> fa-newspaper-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-paint-brush'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-paint-brush"></i> fa-paint-brush</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-paper-plane'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-paper-plane"></i> fa-paper-plane</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-paper-plane-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-paper-plane-o"></i> fa-paper-plane-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-paw'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-paw"></i> fa-paw</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pencil'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pencil"></i> fa-pencil</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pencil-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pencil-square"></i> fa-pencil-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pencil-square-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pencil-square-o"></i> fa-pencil-square-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-phone'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-phone"></i> fa-phone</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-phone-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-phone-square"></i> fa-phone-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-picture-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-photo"></i> fa-photo <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-picture-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-picture-o"></i> fa-picture-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pie-chart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pie-chart"></i> fa-pie-chart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-plane'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-plane"></i> fa-plane</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-plug'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-plug"></i> fa-plug</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-plus'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-plus"></i> fa-plus</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-plus-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> fa-plus-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-plus-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-plus-square"></i> fa-plus-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-plus-square-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-plus-square-o"></i> fa-plus-square-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-power-off'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-power-off"></i> fa-power-off</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-print'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-print"></i> fa-print</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-puzzle-piece'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-puzzle-piece"></i> fa-puzzle-piece</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-qrcode'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-qrcode"></i> fa-qrcode</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-question'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-question"></i> fa-question</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-question-circle'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-question-circle"></i> fa-question-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-quote-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-quote-left"></i> fa-quote-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-quote-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-quote-right"></i> fa-quote-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-random'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-random"></i> fa-random</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-recycle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-recycle"></i> fa-recycle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-refresh'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-refresh"></i> fa-refresh</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-remove'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-remove"></i> fa-remove </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-reorder'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-reorder"></i> fa-reorder </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-reply'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-reply"></i> fa-reply</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-reply-all'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-reply-all"></i> fa-reply-all</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-retweet'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-retweet"></i> fa-retweet</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-road'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-road"></i> fa-road</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-rocket'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rocket"></i> fa-rocket</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-rss'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rss"></i> fa-rss</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-rss-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rss-square"></i> fa-rss-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-search'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-search"></i> fa-search</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-search-minus'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-search-minus"></i> fa-search-minus</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-search-plus'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-search-plus"></i> fa-search-plus</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-send'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-send"></i> fa-send </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-send-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-send-o"></i> fa-send-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-share'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-share"></i> fa-share</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-share-alt'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-share-alt"></i> fa-share-alt</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-share-alt-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-share-alt-square"></i> fa-share-alt-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-share-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-share-square"></i> fa-share-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-share-square-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-share-square-o"></i> fa-share-square-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-shield'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-shield"></i> fa-shield</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-shopping-cart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i> fa-shopping-cart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sign-in'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sign-in"></i> fa-sign-in</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sign-out'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sign-out"></i> fa-sign-out</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-signal'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-signal"></i> fa-signal</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sitemap'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sitemap"></i> fa-sitemap</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sliders'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sliders"></i> fa-sliders</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-smile-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-smile-o"></i> fa-smile-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-soccer-ball-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-soccer-ball-o"></i> fa-soccer-ball-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort"></i> fa-sort</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort-alpha-asc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-alpha-asc"></i> fa-sort-alpha-asc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort-alpha-desc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-alpha-desc"></i> fa-sort-alpha-desc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort-amount-asc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-amount-asc"></i> fa-sort-amount-asc</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-sort-amount-desc'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-amount-desc"></i> fa-sort-amount-desc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort-asc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-asc"></i> fa-sort-asc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort-desc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-desc"></i> fa-sort-desc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort-desc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-down"></i> fa-sort-down <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort-numeric-asc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-numeric-asc"></i> fa-sort-numeric-asc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort-numeric-desc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-numeric-desc"></i> fa-sort-numeric-desc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sort-asc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sort-up"></i> fa-sort-up <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-space-shuttle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-space-shuttle"></i> fa-space-shuttle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-spinner'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-spinner"></i> fa-spinner</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-spoon'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-spoon"></i> fa-spoon</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-square"></i> fa-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-square-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-square-o"></i> fa-square-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-star'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-star"></i> fa-star</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-star-half'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-star-half"></i> fa-star-half</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-star-half-empty'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-star-half-empty"></i> fa-star-half-empty </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-star-half-full'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-star-half-full"></i> fa-star-half-full </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-star-half-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-star-half-o"></i> fa-star-half-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-star-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-star-o"></i> fa-star-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-suitcase'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-suitcase"></i> fa-suitcase</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sun-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sun-o"></i> fa-sun-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-life-ring'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-support"></i> fa-support <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tablet'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tablet"></i> fa-tablet</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tachometer'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tachometer"></i> fa-tachometer</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tag'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tag"></i> fa-tag</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tags'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tags"></i> fa-tags</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tasks'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tasks"></i> fa-tasks</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-taxi'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-taxi"></i> fa-taxi</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-terminal'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-terminal"></i> fa-terminal</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-thumb-tack'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-thumb-tack"></i> fa-thumb-tack</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-thumbs-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-thumbs-down"></i> fa-thumbs-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-thumbs-o-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i> fa-thumbs-o-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-thumbs-o-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i> fa-thumbs-o-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-thumbs-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-thumbs-up"></i> fa-thumbs-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-ticket'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ticket"></i> fa-ticket</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-times'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-times"></i> fa-times</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-times-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-times-circle"></i> fa-times-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-times-circle-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-times-circle-o"></i> fa-times-circle-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tint'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tint"></i> fa-tint</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-toggle-down'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-down"></i> fa-toggle-down </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-toggle-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-left"></i> fa-toggle-left </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-toggle-off'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-off"></i> fa-toggle-off</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-toggle-on'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-on"></i> fa-toggle-on</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-toggle-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-right"></i> fa-toggle-right </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-toggle-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-up"></i> fa-toggle-up </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-trash'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-trash"></i> fa-trash</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-trash-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-trash-o"></i> fa-trash-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tree'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tree"></i> fa-tree</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-trophy'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-trophy"></i> fa-trophy</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-truck'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-truck"></i> fa-truck</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tty'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tty"></i> fa-tty</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-umbrella'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-umbrella"></i> fa-umbrella</a>
                                                                  </div>

                                                                  <div ng-click="menu_form.icon='fa fa-university'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-university"></i> fa-university</a>
                                                                  </div>

                                                                  <div ng-click="menu_form.icon='fa fa-unlock'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-unlock"></i> fa-unlock</a>
                                                                  </div>

                                                                  <div ng-click="menu_form.icon='fa fa-unlock-alt'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-unlock-alt"></i> fa-unlock-alt</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-unsorted'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-unsorted"></i> fa-unsorted </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-upload'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-upload"></i> fa-upload</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-user'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-user"></i> fa-user</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-users'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-users"></i> fa-users</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-video-camera'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-video-camera"></i> fa-video-camera</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-volume-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-volume-down"></i> fa-volume-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-volume-off'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-volume-off"></i> fa-volume-off</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-volume-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-volume-up"></i> fa-volume-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-warning'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-warning"></i> fa-warning </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-wheelchair'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-wheelchair"></i> fa-wheelchair</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-wifi'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-wifi"></i> fa-wifi</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-wrench'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-wrench"></i> fa-wrench</a>
                                                                  </div>

                                                                </div>

                                                            </section>

                                                            <section id="file-type">
                                                                <h2 class="page-header">File Type Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-file'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file"></i> fa-file</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-archive-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-archive-o"></i> fa-file-archive-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-audio-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-audio-o"></i> fa-file-audio-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-code-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-code-o"></i> fa-file-code-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-excel-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-excel-o"></i> fa-file-excel-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-image-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-image-o"></i> fa-file-image-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-movie-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-movie-o"></i> fa-file-movie-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-o"></i> fa-file-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-pdf-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-pdf-o"></i> fa-file-pdf-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-photo-o'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-photo-o"></i> fa-file-photo-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-picture-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-"></i> fa-file-picture-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-powerpoint-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-powerpoint-o"></i> fa-file-powerpoint-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-sound-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);file-audio-o"><i class="fa fa-file-sound-o"></i> fa-file-sound-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-text'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-text"></i> fa-file-text</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-text-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-text-o"></i> fa-file-text-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-video-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-video-o"></i> fa-file-video-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-word-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-word-o"></i> fa-file-word-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-zip-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-zip-o"></i> fa-file-zip-o </a>
                                                                  </div>

                                                                </div>

                                                            </section>

                                                            <section id="spinner">
                                                                <h2 class="page-header">Spinner Icons</h2>

                                                                

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-circle-o-notch'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-circle-o-notch"></i> fa-circle-o-notch</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cog'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cog"></i> fa-cog</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-gear'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-gear"></i> fa-gear <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-refresh'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-refresh"></i> fa-refresh</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-spinner'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-spinner"></i> fa-spinner</a>
                                                                  </div>

                                                                </div>
                                                            </section>

                                                            <section id="form-control">
                                                                <h2 class="page-header">Form Control Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-check-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-check-square"></i> fa-check-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-check-square-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-check-square-o"></i> fa-check-square-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-circle"></i> fa-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-circle-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> fa-circle-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-dot-circle-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-dot-circle-o"></i> fa-dot-circle-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-minus-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-minus-square"></i> fa-minus-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-minus-square-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-minus-square-o"></i> fa-minus-square-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-plus-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-plus-square"></i> fa-plus-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-plus-square-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-plus-square-o"></i> fa-plus-square-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-square"></i> fa-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-square-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-square-o"></i> fa-square-o</a>
                                                                  </div>

                                                                </div>
                                                            </section>

                                                            <section id="payment">
                                                                <h2 class="page-header">Payment Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-cc-amex'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-amex"></i> fa-cc-amex</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-discover'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-discover"></i> fa-cc-discover</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-mastercard'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-mastercard"></i> fa-cc-mastercard</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-paypal'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-paypal"></i> fa-cc-paypal</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-stripe'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-stripe"></i> fa-cc-stripe</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-visa'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-visa"></i> fa-cc-visa</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-credit-card'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-credit-card"></i> fa-credit-card</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-google-wallet'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-google-wallet"></i> fa-google-wallet</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-paypal'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-paypal"></i> fa-paypal</a>
                                                                  </div>

                                                                </div>

                                                            </section>

                                                            <section id="chart">
                                                                <h2 class="page-header">Chart Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-area-chart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-area-chart"></i> fa-area-chart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bar-chart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bar-chart"></i> fa-bar-chart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bar-chart-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bar-chart-o"></i> fa-bar-chart-o </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-line-chart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-line-chart"></i> fa-line-chart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pie-chart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pie-chart"></i> fa-pie-chart</a>
                                                                  </div>

                                                                </div>

                                                            </section>

                                                            <section id="currency">
                                                                <h2 class="page-header">Currency Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-bitcoin'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bitcoin"></i> fa-bitcoin </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-btc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-btc"></i> fa-btc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cny'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cny"></i> fa-cny </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-dollar'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-dollar"></i> fa-dollar </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-eur'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-eur"></i> fa-eur</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-eur'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-euro"></i> fa-euro </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-gbp'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-gbp"></i> fa-gbp</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-ils'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ils"></i> fa-ils</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-inr'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-inr"></i> fa-inr</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-jpy'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-jpy"></i> fa-jpy</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-krw'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-krw"></i> fa-krw</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-money'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-money"></i> fa-money</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-rmb'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rmb"></i> fa-rmb </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-rouble'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rouble"></i> fa-rouble </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-rub'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rub"></i> fa-rub</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-ruble'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ruble"></i> fa-ruble </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-rupee'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rupee"></i> fa-rupee </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-shekel'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-shekel"></i> fa-shekel </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-sheqel'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-sheqel"></i> fa-sheqel </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-try'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-try"></i> fa-try</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-turkish-lira'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-turkish-lira"></i> fa-turkish-lira </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-usd'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-usd"></i> fa-usd</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-won'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-won"></i> fa-won </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-yen'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-yen"></i> fa-yen </a>
                                                                  </div>

                                                                </div>

                                                            </section>

                                                            <section id="text-editor">
                                                                <h2 class="page-header">Text Editor Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-align-center'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-align-center"></i> fa-align-center</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-align-justify'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-align-justify"></i> fa-align-justify</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-align-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-align-left"></i> fa-align-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-align-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-align-right"></i> fa-align-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bold'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bold"></i> fa-bold</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chain'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chain"></i> fa-chain </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chain-broken'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chain-broken"></i> fa-chain-broken</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-clipboard'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-clipboard"></i> fa-clipboard</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-columns'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-columns"></i> fa-columns</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-copy'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-copy"></i> fa-copy </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cut'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cut"></i> fa-cut </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-dedent'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-dedent"></i> fa-dedent </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-eraser'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-eraser"></i> fa-eraser</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file"></i> fa-file</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-o"></i> fa-file-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-text'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-text"></i> fa-file-text</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-file-text-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-file-text-o"></i> fa-file-text-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-files-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-files-o"></i> fa-files-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-floppy-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-floppy-o"></i> fa-floppy-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-font'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-font"></i> fa-font</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-header'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-header"></i> fa-header</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-indent'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-indent"></i> fa-indent</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-italic'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-italic"></i> fa-italic</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-link'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-link"></i> fa-link</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-list'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-list"></i> fa-list</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-list-alt'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-list-alt"></i> fa-list-alt</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-list-ol'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-list-ol"></i> fa-list-ol</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-list-ul'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-list-ul"></i> fa-list-ul</a>
                                                                  </div>

                                                                  <div ng-click="menu_form.icon='fa fa-outdent'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-outdent"></i> fa-outdent</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-paperclip'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-paperclip"></i> fa-paperclip</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-paragraph'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-paragraph"></i> fa-paragraph</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-clipboard'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-paste"></i> fa-paste <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-repeat'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-repeat"></i> fa-repeat</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-fa-rotate-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rotate-left"></i> fa-rotate-left </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-fa-rotate-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rotate-right"></i> fa-rotate-right </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-floppy-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-save"></i> fa-save <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-scissors'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-scissors"></i> fa-scissors</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-strikethrough'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-strikethrough"></i> fa-strikethrough</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-subscript'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-subscript"></i> fa-subscript</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-superscript'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-superscript"></i> fa-superscript</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-table'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-table"></i> fa-table</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-text-height'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-text-height"></i> fa-text-height</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-text-width'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-text-width"></i> fa-text-width</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-th'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-th"></i> fa-th</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-th-large'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-th-large"></i> fa-th-large</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-th-list'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-th-list"></i> fa-th-list</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-underline'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-underline"></i> fa-underline</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-undo'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-undo"></i> fa-undo</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chain-broken'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-unlink"></i> fa-unlink <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                </div>

                                                            </section>

                                                            <section id="directional">
                                                                <h2 class="page-header">Directional Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-angle-double-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-angle-double-down"></i> fa-angle-double-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-angle-double-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-angle-double-left"></i> fa-angle-double-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-angle-double-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i> fa-angle-double-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-angle-double-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-angle-double-up"></i> fa-angle-double-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-angle-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-angle-down"></i> fa-angle-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-angle-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-angle-left"></i> fa-angle-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-angle-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> fa-angle-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-angle-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-angle-up"></i> fa-angle-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-circle-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-circle-down"></i> fa-arrow-circle-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-circle-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-circle-left"></i> fa-arrow-circle-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-circle-o-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-circle-o-down"></i> fa-arrow-circle-o-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-circle-o-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-circle-o-left"></i> fa-arrow-circle-o-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-circle-o-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-circle-o-right"></i> fa-arrow-circle-o-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-circle-o-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-circle-o-up"></i> fa-arrow-circle-o-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-circle-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-circle-right"></i> fa-arrow-circle-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-circle-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-circle-up"></i> fa-arrow-circle-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-down"></i> fa-arrow-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-left"></i> fa-arrow-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-right"></i> fa-arrow-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrow-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrow-up"></i> fa-arrow-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrows'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrows"></i> fa-arrows</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrows-alt'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrows-alt"></i> fa-arrows-alt</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrows-h'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrows-h"></i> fa-arrows-h</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-arrows-v'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrows-v"></i> fa-arrows-v</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-down"></i> fa-caret-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-left"></i> fa-caret-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-right"></i> fa-caret-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-square-o-down"></i> fa-caret-square-o-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-square-o-left"></i> fa-caret-square-o-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-square-o-right"></i> fa-caret-square-o-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-square-o-up"></i> fa-caret-square-o-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-caret-up"></i> fa-caret-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chevron-circle-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chevron-circle-down"></i> fa-chevron-circle-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chevron-circle-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chevron-circle-left"></i> fa-chevron-circle-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chevron-circle-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chevron-circle-right"></i> fa-chevron-circle-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chevron-circle-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chevron-circle-up"></i> fa-chevron-circle-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chevron-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chevron-down"></i> fa-chevron-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chevron-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chevron-left"></i> fa-chevron-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chevron-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chevron-right"></i> fa-chevron-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-chevron-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-chevron-up"></i> fa-chevron-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-hand-o-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-hand-o-down"></i> fa-hand-o-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-hand-o-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-hand-o-left"></i> fa-hand-o-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-hand-o-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-hand-o-right"></i> fa-hand-o-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-hand-o-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-hand-o-up"></i> fa-hand-o-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-long-arrow-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-long-arrow-down"></i> fa-long-arrow-down</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-long-arrow-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-long-arrow-left"></i> fa-long-arrow-left</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-long-arrow-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-long-arrow-right"></i> fa-long-arrow-right</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-long-arrow-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-long-arrow-up"></i> fa-long-arrow-up</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-down'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-down"></i> fa-toggle-down <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-left'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-left"></i> fa-toggle-left <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-right'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-right"></i> fa-toggle-right <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-caret-square-o-up'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-toggle-up"></i> fa-toggle-up <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                </div>

                                                            </section>

                                                            <section id="video-player">
                                                                <h2 class="page-header">Video Player Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-arrows-alt'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-arrows-alt"></i> fa-arrows-alt</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-backward'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-backward"></i> fa-backward</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-compress'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-compress"></i> fa-compress</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-eject'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-eject"></i> fa-eject</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-expand'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-expand"></i> fa-expand</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-fast-backward'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-fast-backward"></i> fa-fast-backward</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-fast-forward'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-fast-forward"></i> fa-fast-forward</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-forward'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-forward"></i> fa-forward</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pause'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pause"></i> fa-pause</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-play'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-play"></i> fa-play</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-play-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-play-circle"></i> fa-play-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-play-circle-o'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-play-circle-o"></i> fa-play-circle-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-step-backward'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-step-backward"></i> fa-step-backward</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-step-forward'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-step-forward"></i> fa-step-forward</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-stop'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-stop"></i> fa-stop</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-youtube-play'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-youtube-play"></i> fa-youtube-play</a>
                                                                  </div>

                                                                </div>

                                                            </section>

                                                            <section id="brand">
                                                                <h2 class="page-header">Brand Icons</h2>

                                                                                                                             

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-adn'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-adn"></i> fa-adn</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-android'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-android"></i> fa-android</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-angellist'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-angellist"></i> fa-angellist</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-apple'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-apple"></i> fa-apple</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-behance'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-behance"></i> fa-behance</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-behance-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-behance-square"></i> fa-behance-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bitbucket'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bitbucket"></i> fa-bitbucket</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-bitbucket-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bitbucket-square"></i> fa-bitbucket-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-btc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-bitcoin"></i> fa-bitcoin </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-btc'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-btc"></i> fa-btc</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-amex'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-amex"></i> fa-cc-amex</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-discover'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-discover"></i> fa-cc-discover</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-mastercard'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-mastercard"></i> fa-cc-mastercard</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-paypal'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-paypal"></i> fa-cc-paypal</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-stripe'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-stripe"></i> fa-cc-stripe</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-cc-visa'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-cc-visa"></i> fa-cc-visa</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-codepen'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-codepen"></i> fa-codepen</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-css3'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-css3"></i> fa-css3</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-delicious'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-delicious"></i> fa-delicious</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-deviantart'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-deviantart"></i> fa-deviantart</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-digg'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-digg"></i> fa-digg</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-dribbble'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-dribbble"></i> fa-dribbble</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-dropbox'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-dropbox"></i> fa-dropbox</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-drupal'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-drupal"></i> fa-drupal</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-empire'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-empire"></i> fa-empire</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-facebook'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-facebook"></i> fa-facebook</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-facebook-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-facebook-square"></i> fa-facebook-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-flickr'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-flickr"></i> fa-flickr</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-foursquare'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-foursquare"></i> fa-foursquare</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-empire'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ge"></i> fa-ge <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-git'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-git"></i> fa-git</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-git-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-git-square"></i> fa-git-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-github'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-github"></i> fa-github</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-github-alt'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-github-alt"></i> fa-github-alt</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-github-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-github-square"></i> fa-github-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-gittip'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-gittip"></i> fa-gittip</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-google'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);google"><i class="fa fa-google"></i> fa-google</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-google-plus'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i> fa-google-plus</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-google-plus-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-google-plus-square"></i> fa-google-plus-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-google-wallet'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-google-wallet"></i> fa-google-wallet</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-hacker-news'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-hacker-news"></i> fa-hacker-news</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-html5'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-html5"></i> fa-html5</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-instagram'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-instagram"></i> fa-instagram</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-ioxhost'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ioxhost"></i> fa-ioxhost</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-joomla'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-joomla"></i> fa-joomla</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-jsfiddle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-jsfiddle"></i> fa-jsfiddle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-lastfm'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-lastfm"></i> fa-lastfm</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-lastfm-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-lastfm-square"></i> fa-lastfm-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-linkedin'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i> fa-linkedin</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-linkedin-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-linkedin-square"></i> fa-linkedin-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-linux'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-linux"></i> fa-linux</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-maxcdn'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-maxcdn"></i> fa-maxcdn</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-meanpath'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-meanpath"></i> fa-meanpath</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-openid'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-openid"></i> fa-openid</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pagelines'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pagelines"></i> fa-pagelines</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-paypal'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-paypal"></i> fa-paypal</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pied-piper'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pied-piper"></i> fa-pied-piper</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pied-piper-alt'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pied-piper-alt"></i> fa-pied-piper-alt</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pinterest'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pinterest"></i> fa-pinterest</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-pinterest-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-pinterest-square"></i> fa-pinterest-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-qq'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-qq"></i> fa-qq</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-ra'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ra"></i> fa-ra </a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-rebel'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-rebel"></i> fa-rebel</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-reddit'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-reddit"></i> fa-reddit</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-reddit-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-reddit-square"></i> fa-reddit-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-renren'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-renren"></i> fa-renren</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-share-alt'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-share-alt"></i> fa-share-alt</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-share-alt-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-share-alt-square"></i> fa-share-alt-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-skype'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-skype"></i> fa-skype</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-slack'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-slack"></i> fa-slack</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-slideshare'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-slideshare"></i> fa-slideshare</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-soundcloud'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-soundcloud"></i> fa-soundcloud</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-spotify'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-spotify"></i> fa-spotify</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-stack-exchange'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-stack-exchange"></i> fa-stack-exchange</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-stack-overflow'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-stack-overflow"></i> fa-stack-overflow</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-steam'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-steam"></i> fa-steam</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-steam-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-steam-square"></i> fa-steam-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-stumbleupon'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-stumbleupon"></i> fa-stumbleupon</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-stumbleupon-circle'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-stumbleupon-circle"></i> fa-stumbleupon-circle</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tencent-weibo'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tencent-weibo"></i> fa-tencent-weibo</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-trello'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-trello"></i> fa-trello</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tumblr'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tumblr"></i> fa-tumblr</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-tumblr-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-tumblr-square"></i> fa-tumblr-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-twitch'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-twitch"></i> fa-twitch</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-twitter'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-twitter"></i> fa-twitter</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-twitter-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-twitter-square"></i> fa-twitter-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-vimeo-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-vimeo-square"></i> fa-vimeo-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-vine'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-vine"></i> fa-vine</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-vk'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-vk"></i> fa-vk</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-weixin'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-wechat"></i> fa-wechat <span class="text-muted">(alias)</span></a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-weibo'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-weibo"></i> fa-weibo</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-weixin'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-weixin"></i> fa-weixin</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-windows'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-windows"></i> fa-windows</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-wordpress'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-wordpress"></i> fa-wordpress</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-xing'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-xing"></i> fa-xing</a>
                                                                  </div>

                                                                  <div  ng-click="menu_task.icon='fa fa-xing-square'" class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-xing-square"></i> fa-xing-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-yahoo'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-yahoo"></i> fa-yahoo</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-yelp'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-yelp"></i> fa-yelp</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-youtube'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-youtube"></i> fa-youtube</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-youtube-play'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-youtube-play"></i> fa-youtube-play</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-youtube-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-youtube-square"></i> fa-youtube-square</a>
                                                                  </div>

                                                                </div>
                                                            </section>

                                                            <section id="medical">
                                                                <h2 class="page-header">Medical Icons</h2>

                                                                <div class="row fontawesome-icon-list">



                                                                  <div ng-click="menu_task.icon='fa fa-ambulance'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-ambulance"></i> fa-ambulance</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-h-square'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-h-square"></i> fa-h-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-adjust'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-hospital-o"></i> fa-hospital-o</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-adjust'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-medkit"></i> fa-medkit</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-adjust'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-plus-square"></i> fa-plus-square</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-adjust'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-stethoscope"></i> fa-stethoscope</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-user-md'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-user-md"></i> fa-user-md</a>
                                                                  </div>

                                                                  <div ng-click="menu_task.icon='fa fa-wheelchair'"  class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="javascript:void(0);"><i class="fa fa-wheelchair"></i> fa-wheelchair</a>
                                                                  </div>

                                                                </div>

                                                            </section>

                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="panel">
                                                      <a aria-controls="collapseTwo" aria-expanded="false" href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" id="headingTwo" role="tab" class="panel-heading collapsed">
                                                        <h4 class="panel-title">Glyphicons</h4>
                                                      </a>
                                                      <div aria-labelledby="headingTwo" role="tabpanel" class="panel-collapse collapse" id="collapseTwo" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                          <div class="bs-docs-section">

                                                            <h2 id="glyphicons-glyphs">Available glyphs</h2>
                                                            <div class="bs-glyphicons">
                                                              <ul class="bs-glyphicons-list">

                                                                <li  ng-click="menu_task.icon='glyphicon glyphicon-asterisk'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-asterisk"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-asterisk</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-plus'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-plus"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-plus</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-euro'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-euro"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-euro</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-eur'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-eur"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-eur</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-minus'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-minus"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-minus</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-cloud'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-cloud"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-cloud</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-envelope'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-envelope"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-envelope</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-pencil'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-pencil"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-pencil</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-glass'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-glass"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-glass</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-music'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-music"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-music</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-search'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-search"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-search</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-heart'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-heart"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-heart</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-star'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-star"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-star</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-star-empty'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-star-empty"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-star-empty</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-user'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-user"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-user</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-film'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-film"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-film</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-th-large'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-th-large"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-th-large</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-th'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-th"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-th</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-th-list'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-th-list"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-th-list</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-ok'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-ok"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-ok</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-remove'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-remove</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-zoom-in'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-zoom-in"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-zoom-in</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-zoom-out'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-zoom-out"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-zoom-out</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-off'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-off"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-off</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-signal'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-signal"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-signal</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-cog'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-cog"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-cog</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-trash'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-trash"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-trash</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-home'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-home"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-home</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-file'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-file"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-file</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-time'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-time"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-time</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-road'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-road"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-road</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-download-alt'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-download-alt"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-download-alt</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-download'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-download"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-download</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-upload'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-upload"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-upload</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-inbox'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-inbox"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-inbox</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-play-circle'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-play-circle"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-play-circle</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-repeat'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-repeat"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-repeat</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-refresh'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-refresh"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-refresh</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-list-alt'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-list-alt"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-list-alt</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-lock'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-lock"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-lock</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-flag'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-flag"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-flag</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-headphones'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-headphones"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-headphones</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-volume-off'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-volume-off"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-volume-off</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-volume-down'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-volume-down"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-volume-down</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-volume-up'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-volume-up"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-volume-up</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-qrcode'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-qrcode"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-qrcode</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-barcode'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-barcode"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-barcode</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-tag'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-tag"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-tag</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-tags'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-tags"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-tags</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-book'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-book"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-book</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-bookmark'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-bookmark"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-bookmark</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-print'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-print"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-print</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-camera'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-camera"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-camera</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-font'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-font"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-font</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-bold'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-bold"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-bold</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-italic'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-italic"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-italic</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-text-height'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-text-height"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-text-height</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-text-width'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-text-width"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-text-width</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-align-left'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-align-left"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-align-left</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-align-center'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-align-center"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-align-center</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-align-right'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-align-right"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-align-right</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-align-justify'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-align-justify"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-align-justify</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-list'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-list"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-list</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-indent-left'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-indent-left"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-indent-left</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-indent-right'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-indent-right"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-indent-right</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-facetime-video'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-facetime-video"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-facetime-video</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-picture'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-picture</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-map-marker'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-map-marker"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-map-marker</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-adjust'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-adjust"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-adjust</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-tint'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-tint"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-tint</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-edit'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-edit"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-edit</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-share'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-share"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-share</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-check'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-check"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-check</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-move'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-move"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-move</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-step-backward'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-step-backward</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-fast-backward'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-fast-backward"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-fast-backward</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-backward'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-backward"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-backward</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-play'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-play"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-play</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-pause'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-pause"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-pause</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-stop'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-stop"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-stop</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-forward'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-forward"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-forward</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-fast-forward'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-fast-forward"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-fast-forward</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-step-forward'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-step-forward</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-eject'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-eject"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-eject</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-chevron-left'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-chevron-left</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-chevron-right'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-chevron-right</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-plus-sign'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-plus-sign"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-plus-sign</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-minus-sign'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-minus-sign"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-minus-sign</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-remove-sign'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-remove-sign"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-remove-sign</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-ok-sign'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-ok-sign"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-ok-sign</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-question-sign'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-question-sign"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-question-sign</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-info-sign'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-info-sign</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-screenshot'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-screenshot"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-screenshot</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-remove-circle'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-remove-circle</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-ok-circle'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-ok-circle"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-ok-circle</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-ban-circle'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-ban-circle"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-ban-circle</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-arrow-left'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-arrow-left"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-arrow-left</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-arrow-right'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-arrow-right"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-arrow-right</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-arrow-up'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-arrow-up"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-arrow-up</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-arrow-down'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-arrow-down"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-arrow-down</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-share-alt'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-share-alt"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-share-alt</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-resize-full'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-resize-full"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-resize-full</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-resize-small'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-resize-small"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-resize-small</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-exclamation-sign'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-exclamation-sign"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-exclamation-sign</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-gift'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-gift"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-gift</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-leaf'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-leaf"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-leaf</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-fire'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-fire"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-fire</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-eye-open'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-eye-open</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-eye-close'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-eye-close"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-eye-close</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-warning-sign'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-warning-sign"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-warning-sign</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-plane'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-plane"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-plane</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-calendar'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-calendar"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-calendar</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-random'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-random"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-random</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-comment'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-comment"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-comment</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-magnet'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-magnet"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-magnet</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-chevron-up'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-chevron-up"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-chevron-up</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-chevron-down'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-chevron-down"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-chevron-down</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-retweet'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-retweet"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-retweet</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-shopping-cart'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-shopping-cart"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-shopping-cart</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-folder-close'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-folder-close"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-folder-close</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-folder-open'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-folder-open"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-folder-open</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-resize-vertical'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-resize-vertical"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-resize-vertical</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-resize-horizontal'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-resize-horizontal"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-resize-horizontal</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-hdd'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-hdd"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-hdd</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-bullhorn'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-bullhorn"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-bullhorn</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-bell'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-bell"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-bell</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-certificate'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-certificate"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-certificate</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-thumbs-up'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-thumbs-up"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-thumbs-up</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-thumbs-down'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-thumbs-down"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-thumbs-down</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-hand-right'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-hand-right"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-hand-right</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-hand-left'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-hand-left"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-hand-left</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-hand-up'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-hand-up"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-hand-up</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-hand-down'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-hand-down"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-hand-down</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-circle-arrow-right'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-circle-arrow-right"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-right</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-circle-arrow-left'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-circle-arrow-left"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-left</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-circle-arrow-up'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-circle-arrow-up"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-up</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-circle-arrow-down'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-circle-arrow-down"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-down</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-globe'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-globe"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-globe</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-wrench'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-wrench"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-wrench</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-tasks'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-tasks"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-tasks</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-filter'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-filter"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-filter</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-briefcase'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-briefcase"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-briefcase</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-fullscreen'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-fullscreen"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-fullscreen</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-dashboard'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-dashboard"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-dashboard</span>
                                                                </li>

                                                                <li  ng-click="menu_task.icon='glyphicon glyphicon-paperclip'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-paperclip"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-paperclip</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-heart-empty'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-heart-empty"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-heart-empty</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-link'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-link"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-link</span>
                                                                </li >

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-phone'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-phone"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-phone</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-pushpin'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-pushpin"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-pushpin</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-usd'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-usd"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-usd</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-gbp'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-gbp"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-gbp</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sort'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sort"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sort</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sort-by-alphabet'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sort-by-alphabet"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sort-by-alphabet</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sort-by-alphabet-alt'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sort-by-alphabet-alt</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sort-by-order'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sort-by-order"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sort-by-order</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sort-by-order-alt'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sort-by-order-alt"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sort-by-order-alt</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sort-by-attributes'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sort-by-attributes"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sort-by-attributes</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sort-by-attributes-alt'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sort-by-attributes-alt"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sort-by-attributes-alt</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-unchecked'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-unchecked"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-unchecked</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-expand'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-expand"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-expand</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-collapse-down'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-collapse-down"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-collapse-down</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-collapse-up'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-collapse-up"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-collapse-up</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-log-in'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-log-in</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-flash'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-flash"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-flash</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-log-out'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-log-out"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-log-out</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-new-window'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-new-window"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-new-window</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-record'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-record"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-record</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-save'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-save"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-save</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-open'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-open"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-open</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-saved'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-saved"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-saved</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-import'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-import"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-import</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-export'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-export"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-export</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-send'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-send"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-send</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-floppy-disk'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-floppy-disk"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-floppy-disk</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-floppy-saved'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-floppy-saved"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-floppy-saved</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-floppy-remove'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-floppy-remove"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-floppy-remove</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-floppy-save'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-floppy-save"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-floppy-save</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-floppy-open'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-floppy-open"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-floppy-open</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-credit-card'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-credit-card"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-credit-card</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-transfer'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-transfer"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-transfer</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-cutlery'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-cutlery"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-cutlery</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-header'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-header"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-header</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-compressed'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-compressed"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-compressed</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-earphone'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-earphone"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-earphone</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-phone-alt'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-phone-alt"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-phone-alt</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-tower'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-tower"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-tower</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-stats'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-stats"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-stats</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sd-video'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sd-video"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sd-video</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-hd-video'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-hd-video"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-hd-video</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-subtitles'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-subtitles"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-subtitles</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sound-stereo'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sound-stereo"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sound-stereo</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sound-dolby'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sound-dolby"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sound-dolby</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sound-5-1'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sound-5-1"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sound-5-1</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sound-6-1'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sound-6-1"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sound-6-1</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sound-7-1'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sound-7-1"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sound-7-1</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-copyright-mark'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-copyright-mark"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-copyright-mark</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-registration-mark'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-registration-mark"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-registration-mark</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-cloud-download'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-cloud-download"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-cloud-download</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-cloud-upload'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-cloud-upload"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-cloud-upload</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-tree-conifer'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-tree-conifer"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-tree-conifer</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-tree-deciduous'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-tree-deciduous"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-tree-deciduous</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-cd'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-cd"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-cd</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-save-file'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-save-file"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-save-file</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-open-file'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-open-file"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-open-file</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-level-up'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-level-up"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-level-up</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-copy'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-copy"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-copy</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-paste'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-paste"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-paste</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-alert'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-alert"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-alert</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-equalizer'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-equalizer"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-equalizer</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-king'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-king"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-king</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-queen'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-queen"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-queen</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-pawn'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-pawn"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-pawn</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-bishop'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-bishop"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-bishop</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-knight'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-knight"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-knight</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-baby-formula'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-baby-formula"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-baby-formula</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-tent'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-tent"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-tent</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-blackboard'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-blackboard"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-blackboard</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-bed'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-bed"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-bed</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-apple'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-apple"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-apple</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-erase'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-erase"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-erase</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-hourglass'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-hourglass"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-hourglass</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-lamp'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-lamp"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-lamp</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-duplicate'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-duplicate"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-duplicate</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-piggy-bank'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-piggy-bank"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-piggy-bank</span>
                                                                </li>

                                                                <li ng-click="menu_form.icon='glyphicon glyphicon-scissors'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-scissors"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-scissors</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-bitcoin'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-bitcoin"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-bitcoin</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-yen'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-yen"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-yen</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-ruble'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-ruble"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-ruble</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-scale'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-scale"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-scale</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-ice-lolly'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-ice-lolly"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-ice-lolly</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-ice-lolly-tasted'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-ice-lolly-tasted"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-ice-lolly-tasted</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-education'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-education"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-education</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-option-horizontal'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-option-horizontal"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-option-horizontal</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-option-vertical'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-option-vertical"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-option-vertical</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-menu-hamburger'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-menu-hamburger"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-menu-hamburger</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-modal-window'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-modal-window"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-modal-window</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-oil'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-oil"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-oil</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-grain'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-grain"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-grain</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-sunglasses'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-sunglasses"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-sunglasses</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-text-size'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-text-size"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-text-size</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-text-color'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-text-color"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-text-color</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-text-background'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-text-background"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-text-background</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-object-align-top'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-object-align-top"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-object-align-top</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-object-align-bottom'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-object-align-bottom"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-object-align-bottom</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-object-align-horizontal'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-object-align-horizontal"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-object-align-horizontal</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-object-align-left'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-object-align-left"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-object-align-left</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-object-align-vertical'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-object-align-vertical"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-object-align-vertical</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-object-align-right'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-object-align-right"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-object-align-right</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-triangle-right'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-triangle-right"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-triangle-right</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-triangle-left'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-triangle-left"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-triangle-left</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-triangle-bottom'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-triangle-bottom"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-triangle-bottom</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-triangle-top'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-triangle-top"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-triangle-top</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-console'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-console"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-console</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-superscript'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-superscript"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-superscript</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-subscript'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-subscript"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-subscript</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-menu-left'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-menu-left"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-menu-left</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-menu-right'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-menu-right"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-menu-right</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-menu-down'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-menu-down"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-menu-down</span>
                                                                </li>

                                                                <li ng-click="menu_task.icon='glyphicon glyphicon-menu-up'" >
                                                                  <span aria-hidden="true" class="glyphicon glyphicon-menu-up"></span>
                                                                  <span class="glyphicon-class">glyphicon glyphicon-menu-up</span>
                                                                </li>

                                                              </ul>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button class="btn btn-primary" type="button" ng-click="table_list=true;table_task=false;">Cancel</button>
                                                <button class="btn btn-success" type="submit" ng-click="menu_form_submit=true">Submit</button>
                                            </div>
                                        </div>

                                    </form>
		            <!-- table task block -->
		            <?php }else{ ?>
		            <form ng-submit="submit()" ng-init="table = '<?php echo $title;?>' ; get_field('<?php echo $title;?>')">
		            <div class="form-group" >
		            	<!-- <ul class="table_list">
		            		
				            <?php foreach ($content as $key => $field_value) { ?>
				            	<li>
				            		
		                            			<input type="checkbox"  name="<?php echo $field_value->Field;?>"  class=" field_check" ng-checked="fields.<?php echo $field_value->Field;?>" ng-model="table_field_list.<?php echo $field_value->Field;?>" ng-true-value="<?php echo $key+1;?>" value="<?php echo $field_value->Field;?>" >
		                            		 &nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucfirst(str_replace("_", " ", $field_value->Field));?>
		                        		
		                    		
		                    	</li>
		                    <?php } ?>
	                    	
	                    </ul> -->
                  <table class="table table-stripped">
                    <tr>
                      <th>Name</th>
                      <th>Enable in list</th>
                      <th>Enable in form</th>
                      <th>Required</th>
                      <th>Readonly</th>
                      <th>File Type</th>
                      <th>Date Type</th>
                    </tr>
                    <tbody>
                      <?php foreach ($content as $key => $field_value) { ?>
                      <tr style="text-align:center">
                        <td><?php echo ucfirst(str_replace("_", " ", $field_value->Field));?></td>
                        <td><input type="checkbox" ng-model="field_list.<?php echo $field_value->Field;?>.enable_in_list"  ng-true-value="true"/></td>
                        <td><input type="checkbox" ng-model="field_list.<?php echo $field_value->Field;?>.enable_in_form"  ng-true-value="true"/></td>
                        <td><input type="checkbox" ng-model="field_list.<?php echo $field_value->Field;?>.required"  ng-true-value="true" /></td>
                        <td><input type="checkbox" ng-model="field_list.<?php echo $field_value->Field;?>.readonly"  ng-true-value="true" /></td>
			           <td><input type="checkbox" ng-model="field_list.<?php echo $field_value->Field;?>.file_type"  ng-true-value="true" /></td>
                        <td><input type="checkbox" ng-model="field_list.<?php echo $field_value->Field;?>.date_type"  ng-true-value="true" /></td>			
                        <td><input type="checkbox" ng-model="field_list.<?php echo $field_value->Field;?>.select_type"  ng-true-value="true" /></td>			
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
	                </div>


                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <button class="btn btn-primary pull-right" type="button">Cancel</button>
                            <button class="btn btn-success pull-right" type="submit" ng-click="table = '<?php echo $title;?>'">Submit</button>
                        </div>
                    </div>
                    </form>

                    <?php } ?>
    			</div>
    		</div>
    	</div>
    </div>




