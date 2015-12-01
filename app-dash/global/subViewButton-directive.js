(function () {
  'use strict';

  angular
    .module('nickoDash.utils')
    .directive('viewButton', viewButton);

  function viewButton () {

    var ddo = {
      link: link,
      restrict: 'A',
      scope: false
    };
    return ddo;

    ////////////////

    function link(scope, element, attrs) {
      attrs.$set('subview', 'list');
      var addButton = angular.element(element.find('p')[0]);
      var listButton = angular.element(element.find('p')[1]);

      addButton.on('click', function () {
        if (attrs.subview === 'list') {
          scope.$apply(function () {
            scope.switchSubView();
            attrs.$set('subview', 'form');
          });
        };
      });

      listButton.on('click', function () {
        if (attrs.subview === 'form') {
          scope.$apply(function () {
            scope.switchSubView();
            attrs.$set('subview', 'list');
          });
        };
      });
    }
  }
})();