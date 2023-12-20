/* ALL MOVIE DETAILS
########################################################
--------------------------------------------------------*/ 

App.run(function ($rootScope,$http) {
    //alert("run");
    $rootScope.sign_data = null;
    var promise = $http.get(base_url + 'Login/session_check');

	promise.then(function(response) {
		//console.log(response);
		//alert(response.data.status);
    		if(response.data.status=='success'){
    			//alert('sdasdasd');
	    		$rootScope.sign_data = response.data.result;
	    		//console.log("sadasdasdasd"+$rootScope.sign_data);
	    	}
	    	//alert(JSON.stringify($rootScope.sign_data));
  	});
});
App.controller('allmovieCtrl', ['$scope','$http','$rootScope','$timeout','$q', function($scope,$http,$rootScope, $timeout,$q) {
 // alert($rootScope.sign_data);
//console.log($rootScope.sign_data);
/*if($rootScope.sign_data==null){

	var promise = $http.get(base_url + 'Login/session_check');

	promise.then(function(response) {
		console.log(response);
		alert(response.data.status);
    		if(response.data.status=='success'){
    			alert('sdasdasd');
	    		$rootScope.sign_data = response.data.result;
	    		console.log("sadasdasdasd"+$rootScope.sign_data);
	    	}
  	});
	
	//var defer = $q.defer()
		/*$http({
		       url: base_url + 'Login/session_check',
		       method: "GET",
	    }).then(function mySucces(response) {
	    	if(response.status=='success'){
	    		$rootScope.sign_data = response.result;
	    		console.log("sadasdasdasd"+$rootScope.sign_data);
	    	}
	    	//defer.resolve();

	    	
            
        });*/
        
//}
//alert($rootScope.sign_data);

//console.log('adadasdasdasd'+$rootScope.sign_data);

/*****All MOVIES GET*****/
   $scope.message=false;
    $scope.getAllmovies = function() {
        
        $scope.loader = true;
        var url = base_url + 'allmovie/allmovies';
  
	    $http({
		       url: url,
		       method: "GET",
		       params:{
				       'table_name':'tbz_show_details'
				      
		              },
	    }).then(function mySucces(response) {
	    	console.log(response);
            if(response.data.result.length==0){
              $scope.message=true;
            }else{
	    	$scope.message=false;
	    	$('#nores').hide();
            $scope.cinemas = response.data.result;
            //console.log($scope.cinemas);
			   var pagesShown = 1;
			   var pageSize = 6;

			   $scope.paginationLimit = function(data) {
			    return pageSize * pagesShown;
			   };
			   $scope.hasMoreItemsToShow = function() {
			    return pagesShown < ($scope.cinemas.length / pageSize);
			   };
			   $scope.showMoreItems = function() {
			    pagesShown = pagesShown + 1;
			   };
            }
        });
    }
 $rootScope.go_image_path = function(path){
    	return base_url+'admin/'+path;
    }
$scope.getImages = function(){
	
	 $scope.loader = true;
        var url = base_url + 'allmovie/getimage';
  
	    $http({
		       url: url,
		       method: "GET",
		         params:{
				       'table_name':'tbz_banners',
		              },
	    }).then(function mySucces(response) {
	    	$scope.banner_images = response.data;
	    	//console.log($scope.banner_images);

	    });

}

/*****FILTER-language*****/

    $scope.loader = true;
    var url = base_url + 'allmovie/languagFilter';
 
	$http({
		  url: url,
		  method: "GET",
		  params: {
		   'table_name': 'tbz_movies'
		  }
	}).then(function mySucces(response) {
	    $scope.languages = response.data;
		$timeout(function() {
		   $scope.loader = false;
		}, 1000);
    });

    $scope.languageFilter = [];
    $scope.langFIlter = function(language) {
		 
		var i = $.inArray(language, $scope.languageFilter);
		if(i > -1) {
		   $scope.languageFilter.splice(i, 1);
		} else {
		   $scope.languageFilter.push(language);
		}
    }
    $scope.languageFIltering = function(cinemas) {
	    if ($scope.languageFilter.length > 0) {
		    if ($.inArray(cinemas.language, $scope.languageFilter) < 0)
		     return;
	    }
	    return cinemas;
    }

    $scope.genereFiltering = function(cinemas) {
	    if ($scope.genereIncludes.length > 0) {
	    	var str = cinemas.tag_id;
	  		var a = str.split(',');
	  		var done = 0;	
            
	    	$.each($scope.genereIncludes,function(index,value){
	    	
	    		var rs = $.inArray(value, a);
	    		
	    		if(rs>=0){
	    			
	    			done = 1;
	    		} 
	    	})

	    	if(done==1){
	    		return cinemas;
	    	}
	    } else {
	    	return cinemas;
	    }
	    
    }

/*****FILTER-genere*****/

    $scope.loader = true;
    var url = base_url + 'allmovie/genereFilter';
 
	$http({
		  url: url,
		  method: "GET",
		  params: {'table_name': 'tbz_movies'}
	}).then(function mySucces(response) {
        $rootScope.genere = response.data;
		$timeout(function() {
		  $scope.loader = false;
		  }, 1000);
	});

	$scope.genereIncludes = [];
	$scope.includeGenere = function(tagid) {
		//console.log(tagid);
	    var i = $.inArray(tagid, $scope.genereIncludes);
		if (i > -1) {
		   $scope.genereIncludes.splice(i, 1);
		} else {
		   $scope.genereIncludes.push(tagid);
		}
	}
   
    /*$scope.genereFiltering = function(cinemas) {
    	/*console.log($scope.genereIncludes);
    	console.log(cinemas.tag_id);
    	console.log($.inArray(cinemas.tag_id, $scope.genereIncludes));*/
    	
    	//alert(JSON.stringify($scope.genereIncludes,null,4));
    	//alert(JSON.stringify(cinemas.tag_id,null,4));
    	// console.log();
	  /*if ($scope.genereIncludes.length > 0) {
	  	var str =cinemas.tag_id;
	  	var a = str.split(',');
	  	$.each(a,function(index,value){
	  		//console.log(value);
	  		//console.log($scope.genereIncludes);
	  		//console.log($.inArray(value,$scope.genereIncludes);
          if ($.inArray(value,$scope.genereIncludes) < 0){
	    return false;
	    }
	    else{
	    	 return cinemas;
	    }
	  	});
	   /*if ($.inArray($scope.genereIncludes,cinemas.tag_id) < 0)
	    return;*/
	 /* }
	  return cinemas;
    }*/

/*****FILTER-format*****/

	$scope.loader = true;
	var url = base_url + 'allmovie/formatFilter';
 
		$http({
			  url: url,
			  method: "GET",
			  params: {'table_name': 'tbz_movies'}
        }).then(function mySucces(response) {
        	//console.log(response);
            $scope.formats = response.data;
           // console.log($scope.formats);
		$timeout(function() {
		   $scope.loader = false;
		  }, 1000);
		});

    $scope.formatIncludes = [];
	$scope.includeFormat = function(format) {
		var i = $.inArray(format, $scope.formatIncludes);
		if (i > -1) {
		   $scope.formatIncludes.splice(i, 1);
		} else {
		   $scope.formatIncludes.push(format);
		}
	}

	$scope.formatFiltering = function(cinemas) {
		//console.log($scope.formatIncludes);
		//console.log( $scope.formatIncludes);
		//console.log(cinemas.format_id);
		if ($scope.formatIncludes.length > 0) {
		   if ($.inArray(cinemas.format_id, $scope.formatIncludes) < 0)
		   return;
		}
	    return cinemas;
	}

/*****TOP MOVIE DETAILS*****/

    $scope.loader = true;
    var url = base_url + 'allmovie/topmovieDetails';

	    $http({
			  url: url,
			  method: "GET",
			  params: {'table_name': 'tbz_movies'}
		}).then(function mySucces(response) {
	        $scope.topmovies = response.data;
			$timeout(function() {
			   $scope.loader = false;
			}, 1000);
		});


/*****TOP REVIEWS *****/

    $scope.loader = true;
    $rootScope.reviews = {};
    var url = base_url + 'allmovie/topreviewDetails';
 
		$http({
			  url: url,
			  method: "GET",
			  params: {'table_name': 'tbz_reviews'}
		}).then(function mySucces(response) {
			//console.log(response);
			$scope.topreviews = response.data;
			$rootScope.reviews = JSON.stringify(response.data[0].rate);
		    var pagesShwn = 1;
		    var pageSiz = 5;
			   $scope.paginationLimitReview = function(data) {
			    return pageSiz * pagesShwn;
			   };
			   $scope.MoreItemsToShow = function() {
			    return pagesShwn < ($scope.topreviews.length / pageSiz);
			   };
			   $scope.showMoreReviews = function() {
			    pagesShwn = pagesShwn + 1;
			   };
			$timeout(function() {
			   $scope.loader = false;
			}, 1000);

        });

/*****COMING SOON *****/
        $scope.message=false;        
		$scope.coming_soon = function() {
		   $scope.loader = true;
		   var url = base_url + "allmovie/comingMovies";
			$http({
				   url: url,
				   method: "GET",
				   params: {'table_name': 'tbz_movies'}
			}).then(function mySucces(response) {
				console.log(response);

				if(response.data.length==0){
                    $scope.message=true;
                    $('#cmng').hide();
				}else{
					$scope.message=false;
	                $scope.commingsooncinemas = response.data;
					
					var txt = "";
					angular.forEach($scope.commingsooncinemas, function(value) {
					    txt += '<img src=' + base_url + value.image + '>';
					});
	                $("#slider").html(txt);
					   $('#slider').cycle({
					    fx: 'scrollHorz',
					    next: '#next',
					    prev: '#prev',
					    timeout: 1000,
					    pause: 1
					   });
			    }		   
			    $timeout(function() {
			      $scope.loader = false;
			    }, 1000);
			});
        }
		
		$scope.film_id = 0;

		$(".modal").on("hidden.bs.modal", function(){
    		//alert($('input[name="score"]').val())    	  	
		});
      $scope.ShowHide = function (id,movie_name,starVal) {

		  //alert(id);
		  	$scope.film_id = id;
			   $scope.id = id;
			   $scope.movie = movie_name;
			   $scope.counter = Array;
			   $scope.srate = parseInt(starVal);
				//alert($scope.movie);
				//alert($scope.srate);
			$scope.srateoff = parseInt(5 - starVal);			   
			// $scope.rating();
    };
		
		
		$scope.save_rate = function(id){
          //alert(JSON.stringify($rootScope.sign_data));
            
            $scope.srate=$('input[name="score"]').val() ;
			 // if ($('#frm_signupr').parsley().validate() ) {
			//var data = { 'id': $scope.id, 'rate': $scope.srate ,'title': $scope.title,'details': $scope.details,'user_id':id }; 
			$scope.userData = JSON.parse(localStorage.getItem('userData'));	
// 			var data = { 'id': $scope.id, 'user_id':$rootScope.sign_data.id, 'comments':$scope.title, 'details': $scope.details, 'rate': $scope.srate }; 
	var data = { 'id': $scope.id, 'user_id':$scope.userData.id, 'comments':$scope.title, 'details': $scope.details, 'rate': $scope.srate }; 
			//console.log(data);
			var jdata = JSON.stringify(data);
			$http.post(base_url+ "allmovie/rate_movie", jdata )
			.success(function(data, status, headers, config) {
					//console.log(data);
					    $scope.msg=data.msg;
                        $scope.msgs = [];
                        $scope.msgs.push(data.msg);
                    });
			
		};
		$scope.check_login=function(){
			
			//$('#tb-ratting').modal('hide');
			$('#signin').modal('show');
		}
        
$scope.rating = 0;
		     $scope.ratings = [{
		     max: 5
		    }];		 



              /*****FILTER-language*****/

    $scope.loader = true;
    var url = base_url + 'allmovie/languagFiltersval';
 
	$http({
		  url: url,
		  method: "GET",
		  params: {
		   'table_name': 'tbz_movies'
		  }
	}).then(function mySucces(response) {
	    $scope.languagesval = response.data;
	   // console.log($scope.languagesval);
		//alert(JSON.stringify($scope.languagesval));
		$timeout(function() {
		   $scope.loader = false;
		}, 1000);
    });

    $scope.languageFilterval = [];
    $scope.langFIltersvlaues = function(language) {
		 
		var i = $.inArray(language, $scope.languageFilterval);
		if(i > -1) {
		   $scope.languageFilterval.splice(i, 1);
		} else {
		   $scope.languageFilterval.push(language);
		}
    }
    $scope.languageFIlteringval = function(cinemas) {
  //   	console.log($scope.languageFilterval);
		// console.log(cinemas.language);
	    if ($scope.languageFilterval.length > 0) {
		    if ($.inArray(cinemas.language, $scope.languageFilterval) < 0)
		     return;
	    }
	    return cinemas;
    }


/*****FILTER-genere*****/

    $scope.loader = true;
    var url = base_url + 'allmovie/genereFilterval';
 
	$http({
		  url: url,
		  method: "GET",
		  params: {'table_name': 'tbz_movies'}
	}).then(function mySucces(response) {
        $rootScope.genereval = response.data;
		$timeout(function() {
		  $scope.loader = false;
		  }, 1000);
	});

	$scope.genereIncludesval = [];
	$scope.includeGenereval = function(tagid) {
	    var i = $.inArray(tagid, $scope.genereIncludesval);
		if (i > -1) {
		   $scope.genereIncludesval.splice(i, 1);
		} else {
		   $scope.genereIncludesval.push(tagid);
		}
	}
   
    $scope.genereFilteringval = function(cinemas) {
	  if ($scope.genereIncludesval.length > 0) {
	   if ($.inArray(cinemas.tag_id, $scope.genereIncludesval) < 0)
	    return;
	  }
	  return cinemas;
    }
	
	
/*****FILTER-format*****/

	$scope.loader = true;
	var url = base_url + 'allmovie/formatFiltervalues';
 
		$http({
			  url: url,
			  method: "GET",
			  params: {'table_name': 'tbz_movies'}
        }).then(function mySucces(response) {
            $scope.formatsval = response.data;
		$timeout(function() {
		   $scope.loader = false;
		  }, 1000);
		});

    $scope.formatIncludesval = [];
	$scope.includeFormatval = function(format) {
		var i = $.inArray(format, $scope.formatIncludesval);
		if (i > -1) {
		   $scope.formatIncludesval.splice(i, 1);
		} else {
		   $scope.formatIncludesval.push(format);
		}
	}

	$scope.formatFilteringval = function(cinemas) {
		
		if ($scope.formatIncludesval.length > 0) {
		   if ($.inArray(cinemas.format, $scope.formatIncludesval) < 0)
		   return;
		}
	    return cinemas;
	}

	


}]);

App.filter('split', function() {
    return function(input, delimiter) {
      var delimiter = delimiter || ',';

      return input.split(delimiter);
    } 
});
