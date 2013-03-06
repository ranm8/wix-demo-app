/**
 * @TODO write file description
 */
(function(window) {
    'use strict';

    /**
     * @todo docs
     */
    window.angular.module('Base', ['Base.filters', 'Base.services', 'Base.directives', 'Base.config', 'Wix', 'Text', 'Ui'])
        /**
         * @todo docs
         */
        .config(['$routeProvider', '$locationProvider', 'symfony2RouterProvider', function($routeProvider, $locationProvider, symfony2RouterProvider) {
            $routeProvider
                .when('/settings', {
                    controller: window.DemoCtrl,
                    resolve: window.DemoCtrl.resolve,
                    templateUrl: '/../bundles/wixdemo/partials/demo.html'
                })
                .when('/view', {
                    controller: window.ViewCtrl,
                    resolve: window.ViewCtrl.resolve,
                    templateUrl: '/../bundles/wixdemo/partials/view.html'
                })
                .otherwise({
                    redirectTo: '/settings'
                });

//            $locationProvider.html5Mode(true);

            symfony2RouterProvider.urlTransformers.push('wixTransformer');
        }]);
}(window));