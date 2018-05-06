var main =
/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	var parentJsonpFunction = window["webpackJsonp_name_"];
/******/ 	window["webpackJsonp_name_"] = function webpackJsonpCallback(chunkIds, moreModules, executeModules) {
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [], result;
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(chunkIds, moreModules, executeModules);
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 	};
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// objects to store loaded and loading chunks
/******/ 	var installedChunks = {
/******/ 		1: 0
/******/ 	};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/ 	// This file contains only the entry chunk.
/******/ 	// The chunk loading function for additional chunks
/******/ 	__webpack_require__.e = function requireEnsure(chunkId) {
/******/ 		var installedChunkData = installedChunks[chunkId];
/******/ 		if(installedChunkData === 0) {
/******/ 			return new Promise(function(resolve) { resolve(); });
/******/ 		}
/******/
/******/ 		// a Promise means "currently loading".
/******/ 		if(installedChunkData) {
/******/ 			return installedChunkData[2];
/******/ 		}
/******/
/******/ 		// setup Promise in chunk cache
/******/ 		var promise = new Promise(function(resolve, reject) {
/******/ 			installedChunkData = installedChunks[chunkId] = [resolve, reject];
/******/ 		});
/******/ 		installedChunkData[2] = promise;
/******/
/******/ 		// start chunk loading
/******/ 		var head = document.getElementsByTagName('head')[0];
/******/ 		var script = document.createElement('script');
/******/ 		script.type = "text/javascript";
/******/ 		script.charset = 'utf-8';
/******/ 		script.async = true;
/******/ 		script.timeout = 120000;
/******/
/******/ 		if (__webpack_require__.nc) {
/******/ 			script.setAttribute("nonce", __webpack_require__.nc);
/******/ 		}
/******/ 		script.src = __webpack_require__.p + "js/chunk/" + ({"0":"common-height.widget"}[chunkId]||chunkId) + "." + chunkId + ".js?" + {"0":"e5371421c942273b7029"}[chunkId] + "";
/******/ 		var timeout = setTimeout(onScriptComplete, 120000);
/******/ 		script.onerror = script.onload = onScriptComplete;
/******/ 		function onScriptComplete() {
/******/ 			// avoid mem leaks in IE.
/******/ 			script.onerror = script.onload = null;
/******/ 			clearTimeout(timeout);
/******/ 			var chunk = installedChunks[chunkId];
/******/ 			if(chunk !== 0) {
/******/ 				if(chunk) {
/******/ 					chunk[1](new Error('Loading chunk ' + chunkId + ' failed.'));
/******/ 				}
/******/ 				installedChunks[chunkId] = undefined;
/******/ 			}
/******/ 		};
/******/ 		head.appendChild(script);
/******/
/******/ 		return promise;
/******/ 	};
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/wp-content/themes/elastic/resources/assets/dist/";
/******/
/******/ 	// on error function for async loading
/******/ 	__webpack_require__.oe = function(err) { console.error(err); throw err; };
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

(function (factory) {
    'use strict';

    if (true) {
        !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
    } else if (typeof exports !== 'undefined') {
        module.exports = factory();
    } else {
        factory();
    }
})(function () {
    'use strict';

    var BundleLoader = function BundleLoader() {};

    BundleLoader.prototype.load = function (bundles, callback) {
        var self = this,
            args = [],
            countDown = bundles.length;

        bundles.forEach(function (bundleLoad, i) {
            bundleLoad(function (Bundle) {
                args[i] = Bundle;
                countDown--;

                if (0 === countDown && callback) {
                    callback.apply(null, args);
                }
            });
        });
    };

    return new BundleLoader();
});

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

