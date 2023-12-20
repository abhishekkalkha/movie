var app = angular.module('ticket', ['ngFileUpload']);



app.directive('stringToNumber', function() {

  return {

    require: 'ngModel',

    link: function(scope, element, attrs, ngModel) {

      ngModel.$parsers.push(function(value) {

        return '' + value;

      });

      ngModel.$formatters.push(function(value) {

        return parseFloat(value, 10);

      });

    }

  };

});

app.directive('validNumber', function() {
  return {
    require: '?ngModel',
    link: function(scope, element, attrs, ngModelCtrl) {
      if(!ngModelCtrl) {
        return; 
      }
      
      ngModelCtrl.$parsers.push(function(val) {
        var clean = val.replace( /[^0-9]+/g, '');
        if (val !== clean) {
          ngModelCtrl.$setViewValue(clean);
          ngModelCtrl.$render();
        }
        return clean;
      });
      
      element.bind('keypress', function(event) {
        if(event.keyCode === 32) {
          event.preventDefault();
        }
      });
    }
  };
});





//controller

app.controller('ticketCtrl',['$scope','$location','$parse','$http','$rootScope','$timeout','$window','Upload', function($scope,$location,$parse,$http,$rootScope,$timeout,$window,Upload,$templateCache) {
//$scope.test = 'test_value';
//alert(base_url);
	$rootScope.baseurl = base_url;

/*	$scope.table_list = true; //enable tables page table list

	$scope.table_task = false; //disable tables page table task
*/
	//$scope.theater = {}

	$scope.theater_design = false;

	$scope.theater_preview_html = false;

	$scope.loader =false;
    $scope.alert3 = false;


	$scope.cinema = {};

	$scope.cinema_screen = {};

	$scope.chnimas = true;
         $scope.sign_in_error = false;  

         $scope.theater ={};
         $scope.theater.chair_align = 'left';

		$scope.theater_align_fun = function(theater_align_form) {
			$scope.alert3 = false;

			if(theater_align_form.$valid){
				if($scope.theater.row == 0 || $scope.theater.column == 0){
					  $scope.sign_in_error = true;
                  $scope.sign_in_error_msg = "**Insert a valid number for row and column";

				}
				else{
					/*$scope.row = $scope.theater.row;
					$scope.column = $scope.theater.column;*/
		$scope.loader=true;
		 var url='theatre/input_screendata';


	    $http({

	      url: $scope.baseurl+url, 

	      method: "POST",

	      data: $scope.theater,

	    })
	    .then(function mySucces(response) {
             console.log(response);
			if(response.data.status == "failure"){
                //alert('hi');
				$scope.alert3 = true;
			}
			else{
				//console.log(response);
				$scope.theater = response.data.user.theater_name;
				$scope.screen = response.data.user.screen_name;

          $rootScope.row = response.data.user.row;
           $rootScope.column = response.data.user.column;
          $rootScope.chair_align = response.data.user.chair_align;
          $rootScope.id =  response.data.user.id;
           	$scope.theater_align = [];

		$scope.column = [];

		$scope.rows_temp = [];
        $scope.rows = [];


		//console.log($scope.rows.length);

		//console.log(jQuery.isPlainObject($scope.rows));

		if($scope.rows.length===0){
			

		for(var i=1;i<=$rootScope.row ;i++){

			$scope.column = [];

			$scope.rows[ i-1 ]={'rowname':{'value':'','disable':false},'price':{'value':'','disable':false},'type':{'value':'','disable':false},'row_index':i};
			for(var j=1;j<=$rootScope.column;j++){

				$scope.column.push(j);

				$scope.rows[ i-1 ][j-1]={'check':true,'number':''};

				

			}

			$scope.column = ($rootScope.chair_align=='right') ? $scope.column.reverse() : $scope.column;


			var col_row_object = {"column":i,"row":$scope.column};
			$scope.theater_align.push(col_row_object);
                
		}   
		}

		
         $('#myModal').modal('show');
		$scope.theater_design = true;
      }

		});
}
}
		}

		$scope.theater_align_fun_edit=function(theater_align_form){
$scope.alert3 = false;

				if(theater_align_form.$valid){
				if($scope.theater.row == 0 || $scope.theater.column == 0){
					  $scope.sign_in_error = true;
                  $scope.sign_in_error_msg = "**Insert a valid number for row and column";

				}
				else{

				var a=window.location.href ;
		    var url = a.split('/');
		     var id = url[url.length - 1];
		     $scope.theater.id =id;
		$scope.loader=true;
		 var url='theatre/edit_input_screendata';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "POST",

	      data: $scope.theater,

	    })
	    .then(function mySucces(response) {
             //console.log(response);
			if(response.data.status == "failure"){
                //alert('hi');
				$scope.alert3 = true;
			}
			else{
				//console.log(response);
				$scope.theater = response.data.user.theater_name;
				$scope.screen = response.data.user.screen_name;

          $rootScope.row = response.data.user.row;
           $rootScope.column = response.data.user.column;
          $rootScope.chair_align = response.data.user.chair_align;
          $rootScope.id =  response.data.user.id;
           	$scope.theater_align = [];

		$scope.column = [];

		$scope.rows_temp = [];
        $scope.rows = [];


		//console.log($scope.rows.length);

		//console.log(jQuery.isPlainObject($scope.rows));

		if($scope.rows.length===0){
			

		for(var i=1;i<=$rootScope.row ;i++){

			$scope.column = [];

			$scope.rows[ i-1 ]={'rowname':{'value':'','disable':false},'price':{'value':'','disable':false},'type':{'value':'','disable':false},'row_index':i};
			for(var j=1;j<=$rootScope.column;j++){

				$scope.column.push(j);

				$scope.rows[ i-1 ][j-1]={'check':true,'number':''};

				

			}

			$scope.column = ($rootScope.chair_align=='right') ? $scope.column.reverse() : $scope.column;


			var col_row_object = {"column":i,"row":$scope.column};
			$scope.theater_align.push(col_row_object);
                
		}   
		}

		
         $('#myModal').modal('show');
		$scope.theater_design = true;
      }

		});
}
}
		}



		$scope.checkAll = function (){
			var row =  $rootScope.row;
			console.log(row);
             
		$.each($scope.rows, function( index, value ) {

		  checked_row = false;

		  for(var il=0;il<row;il++){

			if(value[il].check){checked_row=true}

		  }



		  value.rowname.disable = (checked_row) ? false : true;

		  value.price.disable = (checked_row) ? false : true;

		  value.type.disable = (checked_row) ? false : true;

		  if(value.rowname.disable==true){

		  	value.rowname.value = '';

		  	value.price.value = '';

		  	value.type.value = '';

		  }

		});

	}




	$scope.checkAllColumn = function (item) {
		var column = $rootScope.column;
		var row =  $rootScope.row;
		var chair_align = $rootScope.chair_align;
		item = (chair_align=='right') ? column - item : item - 1;

		var checked = $scope.rows[0][item].check;

		 var checked_row = false;

		$.each($scope.rows, function( index, value ) {

		  value[item].check = (checked) ? false : true;

		  checked_row = false;

		  for(var il=0;il<row;il++){

			if(value[il].check){checked_row=true}

		  }

		  value.rowname.disable = (checked_row) ? false : true;

		  value.price.disable = (checked_row) ? false : true;

		  value.type.disable = (checked_row) ? false : true;

		  if(value.rowname.disable==true){

		  	value.rowname.value = '';

		  	value.price.value = '';

		  	value.type.value = '';

		  }



	    

		});

  	}



  	$scope.checkAllRow = function (item) {
        var column = $rootScope.column;
  		item = item - 1;

  		var checked = $scope.rows[item][0].check;

  		$.each($scope.rows, function( index, value ) {

		  if(index==item){

		  	value.rowname = (checked==false) ? {'value':'','disable':false} : {'value':'','disable':true};

		  	value.price = (checked==false) ? {'value':'','disable':false} : {'value':'','disable':true};

		  	value.type = (checked==false) ? {'value':'','disable':false} : {'value':'','disable':true};

		  	for(var j=0;j<column;j++){

		  		value[j].check = (checked) ? false : true;



		  	}

		  }

		});

  	}
$scope.theater_preview = function(){
		var column = $rootScope.column;

		$scope.tot_col = $rootScope.column;
		var row =  $rootScope.row;
		var chair_align = $rootScope.chair_align;

  		$scope.row_price_type = [];

  		$scope.preview_rows = [];



		var other = {},

		letter,

		i;
		console.log($scope.rows);
  		$.each($scope.rows, function( index, value ) {

  			var chair = 0;

  			var count =0;

  			var roe = [];

  			for(var j=0;j<column;j++){

  				

  				if(chair_align=='right'){

  					if((value[j].check)){++count;roe.push(count);}

  				}else{

  					value[j].number = (value[j].check) ? $scope.column[chair] : $scope.column[chair];

  					chair = (value[j].check) ? ++chair : chair;

  				}

  			}

  			if(chair_align=='right'){

  				roe.reverse();

  				for(var j=0;j<column;j++){

  					value[j].number = (value[j].check) ? roe[chair]  : roe[chair];

  					chair = (value[j].check) ? ++chair : chair;

  				}

  			}

		    letter = $scope.rows[index].type.value;

		    var stripe = '';

		    if(letter!=undefined)

		    	stripe = $scope.rows[index].type.value+"-"+$scope.rows[index].price.value;

		   // if other doesn't already have a property for the current letter

		   // create it and assign it to a new empty array

		   if (!(stripe in other) && letter!=undefined && stripe!='-')

		      other[stripe] = [];

		   if(letter!=undefined && stripe!='-')

		   	  other[stripe].push($scope.rows[index]);

  		});

		$scope.preview_rows = other;
		console.log($scope.preview_rows);

		 $('#myModal2').modal('show');

  		$scope.theater_preview_html = true;

  		$scope.theater_design = false;

  	}

  		$scope.theater_layout = {};

  	$scope.theater_edit = false;

  	$scope.theater_preview_var=false;
  	$scope.alert=false;
  	$scope.alert2=false;

$scope.theater_submit = function(){
//alert('hi');
  		$scope.loader=true;
        
        $scope.theater_layout.id =$rootScope.id;
  		$scope.theater_layout.layout = $scope.rows;
          //console.log($scope.theater_layout.layout);
  		$scope.theater_layout.preview = $scope.preview_rows;
           console.log($scope.theater_layout.preview);
  		var url='theatre/theatre_screen_details';

  		$http({

	      url: $scope.baseurl+url, 

	      method: "POST",

	     // params: {'data': $scope.theater_layout,'table_name':'tbz_chinema_screen'},

	      data:$scope.theater_layout,

	    }).then(function mySucces(response) {

	    	if(response.data.status=='success'){
	    		

		    	$scope.alert=true;

		    	$timeout(function() {

		    	location.reload();
		    	/*var urls = 'theatre/viewscreen';
	    		var url = $scope.baseurl+urls;
                   $window.location.href = url;
*/
			},3000);

		
	    		
	    		
	    		//new TabbedNotification({title: 'Success Notification',text: response.data.message,type: 'success'});

	    	    	}else{
               $scope.alert2=true;
	    		//new TabbedNotification({title: 'Failed Notification',text: response.data.message,type: 'error'});

	    	}

	    	/*$timeout(function() {

		    	$scope.loader=false;

			},1000);*/

	    });

  	}


$scope.close_button = function(){
	
	var id =  $rootScope.id;
	var url='theatre/close_button';

  		$http({

	      url: $scope.baseurl+url, 

	      method: "POST",

	     // params: {'data': $scope.theater_layout,'table_name':'tbz_chinema_screen'},

	      data:id,

	    }).then(function mySucces(response) {

	    	location.reload();

	    	    });
}
		
	/*$scope.close = function(){
		var urls = 'theatre/addscreen';
	    		var url = $scope.baseurl+urls;
                   $window.location.href = url;
                   $scope.theater.cinemas_id='';
                   $scope.theater.screen_name='';
                  $scope. theater.row='';
                   $scope.theater.column='';
	}	*/	

		$scope.get_data=function(){
			 var a=window.location.href ;
		    var url = a.split('/');
		     var id = url[url.length - 1];
		     	 var url='theatre/get_screendata';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "POST",

	      data: id,

	    })
	    .then(function mySucces(response) {
	    	
	    	$scope.theater = response.data.user;
	    	
	    	$rootScope.row_edit = response.data.user.row;
	    	$rootScope.column_edit = response.data.user.column;
			$rootScope.screen_name_edit = response.data.user.screen_name;

			$rootScope.cinemas_id_edit = response.data.user.cinemas_id;

			$rootScope.chair_align_edit = response.data.user.chair_align;

		});	
	}
