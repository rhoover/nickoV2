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
      delete dataFromForm.jobType.$id;
      delete dataFromForm.jobType.$priority;
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
          rootRef.child('userClients').child(authData.uid).child(clientID).set(completeData);

          return authData.uid;
        })

        .then(function (userUID) {
          var occID = completeData.invoiceOccurrence.id;
          var occSet = {};

          occSet[clientID] = true;

          rootRef.child('userInvoiceOccurrence').child(occID).child(userUID).update(occSet);

          return userUID;
        })

        .then(function (userUID) {
          var typeID = completeData.jobType.id;
          var typeSet = {};

          typeSet[clientID] = true;

          rootRef.child('userJobType').child(typeID).child(userUID).update(typeSet);

          return userUID;
        })

        .then(function (userUID) {
          var stateID = completeData.state.name;
          var stateSet = {};

          stateSet[clientID] = true;

          rootRef.child('userStates').child(stateID).child(userUID).update(stateSet);

          return 'data';
        })

        .catch(function (error) {
          console.log('Shit! Creating Client error:  ', error);
        });
    }
  }
})();