(function () {
  'use strict';

  angular
      .module('nickoSite.pages')
      .factory('signUp', signUp);

  function signUp($firebaseAuth, fbRootUrl, authStore) {

    var factoryAPI = {
      firebaseCreateUser: firebaseCreateUser
    };
    return factoryAPI;

    ////////////////

    function firebaseCreateUser(dataFromForm) {
      var rootRef = new Firebase(fbRootUrl);
      var dataNotFromForm = {
        signUpMoment: moment().unix(),
        virgin: true,
        owner: true
      };
      var signupCreds = {
        email: dataFromForm.email,
        password: dataFromForm.password
      };
      var completeClientData = {};

      authStore.setSignupCache(signupCreds);
      completeClientData = angular.extend(completeClientData, dataFromForm, dataNotFromForm);

      return $firebaseAuth(rootRef).$createUser({
        email: completeClientData.email,
        password: completeClientData.password
        })

        //auth
        .then(function (userData) {
          return $firebaseAuth(rootRef).$authWithPassword({
              email: completeClientData.email,
              password: completeClientData.password
          });
        })

        //set new user
        .then(function (authData) {
          delete completeClientData.password;

          rootRef.child('users').child(authData.uid).set(completeClientData);

          return authData.uid;
        })

        //set log info
        .then(function (userUID) {
          var rightNow = completeClientData.signUpMoment;

          rootRef.child('userActivityLog').child(userUID).child('log' + ':' + rightNow).set({'login': rightNow});

          return userUID;
        })

        //update userRole tracking
        .then(function (userUID) {
          var userProp = userUID.toString();
          var userSet = {};
          userSet[userProp] = true;

          rootRef.child('userRoles').child('owner').update(userSet);

          return 'success';
        })

        .catch(function (error) {
          console.log('Shit!! An error', error);
        });
    }
  }
})();