
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>welcome/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php
         $user2 = $this->session->userdata('permission');

         $page_name = array();

      $page_name = explode(',', $user2);
      ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
  
              <h4>Movie</h4>

              <p>Movie</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <?php if(in_array('22',$page_name)){?>
            <a href="<?php echo base_url();?>movie/index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        <?php  } ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Theatre</h4>

              <p>Theatre</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
              <?php if(in_array('40',$page_name)){?>
            <a href="<?php echo base_url();?>theatre/index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          <?php } ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Details</h4>

              <p>Booking Details</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <?php if(in_array('10',$page_name)||in_array('11',$page_name)||in_array('12',$page_name)) { ?>
            <a href="<?php echo base_url();?>bookingdetails/index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
         <?php } ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
             <h4>Reviews</h4>

              <p>Customers review</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
               <?php if(in_array('10',$page_name)) { ?>
            <a href="<?php echo base_url();?>reviews/index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      <?php   } ?>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">

           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Top Rated Movies</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Movie</th>
                    <th>Rating</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php foreach ($data as $value) { ?>
                  <tr>
                   <td> <i class="fa fa-film"></td>
                    <td><?php echo $value->movie_name;?></td>
                     <td> <?php echo $value->rates;?>%</td>
                

                  </tr>
                   <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>

          </div>
         

        </section>

        <section class="col-lg-6 connectedSortable">

                   <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Daily Booking Count</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>


        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

  <script >
$(document).ready(function(){
$.ajax({
  type: "GET",
        url: base_url+'welcome/chart',
        success: function(data){
// console.log(typeof(data));
            var bar_data = {
      data: JSON.parse(data),
      color: "#3c8dbc"
    };
    $.plot("#bar-chart", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
}
        
});
});


  
  </script>