(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashCtrl', DashCtrl);

  function DashCtrl($location, authStore, userCompanyMeta) {
    /*jshint validthis: true */
    var dash = this;

    companyHeader();

    ////////////////

    function companyHeader() {
      var authStuff = authStore.sessionGetData('authStuff');
      if (authStuff != null) {
        authStore.setAuthCookie(authStuff);
        userCompanyMeta.fetch(authStuff)
          .then(function (companyMetaObject) {
              dash.name = companyMetaObject.companyname;
          });
        authStore.sessionRemoveData('authStuff');
      } else {
        var authUID = authStore.fetchAuthCookie();
        userCompanyMeta.fetch(authUID)
          .then(function (companyMetaObject) {
              dash.name = companyMetaObject.companyname;
          });
      }
    }

  }
})();