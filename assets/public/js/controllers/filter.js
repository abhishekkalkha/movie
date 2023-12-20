
App.filter("trustUrl", ['$sce', function($sce) {
	return function(recordingUrl) {
	  return $sce.trustAsResourceUrl(recordingUrl);
	};
}]);

App.filter("timeAgo", function() {
	return function(date) {
	  return jQuery.timeago(date);
	};
});

App.filter('split', function() {
    return function(input, delimiter) {
      var delimiter = delimiter || ',';

      return input.split(delimiter);
    } 
});



