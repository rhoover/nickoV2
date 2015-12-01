(function () {
  'use strict';

  angular
    .module('nickoDash.utils')
    .directive('companyNameHeader', companyNameHeader);

  function companyNameHeader ($cookies, userCompanyMeta) {

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
      var authUID = $cookies.get('AUID');
      userCompanyMeta.fetch(authUID)
        .then(function (companyMetaObject) {
          dash.name = companyMetaObject.companyname;
        });
    }
  }
})();
