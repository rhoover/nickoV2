(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .directive('clientsButton', clientsButton);

  function clientsButton () {

    var ddo = {
      controller: 'DashClientsCtrl',
      link: link,
      restrict: 'A',
      scope: {}
    };
    return ddo;

    ////////////////

    function link(scope, element, attrs, parentCtrl) {
      element.on('click', function () {
        scope.$applyAsync(attrs.clientsButton);
      });
    }
  }
})();