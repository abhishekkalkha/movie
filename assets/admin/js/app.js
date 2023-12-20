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





//controller

app.controller('ticketCtrl',['$scope','$parse','$http','$rootScope','$timeout','$window','Upload', function($scope,$parse,$http,$rootScope,$timeout,$window,Upload,$templateCache) {
$scope.test = 'test_value';
	$rootScope.baseurl = baseurl;

	$scope.table_list = true; //enable tables page table list

	$scope.table_task = false; //disable tables page table task

	$scope.theater = {}

	$scope.theater_design = false;

	$scope.theater_preview_html = false;

	$scope.loader =false;



	$scope.cinema = {};

	$scope.cinema_screen = {};

	$scope.chnimas = true;

		$scope.add_cinemas = function(file) {

		var url='admin/add_cinemas';

	    file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {data: $scope.cinema, file: file},

	    });



	    file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });

	}

	/*$scope.add_cinemas = function(file) {

		var url='admin/add_cinemas';

	    file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {data: $scope.cinema, file: file},

	    });



	    file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });

	}*/



	/*$scope.screendetails_add = function(file) {



		var url='admin/screendetails_view';



		$scope.cinema_screen.screen_timing = [];

		$scope.cinema_screen.screen_timing = $("input[name='showtime[]']").map(function(){return $(this).val();}).get();



		//alert(JSON.stringify($scope.cinema_screen));

	    file.upload = Upload.upload({

		  method: "GET",

	      url: $scope.baseurl+url,

	      data: {'data': $scope.cinema_screen.logo, file: file},

	    });

		

		



	    file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });

		

	}*/

	

		$scope.screendetails_add = function(file) {

		

		/*var url='admin/screendetails_view';

		$scope.cinema_screen.screen_timing = [];

		$scope.cinema_screen.screen_timing = $("input[name='showtime[]']").map(function(){return $(this).val();}).get();



		//alert(JSON.stringify($scope.cinema_screen));

	    file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {'data': $scope.cinema_screen, file: file},

	    });



	    file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });*/

		

			

		var url='admin/screendetails_view';



		$scope.cinema_screen.screen_timing = [];

		$scope.cinema_screen.screen_timing = $("input[name='showtime[]']").map(function(){return $(this).val();}).get();



		//alert(JSON.stringify($scope.cinema_screen));

	    file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {'data': $scope.cinema_screen, file: file},

	    });



	    file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });

	}

	

	/*$scope.screendetails_view = function(file){

		$scope.loader=true;		

		 var url='admin/screendetails_view';

		 

		$scope.cinema_screen.screen_timing = [];

		$scope.cinema_screen.screen_timing = $("input[name='showtime[]']").map(function(){return $(this).val();}).get();

		 

		/* var url='admin/add_cinemas';

	    file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {data: $scope.cinema, file: file},

	    });*/

		

		/*file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {'data': $scope.cinema_screen, table:"tbz_show_details", file: file},

	    });*/

		

	   /* $http({

	      url: baseurl+url, 

	      method: "GET",

	      params: {'data':$scope.cinema_screen,table:"tbz_show_details"},

	    })   *//*

		

		file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });

	}*/

	

	//immanu Editing//

    //immanue editing//

    /*  $scope.screendetails_view = function(){

		$scope.loader=true;		

		 var url='admin/screendetails_view';

		$scope.cinema_screen.screen_timing = [];

		$scope.cinema_screen.screen_timing = $("input[name='showtime[]']").map(function(){return $(this).val();}).get();

		 

	    $http({

	      url: baseurl+url, 

	      method: "GET",

	      params: {'data':$scope.cinema_screen,table:"tbz_show_details"},

	    }).then(function mySucces(response) {

	    	//$scope.cinema_screen = response.data;

	    	if(response.data.status){

	    		$scope.view_screenDetails(response.data.msg);

				//alert(JSON.stringify($scope.cinema_screen));

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    	}else{

	    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

	    	}

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}*/

