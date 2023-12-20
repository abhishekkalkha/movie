$(document).ready(function () 
{   

/*----------------------------
-------- GALLERY --------
----------------------------*/

$(document).on('click','.trailer-play',function(){
	$('#trailerpop').scrollTop(0);
	//$('#trailerpop').css('overflow-y','hidden');
});

$(function()
{
	var gallery = $('.gallery a').twGallery();
});


/*----------------------------
-------- TITLE-SLIDER --------
----------------------------*/

 $('#slider').cycle(
 {
    fx:'scrollHorz',
    next:'#next',
    prev:'#prev',
    timeout:1000,
     pause:2
});
			
/*-------------------------*/

/*----------------------------
-------- LEAD-SLIDER --------
----------------------------*/

/*$("#leadcast-slider-ul").lightSlider(
{
    loop:true,
	item:5,
	auto:true,
	 pauseOnHover: true,
    keyPress:true
	
});*/

/*-------------------------*/

/*----------------------------
-------- FEATURE-SLIDER ------
----------------------------*/
			
$("#feature-slider-ul").lightSlider(
{
    loop:true,
	 pauseOnHover: true,
	item:4,
	auto:true,
    keyPress:true
});

/*-------------------------*/

/*----------------------------
-------- TB-PR-SLIDER ------
----------------------------*/

/*$("#tb-prf-slider").lightSlider(
{
    loop:true,
	 pauseOnHover: true,
	 auto:true,
	item:4,
    keyPress:true
	
});*/

/*-------------------------*/

/*----------------------------
-------- TB-PR-SLIDER ------
----------------------------*/

$(function() {
$('.tick-rate').raty({
  half:       true,
  size:       24,
  starHalf:   'star-half-big.png',
  starOff:    'star-off-big.png',
  starOn:     'star-on-big.png',
  score: function() {
        return $(this).attr('id');
    }
});

			});
			
/*-------------------------*/	


/*----------------------------
-------- ALERT-POPOVER ------
----------------------------*/	

 $('[data-toggle="popover"]').popover();   




  
 });			
