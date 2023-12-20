
/* SINGLE MOVIE DETAILS
########################################################
--------------------------------------------------------*/ 

App.filter('director_filter', function() {
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
});

App.filter('htmlToPlaintext', function() {
  //return function(input) {
  	return function(text) {
      return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
    };
     

});


angular.module('App.filters', []).
  filter('htmlToPlaintext', function() {
    return function(text) {
      return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
    };
  }
);
App.controller('singlemovieCtrl', ['$scope','$http','$rootScope','$timeout', function($scope,$http,$rootScope, $timeout) {
 
/******* GET MOVIES DETAILS*******/

	$scope.loader = true;
	$scope.movieDetails = function(movieid) {
	  
	    var url = base_url + 'movie/getmovieDetails';
		$http({
			   url: url,
			   method: "GET",
			   params: {
					   'table_name': 'tbz_movies',
					    'id': movieid
			           }
		}).then(function mySucces(response) {
			console.log(response);
		   $scope.moviedetailsssss = response.data;
		   $scope.director = response.data.cast;

		   //console.log($scope.director);
    angular.forEach($scope.director, function(value, key) {
    //alert(JSON.stringify(value));
        if(value.role=='Director'){
        $scope.directors = value.actor_name;
        }
            
        });
		   $scope.on = parseInt($scope.moviedetailsssss.rateavg);
		   $scope.off = 5 - parseInt($scope.moviedetailsssss.rateavg);
		   $timeout(function() {
		    $scope.loader = false;
		   }, 1000);
        });
    }
	
	$scope.get_theatre_details = function(id,date){

			$scope.select_date = date;


	    $scope.CurrentDate = date;
	    //var datem = $filter('date')(new Date(date), 'yyyy-MM-dd');
 
		$http.post(base_url + 'movie/showTheater', {
		   'id': id,
		   'date': $scope.CurrentDate
		}).success(function(response) {
			
             $scope.movie_details = response.data;
             $scope.next_date = response.data.nextdate;


        });
    }

	
	$scope.loader = true;
	$scope.movieDetails_comming = function(movieid) {
	    var url = base_url + 'movie/Details_comming';
		$http({
			   url: url,
			   method: "GET",
			   params: {
					   'table_name': 'tbz_movies',
					    'id': movieid
			           }
		}).then(function mySucces(response) {
			console.log(response);
		   $scope.moviedetailsssss = response.data;
		   $scope.on = parseInt($scope.moviedetailsssss.rateavg);
		   $scope.off = 5 - parseInt($scope.moviedetailsssss.rateavg);
		   $timeout(function() {
		    $scope.loader = false;
		   }, 1000);
        });
    }

/******* DECLARE RATING ARRAY*******/
    $scope.counter = Array;

/******* GET REVIEWS *******/

    $scope.getreviews = function(id) {

	    var url = base_url + 'movie/reviewDetails';
	    $http({
		    url: url,
		    method: "GET",
		    params: {
				    'table_name': 'tbz_show_details',
				    'id': id
		            }
	    }).then(function mySucces(response) {
	    	//console.log(response);
            if(response.data != null) {
               $scope.reviewss = response.data;
    
            }
        });
    }

/******* GET GALLERY *******/    
    $scope.glry=function(id){

		$scope.loader = true;
		var url = base_url + 'movie/galleryDetails';
		
		$http({
			  url: url,
			  method: "GET",
			  params: {
					   'table_name': 'tbz_movies',
					   'id': id
			           }
		}).then(function mySucces(response) {
        $rootScope.gallery_view = response.data;
			$timeout(function() {
			   $scope.loader = false;
			}, 1000);
        });
    }

/******* PEOPLE VIEWED MOVIES *******/ 
    $scope.peopleViewed = function(id) {


		var url = base_url + 'movie/peopleViewedmovies';
		  
		$http({
		   url: url,
		   method: "GET",
		   params: {
				    'table_name': 'tbz_movies',
				    'id': id
		            }
		}).then(function mySucces(response) {
			//console.log(response);
            $scope.peopleMovies = response.data;
		    $timeout(function() {
			    $("#tb-prf-slider").lightSlider({
				    loop:true,
					pauseOnHover: true,
					auto:true,
					item:4,
				    keyPress:true
		
		        });
		    }, 1000);
        });
    } 

/******* LEAD CAST *******/ 
    $scope.leadCast = function(id) {
  
	    var url = base_url + 'movie/leadCast';
		$http({
			   url: url,
			   method: "GET",
			   params: {
			    'table_name': 'tbz_movies',
			    'id': id
			   }
		}).then(function mySucces(response) {
			console.log(response);
            $scope.leadcast = response.data;
		    $timeout(function() {
			    $("#leadcast-slider-ul").lightSlider({
				    loop:true,
					item:5,
					auto:true,
					 pauseOnHover: true,
				    keyPress:true
					
				});
		    }, 1000);
		});
    } 


    $scope.leadCrew = function(id){
    	 var url = base_url + 'movie/leadCrew';
		$http({
			   url: url,
			   method: "GET",
			   params: {
			    'table_name': 'tbz_movies',
			    'id': id
			   }
		}).then(function mySucces(response) {
			//console.log(response);
            $scope.leadcrew = response.data;
            	    $timeout(function() {
			    $("#leadcrew-slider-ul").lightSlider({
				    loop:true,
					item:5,
					auto:true,
					 pauseOnHover: true,
				    keyPress:true
					
				});
		    }, 1000);
        });
    }

     $rootScope.go_image_path = function(path){
    	return base_url+'admin/'+path;
    }
/******* REVIEWS *******/ 

         $scope.getratingvalues = function(id) {

		  var url = base_url + 'ticketbazzar_movies/viewrating_details';
		  $http({
		   url: url,
		   method: "GET",
		   params: {
			'table_name': 'tbz_show_details',
			'id': id
		   }
		  }).then(function mySucces(response) {
		   if (response.data != null) {
			$scope.reviewss = response.data;
		   }
          });

         }


         $scope.actors_details = function(id){
         	 var url = base_url + 'movie/actorDetails';
		  $http({
		   url: url,
		   method: "GET",
		   params: {
			'table_name': 'tbz_actors',
			'id': id
		   }
		  }).then(function mySucces(response) {
		   if (response.data != null) {
			$scope.actors = response.data;
		   }
          });


         };

App.filter('split', function() {
    return function(input, delimiter) {
      var delimiter = delimiter || ',';

      return input.split(delimiter);
    } 
});		 

}]);

