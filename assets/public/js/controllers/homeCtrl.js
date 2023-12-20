App.controller('imageCtrl', ['$scope','$http','$rootScope','$timeout', function($scope,$http,$rootScope, $timeout) {	
	console.log('loaded');
	console.log($rootScope.myData);
	console.log('working');
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

    $rootScope.go_image_path = function(path){
    	return base_url+'admin/'+path;
    }
	
}]);

/* SEARCH
########################################################
--------------------------------------------------------*/ 
App.controller('searchCtrl', ['$scope','$http','$rootScope','$timeout', function($scope,$http,$rootScope, $timeout) {
 console.log('loadedsearch');
	console.log($rootScope.myData);
	console.log('workingsearch');
/******* GET MOVIES*******/

    $scope.data = {};
    $scope.searchMovies = function() {
        if($scope.data.search!=''){
        	$scope.loader = true;
	        var url = base_url + 'home/searchmovieList';
			$http({
			    url: url,
			    params: {
			           'table_name': 'tbz_chinema',
			    		'city': $scope.data.search
			            },
			    method: "GET",
			}).then(function mySucces(response) {
			    $scope.movie_names = response.data;
			    $timeout(function() {
			     $scope.loader = false;
			    }, 1000);
	        });
        } else {
        	$scope.movie_names = {};
        }
        
    }

        $rootScope.go_image_path = function(path){
    	return base_url+'admin/'+path;
    }

/******* GET SINGLE  MOVIE *******/

    $scope.selectMovies = function(movieid) {
       
        window.location = base_url + "home/singleMovie/" + movieid;
    }

}]);

/* TOP TRENDING
########################################################
--------------------------------------------------------*/ 
App.controller('toptrendingCtrl', ['$scope','$http','$rootScope','$timeout', function($scope,$http,$rootScope, $timeout) {

    $scope.loader = true;
    var url = base_url + 'home/topTrending';
		
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

}]);

	
/* SEARCH CITY
########################################################
--------------------------------------------------------*/ 
App.controller('cityCtrl', ['$scope','$http','$rootScope','$timeout', function($scope,$http,$rootScope, $timeout) {
 console.log('loadedkochi');
	console.log($rootScope.myData);
	console.log('workingkochi');

$scope.userData = JSON.parse(localStorage.getItem('userdata'));	
console.log($scope.userData);
/* CITY 
########################################################
--------------------------------------------------------*/   
    $scope.datas = {};
	$scope.getcity = function() {

		var url = base_url + 'home/getcity';
		$http({
			url: url,
			params: {
					 'table_name': 'tbz_location',
					 'location': $scope.datas.search
			        },
			method: "GET",
		}).then(function mySucces(response) {
			$scope.cities_name = response.data;
			$timeout(function() {
				$scope.loader = false;
			}, 1000);
		});
	}

	    $rootScope.go_image_path = function(path){
    	return base_url+'admin/'+path;
    }

/* CITY BASED MOVIE
########################################################
--------------------------------------------------------*/
	$scope.cityBasedMovie = function(id) {
  		
  		$scope.loader = true;
  		var url = base_url + 'home/cityBasedMovie';
 
			$http({
				url: url,
				method: "GET",
				params: {
				    'data': id,
				    'table_name': 'tbz_show_details'
			    },
			}).then(function mySucces(response) {
			   $('#tb-selectcity').hide();
			   window.location = base_url + 'allmovie';
			});
    }

}]);

/* TRAILERS
########################################################
--------------------------------------------------------*/
App.controller('trailerCtrl', ['$scope','$http','$rootScope','$timeout', function($scope,$http,$rootScope, $timeout) {


/******* GET TRAILERS-now showing*******/
    $scope.message1=false;
    $scope.trailerMoviews = function() {
		
		$scope.loader = true;
		var url = base_url + 'home/getTrailerNowshowing';
        $http({
			   url: url,
			   method: "GET",
			   params: {
			    'table_name': 'tbz_show_details'
			   }
        }).then(function mySucces(response) {
        	console.log(response);
        	if(response.data.length==0){
        		//$('.nrslt').show();
                $scope.message1=true;
			}else{
				$scope.message1=false;
	            $scope.trailermovie = response.data;
			    $timeout(function() {
			      $scope.loader = false;
			    }, 1000);
			}    
        });
    }

    $rootScope.go_image_path = function(path){
    	return base_url+'admin/'+path;
    }

/******* GET TRAILERS-coming soon*******/
    $scope.message1=false;
    $scope.trailerCommingsoon = function(id) {
        $scope.loader = true;
        var url = base_url + 'home/getTrailerCommingsoon';
  
		$http({
			   url: url,
			   method: "GET",
			   params: {'table_name': 'tbz_movies'}
		}).then(function mySucces(response) {
           	console.log(response);
			if(response.data.length==0){
                $scope.message1=true;
			}else{
				$scope.message1=false;
	            $scope.trailercommingsoon = response.data;
			    $timeout(function() {
			     $scope.loader = false;
			    }, 1000);
			}    
        });
    }

/******* GET TRAILERS videos and Language Filter*******/		
 $scope.loader = true;
 var url = base_url + 'home/includelanguages';
 //alert(url);
 $http({
  url: url,
  method: "GET",
  params: {
   'table_name': 'tbz_movies'
  }
 }).then(function mySucces(response) {
  $scope.trailer_languages = response.data;
  //alert(JSON.stringify($scope.trailer_languages));
  if (response.data.status == true) {
   new TabbedNotification({
    title: 'Success Notification',
    text: response.data.msg,
    type: 'success',
    sound: false
   });
   $scope.get_screen($scope.get_screen_var);

  }
  $timeout(function() {
   $scope.loader = false;
  }, 1000);
 });


 $scope.languageIncludes = [];

 $scope.includelanguages = function(language) {
  var i = $.inArray(language, $scope.languageIncludes);
  console.log(language);
  console.log($scope.languageIncludes);
  if (i > -1) {
   $scope.languageIncludes.splice(i, 1);
  } else {
   $scope.languageIncludes.push(language);
  }
 }

 $scope.languagemovieFilter = function(cinemas) {
  if ($scope.languageIncludes.length > 0) {
   if ($.inArray(cinemas.language, $scope.languageIncludes) < 0)
    return;
  }

  return cinemas;
 }



}]);