(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashJobsCtrl', DashJobsCtrl);

  function DashJobsCtrl($scope, $location, $window, dashDataSortFilter, jobsList, fetchStates, fetchServices) { //fetchServices fetchJobFreqs clientsList jobsAdd
    /*jshint validthis: true */
    var dashJobs = this;
    dashJobs.toggle = {switch: true};

    innerViewToggle();
    jobList();
    statesList();
    servicesList();
    // clientList();
    // frequenciesList();
    // createJob();

    ////////////////

    function innerViewToggle() {
      $scope.switchSubView = function () {
        dashJobs.toggle.switch = !dashJobs.toggle.switch;
      }
    }

    function jobList() {
      jobsList.fetchJobs()
        .then(function (jobsListData) {
          var sortedDsc = dashDataSortFilter.sortDsc(jobsListData);
          dashJobs.jobs = sortedDsc;
        })
    }

    function statesList() {
      fetchStates.unitedStates()
        .then(function (usStatesList) {
          dashJobs.states = usStatesList;
        });
    }

    function servicesList() {
      fetchServices.serviceList()
        .then(function (services) {
            dashJobs.services = services;
        })
    }

  }
})();