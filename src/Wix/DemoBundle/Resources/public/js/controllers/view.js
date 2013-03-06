/**
 * @TODO write file description
 */
(function(window) {
    'use strict';

    /**
     * Simple demo control that can be used as a starting place.
     */
    var ViewCtrl = function($scope, user) {
        /**
         * User model. Holds data on the active user.
         */
        $scope.user = user;
    };

    /**
     * These promises will be resolved before the page is loaded and rendered to a user.
     */
    ViewCtrl.resolve = {
        /**
         * Fetching a user model from the backend to make it available to this controller.
         */
        user: ['$http', '$q', 'symfony2Router', function($http, $q, symfony2Router) {
            var user = $q.defer();

            $http.get(symfony2Router.path('getUser')).success(function(response) {
                user.resolve(response);
            });

            return user.promise;
        }]
    };

    /**
     * Concrete injections
     */
    ViewCtrl.$inject = ['$scope', 'user'];

    /**
     * Import to global scope
     */
    window.ViewCtrl = ViewCtrl;
}(window));