var $ = $ || jQuery.noConflict();
window['$'] = $;

(function ($) {
    'use strict';

    // Load common module
    var Widget = require('lib-widget'),
        SourceLoader = require('lib-source-loader'),
        BundleLoader = require('lib-bundle-loader');

    // Lazy init
    var RequireInit = require('lib-require-init');
    new RequireInit($('body'));
})(jQuery);
