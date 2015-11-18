(function () {
  'use strict';

  angular
      .module('nickoSite.pages')
      .factory('logIn', logIn);

  function logIn($cookies, $firebaseAuth, fbRootUrl, roleTest) {

    var factoryAPI = {
      firebaseLogIn: firebaseLogIn
    };
    return factoryAPI;

    ////////////////

    function firebaseLogIn(dataFromForm) {
      var rootRef = new Firebase(fbRootUrl);
      var logUrl = fbRootUrl + '/userActivityLog';
      var logRef = new Firebase(logUrl);
      var rightNow = moment().unix();

      return $firebaseAuth(rootRef).$authWithPassword({
        email: dataFromForm.email,
        password: dataFromForm.password
        })

        .then(function (authData) {
          var logInData = {
            email: dataFromForm.email,
            password: dataFromForm.password
          };

          $cookies.put('AUID', authData.uid);
          $cookies.put('ATOK', authData.token);

          logRef.child(authData.uid)
            .child('log' + ':' + rightNow)
            .set({
              'login': rightNow,
              'token': authData.token
            });

          return authData.uid;
        })

        .then(function (authUID) {
            return roleTest.firebaseObjectQuery(authUID);
        })

        .then(function (roleTestResults) {
            return roleTestResults
        })

        .catch(function (error) {
            console.log('Shit! Login error:  ', error);
        });

    }
  }
})();