!(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0)], __WEBPACK_AMD_DEFINE_RESULT__ = (function ($) {
    var Widget = function Widget($element, options) {
        this.$element = $element;
        this.options = $.extend({}, Widget.defaults, this.$element.data(), options);

        this._init();
    };

    Widget.defaults = {};

    Widget.prototype._init = function () {};

    return Widget;
}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

(function (factory) {
    'use strict';

    if (true) {
        !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0)], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
    } else if (typeof exports !== 'undefined') {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }
})(function ($) {
    'use strict';

    var loadedSources = {
        js: [],
        css: []
    };

    var SourceLoader = function SourceLoader() {};
    SourceLoader.prototype.loadScript = function (url, async, callback) {
        if (-1 !== loadedSources.js.indexOf(url)) {
            if (callback) {
                callback();
            }
            return;
        }

        var script = document.createElement("script");

        if (callback) {
            if (script.readyState) {
                //IE
                script.onreadystatechange = function () {
                    if (script.readyState == "loaded" || script.readyState == "complete") {
                        script.onreadystatechange = null;
                        loadedSources.js.push(url);
                        callback();
                    }
                };
            } else {
                //Others
                script.onload = function () {
                    loadedSources.js.push(url);
                    callback();
                };
            }
        }

        script.type = "text/javascript";
        script.async = async;
        script.src = url;
        document.getElementsByTagName("body")[0].appendChild(script);
    };

    SourceLoader.prototype.loadScripts = function (scripts, callback) {
        var self = this,
            progress = 0;

        scripts.forEach(function (script) {
            self.loadScript(script, false, function () {
                if (++progress == scripts.length) {
                    callback && callback();
                }
            });
        });
    };

    SourceLoader.prototype.loadStylesheet = function (url) {
        if (-1 !== loadedSources.css.indexOf(url)) {
            return;
        }
        loadedSources.css.push(url);

        var link = document.createElement('link');

        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.media = 'all';
        link.href = url;

        document.getElementsByTagName('head')[0].appendChild(link);
    };

    SourceLoader.prototype.loadStylesheets = function (styles) {
        var self = this,
            progress = 0;

        styles.forEach(function (style) {
            self.loadStylesheet(style);
        });
    };

    return new SourceLoader();
});

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

!(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0), __webpack_require__(1)], __WEBPACK_AMD_DEFINE_RESULT__ = (function ($, BundleLoader) {
    'use strict';

    var RequireInit = function () {
        function RequireInit($element) {
            _classCallCheck(this, RequireInit);

            this.$element = $element;
            this._init();
        }

        _createClass(RequireInit, [{
            key: '_init',
            value: function _init() {
                var self = this,
                    requires = {};

                self.$element.find('[data-require-init]').each(function (i, element) {
                    var $element = $(element),
                        args = $element.attr('data-require-init').split(','),
                        name = args[0],
                        priority = undefined !== args[1] ? parseInt(args[1]) : 100;

                    if (!requires[priority + '-' + name]) {
                        requires[priority + '-' + name] = {
                            elements: [],
                            name: name
                        };
                    }
                    requires[priority + '-' + name].elements.push($element);
                });

                Object.keys(requires).sort().forEach(function (requireKey) {
                    var requireInitConfig = requires[requireKey];

                    Object.keys(requireInitConfig.elements).forEach(function (elementKey) {
                        var $element = requireInitConfig.elements[elementKey],
                            requireInit = requireInitConfig.name,
                            callback = requireInit.match(/.+\.widget$/) ? function (requireElement) {
                            new requireElement($element);
                        } : function () {};

                        console.log('data-require-init', requireInit);

                        switch (requireInit) {
                            /* case template:
                            case '{{name}}':
                                BundleLoader.load([require('bundle-loader?&name={{name}}!{{name}}')], callback);
                                break;
                            */

                            case 'lib-bundle-loader':
                                BundleLoader.load([__webpack_require__(10)], callback);
                                break;

                            case 'lib-require-init':
                                BundleLoader.load([__webpack_require__(11)], callback);
                                break;

                            case 'lib-source-loader':
                                BundleLoader.load([__webpack_require__(12)], callback);
                                break;

                            case 'lib-widget':
                                BundleLoader.load([__webpack_require__(13)], callback);
                                break;

                            case 'common-height.widget':
                                BundleLoader.load([__webpack_require__(14)], callback);
                                break;

                            default:
                                console.log('not found require init: ' + requireInit);
                        }
                    });
                });
            }
        }]);

        return RequireInit;
    }();

    return RequireInit;
}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));

/***/ }),
/* 5 */,
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(7);
__webpack_require__(8);
module.exports = __webpack_require__(9);


/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

