$(document).ready(function() {	
 $.widget.bridge('uibutton', $.ui.button);
});


//for map 
 $(function() {

$('#pick-map').click(function (e) {
	
        e.preventDefault();
        $('#myModalmaptbz').modal('show');
    }); 
$('#myModalmaptbz').on('shown.bs.modal', function () {
  //alert('hi');
  load_map();
  //google.maps.event.trigger(map, 'resize')
});


$('.select-location').click(function (e) {
  $('#latitude').val($('#pick-lat').val());
  $('#longitude').val($('#pick-lng').val());
  $('#myModalmaptbz').modal('hide');
});



function load_map() {
   //alert(2);
  var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 7,
            center: new google.maps.LatLng(35.137879, -82.836914),
            mapTypeId: google.maps.MapTypeId.HYBRID
          });
          
  var myMarker = new google.maps.Marker({
    position: new google.maps.LatLng(9.369, 76.803),
    draggable: true
  });
  
    var latitude = document.getElementById('pick-lat');
  var longitude = document.getElementById('pick-lng');
  
  google.maps.event.addListener(myMarker, 'dragend', function (evt) {
    document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
    latitude.value = evt.latLng.lat().toFixed(3);
    longitude.value = evt.latLng.lng().toFixed(3);
  });
  
  google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
    document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
  });
  
  map.setCenter(myMarker.position);
  myMarker.setMap(map);
}
});

$(function() {

$('.viewbutton').click(function (e) {

        e.preventDefault();
        var id = $(this).data("bookingid");
        //alert(id);
         $('#myModal').modal({show:true});        
        $.ajax({
        type: "POST",
        url: base_url+'Bookingdetails/get_userdata',
        data: 'id='+id,
        success: function(data){
         $('#myModal .box-body').html(data);
        }
      });
    }); 
});


function check_fun(control){
   if(control.prop("checked") == true){               
              var id = control.attr("id");
              $('.'+id).prop("checked", true);
            }

            else if(control.prop("checked") == false){

                var id = control.attr("id");
              $('.'+id).prop("checked", false);

            }
}

function check_sub(sub){
  var all = 0;
  if(sub.prop("checked") == true){
    var id =sub.attr("class");
    $('.'+id).each(function() {
      if($(this).prop("checked") == false){
            all = 1;
      }
    });
    if(all==0){
        $('#'+id).prop("checked", true);
    }
  }
   else {
    var id = sub.attr("class");
    $('#'+id).prop("checked", false);
  }
          
}
$('#permission').on('submit',function(e){
  var a=window.location.href ;
 var url = a.split('/');
  var id = url[url.length - 1];
            var data = $(this).serialize();
            $.ajax({
              method: "POST",
              url: base_url+'rolemanagement/update_role',
              //data:{'role_id':id,'page_id':data},
              data: data+'&id='+id,
              success:function(result){
      $(".result-role").show();
      if(result == 2 || result == 4){
          $(".result-role").html('<div class="alert alert-danger"><p class="error">Error</p></div>');
          setTimeout(function(){$(".result-role").hide(); }, 3000);
      }else if(result == 1){
          $(".result-role").html('<div class="alert alert-success"><p class="success">Role Permission Added successfully</p></div>');
          setTimeout(function(){$(".result-role").hide(); }, 3000);
      }else{
          $(".result-role").html('<div class="alert alert-success"><p class="success">Role Permission Changes successfully</p></div>');
          setTimeout(function(){$(".result-role").hide(); }, 3000);
      }
    }
            });

            
    
           e.preventDefault(); 
        });

