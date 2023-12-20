<div class="content-wrapper" ng-app="ticket" ng-controller="ticketCtrl" ng-init="layout_preview()">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Theatre
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>theatre/viewscreen"><i class="fa fa-dashboard"></i>Theatre</a></li>
        <li class="active">View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Theater Preview</h3>
               <ul class="nav navbar-right panel_toolbox">
                   <li>
                   <a href="<?php echo base_url(); ?>theatre/viewscreen">Back</a>
                    </li> 
                </ul>
              

 <div class="col-md-12 col-sm-12 col-xs-12" ng-show="theater_preview_var" >
          <div class="x_panel">
          <!--   <div class="x_title">
                <h2>Theater Preview </h2>
                  <ul class="nav navbar-right panel_toolbox">
                   <li>
                   <a href="<?php echo base_url(); ?>theatre/viewscreen">Back</a>
                    </li> 
                </ul>

                <div class="clearfix"></div>
            </div> -->
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
                    <td class="row_name">{{rowz.rowname.value}}</td>
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
        </div>










          </div>

    </section>
    <!-- /.content -->
  </div>


