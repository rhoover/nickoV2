(function () {
  'use strict';

  angular
    .module('nickoDash.utils')
    .factory('jobsList', jobsList);

  function jobsList($cookies, $firebaseAuth, $firebaseArray, fbRootUrl) {

    var factoryAPI = {
      fetchJobs: fetchJobs
    };
    return factoryAPI;

    ////////////////

    function fetchJobs() {
      var user = $cookies.get('AUID');
      var jobsRef = new Firebase(fbRootUrl + '/userJobs' + '/' + user);
      var jobsArray = $firebaseArray(jobsRef);

      return jobsArray.$loaded()
        .then(function () {
          return jobsArray;
        })
        .catch(function (error) {
          console.log('Shit!!! Fetching Error of Some Sort:  ' + error);
        });
    }
  }
})();