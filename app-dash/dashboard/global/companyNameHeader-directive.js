(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .directive('companyNameHeader', companyNameHeader);

  function companyNameHeader (authStore, userCompanyMeta) {

    var ddo = {
      controller: header,
      controllerAs: 'dash',
      restrict: 'A',
      scope: {},
      template: '{{dash.name}}'
    };
    return ddo;

    ////////////////

    function header() {
      var dash = this;
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
