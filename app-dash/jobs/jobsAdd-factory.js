(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .factory('jobsAdd', jobsAdd);

  function jobsAdd($cookies, $firebaseAuth, $firebaseArray, fbRootUrl) {

    var factoryAPI = {
      createJob: createJob
    };
    return factoryAPI;

    ////////////////

    function createJob(dataFromForm) {

      //let;s make firebase happy, no special characters in keys:
      delete dataFromForm.client.$id;
      delete dataFromForm.client.$priority;
      delete dataFromForm.frequency.$id;
      delete dataFromForm.frequency.$priority;
      delete dataFromForm.service.$id;
      delete dataFromForm.service.$priority;
      delete dataFromForm.state.$id;
      delete dataFromForm.state.$priority

      var rootRef = new Firebase(fbRootUrl);
      var userToken = $cookies.get('ATOK');
      var jobID = moment().unix();
      var creationMoment = {
        creationMoment: jobID
      };
      var completeData = {};

      dataFromForm.quote = parseInt(dataFromForm.quote, 10);
      completeData = angular.extend(completeData, dataFromForm, creationMoment);

      return $firebaseAuth(rootRef).$authWithCustomToken(userToken)

      .then(function (authData) {
        rootRef.child('userJobs').child(authData.uid).child(jobID).set(completeData);

        return authData.uid;
      })

      .then(function (userUID) {
        var convertedDate = {
          dateStamp: moment(completeData.date, "dddd, MMMM Do YYYY").unix()
        };

        rootRef.child('userJobs').child(userUID).child(jobID).update(convertedDate);

        return userUID;
      })

      .then(function (userUID) {
        var serviceID = completeData.service.id;
        var serviceSet = {};

        serviceSet[jobID] = true;

        rootRef.child('userServices').child(serviceID).child(userUID).update(serviceSet);

        return userUID;
      })

      .then(function (userUID) {
        var freqID = completeData.frequency.id;
        var freqSet = {};

        freqSet[jobID] = true;

        rootRef.child('userJobOccurrence').child(freqID).child(userUID).update(freqSet);

        return 'data';
      })

      .catch(function (error) {
        console.log('Shit! Creating Job error:  ', error);
      });
    }
  }
})();