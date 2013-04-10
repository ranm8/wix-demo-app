/**
 * @TODO write file description
 */
(function (window) {
    'use strict';

    /**
     * @name Routing
     * @description
     * Provides an array of ways to communicate to a backend.
     */
    window.angular.module('Routing', [])
    /**
     * @name AppMarket.services.symfony2Router
     * @requires $window
     * @requires $injector
     * @description
     * Generates routes for a Symfony2 backend using FriendsOfSymfony JS Routing bundle.
     */
        .provider('symfony2Router', function() {
            var providerUrlTransformers;

            /**
             * @name ppMarket.services.symfony2RouterProvider#urlTransformers
             * @description
             * An array of URL transformers to allow outside changing of the URL.
             */
            this.urlTransformers = providerUrlTransformers = [];

            this.$get = ['$window', '$injector', function($window, $injector) {
                var routing = $window.Routing,
                    urlTransformers = [];

                if (routing === undefined) {
                    throw new Error('Could not locate FOS js routing bundle.');
                }

                angular.forEach(providerUrlTransformers, function(transformer) {
                    urlTransformers.push(
                        angular.isString(transformer)
                            ? $injector.get(transformer)
                            : $injector.invoke(transformer)
                    );
                });

                /**
                 * Runs the URL through all of the URL transformers and returns the new URL.
                 * @param {string} url The URL to run through the registered transformers.
                 * @returns {string} The new URL.
                 */
                function handleTransformers(url) {
                    angular.forEach(urlTransformers, function(transformer) {
                        url = transformer(url);
                    });

                    return url;
                }

                /**
                 * Generates a URL to a Symfony2 backend.
                 * @param {boolean} absolute Whether or not the return an absolute URL.
                 * @param {string} route The name of the route to look for.
                 * @param {Object} params An object of parameters to add to the URL.
                 * @param {boolean} disableTransformers
                 * @returns {string} A URL.
                 */
                function generate(absolute, route, params, disableTransformers) {
                    var param,
                        url;

                    for(param in params) {
                        if (params[param] === undefined) {
                            delete params[param];
                        }
                    }

                    url = routing.generate(route, params, absolute);

                    if (disableTransformers) {
                        return url;
                    }

                    return handleTransformers(url);
                }

                /**
                 * The return object has two methods: path() to generate a relative URL and url() to generate an
                 * absolute URL.
                 */
                return {
                    path: generate.bind(this, false),
                    url: generate.bind(this, true)
                };
            }];
        })

        /**
         * @name AppMarket.services.urlEncoder
         * @description
         * A simple service that encodes URLs.
         */
        .provider('urlEncoder', function() {
            this.$get = [function() {
                /**
                 * Encodes an object into a URL format (key=value)
                 * @param {Object} params The params as an object.
                 * @returns {string} The output.
                 */
                function encodeParams(params) {
                    var parts = [],
                        param;

                    for (param in params) {
                        if (params.hasOwnProperty(param) && params[param]) {
                            parts.push(encodeURIComponent(param) + "=" + encodeURIComponent(params[param]));
                        }
                    }

                    return parts.join("&");
                }

                /**
                 * Returns the separator for a URL ('?' or '&').
                 * @param {string} url The URL to get a separator for.
                 * @returns {string} The separator for the provided URL.
                 */
                function getUrlSeparator(url) {
                    var position = url.indexOf('?');

                    if (position === url.length - 1) {
                        return '';
                    }

                    return position === -1 ? '?' : '&';
                }

                /**
                 * Encodes a URL with params added to it as query string parameters.
                 * @param {string} url A URL to add parameters to.
                 * @param {Object} params An object that includes the query string parameters to append to the URL.
                 * @returns {string} The output.
                 */
                function encode(url, params) {
                    var query = encodeParams(params);

                    if (!query) {
                        return url;
                    }

                    return url + getUrlSeparator(url) + query;
                }

                return {
                    encode: encode
                };
            }];
        });
}(window));