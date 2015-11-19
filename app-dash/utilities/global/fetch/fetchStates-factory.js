(function () {
    'use strict';

    angular
        .module('nickoDash.utils')
        .factory('fetchStates', fetchStates);

    function fetchStates($firebaseArray, fbRootUrl) {

        var factoryAPI = {
            unitedStates: unitedStates
        };
        return factoryAPI;

        ////////////////

        function unitedStates() {
            var statesRef = new Firebase(fbRootUrl + '/states');
            var statesArray = $firebaseArray(statesRef);

            return statesArray.$loaded()
                .then(function () {
                    //get rid of properties inserted by fbArray
                    // for (var i = statesArray.length - 1; i >= 0; i--) {
                    //     delete statesArray[i].$id;
                    //     delete statesArray[i].$priority;
                    // }
                    //needed so that the select element is presented as expected
                    var pickMeState = {
                        abbreviation: 'YO',
                        name: 'Pick A State'
                    };
                    statesArray.splice(0, 0, pickMeState);

                    return statesArray;
                });
        }
    }
})();