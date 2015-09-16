(function () {
    'use strict';

    angular
        .module('nickoSite.pages')
        .controller('SignupCtrl', SignupCtrl);

    function SignupCtrl($location, $window) {
        /*jshint validthis: true */
        var signup = this;

        goForthAndBind();

        ////////////////

        function goForthAndBind() {
            signup.success = false;

            var hostDomain = $location.host();
            // $window.location.href = hostDomain + '/details/';


            // spk.createNewClient = function (dataFromForm) {

            //     signUp.firebaseCreateUser(dataFromForm)
            //         .then(function (data) {
            //                 spk.success = true;
            //                 $location.path('/signup/details');
            //         });
            // };
        }
    }
})();