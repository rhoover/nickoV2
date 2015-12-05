(function () {
  'use strict';

  angular
    .module('nickoSite.utils')
    .factory('authStore', authStore);

  function authStore($cacheFactory) {

    var factoryAPI = {
      setSignupCache: setSignupCache,
      fetchSignupCache: fetchSignupCache
    };
    return factoryAPI;

    ////////////////

    function setSignupCache(signupData) {
      var signup = $cacheFactory('signupObject');
      signup.put('signupObject', signupData);
    }

    function fetchSignupCache() {
      var signupStuff = $cacheFactory.get('signupObject').get('signupObject');
      return signupStuff;
    }
  }
})();