(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .directive('clientsButton', clientsButton);

  function clientsButton ($animate) {

    var ddo = {
      link: link,
      restrict: 'A',
      scope: {}
    };
    return ddo;

    ////////////////

    function link(scope, element, attrs) {

      element.on('click', function () {
        if (attrs.toggle === 'add') {
          scope.$apply(function () {
            var addClient = angular.element(document.querySelector('.clients-create'));
            console.log(addClient);
          });
        } else {
          var viewClients = document.querySelector('.clients-data');
        };
      });
    }
  }
})();