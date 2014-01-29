var app = angular.module('myApp', ['ngRoute','ngAnimate']);

app.config(['$locationProvider', '$routeProvider', function ($locationProvider, $routeProvider) {

    $routeProvider

        .when('/', {
            templateUrl: 'index.html'
        })

        .when('/gooo', {
            templateUrl: 'index.html',
            controller: 'Main'
        });

    $locationProvider.html5Mode(true).hashPrefix('!');

}]);