//immanue editing//



	$scope.get_chinema = function(id){

		$scope.loader=true;

		 var url='admin/get_chinema';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'id':id,table:"tbz_chinema"},

	    }).then(function mySucces(response) {

	    	$scope.cinema = response.data;

	    	$scope.cinema.image = $scope.baseurl+$scope.cinema.image;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}

	



	$scope.add_screen = function(){

		$scope.loader=true;

		 var url='admin/add_screen';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'data':$scope.cinema_screen,table:"tbz_chinema_screen"},

	    }).then(function mySucces(response) {

	    	//$scope.cinema_screen = response.data;

	    	if(response.data.status){

	    		$scope.get_screen(response.data.msg);

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    	}else{

	    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

	    	}

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}

	$scope.get_screen = function(id){

		//alert(id);

		$scope.get_screen_var = id;

		$scope.loader=true;

	

		 var url='admin/get_screen';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'id':id,table:"tbz_chinema_screen"},

	    }).then(function mySucces(response) {

	    	$scope.screen = (response.data.count > 0) ? true : false;

	    	$scope.no_screen = (response.data.count > 0) ? false : true;			

	    	$scope.screen_details = response.data.data;

			//alert(JSON.stringify($scope.screen_details));

	    	$scope.cinema_screen.cinemas_id = id;

	    	//$scope.cinema_screen.cinemas_id = id;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}



	//immanu Editing//



        $scope.view_screenDetails = function(id){

		$scope.get_screen_vars = id;

		$scope.loader=true;

		$scope.screen=false;

        $scope.screen_moviedetails=false;		

		 var url='admin/view_screenDetails';

	    $http({

	      url: baseurl+url, 

	      method: "GET",

	      params: {'data':id, 'cini':$scope.get_screen_vars,'table_name':"tbz_show_details"},

	    }).then(function mySucces(response) {			

			

			$scope.screen_moviedetails=true;

			$scope.screenviewing = response.data;

			//alert(JSON.stringify($scope.screenviewing));

			console.log($scope.screenviewing.name);

			$scope.cinema_screen.cinemas_id = $scope.screenviewing.cinemas_id;

			$scope.cinema_screen.screen_name = $scope.get_screen_vars;

			$scope.cinema_screen.location = $scope.screenviewing.location;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}

	

	

	

	/*  $scope.view_screenvalues = function(id){

		  //alert(id);

		$scope.get_screen_vars = id;

		$scope.loader=true;

		$scope.screen=false;

        $scope.screen_moviedetails=false;		

		 var url='admin/view_screenvalues';

	    $http({

	      url: baseurl+url, 

	      method: "GET",

	      params: {'data':id, 'cini':$scope.get_screen_vars,'table_name':"tbz_show_details"},

	    }).then(function mySucces(response) {

            $scope.screen_moviedetails=true;			

			$scope.screensvalues = response.data;

			//alert(JSON.stringify($scope.screensvalues));

			

			/*$scope.screen_moviedetails=true;

			

			$scope.screenviewing = response.data;

			console.log($scope.screenviewing.name);

			$scope.cinema_screen.cinemas_id = $scope.screenviewing.cinemas_id;

			$scope.cinema_screen.screen_name = $scope.get_screen_vars;

			$scope.cinema_screen.location = $scope.screenviewing.location;*/

	    /*	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}*/

	

	





	$scope.table_field_list = {};

	$scope.get_table_serialize = function() {

		console.log($scope.table_field_list);

	}

	$scope.table_serialize = function() {

		console.log($scope.table_field_list);

	}



	//get menu items



	//get menu items

	$scope.get_menu_items=function(){

		$scope.menu_items = JSON.parse(localStorage.getItem('menu_items'));

		if(typeof $scope.menu_items === 'undefined' || $scope.menu_items === null){

			$scope.loader=true;

			 var url='admin/get_menu_list';

		    $http({

		      url: $scope.baseurl+url, 

		      method: "GET",

		    }).then(function mySucces(response) {

		    	//console.log(response.data);

		    	localStorage.setItem('menu_items', JSON.stringify(response.data));

		    	//console.log(localStorage.getItem('menu_items'));

		    	$scope.menu_items = JSON.parse(localStorage.getItem('menu_items'));

		    	$timeout(function() {

			    	$scope.loader=false;

				},1000);

			});

		}

		

	}

	//get field details

	$scope.fields ={};

	$scope.get_field = function(){

		$scope.loader=true;

		 var url='admin/get_field_list';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'table':$scope.table},

	    }).then(function mySucces(response) {

	    	//$scope.fields = JSON.parse(response.data.details);

	    	$scope.field_list = JSON.parse(response.data.details);

	    	console.log(JSON.stringify($scope.field_list));

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}

	$scope.field_list = {};

	$scope.submit = function() {

		console.log($scope.field_list);

		$scope.loader=true;

		 var url='admin/update_field_list';

		 console.log($scope.field_list);

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      //params: {'data': $scope.table_field_list,'table':$scope.table},

	      params: {'data': $scope.field_list,'table':$scope.table},

	    }).then(function mySucces(response) {

	    	if(response.data.status==true){

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    	}else{

	    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

	    	}

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

		

	}



	//table task

	$scope.menu_task={};

	$scope.menu_task_form_fields = function(table){

		$scope.loader=true;

		var url='admin/get_menu_item';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'data': table},

	    }).then(function mySucces(response) {

	    	$scope.menu_task.menu_name=response.data.menu_name;

				$scope.menu_task.table_name=table;

				$scope.menu_task.new_link=response.data.new_link;

				$scope.menu_task.view_all_link=response.data.view_all_link;

				$scope.menu_task.in_menu=response.data.in_menu;

				$scope.menu_task.icon=response.data.icon;

				$scope.menu_form_submit=false;

				$scope.table_list=false;

				$scope.table_task=true;

	    	$timeout(function() {

		    	$scope.loader=false;

		  	},1000);

		});

		

	}

	$scope.menu_function = function(){

		$scope.loader=true;

		 var url='admin/update_menu_list';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'data': $scope.menu_task},

	    }).then(function mySucces(response) {

	    	if(response.data.status==true){

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    		localStorage.removeItem('menu_items');

	    		$scope.get_menu_items();

	    	}else{

	    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

	    	}

	    	$timeout(function() {

		    	$scope.loader=false;

		    	window.location.reload();

			},1000);

		});

	}

	//table task 



	//form actions

	$scope.form_data={};

	$scope.check = function(){



		$scope.loader=true;

		 var url='admin/update_table_form';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'data': $scope.form_data,'table_name':$scope.form_edit_table},

	    }).then(function mySucces(response) {

			//alert(response);

	    	if(response.data.status==true){

				location.reload();

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    		localStorage.removeItem('menu_items');

	    		$scope.get_menu_items();

				

	    	}else{

	    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

	    	}

	    	$timeout(function() {

		    	$scope.loader=true;

			},1000);

		});

	}

	//form actions	

	//MY form actions

	$scope.cinema={};

	$scope.add_booking = function(){

		console.log($scope.form_edit_table);

		$scope.loader=true;

		 var url='admin/update_tableinput_form';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'data': $scope.cinema,'table_name':"tbz_show_details"},

	    }).then(function mySucces(response) {

			//$window.location.reload();

			//console.log(response.data.status);

	    	if(response.data.status==true){

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    		localStorage.removeItem('menu_items');

	    		$scope.get_menu_items();

	    	}else{

	    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

	    	}

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}

	//MY form actions



	//theater aligment block

	$scope.theater_align_fun = function() {

		$scope.theater_align = [];

		$scope.column = [];

		$scope.rows_temp = [];



		console.log($scope.rows.length);

		console.log(jQuery.isPlainObject($scope.rows));

		if($scope.rows.length===0){

			$scope.rows = [];

		for(var i=1;i<=$scope.theater.row;i++){

			$scope.column = [];

			$scope.rows[ i-1 ]={'rowname':{'value':'','disable':false},'price':{'value':'','disable':false},'type':{'value':'','disable':false},'row_index':i};

			for(var j=1;j<=$scope.theater.column;j++){

				$scope.column.push(j);

				$scope.rows[ i-1 ][j-1]={'check':true,'number':''};

				

			}

			$scope.column = ($scope.theater.chair_align=='right') ? $scope.column.reverse() : $scope.column;



			var col_row_object = {"column":i,"row":$scope.column};

			$scope.theater_align.push(col_row_object);

		}

		}

		

		$scope.theater_design = true;

	}



	$scope.selected=[];

	$scope.rows=[];

	$scope.checkAll = function (){

		$.each($scope.rows, function( index, value ) {

		  checked_row = false;

		  for(var il=0;il<$scope.theater.row;il++){

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

		item = ($scope.theater.chair_align=='right') ? $scope.theater.column - item : item - 1;

		var checked = $scope.rows[0][item].check;

		 var checked_row = false;

		$.each($scope.rows, function( index, value ) {

		  value[item].check = (checked) ? false : true;

		  checked_row = false;

		  for(var il=0;il<$scope.theater.row;il++){

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

  		item = item - 1;

  		var checked = $scope.rows[item][0].check;

  		$.each($scope.rows, function( index, value ) {

		  if(index==item){

		  	value.rowname = (checked==false) ? {'value':'','disable':false} : {'value':'','disable':true};

		  	value.price = (checked==false) ? {'value':'','disable':false} : {'value':'','disable':true};

		  	value.type = (checked==false) ? {'value':'','disable':false} : {'value':'','disable':true};

		  	for(var j=0;j<$scope.theater.column;j++){

		  		value[j].check = (checked) ? false : true;



		  	}

		  }

		});

  	}



  	$scope.theater_preview = function(){

  		$scope.row_price_type = [];

  		$scope.preview_rows = [];



		var other = {},

		letter,

		i;

  		$.each($scope.rows, function( index, value ) {

  			var chair = 0;

  			var count =0;

  			var roe = [];

  			for(var j=0;j<$scope.theater.column;j++){

  				

  				if($scope.theater.chair_align=='right'){

  					if((value[j].check)){++count;roe.push(count);}

  				}else{

  					value[j].number = (value[j].check) ? $scope.column[chair] : $scope.column[chair];

  					chair = (value[j].check) ? ++chair : chair;

  				}

  			}

  			if($scope.theater.chair_align=='right'){

  				roe.reverse();

  				for(var j=0;j<$scope.theater.column;j++){

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

  		$scope.theater_preview_html = true;

  		$scope.theater_design = false;

  	}

  	$scope.theater_layout = {};

  	$scope.theater_edit = false;

  	$scope.theater_preview_var=false;



  	$scope.theater_submit = function(){

  		$scope.loader=true;

  		$scope.theater_layout.column = $scope.theater.column;

  		$scope.theater_layout.row = $scope.theater.row;

  		$scope.theater_layout.chair_align = $scope.theater.chair_align;

  		$scope.theater_layout.layout = $scope.rows;

  		$scope.theater_layout.preview = $scope.preview_rows;

  		var url='admin/act_save_theater';

  		$http({

	      url: $scope.baseurl+url, 

	      method: "POST",

	     // params: {'data': $scope.theater_layout,'table_name':'tbz_chinema_screen'},

	      data: {'data': $scope.theater_layout,'table_name':'tbz_chinema_screen'},

	      headers: {'Content-Type': 'application/x-www-form-urlencoded'},

      		cache: $templateCache

	    }).then(function mySucces(response) {

	    	if(response.data.status==true){

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    		localStorage.removeItem('menu_items');

	    		$scope.get_menu_items();

	    	}else{

	    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

	    	}

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

	    });

  	}



  	$scope.layout_preview = function(id){

  		$scope.loader=true;

  		var url='admin/get_theater_preview';

  		$http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'data': id,'table_name':'tbz_chinema_screen'},

	    }).then(function mySucces(response) {

			//alert(JSON.stringify(response.data.preview));

	    	$scope.theater.column = response.data.column;

	    	$scope.theater.row = response.data.row;

	    	$scope.theater.chair_align = response.data.chair_align;

	    	$scope.rows = response.data.layout;

	    	$scope.preview_rows = (response.data.preview!='') ? JSON.parse(response.data.preview) : response.data.preview;

	    	$scope.theater_preview_var=true;

	    	$scope.no_preview = (response.data.preview!='') ? false : true;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

	    });

  	}



  	$scope.edit_layout = function(id){

  		$scope.theater_layout.id = id;

  		$scope.loader=true;

  		var url='admin/get_theater_preview';

  		$http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'data': id,'table_name':'tbz_chinema_screen'},

	    }).then(function mySucces(response) {

	    	$scope.theater.column = (response.data.column!=0) ? response.data.column : '';

	    	$scope.theater.row = (response.data.row!=0) ? response.data.row : '';

	    	$scope.theater.chair_align = (response.data.layout!='') ? response.data.chair_align : '';

	    	$scope.rows = (response.data.layout!='') ? JSON.parse(response.data.layout) : [];

	    	$scope.preview_rows = (response.data.preview!='') ? JSON.parse(response.data.preview) : [];

	    	$scope.theater_edit=true;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

	    });

  	}



  	$scope.disable_layout =function(id){

  		$scope.loader=true;

  		var url='admin/update_theater_status';

  		$http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'data': id,'table_name':'tbz_chinema_screen'},

	    }).then(function mySucces(response) {

	    	if(response.data.status==true){

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    		$scope.get_screen($scope.get_screen_var);

	    	}

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

	    });

  	}

  	//theater aligment block

	$scope.delete_action = function (id,table_name) {

		 //alert(id);

		    $scope.loader=true;

			if (confirm("Are you sure want to delete?")) {

				var url='admin/delete_action';	

				$http({

					 url: $scope.baseurl+url, 

					 method: "GET",				 

					 params: {'id': id,'table':table_name}					 

				}).then(function mySucces(response) {

					$window.location.reload();

					if(response.data.status==true){

						new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

						$scope.get_screen($scope.get_screen_var);

						

	    	        }

					$timeout(function() {

		    	        $scope.loader=false;

			        },1000);

				});

			}

	};



	

	  	//login and register 

  	$scope.login_data={};

  	$scope.login = function(){

  		var url='auth/act_login';

  		$http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'data': $scope.login_data,'table_name':'tbz_users'},

	    }).then(function mySucces(response) {

	    	console.log(response.data);

	    	if(response.data.status==true && response.data.user_type==1){

	    		window.location.href=$scope.baseurl+'admin';

	    	}if(response.data.status==true && response.data.user_type==3){

	    		window.location.href=$scope.baseurl+'admin/manager';

	    	}

	    });

  	}

	



  	$scope.register_data = {};

  	$scope.register_error = false;

  	$scope.register = function(type){

  		$scope.register_data.user_type = type;

  		$scope.register_data.status = '1'; 

  		console.log($scope.register_data);

  		var url="auth/act_register";

  		$http({

  			url : $scope.baseurl+url,

  			method : "GET",

  			params : {"data":$scope.register_data,'table_name':'tbz_users'},

  		}).then(function mySucces(response){

  			if(response.data.status==true && response.data.user_type==2){

	    		window.location.href=$scope.baseurl+'home';

	    	}if(response.data.status==true && response.data.user_type==3){

	    		window.location.href=$scope.baseurl+'admin/manager';

	    	}

	    	if(response.data.status==false){

	    		$scope.register_error = true;

	    		$scope.register_error_msg = response.data.msg;

	    		$timeout(function() {

			    	$scope.register_error=false;

				},5000);

	    	}

  		});

  	}

  	//login and register 

	

 //ADD BOOKING DETAILS immanu cinimas add

    //$scope.cinema = {};

	//$scope.cinema_screen = {};

	$scope.booking = true;

	$scope.add_cinemas = function(file) {

		var url='admin/add_cinemas';

	      file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {data: $scope.cinema, file: file},

	    });



	    file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });

	}

	

	$scope.save_movie = function(path) {

		var url = "admin/save_gallery";

		$http({

				  method  : 'POST',

				  url     : $scope.baseurl+url,

				  data : {"image":path,'table_name':'tbz_movies'},

				  headers: {'Content-Type': 'application/json'},

				 }).then(function mySucces(response) {

	    	if(response.data.status==true){

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    		$scope.get_screen($scope.get_screen_var);

	    	}

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

	    });

	}

	

	$scope.get_movies = function(){

	$scope.movies = [];

    $http.get(base_url+"index.php/admin/get_movies").success(function(data){ 

	$scope.movies = data; });

	}

	$scope.get_category = function(){

	$scope.category = [];

    $http.get(base_url+"index.php/admin/get_category").success(function(data){ 

	$scope.category = data; });

	}

	

	$scope.addpromocode = function(){

	$http.post(base_url+'index.php/admin/save_promocode', { 'id' : $scope.name,'category' : $scope.cat , 

	'code' : $scope.code, 'vfrom' : $scope.vfrom, 'vto' : $scope.vto, 'discount' : $scope.discount,

	'minamt' : $scope.minamt, 'maxamt' : $scope.maxamt }).success(function(data, status, headers, config) {

		if(data.status==true){

			new TabbedNotification({title: 'Success Notification',text: data.msg,type: 'success',sound: false});

	    		$scope.get_screen($scope.get_screen_var);

		}else{

			new TabbedNotification({title: 'Failed Notification',text: data.msg,type: 'error',sound: false});

		}

		$timeout(function() {

		    $scope.loader=false;

		},1000);

		});

	}

	

    //$scope.bookingdetail={};

	$scope.add_booking_detail = function(){

		$scope.loader=true;

		var url='admin/add_booking_detail';

		

		$http({

			url: baseurl+url, 

			method: "GET",

		    params: {'data':$scope.cinema,table:"tbz_booking_details"},

		}).then(function mySucces(response){

            $scope.cinema = response.data;

		 	if(response.data.status){

	    		$scope.view_screenDetails(response.data.msg);

				//alert(JSON.stringify($scope.cinema_screen));

	    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

	    	}else{

	    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

	    	}

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		})

	}

	

	