(function (factory) {
    'use strict';

    if (true) {
        !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0)], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
    } else if (typeof exports !== 'undefined') {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }
})(function ($) {
    'use strict';

    // serializeJSON fixed

    $.fn.serializeJSON = function () {
        var json = {};
        var form = $(this);
        form.find('input, select, textarea').each(function () {
            var val;
            if (!this.name) return;

            if ('radio' === this.type) {
                if (json[this.name]) {
                    return;
                }

                json[this.name] = this.checked ? this.value : '';
            } else if ('checkbox' === this.type) {
                val = json[this.name];

                if (!this.checked) {
                    // if (!val) { json[this.name] = ''; }
                } else {
                    json[this.name] = typeof val === 'string' ? [val, this.value] : $.isArray(val) ? $.merge(val, [this.value]) : this.value;
                }
            } else {
                json[this.name] = this.value;
            }
        });
        return json;
    };
});

/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

(function (factory) {
    'use strict';

    if (true) {
        !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0)], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
    } else if (typeof exports !== 'undefined') {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }
})(function ($) {
    ;(function ($) {
        var AstuteForm = function AstuteForm($form, options) {
            this.$form = $form;
            this.settings = $.extend(this.defaultSettings, {
                type: this.$form.attr('method'),
                url: this.$form.attr('data-url'),
                beforeSend: this.$form.attr('data-before-send'),
                afterSend: this.$form.attr('data-after-send'),
                success: this.$form.attr('data-success'),
                error: this.$form.attr('data-error'),
                messageError: this.$form.attr('data-message-error')
            }, options || {});

            this.init();
        };

        AstuteForm.prototype.defaultSettings = {
            type: 'post',
            url: '',
            beforeSend: undefined,
            afterSend: undefined,
            success: undefined,
            error: undefined,
            messageError: 'Извините, возникла ошибка во время отправки данных'
        };

        AstuteForm.prototype.init = function () {
            var self = this;

            self.$form.on('click.astute-form', 'input[type=submit]', function () {
                self.$form.find("input[type=submit]").removeAttr("clicked");
                $(this).attr("clicked", true);
            });

            self.$form.submit(function (event) {
                var data = self.$form.serializeJSON(),
                    $submit = self.$form.find("input[type=submit][clicked]");

                if ($submit.length) {
                    data[$submit.attr('name')] = $submit.val();
                }

                if (!self.beforeSend(data)) {
                    return false;
                }

                self.loading(true);
                $.ajax({
                    type: self.settings.type,
                    url: self.settings.url,
                    data: data,
                    success: function success(response, textStatus) {
                        var $div = $('<div></div>').html(response);

                        self.$form.html($div.find('form[data-astute-form]').html());

                        setTimeout(function () {
                            self.$form.find('.message.temporary').fadeOut(1500);
                        }, 2000);
                        setTimeout(function () {
                            self.$form.find('.message.temporary').remove();
                        }, 4000);

                        self.afterSend(response);
                        self.success(response);
                        self.loading(false);
                    },
                    error: function error(XMLHttpRequest, textStatus, errorThrown) {
                        self.messageClear();
                        self.message(self.settings.messageError, 'alert');

                        self.afterSend(XMLHttpRequest, textStatus, errorThrown);
                        self.error(XMLHttpRequest, textStatus, errorThrown);
                        self.loading(false);
                    }
                });

                return false;
            });
        };

        AstuteForm.prototype.loading = function (isLoading) {
            if (isLoading) {
                this.$form.addClass('loading');
            } else {
                this.$form.removeClass('loading');
            }
        };

        AstuteForm.prototype.beforeSend = function (data) {
            var self = this;

            if (typeof self.settings.beforeSend === 'function') {
                return self.settings.beforeSend(data);
            }
            if (window[self.settings.beforeSend]) {
                return window[self.settings.beforeSend](data);
            }
            return true;
        };

        AstuteForm.prototype.afterSend = function (response) {
            var self = this;

            if (typeof self.settings.afterSend === 'function') {
                return self.settings.afterSend(response);
            }
            if (window[self.settings.afterSend]) {
                return window[self.settings.afterSend](response);
            }
        };

        AstuteForm.prototype.success = function () {
            var self = this;

            if (typeof self.settings.success === 'function') {
                self.settings.success();
            }
            if (window[self.settings.success]) {
                window[self.settings.success]();
            }
        };

        AstuteForm.prototype.error = function (XMLHttpRequest, textStatus, errorThrown) {
            var self = this;

            if (typeof self.settings.error === 'function') {
                return self.settings.error(XMLHttpRequest, textStatus, errorThrown);
            }
            if (window[self.settings.error]) {
                return window[self.settings.error](XMLHttpRequest, textStatus, errorThrown);
            }
        };

        AstuteForm.prototype.message = function (message, type) {
            var self = this,
                messageId = 'msg-' + Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
            self.$form.prepend('<div id="' + messageId + '" class="astute-form-alert ' + type + '">' + message + '</div>');
        };

        AstuteForm.prototype.messageClear = function () {
            var self = this;
            self.$form.find('.message').remove();
        };

        window.Brisum = window.Brisum || {};
        window.Brisum.AstuteForm = AstuteForm;

        $.fn.astuteForm = function (options) {
            return this.each(function () {
                new AstuteForm($(this), options);
            });
        };

        $(document).ready(function () {
            $('form[data-astute-form]').astuteForm();
        });
    })(jQuery);
});

