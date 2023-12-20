/* BOOK MOVIEWS
########################################################
--------------------------------------------------------*/ 
/*App.filter('director_filter', function() {
  return function(input) {
  	for(var i = 0; i < input.length; i++) {
  		//console.log(input[i]['role']);
          if(input[i]['role'] === 'Director') {
              return input[i];
          }
          else{
          	return false;
          }
      }
      
  };
});*/


App.controller('bookCtrl', ['$scope','$http','$rootScope','$timeout','$window', function($scope,$http,$rootScope, $timeout,$window) {
  $scope.payment = '';
/*****GET BOOK MOVIE DETAILS*****/
$rootScope.seats = [];
$rootScope.price = 0;
$scope.selected_time = '';
$scope.selected_price = '';
$scope.amount = 0;
$scope.total_amount = 0;
    $scope.loader = true;
    $scope.getMovieDetails = function(id) {
        var url = base_url + 'book/getMovies';
	    $http({
		    url: url,
		    method: "GET",
		    params: {
				     'table_name': 'tbz_show_details',
				     'id': id
		            }
	    }).then(function mySucces(response) {
	    	//alert(response);
	    	console.log(response);
		    if(response.data.status == 'success') {
		     $scope.selected_movie = response.data.result;
		      $scope.director = response.data.result.cast;
		  // console.log($scope.director);
    angular.forEach($scope.director, function(value, key) {
    //alert(JSON.stringify(value));
        if(value.role=='Director'){
        $scope.directors = value.actor_name;
        $scope.image = value.image;
        }
            
        });
		     //alert(JSON.stringify(response.data.result));
		 
		    }
		    $timeout(function() {
		     $scope.loader = false;
		    }, 1000);
        });

    }

/*$scope.stripAddr = function(address) {
  return address.substring(0,18);
}*/
/*****GET DATE*****/

$scope.settings = function(){

	var url = base_url + 'book/settings';
	    $http({
		    url: url,
		    method: "GET"
		   		    
	    }).then(function mySucces(response) {
	    	$scope.currency = response.data.currrency_symbol;
	    });

}
    $scope.getdate = function() {

    	 var url = base_url + 'book/getDate';
	    $http({
		    url: url,
		    method: "GET"		    
	    }).then(function mySucces(response) {
		    if(response.data.error == '') {
		     	var date_info = response.data.result;
		     	$scope.month = response.data.result.current;
		     	$scope.nextsDate = response.data.result.tomorrow;
		     	$scope.nextssDate = response.data.result.next_Date;

		     	var dd1 = $scope.month.split('-');
		  		$scope.day = dd1[2];

		  		var dd1 = $scope.nextsDate.split('-');
		  		$scope.nday = dd1[2];

		  		var dd1 = $scope.nextssDate.split('-');
		  		$scope.nday1 = dd1[2];
		    }		    
        });

        /*var nextDate = new Date();
        var dt = nextDate.toLocaleString();
        str = dt.split(',');
        var dd = str[0].split('/');
        $scope.day = dd[0];
        $scope.month = new Date();
        $scope.pmonth = nextDate;
        var nextDate1 = new Date();
        nextDate1.setDate(nextDate.getDate() + 1);
        $scope.nextsDate = nextDate1;
		  var dt1 = nextDate1.toLocaleString();
		  str1 = dt1.split(',');
		  var dd1 = str1[0].split('/');
		  $scope.nday = dd1[0];
		  var nextDate2 = new Date();
		  nextDate2.setDate(nextDate.getDate() + 2);
		  $scope.nextssDate = nextDate2;
		  var dt2 = nextDate2.toLocaleString();
		  str2 = dt2.split(',');
		  var dd2 = str2[0].split('/');
		  $scope.nday1 = dd2[0];*/
    }


 $rootScope.go_image_path = function(path){
    	return base_url+'admin/'+path;
    }

    
/*****GET THEATER DATA*****/
    $scope.getTheaterdata = function(id, date) {

    	$scope.select_date = date;


	    $scope.CurrentDate = date;
	    //var datem = $filter('date')(new Date(date), 'yyyy-MM-dd');
 
		$http.post(base_url + 'book/showTheater', {
		   'id': id,
		   'date': $scope.CurrentDate
		}).success(function(data, status, headers, config) {
              console.log(data);
			$scope.num_result = data.result.length;

		   $scope.show_theater = data.result;
		   $scope.show_filtertime = data.show_time;
		   $scope.show_filterprice = data.price_range;

		   console.log($scope.show_filtertime);
          
            /*if (data.error == '') {
		    	$scope.show_theater = data.result;
		    	$scope.show_filtertime = data.filter;
            } else {
			    $scope.error = [];
			    $scope.error.push(data.error);
            }*/
        }).error(function(data, status) { 
           $scope.error.push(status);
        });
    }

    $scope.call_Theaterdata = function(id){ 


    	$http.post(base_url + 'book/callTheater', {
		   'id': id,
		   'date': $scope.select_date,
		   'price':$scope.selected_price,
		   'time':$scope.selected_time
		}).success(function(data, status, headers, config) {

		   $scope.show_theater = data.result; 

		   console.log(data.result);
          
            
        }).error(function(data, status) { 
           $scope.error.push(status);
        });
    	

    }


   /* $scope.time_Theaterdata = function(id){   

    	$http.post(base_url + 'book/calltimeTheater', {
		   'id': id,
		   'date': $scope.select_date,
		   'time':$scope.selected_time
		}).success(function(data, status, headers, config) {

		   $scope.show_theater = data.result;		   

		   console.log(data.result);          
           
        }).error(function(data, status) { 
           $scope.error.push(status);
        });
    }*/

    $scope.get_seat_layout = function(id){

    	$('.booked').each(function() {
    		$(this).removeClass("booked"); // for example                                      
 		});
 		$('.way').each(function() {
    		$(this).removeClass("way"); // for example                                      
 		});
    	delete $scope.show_theater_info;
    	$scope.show_id = id;
    	$scope.seats = [];
    	$scope.price = 0;
    	delete $scope.show_theater_info;    	

    	$http.post(base_url + 'book/showTheaterInfo', {
		   'id': id		   
		}).success(function(data, status, headers, config) {

console.log(data);

		   $scope.show_theater_info = data.result;	
		   $scope.front_preview_rows = (data.result.preview!='') ? JSON.parse(data.result.preview) : data.result.preview;	   
    	   $scope.booked = data.booked;

    	   
    	   
    	   	$('.blk').removeAttr("disabled");


    	   $timeout(function() {
		     angular.forEach($scope.booked, function(value, key) {
          console.log($scope.booked);
          console.log(value.ticket);
		     	$('.'+value.ticket).removeClass("blk");
  				$('.'+value.ticket).addClass("booked");
  				$('#'+value.ticket).addClass("booked");
  				
			});
		     $('.booked').attr("disabled","true");
		    }, 1000);
    	   
    	   
    	   
    	   //$("p:first").addClass("intro");
    	})
	}

	$scope.selectSeat = function(seat_id,seat_name,price){
			$scope.price = 0;

			
			$('#someid').attr('name', 'value');

			var seat_array = {'seat_id':seat_id,'seat_name':seat_name,'price':price};

			var index = getIndexIfObjWithAttr($scope.seats,"seat_name",seat_name);

			if(index==-1){
				$scope.seats.push(seat_array);
				$('.'+seat_id).removeClass("blk");
				$('.'+seat_id).addClass("way");
			} else {
				$scope.seats.splice(index, 1);
				$('.'+seat_id).removeClass("way")
				$('.'+seat_id).addClass("blk");
			}	
			//console.log($rootScope.seats);

			angular.forEach($scope.seats, function(value, key) {
  				$scope.price +=  parseInt(value.price);
			});		

			console.log($scope.price);
			console.log($scope.seats);
	}

	var getIndexIfObjWithAttr = function(array,attr,value) {
	    for(var i = 0; i < array.length; i++) {
	        if(array[i][attr] === value) {
	            return i;
	        }
	    }
	    return -1;
	}
	$scope.hideModal=function(){
		$rootScope.modal_hide="modaldiv";
		$('#pickseat').modal('hide');
		
	}

	$scope.payment_process = function(){
		
			$scope.seats = JSON.stringify($scope.seats);
		
        var url = base_url + 'book/payment_form';
	    $http({
		    url: url,
		    method: "GET",
		    params: {
				     'show_id': $scope.show_id,
				     'seat': $scope.seats
		            }
	    }).then(function mySucces(response) {
		    if(response.data.error==''){
                console.log(response);
		    	$scope.payment_info = response.data.result;	
		    	$scope.amount = $scope.payment_info.price;
		    }
		    
        });


    

	}

	$(".modal").on("hidden.bs.modal", function(){
    	//$window.location.reload();
	});


	/*$scope.user = {
                    credit_card: {
                         minlength: 13,
                         maxlength: 19
                    },
                    credit_month: {
                         minlength: 2,
                         maxlength: 2
                    },
                    credit_year: {
                         minlength: 2,
                         maxlength: 2
                    },
                    credit_cvv:{
                    	minlength: 3,
                        maxlength: 4
                    }
               }*/

               $scope.user = {
                    card_no: {
                         minlength: 13,
                         maxlength: 19
                    },
                    card_month: {
                         minlength: 2,
                         maxlength: 2
                    },
                    card_year: {
                         minlength: 2,
                         maxlength: 2
                    },
                    card_cvv: {
                         minlength: 3,
                         maxlength: 4
                    }
               }

               $scope.pay_submit = function(){

               	$scope.total_amount = document.getElementById("total").innerHTML;
               //	alert($scope.total_amount);
                $scope.c =  $('#code').val();
                //alert($scope.c);
                $scope.b =  document.getElementById('user_id').getAttribute('value');
              
                if($scope.c != ''){
                  var post_data = {'user_id':$scope.b,'promocode':$scope.c,'amount':$scope.total_amount};
               $http.post(base_url + 'book/check_promocode', {
					   'post_data': post_data
					}).success(function(data) {
					
							});
				}
               	if($scope.payment=='card'){               		

               		if($scope.card_no==undefined || $scope.card_name==undefined || $scope.card_month==undefined || $scope.card_year==undefined || $scope.card_cvv==undefined){
               			$scope.error_message = "Please fill all fields";               			
               			return false;
               		}

               		
       /*     if($scope.c != ''){
              var post_data = {'payment':$scope.payment,'card_no':$scope.card_no,'card_name':$scope.card_name,'card_month':$scope.card_month,'card_year':$scope.card_year,'card_cvv':$scope.card_cvv,'amount':$scope.total_amount,'promocode':$scope.c};
            }else{*/
               		var post_data = {'payment':$scope.payment,'card_no':$scope.card_no,'card_name':$scope.card_name,'card_month':$scope.card_month,'card_year':$scope.card_year,'card_cvv':$scope.card_cvv,'amount':$scope.total_amount};
               	   /*}*/ 
	               	$http.post(base_url + 'book/payment_process', {
					   'post_data': post_data
					}).success(function(data) {
						console.log(data);
						if(data.status==false){
							$scope.error_message = data.error
						} else {
							window.location.href = site_url+'book/success_page/'+data.insert_id;
						}				   
			        }).error(function(data) { 
			           console.log(data);
			        });
    }  else if($scope.payment=='paypal') {
               		//alert(site_url+'book/paypal_payment/50');
               		window.location.href = site_url+'book/paypal_payment/'+$scope.total_amount;
               	} else{
               		var post_data = {'payment':$scope.payment,'amount':$scope.total_amount};
               		console.log(post_data);
               			$http.post(base_url + 'book/payment_process', {
					   'post_data': post_data
					}).success(function(data) {
               		window.location.href = site_url+'book/success_page/'+data.insert_id;
               	});
       }
               	

            		//$scope.payment;
        		
               }


               $('.tb-show-right-head').on('click',function(){               		
               	    $('#payment_sec').css('display','block');
               	    $('.tb-show-right-content-wrap').collapse('hide');
               })

               $('#paypal_sec').on('click',function(){
               		$('#card1').collapse('hide');
               })

               $('#cashdelivery1').on('click',function(){
               	    $('#card1').collapse('hide');
               })

               
    


}]);
