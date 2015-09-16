(function () {
    'use strict';

    angular
        .module('nickoSite.pages')
        .controller('DetailsCtrl', DetailsCtrl);

    function DetailsCtrl($scope, $location, detailsFactory, fbRootUrl) {
        /*jshint validthis: true */
        var details = this;

        getServices();
        statesList();
        goForthAndBind();

        ////////////////

        function getServices() { /*Part of form really, but... separation*/
            detailsFactory.fetchAvailableServices()

                .then(function (services) {
                    details.services = services;

                    details.selectAll = function () {
                        details.clientDetails.cdServices.$dirty = true;
                        details.clientDetails.cdServices.$invalid = false;
                        details.clientDetails.cdServices.$pristine = false;
                        details.remoteCheck = false;

                        for (var i = services.length - 1; i >= 0; i--) {
                            var idx = details.clientDetails.cdServices[services[i].$id];
                            idx.$dirty = true;
                            idx.$valid = true;
                            idx.$invalid = false;
                            idx.$pristine = false;
                            idx.$touched = true;
                            idx.$untouched = false;
                            idx.$setViewValue(services[i].service);
                            idx.$modelValue = services[i].service;
                            details.remoteCheck = idx.$dirty;
                        };
                    }

                    details.unSelectAll = function () {
                        details.clientDetails.cdServices.$dirty = false;
                        details.clientDetails.cdServices.$invalid = true;
                        details.clientDetails.cdServices.$pristine = true;

                        for (var i = services.length - 1; i >= 0; i--) {
                            var idx = details.clientDetails.cdServices[services[i].$id];
                            idx.$dirty = false;
                            idx.$valid = true;
                            idx.$invalid = false;
                            idx.$pristine = true;
                            idx.$touched = false;
                            idx.$untouched = true;
                            idx.$setViewValue('');
                            idx.$modelValue = '';
                            details.remoteCheck = idx.$dirty;
                        };
                    }

                });
        }

        function statesList() {
            detailsFactory.fetchStates()

                .then(function (usStatesList) {
                    details.states = usStatesList;
                });
        }

        function goForthAndBind() {

            details.success = false;
            details.show = false;

            details.showServicesList = function () {
                details.show = details.show === false ? true : false;
            }

            details.createClientDetails = function (dataFromForm) {
                detailsFactory.createCompanyMeta(dataFromForm)

                    //receiving useLessData from the factory simply completes the promise chain
                    .then(function (useLessData) {
                            details.success = true;
                            $location.path('/dashboard');
                    });
            }
        }
    }
})();