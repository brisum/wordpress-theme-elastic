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
                        callback = requireInit.match(/.+Widget$/) || requireInit.match(/.+\.widget$/)
                            ? (function (requireElement) {
                                if (requireElement && requireElement.__esModule && requireElement.default) {
                                    requireElement = requireElement.default;
                                }
                                let widget = new requireElement($element);
                                widget._init();
                            })
                            : (function () {});

                    console.log('data-require-init', requireInit);

                    switch(requireInit){
                        /* case template:
                        case '{{name}}':
                            BundleLoader.load([require('bundle-loader?&name={{name}}!{{name}}')], callback);
                            break;
                        */

                        
                        case 'slick':
                            BundleLoader.load([require('bundle-loader?&name=slick!slick')], callback);
                            break;
                        

                        case 'magnific_popup':
                            BundleLoader.load([require('bundle-loader?&name=magnific_popup!magnific_popup')], callback);
                            break;
                        

                        case 'lib-bundle-loader':
                            BundleLoader.load([require('bundle-loader?&name=lib-bundle-loader!lib-bundle-loader')], callback);
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
                        

                        case 'GoogleMap':
                            BundleLoader.load([require('bundle-loader?&name=GoogleMap!GoogleMap')], callback);
                            break;
                        

                        case 'Popup':
                            BundleLoader.load([require('bundle-loader?&name=Popup!Popup')], callback);
                            break;
                        

                        case 'PopupBootstrap':
                            BundleLoader.load([require('bundle-loader?&name=PopupBootstrap!PopupBootstrap')], callback);
                            break;
                        

                        case 'PopupConfirm':
                            BundleLoader.load([require('bundle-loader?&name=PopupConfirm!PopupConfirm')], callback);
                            break;
                        

                        case 'astute-form.widget':
                            BundleLoader.load([require('bundle-loader?&name=astute-form.widget!astute-form.widget')], callback);
                            break;
                        

                        case 'button-confirmation.widget':
                            BundleLoader.load([require('bundle-loader?&name=button-confirmation.widget!button-confirmation.widget')], callback);
                            break;
                        

                        case 'common-height.widget':
                            BundleLoader.load([require('bundle-loader?&name=common-height.widget!common-height.widget')], callback);
                            break;
                        

                        case 'div-table.widget':
                            BundleLoader.load([require('bundle-loader?&name=div-table.widget!div-table.widget')], callback);
                            break;
                        

                        case 'form-confirmation.widget':
                            BundleLoader.load([require('bundle-loader?&name=form-confirmation.widget!form-confirmation.widget')], callback);
                            break;
                        

                        case 'GoogleMapWidget':
                            BundleLoader.load([require('bundle-loader?&name=GoogleMapWidget!GoogleMapWidget')], callback);
                            break;
                        

                        case 'magnific-popup.widget':
                            BundleLoader.load([require('bundle-loader?&name=magnific-popup.widget!magnific-popup.widget')], callback);
                            break;
                        

                        case 'off-canvas-menu.widget':
                            BundleLoader.load([require('bundle-loader?&name=off-canvas-menu.widget!off-canvas-menu.widget')], callback);
                            break;
                        

                        case 'popup-confirm.widget':
                            BundleLoader.load([require('bundle-loader?&name=popup-confirm.widget!popup-confirm.widget')], callback);
                            break;
                        

                        case 'popup-content.widget':
                            BundleLoader.load([require('bundle-loader?&name=popup-content.widget!popup-content.widget')], callback);
                            break;
                        

                        case 'popup.widget':
                            BundleLoader.load([require('bundle-loader?&name=popup.widget!popup.widget')], callback);
                            break;
                        

                        case 'ProductReviewWidget':
                            BundleLoader.load([require('bundle-loader?&name=ProductReviewWidget!ProductReviewWidget')], callback);
                            break;
                        

                        case 'RatingWidget':
                            BundleLoader.load([require('bundle-loader?&name=RatingWidget!RatingWidget')], callback);
                            break;
                        

                        case 'ScrollToWidget':
                            BundleLoader.load([require('bundle-loader?&name=ScrollToWidget!ScrollToWidget')], callback);
                            break;
                        

                        case 'slick.widget':
                            BundleLoader.load([require('bundle-loader?&name=slick.widget!slick.widget')], callback);
                            break;
                        

                        case 'checkout-one-click.widget':
                            BundleLoader.load([require('bundle-loader?&name=checkout-one-click.widget!checkout-one-click.widget')], callback);
                            break;
                        

                        case 'viewed-products.widget':
                            BundleLoader.load([require('bundle-loader?&name=viewed-products.widget!viewed-products.widget')], callback);
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
