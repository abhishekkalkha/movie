</div>
<script>
	
	//baseurl = "<?php echo base_url(); ?>";
	
	</script>
<!-- footer content -->
        <footer>
          <div class="copyright-info">
            
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
      <!-- /page content -->
  </div>


  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  
  <script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/admin/js/nicescroll/jquery.nicescroll.min.js"></script>
 
  <!-- bootstrap progress js -->
  <script src="<?=base_url()?>assets/admin/js/progressbar/bootstrap-progressbar.min.js"></script>
  <!-- icheck -->
  <script src="<?=base_url()?>assets/admin/js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/datepicker/daterangepicker.js"></script>
  
  
    <script type="text/javascript" src="<?=base_url()?>assets/admin/js/select2.full.min.js"></script>
   <!-- <script src="<?=base_url()?>assets/admin/js/moment/moment.min.js"></script>
   <script src="<?=base_url()?>assets/admin/js/datepicker/daterangepicker.js"></script>-->
  <!-- chart js -->
  <!--<script src="<?=base_url()?>assets/admin/js/chartjs/chart.min.js"></script>-->
  <!-- sparkline -->
  <script src="<?=base_url()?>assets/admin/js/sparkline/jquery.sparkline.min.js"></script>

  <script src="<?=base_url()?>assets/admin/js/custom.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-timepicker.min.js"></script>
  <!-- flot js -->
  
   
  
  <!-- Chart.js -->
  <script src="<?php echo base_url(); ?>assets/admin/js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>http://cdn.jsdelivr.net/jquery.flot/0.8.3/jquery.flot.min.js"></script>
  <!-- Chart.js -->
      
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/flot/date.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/flot/jquery.flot.resize.js"></script>
 
  <!-- pace -->
  <script src="<?=base_url()?>assets/admin/js/pace/pace.min.js"></script>
  <!-- flot -->
  <script>
    $(function() {
      var cnt = 10; //$("#custom_notifications ul.notifications li").length + 1;
      TabbedNotification = function(options) {
        var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title +
          "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

        if (document.getElementById('custom_notifications') == null) {
          alert('doesnt exists');
        } else {
          $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
          $('#custom_notifications #notif-group').append(message);
          cnt++;
          CustomTabs(options);
        }
      }

      CustomTabs = function(options) {
        $('.tabbed_notifications > div').hide();
        $('.tabbed_notifications > div:first-of-type').show();
        $('#custom_notifications').removeClass('dsp_none');
        $('.notifications a').click(function(e) {
          e.preventDefault();
          var $this = $(this),
            tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
          others.removeClass('active');
          $this.addClass('active');
          $(tabbed_notifications).children('div').hide();
          $(target).show();
        });
      }

      CustomTabs();

      var tabid = idname = '';
      $(document).on('click', '.notification_close', function(e) {
        idname = $(this).parent().parent().attr("id");
        tabid = idname.substr(-2);
        $('#ntf' + tabid).remove();
        $('#ntlink' + tabid).parent().remove();
        $('.notifications a').first().addClass('active');
        $('#notif-group div').first().css('display', 'block');
      });
    })
  </script>

 


