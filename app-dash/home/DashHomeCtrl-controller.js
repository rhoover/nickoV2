(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashHomeCtrl', DashHomeCtrl);

  function DashHomeCtrl(fetchJobs, dashDataSortFilter) {
    /*jshint validthis: true */
    var dashHome = this;

    jobsBlock();

    ////////////////

    function jobsBlock() {
      fetchJobs.jobsList()
        .then(function (jobsListData) {
          console.log(jobsListData);
          var sortedDsc = dashDataSortFilter.sortDsc(jobsListData);
          dashHome.jobs = sortedDsc;
        })
    }
  }
})();