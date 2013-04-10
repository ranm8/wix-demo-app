/**
 * Ronen Amiel <ronena@codeoasis.com>
 * 2/17/13, 3:20 PM
 */
(function(window) {
    'use strict';

    describe('Routing', function() {
        beforeEach(module('Routing'));

        describe('urlEncoder', function() {
            describe('urlEncoder#encode', function() {
                it('should encode urls with parameters', inject(function(urlEncoder) {
                    expect(urlEncoder.encode('http://www.host.com', { hello: 'world' }))
                        .toEqual('http://www.host.com?hello=world');

                    expect(urlEncoder.encode('http://www.host.com', { hello: 'world', foo: 'bar' }))
                        .toEqual('http://www.host.com?hello=world&foo=bar');

                    expect(urlEncoder.encode('/hello/world', { foo: 'bar' }))
                        .toEqual('/hello/world?foo=bar');
                }));
            });
        });

        describe('symfony2Router', function() {
            var $window = { Routing: { generate: jasmine.createSpy().andReturn('/url') } };

            beforeEach(module(function($provide) {
                $provide.value('$window', $window);
            }));

            describe('symfony2Router#path', function() {
                it('should generate relative urls to a symfony2 backend', inject(function(symfony2Router) {
                    symfony2Router.path('hello', { foo: 'bar' });
                    expect($window.Routing.generate).toHaveBeenCalledWith('hello', { foo: 'bar' }, false);
                }));
            });

            describe('symfony2Router#url', function() {
                it('should generate absolute urls to a symfony2 backend', inject(function(symfony2Router) {
                    symfony2Router.url('hello', { foo: 'bar', hello: 'world' });
                    expect($window.Routing.generate).toHaveBeenCalledWith('hello', { foo: 'bar', hello: 'world' }, true);
                }));
            });

            describe('symfony2RouterProvider#urlTransformers', function() {
                beforeEach(module(function(symfony2RouterProvider) {
                    symfony2RouterProvider.urlTransformers.push(function() {
                        return function(url) {
                            return url + '?foo=bar';
                        };
                    });
                }));

                it('should transform the url with the url transformers', inject(function(symfony2Router) {
                    expect(symfony2Router.path('hello', { foo: 'bar' })).toEqual('/url?foo=bar');
                }));
            });
        });
    });
}(window));