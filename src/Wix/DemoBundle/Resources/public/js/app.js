/**
 * @TODO write file description
 */
(function(window) {
    'use strict';

    window.angular.module('Base', ['Base.filters', 'Base.services', 'Base.directives', 'Wix'])
        /**
         * config phase
         */
        .config(['$routeProvider', '$locationProvider', 'symfony2RouterProvider', function($routeProvider, $locationProvider, symfony2RouterProvider) {
            // setting routes
            $routeProvider
                .when('/settings', {
                    controller: window.SettingsCtrl,
                    resolve: window.SettingsCtrl.resolve,
                    templateUrl: '/../bundles/wixdemo/partials/settings.html'
                })
                .when('/', {
                    controller: window.ViewCtrl,
                    resolve: window.ViewCtrl.resolve,
                    templateUrl: '/../bundles/wixdemo/partials/view.html'
                });

            // html5 mode
            $locationProvider
                .html5Mode(true)
                .hashPrefix('!');

            // enable the wix transformer
            symfony2RouterProvider
                .urlTransformers.push('wixTransformer');
        }]);
}(window));
