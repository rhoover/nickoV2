(function () {
    'use strict';

    angular
        .module('nickoSite.pages')
        .directive('buttonWait', buttonWait);

    function buttonWait ($location) {

        var ddo = {
            link: link,
            restrict: 'A',
            scope: {}
        };
        return ddo;

        ////////////////

        function link(scope, element, attrs) {
            element.on('click', function () {
                element[0].innerHTML = 'Hang tight, this takes a few seconds';
                element.addClass('signup-submit-wait');
            });
        }
    }
})();