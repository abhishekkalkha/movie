/* ALL MOVIE DETAILS
########################################################
--------------------------------------------------------*/ 

App.controller('bookedmovieCtrl', ['$scope','$http','$rootScope','$timeout', function($scope,$http,$rootScope, $timeout) {
  
/*****BOOKED MOVIES GET*****/

	  
	    $scope.booking_values = function() {
        $scope.loader = true;
        var url = base_url + 'myaccount/getbookedmovie';
  
	    $http({
		       url: url,
		       method: "GET",
		        params: {
			   'table_name': 'tbz_booking_details'
			  },
	    }).then(function mySucces(response) {
             $scope.bookedvalues = response.data;
			 //alert(JSON.stringify(response.data));
			  $timeout(function() {
			   $scope.loader = false;
			  }, 1000);
        });
    }
	
	    $scope.AddNumbers = function() {
            var a = Number($scope.a || 0);
            var b = Number($scope.b || 0);
            $scope.sum = a+b;
        }

         $rootScope.go_image_path = function(path){
    	return base_url+'admin/'+path;
    }
		
/*****EDIT TO UPDATE PROFILE*****/		
		$scope.editprofiles = function(id) {
			//alert(id);
        $scope.loader = true;
        var url = base_url + 'myaccount/getprofiles';
  
	    $http({
		       url: url,
		       method: "GET",
		        params: {
			   'table_name': 'tbz_booking_details',
			   'id': id
			  },
	    }).then(function mySucces(response) {
             //$scope.email = response.data;
             /*$scope.result = response.data;
			 $scope.gender = $scope.result[0].gender;
			 $scope.married_status = $scope.result[0].married_status;*/
			 
			 
             $scope.result = response.data;
			 $scope.screen_edit_form_submitteds = $scope.result[0].first_name;
			 $scope.screen_edit_form_submitteds = $scope.result[0].last_name;
			 $scope.screen_edit_form_submitteds = $scope.result[0].phone;
			 $scope.screen_edit_form_submitteds = $scope.result[0].email;
			 $scope.screen_edit_form_submitteds = $scope.result[0].gender;
			 $scope.married_status = $scope.result[0].married_status;
			 
			/* var date = $scope.result[0].date_of_birth;

             $scope.a = date.split("-");
             $scope.b = date.split("-");
             $scope.c = date.split("-");*/
			 //console.log($scope.a[0]);
			 
			 //alert(JSON.stringify(response.data));
			  $timeout(function() {
			   $scope.loader = false;
			  }, 1000);
        });
    }
	
/*****CHANGE PASSWORD*****/		
	
	$scope.changepass = function(id) {
			alert(id);
        $scope.loader = true;
        var url = base_url + 'myaccount/getprofiles';
  
	    $http({
		       url: url,
		       method: "GET",
		        params: {
			   'table_name': 'tbz_booking_details',
			   'id': id
			  },
	    }).then(function mySucces(response) {
            
			 
			 //alert(JSON.stringify(response.data));
			  $timeout(function() {
			   $scope.loader = false;
			  }, 1000);
        });
    }
	
	
}]);
