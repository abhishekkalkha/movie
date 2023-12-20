<script type="text/javascript">
  var base_url = '<?php echo base_url(); ?>';
  var baseurl = base_url;
</script>

<script src="<?php echo base_url('assets/plugins/jQuery/jquery-ui.min.js');?>"></script>

<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>

<script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js');?>"></script>

<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/colorpicker/bootstrap-colorpicker.min.js');?>"></script>

<script src="<?php echo base_url('assets/plugins/datepicker/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>

<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>

<script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>

<script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js');?>"></script>

<script src="<?php echo base_url('assets/dist/js/app.min.js');?>"></script>

<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

<script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>
<script src="<?php echo base_url('assets/dist/js/pace.js');?>"></script>
<script src="<?php echo base_url('assets/dist/js/Parsley.js');?>"></script>
<script src="<?php echo base_url('assets/dist/js/parsley.min.js');?>"></script>
<script src="<?php echo base_url('assets/dist/js/custom_script.js');?>"></script>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB1br9lwKFyEpCnS5elLan_90CCsYeak6I&libraries=places" type="text/javascript"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <script src="<?php echo base_url();?>assets/plugins/flot/jquery.flot.min.js"></script>
   <script src="<?php echo base_url();?>assets/plugins/flot/jquery.flot.categories.min.js"></script>

  
  <script src="<?php echo base_url();?>assets/dist/js/ng-fil-upload-shim.js"></script>
  <script src="<?php echo base_url();?>assets/dist/js/ng-fil-upload.js"></script>
 <script src="<?php echo base_url();?>assets/dist/js/angularapp.js"></script>
<script>
      $(function () {
		     $("#example1").DataTable();
	    });

function doconfirms(image_id)
{
    job=confirm("Are you sure to delete permanently?");
    if(job==true){
      $.ajax({
        type: "POST",
        url: base_url+'movie/delete_gallery',
        data: 'image_id='+image_id,
        success: function(result){
          
         // $(".imageshow").css('display','block');
          $(".imageshow").show();
           if(result == 1){
          $(".imageshow").html('<div class="alert alert-success"><p class="error">Images Deleted successfully</p></div>');
          setTimeout(function(){window.location.reload(); }, 5000);
        }
        else{
           $(".imageshow").html('<div class="alert alert-danger"><p class="error">Images Deleted successfully</p></div>');
        }
      }
      });
     
    }
    if(job!=true)
    {
        return false;
    }
}
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
var date = new Date();
date.setDate(date.getDate());
$(".select2").select2();
$('#datepicker').datepicker({
      autoclose: true,
      startDate: date
    });
    
    $('#datepicker2').datepicker({
      autoclose: true,
      //startDate: date
    });

/*<!--***************************CKEDITOR************************** -->*/
  $(function () {

    CKEDITOR.replace('editor1');

    $(".textarea").wysihtml5();

  });

  function time_picker(){
      $(".timepicker").timepicker({
      showInputs: false
    });
    }     

/***************************end of CKEDITOR**************************/


/***************************daterangepicker**************************/

    $('#reservation').daterangepicker({
time: {
        enabled: true
    }
                                      });

     // get values and create Date objects
 var date1 = $('#reservation_dub').val();

 // set the values
 $('#reservation').val(date1);

 /*   $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});*/
 $(".timepicker").timepicker({
      showInputs: false
    });

/***************************end of daterangepicker**************************/

 $('#theatre').on('change',function(){

var theatre_id = $(this).val();

$.ajax({
        type: "POST",
        url: base_url+'theatre/get_movies_by_id',
        data: 'theatre_id='+theatre_id,
        success: function(data){
         $('#movie').html(data);
        }
      });
$.ajax({
        type: "POST",
        url: base_url+'theatre/get_screen_by_id',
        data: 'theatre_id='+theatre_id,
        success: function(data){
         $('#screen').html(data);
        }
      });
});


 /*******************adding time picker*********************************88*/
</script>
<script>
 var max_fields = 15;
var x = 1;
$('#showsquare').click(function(e){
   e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++;
     $(".bootstrap-timepicker:last").append('<div class="bootstrap-timepicker"><div class="form-group"><div class="col-sm-3"></div><div class="col-sm-5" id="xyz"><div class="input-group"><input type="text" class="form-control timepicker" name="screen_timing[]"><div class="input-group-addon"><i class="fa fa-clock-o"></i></div></div><span class="glyphicon  form-control-feedback"></span></div><div class="closesquare col-sm-4" id="closesquare" style="margin-top:-30px;margin-left:5px;float:right;padding-top:3px"> <i class="fa fa-times-circle"></i></div></div></div>');
   time_picker();
   }
});

$('.bootstrap-timepicker').on("click",".closesquare", function(e){
  e.preventDefault(); $(this).parent('div').remove(); x--;
});
</script>
<script>
/***********************end of adding time picker**********************************/


/**********************movie list table length**********************************/

 $("#movielist").DataTable({
          "pageLength": 25,
          /*"columnDefs": [{
          "targets": 'no-sort',
          "orderable": false,
          }],
          "autoWidth": false,
          "orderable": true,      
           colReorder: true*/
  });

 /**********************end movie list table length**********************************/

  /********************** adding movie crew**********************************/
   var max = 25;
   //var x =1;
   
   $('#addone').click(function(e){
    var x =$('#x').val();
   
   e.preventDefault();
   if(x < max){
      x++;
      $.ajax({
        type: "POST",
        url: base_url+'movie/get_list',
        success: function(data){

          var obj = JSON.parse(data);
           $(".crewrow:last").append('<div class="crewrow"><div class="form-group"><div class="col-sm-3"></div><div class="col-sm-4"><select class="form-control roleid" style="width: 100%;" name="role[]" required="" id="role_id_'+x+'" data-id="'+x+'">'+obj.role+'</select><span class="glyphicon  form-control-feedback"></span></div><div class="col-sm-4"><select class="form-control actorsid" style="width: 100%;" name="actors[]" required="" id="actors_id_'+x+'" data-id="'+x+'">'+obj.actor+'</select><span class="glyphicon  form-control-feedback"></span></div><div class="square col-sm-1" id="closeone" style="margin-top:10px"> <i class="fa fa-times-circle"></i></div></div></div>');
            function_default();
          $('#x').val(x);

         
        }
      });
        
   }
   
   });
   $('.crewrow').on("click","#closeone", function(e){
  e.preventDefault(); $(this).parent('div').remove(); x--;
});


   function get_select_field(){
     $.ajax({
        type: "POST",
        url: base_url+'movie/get_list',
        success: function(data){

          var obj = JSON.parse(data);
          console.log(obj);
          defer.resolve();
          return obj;
         
        }
      });
   }

  /********************** end of adding movie crew**********************************/
function function_default(){
  $('.roleid').on('change',function(){
  var role = $(this).val();
  var x = $(this).data('id');
//$("#actors_id_"+x).html('');
$.ajax({
        type: "POST",
        url: base_url+'movie/get_actors_by_id',
        data: 'role_id='+role,
        success: function(data){
         $("#actors_id_"+x).html(data);
        }
      });
});
}
 $('.roleid').on('change',function(){
    
  var role = $(this).val();
$.ajax({
        type: "POST",
        url: base_url+'movie/get_actors_by_id',
        data: 'role_id='+role,
        success: function(data){
         $("#actors_id").html(data);
        }
      });
});

 </script>

</body>
</html>
