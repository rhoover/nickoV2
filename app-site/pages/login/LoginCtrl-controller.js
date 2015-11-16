(function () {
  'use strict';

  angular
    .module('nickoSite.pages')
    .controller('LoginCtrl', LoginCtrl);

  function LoginCtrl($scope, $window, $location, fbRootUrl, logIn) {
    /*jshint validthis: true */
    var login = this;

    logMeIn();

    ////////////////

    function logMeIn() {
      login.success = false;

      // destroy existing auth objects for easy testing, but keep in mind for edge
      // case where different office admins use same computer
      var rootRef = new Firebase(fbRootUrl);
      rootRef.unauth();

      login.loginClient = function (dataFromForm) {

        logIn.firebaseLogIn(dataFromForm)
          .then(function (roleTestResults) {
            $scope.$evalAsync(function () {
              $window.location.href = $window.location.origin + '/' + roleTestResults + '/';
            });
          });
      };
    }
  }
})();