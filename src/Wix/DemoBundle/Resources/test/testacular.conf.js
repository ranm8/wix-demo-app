basePath = '../';

files = [
  JASMINE,
  JASMINE_ADAPTER,
  'public/lib/angular/angular.js',
  'public/lib/angular/angular-*.js',
  'test/lib/angular/angular-mocks.js',
  'public/lib/wix/wix.js',
  'public/lib/text-extension/text.js',
  'public/lib/ui-extension/ui.js',
  'public/lib/routing-extension/routing.js',
  'public/js/**/*.js',
  'test/unit/**/*.js'
];

autoWatch = true;

browsers = ['Chrome'];

junitReporter = {
  outputFile: 'test_out/unit.xml',
  suite: 'unit'
};
