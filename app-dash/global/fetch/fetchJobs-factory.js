(function () {
  'use strict';

  angular
    .module('nickoDash.utils')
    .factory('fetchJobs', fetchJobs);

  function fetchJobs($cookies, $firebaseAuth, $firebaseArray, fbRootUrl) {

    var factoryAPI = {
      jobsList: jobsList
    };
    return factoryAPI;

    ////////////////

    function jobsList() {
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