/**
 * @TODO write file description
 */
(function(window) {
    'use strict';

    /**
     * Simple settings control that can be used as a starting place.
     */
    var SettingsCtrl = function($scope, $http, symfony2Router, sdk, partialLoader, user) {
        /**
         * User model. Holds data on the active user.
         */
        $scope.user = user;

        /**
         * available font families to choose from.
         */
        $scope.fontFamily = ['Arial', 'Times', 'Verdana'];

        /**
         * available font sizes to choose from.
         */
        $scope.fontSize = ['Small', 'Medium', 'Large'];

        /**
         * open a dialog when a user activates the connect() method.
         */
        $scope.connect = function() {
            partialLoader.load('/../bundles/wixdemo/partials/dialog.html');
        };

        /**
         * Watching the user model and making a call to our backend whenever it changes.
         */
        $scope.$watch('user', function(user, oldUser) {
            if (user === oldUser) {
                return;
            }

            $http.post(symfony2Router.path('postUser'), user)
                .then(function() {
                    sdk.Settings.refreshCurrentApp();
                });
        }, true);
    };

    /**
     * These promises will be resolved before the page is loaded and rendered to a user.
     */
    SettingsCtrl.resolve = {
        /**
         * Fetching a user model from the backend to make it available to this controller.
         */
        user: ['$http', '$q', 'symfony2Router', function($http, $q, symfony2Router) {
            return $http.get(symfony2Router.path('getUser')).then(function(response) {
                return response.data;
            });
        }]
    };

    /**
     * Concrete injections
     */
    SettingsCtrl.$inject = ['$scope', '$http', 'symfony2Router', 'sdk', 'partialLoader', 'user'];

    /**
     * Import to global scope
     */
    window.SettingsCtrl = SettingsCtrl;
}(window));