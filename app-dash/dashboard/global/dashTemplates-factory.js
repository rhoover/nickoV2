(function () {
    'use strict';

    angular
        .module('nickoDash.dash')
        .factory('dashTemplates', dashTemplates);

    function dashTemplates($http, $templateCache) {

        var factoryAPI = {
            fetchTemplates: fetchTemplates
        };
        return factoryAPI;

        ////////////////

        function fetchTemplates() {
            return $http.get('/wp-content/themes/nicko/app-dash/partials/home/home.html')
                .then(function (result) {
                    $templateCache.put('home.html', result.data);
                    return $http.get('/wp-content/themes/nicko/app-dash/partials/clients/clients.html');
                })
                .then(function (result) {
                    $templateCache.put('clients.html', result.data);
                    return $http.get('/wp-content/themes/nicko/app-dash/partials/jobs/jobs.html');
                })
                .then(function (result) {
                    $templateCache.put('jobs.html', result.data);
                    return $http.get('/wp-content/themes/nicko/app-dash/partials/invoice/invoice.html');
                })
                .then(function (result) {
                    $templateCache.put('invoice.html', result.data);
                    return $http.get('/wp-content/themes/nicko/app-dash/partials/settings/settings.html');
                })
                .then(function (result) {
                    $templateCache.put('settings.html', result.data);
                    return $http.get('/wp-content/themes/nicko/app-dash/partials/help/help.html');
                })
                .then(function (result) {
                    $templateCache.put('help.html', result.data);
                    return;
                });
        }
    }
})();