/***/ }),
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var $ = $ || jQuery.noConflict();
window['$'] = $;

(function ($) {
    'use strict';

    // Load common module

    var Widget = __webpack_require__(2),
        SourceLoader = __webpack_require__(3),
        BundleLoader = __webpack_require__(1);

    // Lazy init
    var RequireInit = __webpack_require__(4);
    new RequireInit($('body'));
})(jQuery);

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

var cbs = [], 
	data;
module.exports = function(cb) {
	if(cbs) cbs.push(cb);
	else cb(data);
}
new Promise(function(resolve) { resolve(); }).then((function(require) {
	data = __webpack_require__(1);
	var callbacks = cbs;
	cbs = null;
	for(var i = 0, l = callbacks.length; i < l; i++) {
		callbacks[i](data);
	}
}).bind(null, __webpack_require__)).catch(__webpack_require__.oe);

/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

var cbs = [], 
	data;
module.exports = function(cb) {
	if(cbs) cbs.push(cb);
	else cb(data);
}
new Promise(function(resolve) { resolve(); }).then((function(require) {
	data = __webpack_require__(4);
	var callbacks = cbs;
	cbs = null;
	for(var i = 0, l = callbacks.length; i < l; i++) {
		callbacks[i](data);
	}
}).bind(null, __webpack_require__)).catch(__webpack_require__.oe);

/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

var cbs = [], 
	data;
module.exports = function(cb) {
	if(cbs) cbs.push(cb);
	else cb(data);
}
new Promise(function(resolve) { resolve(); }).then((function(require) {
	data = __webpack_require__(3);
	var callbacks = cbs;
	cbs = null;
	for(var i = 0, l = callbacks.length; i < l; i++) {
		callbacks[i](data);
	}
}).bind(null, __webpack_require__)).catch(__webpack_require__.oe);

/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

var cbs = [], 
	data;
module.exports = function(cb) {
	if(cbs) cbs.push(cb);
	else cb(data);
}
new Promise(function(resolve) { resolve(); }).then((function(require) {
	data = __webpack_require__(2);
	var callbacks = cbs;
	cbs = null;
	for(var i = 0, l = callbacks.length; i < l; i++) {
		callbacks[i](data);
	}
}).bind(null, __webpack_require__)).catch(__webpack_require__.oe);

/***/ }),
/* 14 */
/***/ (function(module, exports, __webpack_require__) {

var cbs = [], 
	data;
module.exports = function(cb) {
	if(cbs) cbs.push(cb);
	else cb(data);
}
__webpack_require__.e/* require.ensure */(0).then((function(require) {
	data = __webpack_require__(18);
	var callbacks = cbs;
	cbs = null;
	for(var i = 0, l = callbacks.length; i < l; i++) {
		callbacks[i](data);
	}
}).bind(null, __webpack_require__)).catch(__webpack_require__.oe);

/***/ })
/******/ ]);
//# sourceMappingURL=main.js.map?cf7e44f8cded2b8c10c6