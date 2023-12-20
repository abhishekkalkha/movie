/*$(function(){
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
	});	*/
	
	$(function(){
		   
  	$(document).on("click",'.youTubeVideo', function(){
        $("html,body").animate({scrollTop: 0}, 800);
 		var vidtitle = $(this).parents('.videoThum').next('.videoInfo').find('h2').text();
		$('.tb-video-container .iframe h2').text(vidtitle);
		var winWidth = $(window).width();
        var winHeight = $(window).height();
        var centerDiv = $('.tb-video-popup');
        var left = winWidth / 2 - ((parseInt(centerDiv.css("width"))) / 2);
        var top = winHeight / 2 - ((parseInt(centerDiv.css("height"))) / 2);
        centerDiv.css({'top': '5%'});
    		$('.youtube').show();
		  $('.tb-video-popup.youtube, .tb-video-pop-overlay-bg').show();
		 
 		var ind = $(this).parents('.videoThum').addClass('aaa').parents('.guideBox').siblings().find('.videoThum').removeClass('aaa');	
		var linkSrc = $(this).parents('.videoThum').find('a').attr('rel');
		 $('.youtube .video-container').find('iframe').attr('src', linkSrc);
	});	
	
	$('.close, .tb-video-pop-overlay-bg').click(function(){
		$('.youtube .video-container').find('iframe').attr('src', '');							
		$('.tb-video-popup.youtube, .tb-video-pop-overlay-bg').hide();
	});	
	
		
	$.fn.stars = function() {
		return $(this).each(function() {
			// Get the value
			var val = parseFloat($(this).html());
			// Make sure that the value is in 0 - 5 range, multiply to get width
			var size = Math.max(0, (Math.min(5, val))) * 16;
			// Create stars holder
			var $span = $('<span />').width(size);
			// Replace the numerical value with stars
			$(this).html($span);
		});
	}
	
	
	$('span.stars').stars();
	
	
	
//setTimeout(function() {
//    $('#overlay').modal('hide');
//}, 5000);
/*
$("li>a").click(function(){
   $(this).parent().toggleClass("clicked");
});
*/

});
 

function check_login(){
	var url = "index.php/ticketbazzar_movies/check_login_status";
	ajax({
		url: url,
		type: "POST",
		success: function(response){
			alert(response);
		}
	});	
}
/* #####################################################################
   #
   #   Project       : Modal Login with jQuery Effects
   #   Author        : Rodrigo Amarante (rodrigockamarante)
   #   Version       : 1.0
   #   Created       : 07/29/2015
   #   Last Change   : 08/04/2015
   #
   ##################################################################### */
   
$(function() {
    
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
                if ($lg_username == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                }
                return false;
                break;
            case "lost-form":
                var $ls_email=$('#lost_email').val();
                if ($ls_email == "ERROR") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                } else {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                }
                return false;
                break;
            case "register-form":
                var $rg_username=$('#register_username').val();
                var $rg_email=$('#register_email').val();
                var $rg_password=$('#register_password').val();
                if ($rg_username == "ERROR") {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Register error");
                } else {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
                }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });
    
    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
  
    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }

 });


