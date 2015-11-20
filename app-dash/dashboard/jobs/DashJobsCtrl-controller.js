(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashJobsCtrl', DashJobsCtrl);

  function DashJobsCtrl($scope, $location, $window) {
    /*jshint validthis: true */
    var dashJobs = this;
    dashJobs.toggle = {switch: true};

    innerViewToggle();

    ////////////////

    function innerViewToggle() {
      $scope.switchSubView = function () {
        dashJobs.toggle.switch = !dashJobs.toggle.switch;
      }
    }
  }
})();