//Get screens editing	

		$scope.get_screnns = function(id){

			//alert(id);

		$scope.loader=true;				

		 var url='admin/get_screnns';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      //params: {'id':id,table:"tbz_show_details"},

		  params: {'id':id,table:"tbz_show_details"},

	    }).then(function mySucces(response) {

	    	$scope.cinema_screen = response.data;

			$scope.cinema_screen.image = $scope.baseurl+$scope.cinema_screen.image;

			//alert(JSON.stringify($scope.cinema_screen));

	    	//$scope.cinema_screen.image = $scope.baseurl+$scope.cinema_screen.image;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}

//Get screens editing	

	

	$scope.get_show = function(id){

		$scope.loader=true;	

		 var url='admin/get_show';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'id':id,table:"tbz_show_details"},

	    }).then(function mySucces(response) {			

	    	$scope.cinema = response.data;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}

    

	            $scope.get_location = function(){

					$scope.select_location = [];

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.movie_name));

					$http.get(base_url+"admin/get_location").success(function(data){ 

						$scope.select_location = data; 

						//console.log(data);

					});

	            }

	 	

	

	

	   /*  $scope.get_bookingcounts = function(id) {

			 $scope.select_location = {};

			$http.get(base_url+"admin/get_bookingcounts").success(function(data){ 

		   	var count = 0;

			angular.forEach($scope.students, function(student){

				count += student.isSelected ? 1 : 0;

			});

			return count; 

        }

		});*/

		           $scope.dashboad_init = function(){
		           	 $scope.booking_counts = {};

		            var url='admin/get_bookingcounts';

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.movie_name));

					$http({

						  url: $scope.baseurl+url, 

						  method: "GET",

						  params: {table:"tbz_booking_details"},

	                 }).then(function mySucces(response) {

						$scope.booking_counts = response.data; 

						$timeout(function() {

		    	         $scope.loader=false;

			            },1000);

					 });

				



		            $scope.view_movie = {};

		            var url='admin/get_view_movie';

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.movie_name));

					$http({

						  url: $scope.baseurl+url, 

						  method: "GET",

						  params: {table:"tbz_movies"},

	                 }).then(function mySucces(response) {

						$scope.view_movie = response.data; 

						$timeout(function() {

		    	         $scope.loader=false;

			            },1000);

					 });

			

		

					$scope.view_moviesvalues = {};

		            var url='admin/get_view_movie';

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.movie_name));

					$http({

						  url: $scope.baseurl+url, 

						  method: "GET",

						  params: {table:"tbz_movies"},

	                 }).then(function mySucces(response) {

						$scope.view_moviesvalues = response.data; 

						$timeout(function() {

		    	         $scope.loader=false;

			            },1000);

					 });

					 

					 



                        $scope.now_showings = {};

						var url='admin/now_showing_details';

						// alert(url);

						 $http({

							 url: $scope.baseurl+url, 

							 method: "GET",				 

							 params: {table:'tbz_show_details'},					 

						}).then(function mySucces(response) {

							//alert(JSON.stringify(response.data.result));

							$scope.now_showings = response.data;				

							//$scope.movie=response.data;				

						    //alert(JSON.stringify($scope.now_showings));

							$timeout(function() {

								$scope.loader=false;

							},1000);

						});

						

						

						

					        //TopReviews Details

	  

									

									//$rootScope.reviews = {};

									$scope.loader=true;

									//var url=base_url+'index.php/ticketbazzar_movies/view_movies';

                                    var url='admin/topmovie_details';																		

									 //alert(url);

									 $http({

										 url: url,  

										 method: "GET",				 

										 params: {'table_name': 'tbz_movies'}					 

									}).then(function mySucces(response) {

										$scope.topreviewsmovies = response.data;

										//$rootScope.reviews = JSON.stringify(response.data[0].rate);

										if(response.data.status==true){

											new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

											$scope.get_screen($scope.get_screen_var);

											

										}

										$timeout(function() {

											$scope.loader=false;

										},1000);

							});	





							

                            $scope.current_year = {};

							$scope.loader=true;	

							 var url='admin/get_yearrevenue';

							$http({

							  url: $scope.baseurl+url, 

							  method: "GET",

							  params: {'data':'data',table:"tbz_booking_details"},

							}).then(function mySucces(response,data) {			

								$scope.current_year = response.data;

								//alert(JSON.stringify($scope.current_year));

								$timeout(function() {

									$scope.loader=false;

								},1000);

							});

                    

					        $scope.current_month = {};

							$scope.loader=true;	

							 var url='admin/get_monthrevenue';

							$http({

							  url: $scope.baseurl+url, 

							  method: "GET",

							  params: {table:"tbz_booking_details"},

							}).then(function mySucces(response) {			

								$scope.current_month = response.data;

								//alert(JSON.stringify($scope.current_year));

								$timeout(function() {

									$scope.loader=false;

								},1000);

							});

							

							

							$scope.current_day = {};

							$scope.loader=true;	

							 var url='admin/get_dayrevenue';

							$http({

							  url: $scope.baseurl+url, 

							  method: "GET",

							  params: {table:"tbz_booking_details"},

							}).then(function mySucces(response) {			

								$scope.current_day = response.data;

								//alert(JSON.stringify($scope.current_year));

								$timeout(function() {

									$scope.loader=false;

								},1000);

							});

							

		

                           //$scope.total_dayamount = {};

							$scope.total_dayamount = {};

							$scope.loader=true;	

							var url='admin/get_daycalculateamount';

							$http({

							  url: $scope.baseurl+url, 

							  method: "GET",

							  params: {table:"tbz_booking_details"},

							}).then(function mySucces(response) {

          

		                            	var map = response.data;

		var chartColours = ['#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];



        //generate random number for charts

        randNum = function() {

          return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;

        };



        var d1 = [];

        //var d2 = [];

       //console.log(map);

        //here we generate data for chart

        for (var i = 0; i < map.length; i++) {

          //d1.push([new Date(Date.today().add(i).days()).getTime(), randNum() + i + i + 10]);

          //d1.push[map[i].date,map[i].amount];

          //d1.push([map[i].date,map[i].amount]);

		  

	  d1.push([new Date(map[i].date).getTime(),map[i].amount]);



        }

		//console.log(d1);

        var chartMinDate = d1[0][0]; //first day

        var chartMaxDate = d1[map.length-1][0]; //last day



        var tickSize = [1, "day"];

        var tformat = "%d/%m/%y";



        //graph options

        var options = {

          grid: {

            show: true,

            aboveData: true,

            color: "#3f3f3f",

            labelMargin: 10,

            axisMargin: 0,

            borderWidth: 0,

            borderColor: null,

            minBorderMargin: 5,

            clickable: true,

            hoverable: true,

            autoHighlight: true,

            mouseActiveRadius: 100

          },

          series: {

            lines: {

              show: true,

              fill: true,

              lineWidth: 2,

              steps: false

            },

            points: {

              show: true,

              radius: 4.5,

              symbol: "circle",

              lineWidth: 3.0

            }

          },

          legend: {

            position: "ne",

            margin: [0, -25],

            noColumns: 0,

            labelBoxBorderColor: null,

            labelFormatter: function(label, series) {

              // just add some space to labes

              return label + '&nbsp;&nbsp;';

            },

            width: 40,

            height: 1

          },

          colors: chartColours,

          shadowSize: 0,

          tooltip: true, //activate tooltip

          tooltipOpts: {

            content: "%s: %y.0",

            xDateFormat: "%d/%m",

            shifts: {

              x: -30,

              y: -50

            },

            defaultTheme: false

          },

          yaxis: {

            min: 0

          },

          xaxis: {

            mode: "time",

            minTickSize: tickSize,

            timeformat: tformat,

            min: chartMinDate,

            max: chartMaxDate

          }

        };

        var plot = $.plot($("#placeholder33x"), [{

          label: "Email Sent",

          data: d1,

          lines: {

            fillColor: "rgba(150, 202, 89, 0.12)"

          }, //#96CA59 rgba(150, 202, 89, 0.42)

          points: {

            fillColor: "#fff"

          }

        }], options);

                            });
		           }

							

