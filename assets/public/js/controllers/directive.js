
App.directive("raty", function() {
  return {
    restrict: 'AE',
    link: function(scope, elem, attrs, $timeout) {
      setTimeout(function() {
        $(elem).raty({
            start: attrs.score,
            number: attrs.number,
            starOff: base_url + 'assets/public/images/star-off.PNG',
            starOn: base_url + 'assets/public/images/star-on.PNG',
            readOnly: true
        });
        $scope.$apply();
      }, 1000);
    }
  }
});

App.directive('starRating', function() {
  return {
    restrict: 'A',
    template: '<span class="rating">' +
     '<span ng-repeat="star in stars" ng-class="star">' +
     '\u2605' +
     '</span>' +
     '</span>',
      scope: {
         ratingValue: '=',
         max: '=',
         onRatingSelected: '&'
      },
    link: function(scope, elem, attrs) {

       var updateStars = function() {
        scope.stars = [];
        for (var i = 0; i < scope.max; i++) {
         scope.stars.push({
          filled: i < scope.ratingValue
         });
        }
       };

     /* scope.toggle = function(index) {
        scope.ratingValue = index + 1;
        scope.onRatingSelected({
         rating: index + 1
        });
      };*/

      scope.$watch('ratingValue', function(oldVal, newVal) {
        if (newVal) {
         updateStars();
        }
      });
    }
  }
});
