(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashClientsCtrl', DashClientsCtrl);

  function DashClientsCtrl($scope, $location, $window,  dashDataSortFilter, clientsList, fetchInvoiceOptions, fetchStates, fetchJobFreqs, fetchJobTypes, clientsAdd) {
    /*jshint validthis: true */
    var dashClients = this;
    dashClients.toggle = {switch: true};

    // refreshKey();
    clientList();
    innerViewToggle();
    invoiceOccurrence();
    statesList();
    jobFrequency();
    jobType();
    createClient();

    ////////////////

    // function refreshKey() {
    //   var dashView = $location.path();
    //   if (dashView = '/dashboard/clients') {
    //     angular.element($window).bind('keydown keyup', function (event) {
    //       if (event.which === 116 || event.keyCode === 116) {
    //         $scope.$apply(function () {
    //           // event.preventDefault();
    //           $location.path('/dashboard/');
    //         });
    //       }
    //     });
    //   };
    // }

    function innerViewToggle() {
      $scope.switchSubView = function () {
        dashClients.toggle.switch = !dashClients.toggle.switch;
      }
    }

    function clientList() {
      clientsList.fetchClients()
        .then(function (clientsListData) {
          var sortedDsc = dashDataSortFilter.sortDsc(clientsListData);
          dashClients.clients = sortedDsc;
        });
      }

    function statesList() {
      fetchStates.unitedStates()
        .then(function (usStatesList) {
          dashClients.states = usStatesList;
        });
    }

    function invoiceOccurrence() {
      fetchInvoiceOptions.invoicesList()
        .then(function (occurrences) {
          dashClients.occurrences = occurrences;
        });
    }

    function jobType() {
      fetchJobTypes.typeList()
        .then(function (jobTypes) {
          dashClients.jobTypes = jobTypes;
        });
    }

    function jobFrequency() {
      fetchJobFreqs.frequencyList()
        .then(function (jobFreqs) {
          dashClients.jobFreqs = jobFreqs;
        });
    }

    function createClient() {

      dashClients.createNewCustomer = function (dataFromForm) {
        clientsAdd.createClient(dataFromForm)
          .then(function (switchData) {
            dashClients.newcustomer = null;
            $scope.$evalAsync(function () {
              clientsList.fetchClients()
                .then(function (clientsListData) {
                  var sortedDsc = dashDataSortFilter.sortDsc(clientsListData);
                  dashClients.clients = sortedDsc;
                  $scope.switchSubView = function () {
                    dashClients.toggle.switch = !dashClients.toggle.switch;
                  }
                });
            });
          });
      }
    }
  }
})();