(function () {
    'use strict';

    angular
        .module('nickoDash.boot')
        .config(assortedConfigs);

        function assortedConfigs($compileProvider, $locationProvider) {
            $compileProvider.debugInfoEnabled(false);
            // if (!location.host.match('http://www.nickoinc/')) {
            //     $compileProvider.debugInfoEnabled(false);
            // }
            $locationProvider.html5Mode(true);
        }
})();