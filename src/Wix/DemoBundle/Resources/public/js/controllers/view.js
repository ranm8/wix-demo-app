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
        user: ['$http', 'symfony2Router', function($http, symfony2Router) {
            return $http.get(symfony2Router.path('getUser')).then(function(response) {
                return response.data;
            });
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