(function () {
    'use strict';

    angular
        .module('nickoSite.pages')
        .factory('roleTest', roleTest);

    function roleTest($firebaseObject, fbRootUrl, crewLeaderStore) {

        var factoryAPI = {
            firebaseObjectQuery: firebaseObjectQuery
        };
        return factoryAPI;

        ////////////////

        function firebaseObjectQuery(userUID) {
            var usersUrl = fbRootUrl + '/users';
            var userRef = new Firebase(usersUrl).child(userUID);
            var userObject = $firebaseObject(userRef);

            return userObject.$loaded()
                .then(function () {
                    if (userObject.boss) {
                        crewLeaderStore.setUserCache(userObject);
                    }
                    return userObject;
                })
                .then(function (userObject) {
                    //YAT yet another ternary, these things are fucking great!!!!
                    return userObject.owner === true ? 'dashboard' : 'jobleader';
                });
        }
    }
})();