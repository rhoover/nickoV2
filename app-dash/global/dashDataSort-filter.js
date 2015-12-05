(function () {
'use strict';

angular
  .module('nickoDash.utils')
  .filter('dashDataSort', dashDataSort);

  function dashDataSort () {

    var filterAPI = {
      sortAsc: sortAsc,
      sortDsc: sortDsc,
      sortDateDsc: sortDateDsc
    }
    return filterAPI;

    ////////////////

    function sortAsc(dataInput) {
      var sortedAsc = [];

      sortedAsc = dataInput.sort(function (a, b) {
          return (a.creationMoment < b.creationMoment) ? -1 : 1;
      });
      return sortedAsc;
    }

    function sortDsc(dataInput) {
      var sortedDsc = [];

      sortedDsc = dataInput.sort(function (a, b) {
          return (a.creationMoment > b.creationMoment) ? -1 : 1;
      });
      return sortedDsc;
    }

    function sortDateDsc(dataInput) {
      var sortedDsc = [];

      sortedDateDsc = dataInput.sort(function (a, b) {
          return (a.dateStamp > b.dateStamp) ? -1 : 1;
      });
      return sortedDateDsc;
    }
  }
})();