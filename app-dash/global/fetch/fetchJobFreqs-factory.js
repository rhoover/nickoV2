(function () {
  'use strict';

  angular
    .module('nickoDash.utils')
    .factory('fetchJobFreqs', fetchJobFreqs);

  function fetchJobFreqs($firebaseArray, fbRootUrl) {

    var factoryAPI = {
        frequencyList: frequencyList
    };
    return factoryAPI;

    ////////////////

    function frequencyList() {
      var frequencyRef = new Firebase(fbRootUrl + '/jobOccurrence');
      var frequencyArray = $firebaseArray(frequencyRef);

      return frequencyArray.$loaded()
        .then(function () {
              //get rid of properties inserted by fbArray
              // for (var i = frequencyArray.length - 1; i >= 0; i--) {
              //     delete frequencyArray[i].$id;
              //     delete frequencyArray[i].$priority;
              // }
              //needed so that the select element is presented as expected
          var pickMeFrequency = {
              name: 'Pick A Job Frequency',
              id: 'pickme'
          };
          frequencyArray.splice(0, 0, pickMeFrequency);

          return frequencyArray;
      });
    }
  }
})();