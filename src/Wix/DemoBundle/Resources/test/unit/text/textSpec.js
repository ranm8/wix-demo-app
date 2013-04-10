/**
 * Ronen Amiel <ronena@codeoasis.com>
 * 2/17/13, 1:11 PM
 */
(function(window) {
    'use strict';

    describe('Text', function() {
        beforeEach(module('Text'));

        describe('truncate', function() {
            var truncate;

            beforeEach(inject(function($filter) {
                truncate = $filter('truncate');
            }));

            it('should truncate a string', function() {
                expect(truncate('foo')).toEqual('foo');
                expect(truncate('foo bar', 5)).toEqual('foo...');
                expect(truncate('foo bar', 5, false)).toEqual('foo b...');
                expect(truncate('foo bar', 5, false, '123')).toEqual('foo b123');
                expect(truncate('foo bar', 5, true, '123')).toEqual('foo123');
            });
        });

        describe('wordwrap', function() {
            it('should wrap a string to a given number of characters using a string break character', inject(function(wordwrapFilter) {
                expect(wordwrapFilter('hello world', 5)).toEqual('hello \nworld');
                expect(wordwrapFilter('hello world', 5, '123')).toEqual('hello 123world');
            }));
        });

        describe('nl2br', function() {
            it('should insert HTML line breaks before all newlines in a string', inject(function(nl2brFilter) {
                expect(nl2brFilter('hello\n world\n')).toEqual('hello<br /> world<br />');
                expect(nl2brFilter('hello\n world\n', 'BR')).toEqual('helloBR worldBR');
            }));
        });
    });
}(window));