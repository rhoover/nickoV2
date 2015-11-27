(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .factory('userCompanyMeta', userCompanyMeta);

  function userCompanyMeta($firebaseObject, fbRootUrl) {

    var factoryAPI = {
        fetch: fetch
    };
    return factoryAPI;

    ////////////////

    function fetch(userUID) {
      var companyRef = new Firebase(fbRootUrl);
      var companyMetaObject = $firebaseObject(companyRef.child('userCompanyMeta').child(userUID));

      return companyMetaObject.$loaded()
        .then(function () {
          return companyMetaObject;
        });
    }
  }
})();