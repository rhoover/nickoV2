(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashClientsCtrl', DashClientsCtrl);

  function DashClientsCtrl($scope, $location, $window, dashDataSortFilter, clientsList) {
    /*jshint validthis: true */
    var dashClients = this;
    dashClients.toggle = {switch: true};

    refreshKey();
    clientList();
    innerViewToggle();
    // invoiceOccurrence();

    ////////////////

    function refreshKey() {
      var dashView = $location.path();
      if (dashView = '/dashboard/clients') {
        angular.element($window).bind('keydown keypress', function (event) {
          if (event.which === 116 || event.keyCode === 116) {
            $scope.$apply(function () {
              event.preventDefault();
              $location.path('/dashboard/');
            });
          }
        });
      };
    }

    function clientList() {
      clientsList.fetchClients()
        .then(function (clientsListData) {
          var sortedDsc = dashDataSortFilter.sortDsc(clientsListData);
          dashClients.clients = sortedDsc;
        });
      }

    function innerViewToggle() {
      $scope.showClientForm = function () {
        $scope.$parent.dashClients.toggle.switch = !$scope.$parent.dashClients.toggle.switch;
      }
      $scope.showClientList = function () {
        $scope.$parent.dashClients.toggle.switch = !$scope.$parent.dashClients.toggle.switch;
      }
    }

    // function invoiceOccurrence() {
    //   fetchInvoiceOptions.invoicesList()
    //     .then(function (occurrences) {
    //       dashClients.occurrences = occurrences;
    //     });
    // }
  }
})();