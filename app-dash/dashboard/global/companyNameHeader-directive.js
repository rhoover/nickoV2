(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .directive('companyNameHeader', companyNameHeader);

  function companyNameHeader (authStore, userCompanyMeta, fbRootUrl) {

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
      var rootRef = new Firebase(fbRootUrl);
      var getAuthData = rootRef.getAuth();
      var sessionToken = authStore.sessionGetData('tokenStuff');
      if (getAuthData.token === sessionToken) {
        console.log('Thats a BINGO!!!');
      } else {
        console.log("Fuck My Life");
      }
      var idStuff = authStore.sessionGetData('uidStuff');
      if (idStuff != null) {
        authStore.setIDCookie(idStuff);
        userCompanyMeta.fetch(idStuff)
          .then(function (companyMetaObject) {
              dash.name = companyMetaObject.companyname;
          });
        authStore.sessionRemoveData('uidStuff');
      } else {
        var authUID = authStore.fetchIDCookie();
        userCompanyMeta.fetch(authUID)
          .then(function (companyMetaObject) {
            dash.name = companyMetaObject.companyname;
          });
      }
    }
  }
})();
