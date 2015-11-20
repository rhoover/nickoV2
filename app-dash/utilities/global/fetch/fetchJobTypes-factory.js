(function () {
  'use strict';

  angular
    .module('nickoDash.utils')
    .factory('fetchJobTypes', fetchJobTypes);

  function fetchJobTypes($firebaseArray, fbRootUrl) {

    var factoryAPI = {
        typeList: typeList
    };
    return factoryAPI;

    ////////////////

    function typeList() {
      var typeRef = new Firebase(fbRootUrl + '/jobType');
      var typeArray = $firebaseArray(typeRef);

      return typeArray.$loaded()
        .then(function () {
              //get rid of properties inserted by fbArray
              // for (var i = frequencyArray.length - 1; i >= 0; i--) {
              //     delete frequencyArray[i].$id;
              //     delete frequencyArray[i].$priority;
              // }
              //needed so that the select element is presented as expected
          var pickMeType = {
              type: 'Pick A Job Type',
              id: 'pickme'
          };
          typeArray.splice(0, 0, pickMeType);

          return typeArray;
      });
    }
  }
})();