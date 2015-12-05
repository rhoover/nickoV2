(function () {
  'use strict';

  angular
    .module('nickoSite.pages')
    .controller('SignupCtrl', SignupCtrl);

  function SignupCtrl($location, signUp) {
    /*jshint validthis: true */
    var signup = this;

    initialSignUp();

    ////////////////

    function initialSignUp() {
      signup.success = false;

      // var hostDomain = $location.host();


      signup.createNewClient = function (dataFromForm) {

      signUp.firebaseCreateUser(dataFromForm)
        .then(function (data) {
          signup.success = true;
          $location.path('/details');
        });
      };
    }
  }
})();