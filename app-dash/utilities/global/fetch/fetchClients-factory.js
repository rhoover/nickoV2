(function () {
  'use strict';

  angular
    .module('nickoDash.utils')
    .factory('clientsList', clientsList);

  function clientsList($firebaseAuth, $firebaseArray, fbRootUrl, authStore) {

    var factoryAPI = {
        fetchClients: fetchClients
    };
    return factoryAPI;

    ////////////////

    function fetchClients() {
      var user = authStore.fetchAuthCookie();
      var clientsRef = new Firebase(fbRootUrl + '/userClients' + '/' + user);
      var clientsArray = $firebaseArray(clientsRef);

      return clientsArray.$loaded()
        .then(function () {
            return clientsArray;
          })
          .catch(function (error) {
            console.log('Shit!!! Fetching Error of Some Sort:  ' + error);
          });
    }
  }
})();