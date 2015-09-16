(function () {
    'use strict';

    angular
        .module('nickoSite.pages')
        .factory('logIn', logIn);

    function logIn($firebaseAuth, fbRootUrl, authStore, roleTest) {

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
                    }
                    // authStore.setCache(authData);
                    // authStore.setloginCache(logInData);
                    // logRef.child(authData.uid).child('log' + ':' + rightNow).set({'login': rightNow});
                    // logRef.child(authData.uid).set({'logToken': authData.token});
                    authStore.sessionStoreData('authStuff', authData.uid);
                    logRef.child(authData.uid).child('log' + ':' + rightNow).set({'login': rightNow});
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