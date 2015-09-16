(function () {
    'use strict';

  angular
    .module('nickoDash.dash')
    .directive('menuNavButton', menuNavButton);

  function menuNavButton ($location) {

    var ddo = {
        link: link,
        restrict: 'A'
    };
    return ddo;

    ////////////////

    function link(scope, element, attrs) {
      element.on('click', function () {
        scope.$apply(function () {
          $location.path(attrs.menuNavButton);
        });
      });
    }
  }
})();