//Movie Name get							

			    $scope.get_moviesings = function(){

					$scope.select_movies = [];

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.movie_name));

					$http.get(base_url+"admin/get_moviesings").success(function(data){ 

						$scope.select_movies = data; 

						//console.log(data);

					});

	            }				

//Movie Name get							

	                

					

//Movie Language get							

			    $scope.get_showlanguage = function(){

					$scope.select_languages = [];

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.language));

					$http.get(base_url+"admin/get_showlanguage").success(function(data){ 

						$scope.select_languages = data; 

						//console.log(data);

					});

	            }				

//Movie Language get



//Movie Tags get

					

			    /*$scope.get_showtag = function(){		

					$scope.select_tags = [];

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.language));

					$http.get(base_url+"admin/get_showtag").success(function(data){ 

						$scope.select_tags = data; 

						

						//console.log(data);

					});

	            }*/	

//Movie Tags get				

//Movie Language getget_showformat 						

			    /*$scope.get_showformat = function(){

					$scope.select_format = [];

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.language));

					$http.get(base_url+"admin/get_showformat").success(function(data){ 

						$scope.select_format = data; 

						//console.log(data);

					});

	            }*/				

//Movie Language getget_showformat 



//Movie Language get							

			    $scope.get_showlocation = function(){

					$scope.select_location = [];

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.language));

					$http.get(base_url+"admin/get_showlocation").success(function(data){ 

						$scope.select_location = data; 

						//console.log(data);

					});

	            }				