<!-- Datatables-->
        <script src="<?=base_url()?>assets/admin/js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/dataTables.bootstrap.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/dataTables.buttons.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/jszip.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/pdfmake.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/vfs_fonts.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/buttons.html5.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/buttons.print.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/dataTables.responsive.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables/dataTables.scroller.min.js"></script>


        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable-responsive').DataTable();
          });
        </script>
		
		  <script>
        $(document).ready(function() {
        $('#wewewedate').daterangepicker({
           singleDatePicker: true,
           calender_style: "picker_4"

        }, function(start, end, label) {
		   var scope = angular.element(document.body).scope();
		   scope.$apply(function(){
						scope.cinema_screen.date = start.format('YYYY-MM-DD');					
					})
                  });


           $('.date_field').daterangepicker({
           singleDatePicker: true,
           calender_style: "picker_4"

        },function(start, end, label) {
          var scope = angular.element(document.body).scope();
      

          var ng_model = $('.date_field').attr('ng-model');
        
          angular.element('#ticketCtrl').scope().set_date(ng_model, start.format('YYYY-MM-DD'));

                  });
      });


      $("input[name = 'image']").on('change',function(){
      //var input = document.getElementsByName('image');
      input = $("input[name = 'image']");
      //console.log(input[0].files[0]);
      
      file = input[0].files[0];
      if(file != undefined){
        formData= new FormData();
        if(!!file.type.match(/image.*/)){
          formData.append("image", file);
          url = '<?=base_url("admin/image_upload")?>';
          $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                var scope = angular.element(document.body).scope();
                scope.$apply(function(){
                  scope.form_data.image = data;          
                })
            }
          });
        }else{
          alert('Not a valid image!');
        }
      }else{
        //alert('Input something!');
      }
      })


	  
	 
    
    </script>
	<!--time picker-->
	      <script type="text/javascript">			  
           /* $("#timepicker").kendoTimePicker({
				  animation: false
				});*/				
			$('.multi-field-wrapper').each(function () {	
				var $wrapper = $('.multi-fields', this);
				
				 $(function () {
	               $('.multi-field:first .timepickering').timepicker({
                   showInputs: false
                });
               });	
			   
                //$(".add-field", $(this)).click(function(e) {

			 $(this).on('click', '.add-field', function (e) {
					$('.multi-field:first-child', $wrapper).clone().appendTo($wrapper);
					$('.multi-field:last').find('input').val('');
					$('.multi-field:last .timepickering').val('');
					

	               $('.multi-field:last .timepickering').timepicker({
                   showInputs: false
               });		             	
            
			 
			    //$(this).on('click', '.remove-field', function (e) {
				$('.multi-field .remove-field', $wrapper).click(function() {
					if ($('.multi-field', $wrapper).length > 1) {
						$(this).parents(':eq(3)').remove();
					}
				});
			//});
			 });
				 	
           });

          </script>
		  
		<script>
       
    </script>
    <script>
  
    </script>
	
	
	 <!-- bootstrap-daterangepicker -->
    <script type="text/javascript">
      $(document).ready(function() {
		 
        var cb = function(start_date, end_date, label) {
          console.log(start_date.toISOString(), end_date.toISOString(), label);
          $('#reportrange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));
		  //alert(start_date.format('MMMM D, YYYY'));
		 var Sdd=start_date.format('YYYY-MM-DD');
		var  endd= end_date.format('YYYY-MM-DD');
		
		             /*var scope = angular.element(document.body).scope();
		                scope.$apply(function(){
						scope.cinema_screen.date = start.format('YYYY-MM-DD');
					        })*/
		  
		  start_date = start_date.format('YYYY-MM-DD');
		  end_date = end_date.format('YYYY-MM-DD');
		  
		  $.ajax({
            url: 'admin/get_daycalculateamount',
            type: 'POST',
            data: {'cd':Sdd, 'cds':endd},
            //data: {'businessdetails':businessdetails},
            success: function(result) {
            //alert(result);
			
			var map = JSON.parse(result);
			
            var chartColours = ['#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];

        //generate random number for charts
        randNum = function() {
          return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
        };

        var d1 = [];
        //var d2 = [];
       console.log(map.length);
        //here we generate data for chart
        for (var i = 0; i < map.length; i++) {
          //d1.push([new Date(Date.today().add(i).days()).getTime(), randNum() + i + i + 10]);
          //d1.push[map[i].date,map[i].amount];
          //d1.push([map[i].date,map[i].amount]);
		  
	  d1.push([new Date(map[i].date).getTime(),map[i].amount]);
        //alert(map);
        }
		//console.log(d1);
        var chartMinDate = d1[0][0]; //first day
        var chartMaxDate = d1[map.length-1][0]; //last day

        var tickSize = [1, "day"];
        var tformat = "%d/%m/%y";

        //graph options
        var options = {
          grid: {
            show: true,
            aboveData: true,
            color: "#3f3f3f",
            labelMargin: 10,
            axisMargin: 0,
            borderWidth: 0,
            borderColor: null,
            minBorderMargin: 5,
            clickable: true,
            hoverable: true,
            autoHighlight: true,
            mouseActiveRadius: 100
          },
          series: {
            lines: {
              show: true,
              fill: true,
              lineWidth: 2,
              steps: false
            },
            points: {
              show: true,
              radius: 4.5,
              symbol: "circle",
              lineWidth: 3.0
            }
          },
          legend: {
            position: "ne",
            margin: [0, -25],
            noColumns: 0,
            labelBoxBorderColor: null,
            labelFormatter: function(label, series) {
              // just add some space to labes
              return label + '&nbsp;&nbsp;';
            },
            width: 40,
            height: 1
          },
          colors: chartColours,
          shadowSize: 0,
          tooltip: true, //activate tooltip
          tooltipOpts: {
            content: "%s: %y.0",
            xDateFormat: "%d/%m",
            shifts: {
              x: -30,
              y: -50
            },
            defaultTheme: false
          },
          yaxis: {
            min: 0
          },
          xaxis: {
            mode: "time",
            minTickSize: tickSize,
            timeformat: tformat,
            min: chartMinDate,
            max: chartMaxDate
          }
        };
        var plot = $.plot($("#placeholder33x"), [{
          label: "Email Sent",
          data: d1,
          lines: {
            fillColor: "rgba(150, 202, 89, 0.12)"
          }, //#96CA59 rgba(150, 202, 89, 0.42)
          points: {
            fillColor: "#fff"
          }
        }], options);
            },
            error: function() {
            }
        }); 
		
		 
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2016',
          maxDate: '12/31/2090',
            //minDate: '2016/01/01',
            //maxDate: '2090/12/31',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('YYYY-MM-DD') + ' - ' + moment().format('YYYY-MM-DD'));
        $('#reportrange').daterangepicker(optionSet1, cb);
      
     
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start_date/end_date dates are " + picker.startDate.format('YYYY-MM-DD') + " to " + picker.endDate.format('YYYY-MM-DD'));
		  //alert(picker);
        });
		
		
		
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->
	
	
	
	
	
	 <!-- jQuery Sparklines -->
    <script>
      $(document).ready(function() {
        $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
          type: 'bar',
          height: '125',
          barWidth: 13,
          colorMap: {
            '7': '#a1a1a1'
          },
          barSpacing: 2,
          barColor: '#26B99A'
        });

        $(".sparkline11").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3], {
          type: 'bar',
          height: '40',
          barWidth: 8,
          colorMap: {
            '7': '#a1a1a1'
          },
          barSpacing: 2,
          barColor: '#26B99A'
        });

        $(".sparkline22").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {
          type: 'line',
          height: '40',
          width: '200',
          lineColor: '#26B99A',
          fillColor: '#ffffff',
          lineWidth: 3,
          spotColor: '#34495E',
          minSpotColor: '#34495E'
        });
      });
    </script>
    <!-- /jQuery Sparklines -->
	
	 <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
		
  </body>
</html>