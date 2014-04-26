'use strict';

angular.module('ganttApp', [
    'ngCookies',
    'ngResource',
    'ngSanitize',
    'ngRoute'
])
    .config(function ($routeProvider, $locationProvider, $httpProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'partials/main',
                controller: 'MainCtrl'
            })
            .when('/login', {
                templateUrl: 'partials/login',
                controller: 'LoginCtrl'
            })
            .when('/signup', {
                templateUrl: 'partials/signup',
                controller: 'SignupCtrl'
            })
            .when('/settings', {
                templateUrl: 'partials/settings',
                controller: 'SettingsCtrl',
                authenticate: true
            })
            .otherwise({
                redirectTo: '/'
            });

        $locationProvider.html5Mode(true);

        // Intercept 401s and redirect you to login
        $httpProvider.interceptors.push(['$q', '$location', function ($q, $location) {
            return {
                'responseError': function (response) {
                    if (response.status === 401) {
                        $location.path('/login');
                        return $q.reject(response);
                    }
                    else {
                        return $q.reject(response);
                    }
                }
            };
        }]);
    })
    .run(function ($rootScope, $location, Auth) {

        // Redirect to login if route requires auth and you're not logged in
        $rootScope.$on('$routeChangeStart', function (event, next) {

            if (next.authenticate && !Auth.isLoggedIn()) {
                $location.path('/login');
            }
        });
    });


// bad, but I don't know where these should go....

$(document).tooltip({
    tooltipClass: 'tooltip',
    hide: false,
    show: {
        duration: 100,
        delay: 500
    },
    track: true
});


function scrollToToday() {
    var dayOffset = -7;

    var position = $('.gantt-day').width() * (dayOffset + 0.5);

    $('.gantt-data').scrollTo('time', 1500, {
        offset: position,
        easing: 'easeOutQuad'
    });
}


function overScroll() {
    $('section.gantt-data').overscroll({
        direction: 'horizontal'
    });
}


function clickEvents() {
    $('#gototoday').click(function (e) {
        scrollToToday();
        e.preventDefault();
    });
}


function kickoff() {
    scrollToToday();
    overScroll();
    clickEvents();
}


$(document).ready(kickoff);
