(function () {
  'use strict';

  angular
    .module('nickoDash.dash')
    .controller('DashClientsCtrl', DashClientsCtrl);

  function DashClientsCtrl($scope, $location, $window,  dashDataSortFilter, clientsList, fetchInvoiceOptions, fetchStates, fetchJobFreqs, clientsAdd) {
    /*jshint validthis: true */
    var dashClients = this;
    dashClients.toggle = {switch: true};

    refreshKey();
    clientList();
    innerViewToggle();
    invoiceOccurrence();
    statesList();
    jobFrequency();
    createClient();

    ////////////////

    // function testSubmission() {
    //   var rootRef = new Firebase(fbRootUrl);
    //   var userID = $cookies.get('AUID');
    //   var userToken = $cookies.get('ATOK');
    //   return $firebaseAuth(rootRef).$authWithCustomToken(userToken)
    //     .then(function(authData) {
    //       console.log('Logged In As: ', authData);
    //     })
    //     .catch(function(error) {
    //       console.log('FAIL: ', error);
    //     })
    // }
    function refreshKey() {
      var dashView = $location.path();
      if (dashView = '/dashboard/clients') {
        angular.element($window).bind('keydown keyup', function (event) {
          if (event.which === 116 || event.keyCode === 116) {
            $scope.$apply(function () {
              // event.preventDefault();
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
      $scope.switchSubView = function () {
        dashClients.toggle.switch = !dashClients.toggle.switch;
      }
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

    function jobFrequency() {
      fetchJobFreqs.frequencyList()
        .then(function (jobTypes) {
          dashClients.jobTypes = jobTypes;
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
                  innerViewToggle();
                });
            });
          });
      }
    }
  }
})();