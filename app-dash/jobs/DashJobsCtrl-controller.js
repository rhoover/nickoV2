(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashJobsCtrl', DashJobsCtrl);

  function DashJobsCtrl($scope, dashDataSortFilter, fetchJobs, fetchStates, fetchServices, fetchJobFreqs, clientsList, jobsAdd) {
    /*jshint validthis: true */
    var dashJobs = this;
    dashJobs.toggle = {switch: true};

    innerViewToggle();
    jobList();
    statesList();
    servicesList();
    clientList();
    jobFrequency();
    createJob();

    ////////////////

    function innerViewToggle() {
      $scope.switchSubView = function () {
        dashJobs.toggle.switch = !dashJobs.toggle.switch;
      }
    }

    function jobList() {
      fetchJobs.jobsList()
        .then(function (jobsListData) {
          var sortedDsc = dashDataSortFilter.sortDsc(jobsListData);
          dashJobs.jobs = sortedDsc;
        })
    }

    function statesList() {
      fetchStates.unitedStates()
        .then(function (usStatesListData) {
          dashJobs.states = usStatesListData;
        });
    }

    function servicesList() {
      fetchServices.serviceList()
        .then(function (servicesListData) {
            dashJobs.services = servicesListData;
        });
    }

    function clientList() {
      clientsList.fetchClients()
        .then(function (clientsListData) {
          var pickMeClient = {
            fullname: 'Pick A Client'
          };
          clientsListData.splice(0, 0, pickMeClient);
          dashJobs.clients = clientsListData;
        });
    }

    function jobFrequency() {
      fetchJobFreqs.frequencyList()
        .then(function (jobFreqsData) {
          dashJobs.frequencies = jobFreqsData;
        });
    }

    function createJob() {
      dashJobs.createNewJob = function (dataFromForm) {
        jobsAdd.createJob(dataFromForm)
          .then(function () {
            dashJobs.newjob = null;
            $scope.$evalAsync(function () {
              fetchJobs.jobsList()
                .then(function (jobsListData) {
                  var sortedDsc = dashDataSortFilter.sortDsc(jobsListData);
                  dashJobs.jobs = sortedDsc;
                  $scope.switchSubView = function () {
                    dashJobs.toggle.switch = !dashJobs.toggle.switch;
                  }
                });
            });
          });
      }
    }

  }
})();