//Movie Language getget_showformat



// Set Date

	$scope.set_date = function(ng_model, value){

		var model = $parse(ng_model);

		model.assign($scope, value);



		//alert($scope.form_data.dob);

	}

	

	

	//ADD BOOKING DETAILS immanu cinimas add

    //$scope.cinema = {};

	//$scope.cinema_screen = {};

	//$scope.booking = true;

	$scope.add_galleries = function(file) {

		var url='admin/add_galleries';

	      file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {data: $scope.cinema_gallery, file: file},

	    });

		

		



	    file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });

	}

	

	

 //Movie Name get							

			    $scope.get_movies_name = function(){

					$scope.view_moviesname = [];

					//$scope.cinema_screen = response.data;

					//alert(JSON.stringify(cinema_screen.movie_name));

					$http.get(base_url+"admin/get_movies_name").success(function(data){ 

						$scope.view_moviesname = data; 

						//console.log(data);

					});

	            }				

   //Movie Name get	



      			

									//$rootScope.reviews = {};

									$scope.get_screen_gallery = function(id){

										//alert(id);

									//$scope.loader=true;

									//var url=base_url+'admin/view_galleries';

                                    var url='admin/gallery_details';																		

									 //alert(url);

									 $http({

										 url: url,  

										 method: "GET",				 

                                         //params: {'table_name' : 'tbz_show_details','id': id}

										  params: {'id':id,table:"tbz_show_details"},

									}).then(function mySucces(response) {

										$scope.cinemagallery = response.data;

							        });	

								}	





									$scope.galleryremove = function(id){

									$scope.loader=true;

									if (confirm("Are you sure want to delete?")) {

                                     var url='admin/gallery_delete';																		

									 $http({

										 url: url,  

										 method: "GET",				 

										 params: {'table_name' : 'tbz_gallery','id': id}

										 

									}).then(function mySucces(response) {

									                    $window.location.reload();

														if(response.data.status==true){

															new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

															$scope.get_screen($scope.get_screen_var);

															

														}

														$timeout(function() {

															$scope.loader=false;

														},1000);

													});

							    	}

                                };

								

								

								

