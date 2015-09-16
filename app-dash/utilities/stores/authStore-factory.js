(function () {
    'use strict';

    angular
        .module('nickoDash.utils')
        .factory('authStore', authStore);

    function authStore($cookies) {

        var factoryAPI = {
            sessionGetData: sessionGetData,
            sessionRemoveData: sessionRemoveData,
            setAuthCookie: setAuthCookie,
            fetchAuthCookie: fetchAuthCookie
        };
        return factoryAPI;

        ////////////////

        function sessionGetData(key) {
            return angular.fromJson(sessionStorage.getItem(key));
        }

        function sessionRemoveData(key) {
            sessionStorage.removeItem(key);
        }

        function setAuthCookie(authData) {
            $cookies.put('AUID', authData);
        }

        function fetchAuthCookie() {
            var authCookie = $cookies.get('AUID');
            return authCookie;
        }

        // function setloginCache(loginData) {
        //     var login = $cacheFactory('loginObject');
        //     login.put('loginObject', loginData);
        // }

        // function fetchloginCache() {
        //     //aka: $cachefactory.get(ID).get(key);
        //     var loginStuff = $cacheFactory.get('loginObject').get('loginObject');
        //     return loginStuff;
        // }

        // function setSignupCache(signupData) {
        //     var signup = $cacheFactory('signupObject');
        //     signup.put('signupObject', signupData);
        // }

        // function fetchSignupCache() {
        //     var signupStuff = $cacheFactory.get('signupObject').get('signupObject');
        //     return signupStuff;
        // }
    }
})();