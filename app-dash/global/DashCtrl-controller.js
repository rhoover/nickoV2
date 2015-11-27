(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashCtrl', DashCtrl);

  function DashCtrl($scope, $location, $window) {
    /*jshint validthis: true */
    var dash = this;

    noEffFive();

    ////////////////

    function noEffFive() {
      var dashStateUrl = $location.path();

      if (dashStateUrl === '/dashboard/clients' || '/dashboard/jobs' || '/dashboard/invoices' || '/dashboard/settings' || '/dashboard/help') {
        angular.element($window).bind('keydown keyup', function(event) {
          if (event.which === 116 || event.keyCode === 116) {
            $scope.$apply(function () {
              $location.path('/dashboard');
             // or, if need be: event.preventDefault();
            });
          };
        });
      };

    }
  }
})();
