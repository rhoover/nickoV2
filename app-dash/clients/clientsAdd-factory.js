(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .factory('clientsAdd', clientsAdd);

  function clientsAdd($cookies, $firebaseAuth, $firebaseArray, fbRootUrl) {

    var factoryAPI = {
      createClient: createClient
    };
    return factoryAPI;

    ////////////////

    function createClient(dataFromForm) {

      //let;s make firebase happy, no special characters in keys:
      delete dataFromForm.invoiceOccurrence.$id;
      delete dataFromForm.invoiceOccurrence.$priority;
      // delete dataFromForm.jobFreq.$id;
      // delete dataFromForm.jobFreq.$priority;
      // delete dataFromForm.jobType.$id;
      // delete dataFromForm.jobType.$priority;
      delete dataFromForm.state.$id;
      delete dataFromForm.state.$priority

      var rootRef = new Firebase(fbRootUrl);
      var userToken = $cookies.get('ATOK');
      var clientID = moment().unix();
      var creationMoment = {
        creationMoment: clientID
      };
      var completeData = {};

      completeData = angular.extend(completeData, dataFromForm, creationMoment);

      return $firebaseAuth(rootRef).$authWithCustomToken(userToken)

        .then(function (authData) {
          rootRef.child('userClients').child(authData.uid).child('client' + ':' + clientID).set(completeData);
          return authData.uid;
        })

        .then(function (userUID) {
          var occID = completeData.invoiceOccurrence.id;
          // var freqID = completeData.jobFreq.id;
          // var typeID = completeData.jobType.id;

          var clientProp = 'client' + ':' + clientID.toString();

          var clientSet = {};
          // var jobFreqSet = {};
          // var jobTypeSet = {};

          clientSet[clientProp] = true;
          // jobFreqSet[clientProp] = true;
          // jobTypeSet[clientProp] = true;

          rootRef.child('userInvoiceOccurrence').child(occID).child(userUID).update(clientSet);
          // rootRef.child('userJobOccurrence').child(freqID).child(userUID).update(jobFreqSet);
          // rootRef.child('userJobType').child(typeID).child(userUID).update(jobTypeSet);

          return 'data';
        })

        .catch(function (error) {
          console.log('Shit! Creating Client error:  ', error);
        });
    }
  }
})();