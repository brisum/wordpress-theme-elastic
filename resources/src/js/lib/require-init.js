define(['jquery', 'lib-bundle-loader'],
function($,        BundleLoader) {
    'use strict';

    class RequireInit {
        constructor($element) {
            this.$element = $element;
            this._init();
        }

        _init() {
            let self = this,
                requires = {};

            self.$element.find('[data-require-init]').each(function (i, element) {
                let $element = $(element),
                    args = $element.attr('data-require-init').split(','),
                    name = args[0],
                    priority = undefined !== args[1] ? parseInt(args[1]) : 100;

                if (!requires[priority + '-' + name]) {
                    requires[priority + '-' + name] = {
                        elements: [],
                        name: name
                    }
                }
                requires[priority + '-' + name].elements.push($element);
            });

            Object.keys(requires).sort().forEach(function (requireKey) {
                let requireInitConfig = requires[requireKey];

                Object.keys(requireInitConfig.elements).forEach(function (elementKey) {
                    let $element = requireInitConfig.elements[elementKey],
                        requireInit = requireInitConfig.name,
                        callback = requireInit.match(/.+\.widget$/)
                            ? (function (requireElement) {
                                new requireElement($element);
                            })
                            : (function () {
                            });

                    console.log('data-require-init', requireInit);

                    switch(requireInit){
                        /* case template:
                        case '{{name}}':
                            BundleLoader.load([require('bundle-loader?&name={{name}}!{{name}}')], callback);
                            break;
                        */

                        
                        case 'lib-bundle-loader':
                            BundleLoader.load([require('bundle-loader?&name=lib-bundle-loader!lib-bundle-loader')], callback);
                            break;
                        

                        case 'lib-common-height.widget':
                            BundleLoader.load([require('bundle-loader?&name=lib-common-height.widget!lib-common-height.widget')], callback);
                            break;
                        

                        case 'lib-require-init':
                            BundleLoader.load([require('bundle-loader?&name=lib-require-init!lib-require-init')], callback);
                            break;
                        

                        case 'lib-source-loader':
                            BundleLoader.load([require('bundle-loader?&name=lib-source-loader!lib-source-loader')], callback);
                            break;
                        

                        case 'lib-widget':
                            BundleLoader.load([require('bundle-loader?&name=lib-widget!lib-widget')], callback);
                            break;
                        

                        case 'admin-main':
                            BundleLoader.load([require('bundle-loader?&name=admin-main!admin-main')], callback);
                            break;
                        

                        default:
                            console.log('not found require init: ' + requireInit);
                    }
                });
            });
        }
    }

    return RequireInit;
});
