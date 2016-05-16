 var app = angular.module('myApp', ['ngResource'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
 }).constant('API', 'http://laravel.dev/');

app.controller('CoursesController', [ '$http', '$scope', function($http, $scope, API){
  $scope.courses = [];
  $scope.totalPages = 0;
  $scope.currentPage = 1;
  $scope.range = [];

  $scope.getCourse = function (pageNumber) {
      if (pageNumber === undefined) {
          pageNumber = '1';
      }
      $http.get('http://laravel.dev/getlist' + '?page=' + pageNumber).success(function(response) {
          $scope.courses        = response.data;
          $scope.totalPages   = response.last_page;
          $scope.currentPage  = response.current_page;
          // Pagination Range
          var pages = [];

          for(var i=1;i<=response.last_page;i++) {
            pages.push(i);
          }
          $scope.range = pages;
      });
  };
}]);

app.directive('postsPagination', function(){
   return {
      restrict: 'E',
      template: '<ul class="pagination">'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getCourse(1)">&laquo;</a></li>'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getCourse(currentPage-1)">&lsaquo; Prev</a></li>'+
        '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
            '<a href="javascript:void(0)" ng-click="getCourse(i)"><% i %></a>'+
        '</li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getCourse(currentPage+1)">Next &rsaquo;</a></li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getCourse(totalPages)">&raquo;</a></li>'+
      '</ul>'
   };
});


//=============================== Combining React and Anggular JS ====================================

app.controller('combining', function ($scope) {
    $scope.framework = "ReactJS";
});
app.directive('fastNg', function(){
    return {
        restrict: 'E',
        scope: { framework : ' = '},
        link: function(scope, el, attrs){
            scope.$watch('framework', function (newValue, oldValue){
                React.renderComponent(MYAPP({framework: newValue}), el[0]);
            })
        }
    }
})