$scope.a = {};
	$scope.close_button2 = function(){
		$scope.a.row = $rootScope.row_edit;
		$scope.a.column = $rootScope.column_edit;
		$scope.a.screen_name = $rootScope.screen_name_edit;
		$scope.a.cinemas_id = $rootScope.cinemas_id_edit;
		$scope.a.chair_align = $rootScope.chair_align_edit;

		 var a=window.location.href ;
		    var url = a.split('/');
		     var id = url[url.length - 1];
		     $scope.a.id = id;
		     	 var url='theatre/get_close_button2';
		     	   $http({

	      url: $scope.baseurl+url, 

	      method: "POST",

	      data: $scope.a,

	    })
	    .then(function mySucces(response) {

		});	
	}

         
$scope.layout_preview = function(){
	$scope.loader=true;
           var a=window.location.href ;
		    var url = a.split('/');
		     var id = url[url.length - 1];

  		var url='theatre/get_theater_preview';
  		$http({

	      url: $scope.baseurl+url, 

	      method: "POST",

	      data:id,

	    }).then(function mySucces(response) {
	    	/*console.log(response);

			alert(JSON.stringify(response.data.user.preview));*/

	    	$scope.theater.column = response.data.user.column;

	    	$scope.theater.row = response.data.user.row;

	    	$scope.theater.chair_align = response.data.user.chair_align;

	    	$scope.rows = response.data.user.layout;

	    	$scope.preview_rows = (response.data.user.preview!='') ? JSON.parse(response.data.user.preview) : response.data.user.preview;
             console.log($scope.preview_rows);
	    	$scope.theater_preview_var=true;

	    	$scope.no_preview = (response.data.user.preview!='') ? false : true;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

	    });

}

	

								



}]);