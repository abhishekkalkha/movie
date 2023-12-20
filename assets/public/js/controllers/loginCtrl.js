var App = angular.module("myapp", []);

App.run(function($rootScope) {
   console.log('asdasdsadsa');
            var user = JSON.parse(localStorage.getItem('userData'));            

            if(user) {

                $rootScope.logged_user = user;

            }
        console.log(user);
})
/* SIGN IN
########################################################
--------------------------------------------------------*/ 
App.controller('signinCtrl', ['$scope','$http','$rootScope','$timeout', function($scope,$http,$rootScope,$timeout) {

//



$scope.signin = function() {

	


	if ($('#frm_signin').parsley().validate()) {
	    post_data = {
				    'email': $scope.email,
				    'password': $scope.password
	                };

	    $http({
			method: 'POST',
			url: base_url + 'login/signin',
			data: post_data,
			headers: {
			     'Content-Type': 'application/x-www-form-urlencoded'
			}
	    }).success(function(data) {	
			var result = data[0].result;
			if(data[0].status == 'success') {
				var user_data = {
                                "id": result.id,
                                "first_name":result.first_name,
                                "last_name": result.last_name,
                                "email": result.email,
                                "image": result.image,
                                "status":data[0].status
                                }; 

               
                 localStorage.setItem('userData', JSON.stringify(user_data)); 
 $rootScope.userData = JSON.parse(localStorage.getItem('userData'));
 $rootScope.logged_user = JSON.parse(localStorage.getItem('userData'));
                  $rootScope.sign_data = user_data;     
                  console.log($rootScope.sign_data);  
                  console.log("whenLogged:"+$rootScope.myData);

                  //alert($rootScope.modal_hide);     
		  
				if($rootScope.modal_hide=="modaldiv"){
					
					$('#pickseat').modal('show');					
				}
				$('#signin').hide();
				$scope.loader = false;
			} else {

			    $scope.message = "Unknown Credential!!";
			}
	    });
    }
}


$scope.get_user_data = function(){
	$http({
			method: 'POST',
			url: base_url + 'login/get_user_info',
			headers: {
			     'Content-Type': 'application/x-www-form-urlencoded'
			}
	    }).success(function(data) {	
	    		if(data.id!=undefined){
	    			var result = data;			
					var user_data = {
                                "id": result.id,
                                "first_name":result.first_name,
                                "last_name": result.last_name,
                                "email": result.email,
                                "image": result.image,
                                "status":data.status
                                }; 
 $rootScope.userData = JSON.parse(localStorage.getItem('userData'));
  $rootScope.logged_user = JSON.parse(localStorage.getItem('userData'));
	    		}
	    		
	    	
	    	
			       

	    });                               
}

$scope.logout = function(){
	 localStorage.removeItem('userData');
}
/*$scope.get_user_data = function(){
	alert('sdsfsdf');
	var user_data = {
                                "id": '41',
                                "first_name":'Immanual',
                                "last_name": 'John',
                                "email": 'immanu@gmail.com',
                                "image": 'assets/admin/img/uploads/1461235253_1-frank.jpg',
                                "status":'success'
                                };
	localStorage.setItem('userdata', JSON.stringify(user_data));
	$scope.userData = JSON.parse(localStorage.getItem('userdata'));	
	console.log($scope.userData);
}*/




}]);



/* SIGN UP
########################################################
--------------------------------------------------------*/ 
App.controller('signupCtrl', ['$scope','$http','$rootScope','$timeout', function($scope,$http,$rootScope, $timeout) {
$scope.sign_up_error = false;
$scope.signup = function() {

    if ($('#frm_signup').parsley().validate()) {
	
	    post_data = {
			
				    'email': $scope.email,
				    'password': $scope.password,
				    'first_name': $scope.first_name,
				    'last_name': $scope.last_name,
				    'phone': $scope.phone,
				    'image': $scope.image,
				    'id': $scope.id
					
	                };

        $http({
		    method: 'POST',
		    url: base_url + 'login/signup',
		    data: post_data, 
		    headers: {
		     'Content-Type': 'application/x-www-form-urlencoded'
		    }
		}).success(function(data) {
		    if (data.status == 'success') {

			    $scope.statuss = data.status;
			    $scope.sign_up_error = true;
              $scope.sign_up_error_msg = data.message;
               $timeout(function(){
                  $scope.sign_in_error = false;
                   },10000);
				
			    //location.reload();
                //window.location = "home";
                location.reload();
				 window.location = base_url ;

		    } else {
		        $scope.message = data.message;
		    }
        });

    }

}

}]);