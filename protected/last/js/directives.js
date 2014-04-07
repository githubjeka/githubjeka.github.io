'use strict';

/* Directives */

angular.module('myApp.directives', [])

    .directive('appVersion', ['version', function (version) {
        return function (scope, element) {
            element.text(version);
        };
    }])

    .directive('slider', [function () {
        return {
            templateUrl: 'slider.html'
        };
    }]);