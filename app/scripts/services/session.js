'use strict';

angular.module('ganttApp')
    .factory('Session', function ($resource) {
        return $resource('/api/session/');
    });
