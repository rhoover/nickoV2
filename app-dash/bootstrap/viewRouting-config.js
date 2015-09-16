(function () {
    'use strict';

    angular
        .module('nickoDash.boot')
        .config(viewRouting);

        function viewRouting($routeProvider) {

            $routeProvider
                .when('/dashboard/', {
                    templateUrl: 'home.html',
                    controller: 'DashHomeCtrl',
                    controllerAs: 'dashHome'
                })
                .when('/dashboard/clients', {
                    templateUrl: 'clients.html',
                    controller: 'DashClientsCtrl',
                    controllerAs: 'dashClients'
                })
                .when('/dashboard/jobs', {
                    templateUrl: 'jobs.html',
                    controller: 'DashJobsCtrl',
                    controllerAs: 'dashJobs'
                })
                .when('/dashboard/invoices', {
                    templateUrl: 'invoices.html',
                    controller: 'DashInvoicesCtrl',
                    controllerAs: 'dashInvoices'
                })
                .when('/dashboard/settings', {
                    templateUrl: 'settings.html',
                    controller: 'DashSettingsCtrl',
                    controllerAs: 'dashSettings'
                })
                .when('/dashboard/help', {
                    templateUrl: 'help.html',
                    controller: 'DashHelpCtrl',
                    controllerAs: 'dashHelp'
                })
            //     .when('/login', {
            //         templateUrl: 'partials/login/login.html',
            //         title: 'Nicko Log In',
            //         controller: 'LoginCtrl',
            //         controllerAs: 'spk'
            //     })
            //     .when('/signup/details', {
            //         templateUrl: 'partials/details/details.html',
            //         title: 'Nicko User Details',
            //         controller: 'DetailsCtrl',
            //         controllerAs: 'spk'
            //     })
            //     .when('/dashboard', {
            //         templateUrl: 'partials/dashboard/dashboard.html',
            //         title: 'Nicko Dashboard',
            //         controller: 'DashCtrl',
            //         controllerAs: 'spk',
            //         resolve: {
            //             dashBoard: dashBoard
            //         }
            //     })
            //     .when('/jobleader', {
            //         templateUrl: 'partials/jobleader/jobleader.html',
            //         title: 'Nicko Job Leader',
            //         controller: 'JobLeaderCtrl',
            //         controllerAs: 'spk'
            //     })
            //     .when('/jobleader/:id', {
            //         templateUrl: 'partials/jobleader/magicbuttons.html',
            //         title: 'Nicko Job Leader',
            //         controller: 'JobLeaderButtonsCtrl',
            //         controllerAs: 'spk'
            //     })
                .otherwise('/dashboard/', {
                    title: 'Nicko Dashboard Home'
                });
        }
})();