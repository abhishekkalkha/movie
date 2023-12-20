//home page 
$(function(){
  $('.youTubeVideo').click(function(){
 		var vidtitle = $(this).parents('.videoThum').next('.videoInfo').find('h2').text();
		$('.tb-video-container .iframe h2').text(vidtitle);
		var winWidth = $(window).width();
        var winHeight = $(window).height();
        var centerDiv = $('.tb-video-popup');
        var left = winWidth / 2 - ((parseInt(centerDiv.css("width"))) / 2);
        var top = winHeight / 2 - ((parseInt(centerDiv.css("height"))) / 2);
        centerDiv.css({'left': left,'top': '15%'});
    		$('.youtube').show();
		  $('.tb-video-popup.youtube, .tb-video-pop-overlay-bg').show();
		 $("html,body").animate({scrollTop: 0}, 800);
 		var ind = $(this).parents('.videoThum').addClass('aaa').parents('.guideBox').siblings().find('.videoThum').removeClass('aaa');	
		var linkSrc = $(this).parents('.videoThum').find('a').attr('rel');
		 $('.youtube .video-container').find('iframe').attr('src', linkSrc);
	});	
	
	$('.close, .tb-video-pop-overlay-bg').click(function(){
		$('.youtube .video-container').find('iframe').attr('src', '');							
		$('.tb-video-popup.youtube, .tb-video-pop-overlay-bg').hide();
	});	
	});	

$(document).on('ready',function(){

	var a = window.location.href;  
	var url=a.substring(a.lastIndexOf("/") + 1);
	if(url=="event" || url=="sports" || url=="festival" || url=="deals" || url=="giftcard" || url=="sports_detail"){
		$('#warning').modal('show');
	}	
	//setTimeout(function(){ alert("Hello"); }, 3000);
});



		
		$(document).ready(function(){
 $("#forgetspw").click(function(event){	 
	 event.preventDefault();	 
     $.ajax({
             type: "POST",
             url: base_url+"login/Forget_Password",
			 
            data: {
                   email: $("#femail").val()
                   }, 
           success:function(data){
                // alert(data);
                   data = $.trim(data);
				  
				  if(data == 'loggedIn'){
					   
					   var error = '<div class="errormsgdown">Successfully Sent </div>';
					 
					//    $('#femail').val('');
					// femail.Text = "";
					$('.errormsgdown').html(error);
					  $('input[type="text"]').val('');

					
				}else if(data == 'No'){
					 var error = '<div class="errormsgdown">Sorry you have entered wrong information </div>';
					$('.errormsgdown').html(error);
					$('#femail').val('');
					
				   }else {
					 var error = '<div class="errormsgdown">Sorry you have entered wrong informations </div>';
					$('.errormsgdown').html(error);
					$('#femail').val('');
					
				   }
				   
                       									
						}						
                            });
                 });
    });


 $(document).ready(function(){
      $("#promo_check").click(function(e){
        var d = $('#code').val();
         var user_id =  document.getElementById('user_id').getAttribute('value')
       // alert(d);

          e.preventDefault();
          $.ajax({type: "POST",
          
                // url: "check_promo",
                 url: base_url+"book/check_promo",
                data: 'id='+d+'&user_id='+user_id,
                success:function(response){
                  // alert(response);
                      var result = $.parseJSON(response);
                  /*  console.log(result);
                    console.log(result['promocode_type']);
                    console.log(result['off']);*/
                	if(result<=0)
                {
                   $("#code").val('');
                }
                if(result){
                     //alert('hi');
                	if(result['promocode_type'] == 'Fixed'){
		                  var off = result['off'];
		                  $('#off').val(off);
		                  $('.tb_pay10').html('-'+off);
		                 var amt =  $('#total_amount').val();

		                 var actual = parseInt(amt)- parseInt(off);
		                
		                 $('#total_amount').val(actual);
		             
		                 $('.tb_pay1').html(actual);
		                 $("#promo_status").html('You have got Rs.'+off+' OFF');
                   } 
                  else if(result['promocode_type'] == 'Percentage'){
		               	// alert('haiii');
		                  var of = result['off'];
		                    var amt =  $('#total_amount').val();
		                  var off = (parseInt(amt)) * ((parseInt(of))/100);
		                  //console.log(off);
		                  $('#off').val(off);
		                  $('.tb_pay10').html('-'+off);
		                // var amt =  $('#total_amount').val();

		                 var actual = parseInt(amt)- parseInt(off);
		                
		                 $('#total_amount').val(actual);
		                 $('.tb_pay1').html('Rs.'+actual);
		                 $("#promo_status").html('You have got Rs.'+off+' OFF');
                   }
               }

               else {
                $("#promo_status").html('Invalid promo code');
               }
                }
            });
      });
  });