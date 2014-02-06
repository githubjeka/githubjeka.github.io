'use strict';

/* Directives */

angular.module('myApp.directives', []).

    directive('appVersion', ['version', function (version) {
        return function (scope, element) {
            element.text(version);
        };
    }])

    .directive('verticalSlider', [function () {
        return {
            templateUrl: 'slider.html',

            controller: ['$scope', function ($scope) {

                $scope.height = 0;

                $scope.prev = function () {
                    $scope.images.push($scope.images.shift());
                };

                $scope.next = function () {
                    $scope.images.unshift($scope.images.pop());
                };

            }],

            link: function (scope, element) {
                var height = element[0].offsetHeight;
                element.css("overflow", "hidden");
                console.log(height);
            }
        };
    }]);