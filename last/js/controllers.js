'use strict';

/* Controllers */

app.controller('IndividualCtrl', ['$scope', function ($scope) {
    $scope.data = 123;
    $scope.images = [
        "http://farm3.staticflickr.com/2759/4488124371_c3530ebd92.jpg",
        "http://farm6.staticflickr.com/5475/12323286754_039479550c.jpg",
        "http://farm3.staticflickr.com/2623/3770286432_6afc74dc37.jpg",
        "http://farm5.staticflickr.com/4120/4925714406_d2e7f326b3.jpg",
        "http://farm5.staticflickr.com/4097/4925118633_a580496c24.jpg"
    ];
}]);