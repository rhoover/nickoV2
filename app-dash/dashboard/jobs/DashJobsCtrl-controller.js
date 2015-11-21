(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashJobsCtrl', DashJobsCtrl);

  function DashJobsCtrl($scope, $location, $window, dashDataSortFilter, jobsList) {
    /*jshint validthis: true */
    var dashJobs = this;
    dashJobs.toggle = {switch: true};

    innerViewToggle();
    jobList();

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
  }
})();