$scope.booking = true;

	$scope.add_settings = function(file,logo) {

		var url='admin/settings_add';

	      file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {data: $scope.cinema_settings, file: file,logo:logo},

	    });



	    file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

			location.reload();

				 window.location = add_settings ;

    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });

	}

	

       



     $scope.add_profiles = function(file) {

		var url='admin/add_profiles';

	      file.upload = Upload.upload({

	      url: $scope.baseurl+url,

	      data: {data: $scope.cinemaprofile, file: file},

	    });

		

	    file.upload.then(function (response) {

    	if(response.data.status==true){

    		new TabbedNotification({title: 'Success Notification',text: response.data.msg,type: 'success',sound: false});

			location.reload();

				 window.location = add_profiles ;



    	}else{

    		new TabbedNotification({title: 'Failed Notification',text: response.data.msg,type: 'error',sound: false});

    	}

    	$timeout(function() {

	    	$scope.loader=false;

		},1000);

	      $timeout(function () {

	        file.result = response.data;

	      });

	    }, function (response) {

	      if (response.status > 0)

	        $scope.errorMsg = response.status + ': ' + response.data;

	    }, function (evt) {

	      // Math.min is to fix IE which reports 200% sometimes

	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

	    });

	}



     /*   $scope.get_chinema = function(id){

		$scope.loader=true;

		 var url='admin/get_chinema';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'id':id,table:"tbz_chinema"},

	    }).then(function mySucces(response) {

	    	$scope.cinema = response.data;

	    	$scope.cinema.image = $scope.baseurl+$scope.cinema.image;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}	*/

	

	    $scope.get_profiledet = function(id){

			//alert(id);

		$scope.loader=true;

		 var url='admin/get_profiledet';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'id':id,table:"tbz_users"},

	    }).then(function mySucces(response) {

	    	$scope.cinemaprofile = response.data;

	    	$scope.cinemaprofile.image = $scope.baseurl+$scope.cinemaprofile.image;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}	

  

  

    $scope.get_settings = function(id){

			//alert(id);

		$scope.loader=true;

		 var url='admin/get_settings';

	    $http({

	      url: $scope.baseurl+url, 

	      method: "GET",

	      params: {'id':id,table:"tbz_settings"},

	    }).then(function mySucces(response) {

	    	$scope.cinema_settings = response.data;

			//$scope.cinema_screen = response.data;

			//alert(JSON.stringify(cinema_settings.response.data));

	    	//$scope.cinema_settings.file = $scope.baseurl+$scope.cinema_settings.file;

	    	$scope.cinema_settings.logo = $scope.baseurl+$scope.cinema_settings.logo;

	    	$scope.cinema_settings.favicon = $scope.baseurl+$scope.cinema_settings.favicon;

	    	$timeout(function() {

		    	$scope.loader=false;

			},1000);

		});

	}	



	

								



}]);