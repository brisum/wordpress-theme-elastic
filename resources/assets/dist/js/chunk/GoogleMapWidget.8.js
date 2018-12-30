webpackJsonp_name_([8,21],{

/***/ 49:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _jquery = __webpack_require__(0);

var _jquery2 = _interopRequireDefault(_jquery);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var GoogleMap = function () {
  function GoogleMap($element, settings) {
    _classCallCheck(this, GoogleMap);

    this.$element = $element;
    this.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    this.defaultSettings = {
      selector: {
        viewport: '.google-map-viewport',
        locations: '.locations'
      },
      map: {
        scrollwheel: false,
        draggable: !this.isMobile,
        zoom: 16,
        styles: []
      },
      locations: []
    };
    this.settings = _jquery2.default.extend(true, {}, this.defaultSettings, settings);
    this.defaultOptions = {
      map: {
        center: {
          x: 0,
          y: 0
        },
        zoom: 14,
        styles: []
      },
      locations: []
    };
    this.mapOptions = ['zoom', 'styles'];
    this.locationOptions = ['x', 'y', 'info-state', 'marker-basic', 'marker-active'];

    this.init();
  }

  _createClass(GoogleMap, [{
    key: 'init',
    value: function init() {
      var self = this,
          $map = this.$element,
          $viewport = $map.find(self.settings.selector.viewport),
          options = _jquery2.default.extend(true, {}, self.defaultOptions, self.getOptions($map, self.settings)),
          map = new google.maps.Map($viewport[0], _jquery2.default.extend(true, {}, self.settings.map, {
        center: new google.maps.LatLng(parseFloat(self.settings.map.center.y), parseFloat(self.settings.map.center.x))
      })),
          infoWindows = [],
          markers = [];

      _jquery2.default.each(options.locations, function (locationIndex, locationOptions) {
        markers[locationIndex] = new google.maps.Marker({
          position: new google.maps.LatLng(parseFloat(locationOptions.y), parseFloat(locationOptions.x)),
          map: map,
          icon: locationOptions['marker-basic'],
          index: locationIndex
        });

        if (locationOptions.content) {
          infoWindows[locationIndex] = new google.maps.InfoWindow({ content: locationOptions.content });

          google.maps.event.addListener(markers[locationIndex], 'click', function () {
            for (var j in markers) {
              markers[j].setIcon(options.locations[j]['marker-basic']);
            }
            this.setIcon(locationOptions['marker-active']);

            infoWindows[locationIndex].setContent(locationOptions.content);
            infoWindows[locationIndex].open(map, this);
          });

          google.maps.event.addListener(infoWindows[locationIndex], 'closeclick', function () {
            for (var j in markers) {
              markers[j].setIcon(options.locations[j]['marker-basic']);
            }
          });

          if ('open' === locationOptions['info-state']) {
            infoWindows[locationIndex].open(map, markers[locationIndex]);
            markers[locationIndex].setIcon(locationOptions['marker-active']);
          }
        }
      });

      // google.maps.event.addDomListener(window, 'resize', function() {
      //   map.setCenter(new google.maps.LatLng(
      //     parseFloat(options.map.center.y),
      //     parseFloat(options.map.center.x)
      //   ));
      // });

      setTimeout(function () {
        var x = map.getZoom();
        var c = map.getCenter();
        google.maps.event.trigger(map, 'resize');
        map.setZoom(x);
        map.setCenter(c);
      }, 200);

      setTimeout(function () {
        var x = map.getZoom();
        var c = map.getCenter();
        google.maps.event.trigger(map, 'resize');
        map.setZoom(x);
        map.setCenter(c);
      }, 500);
    }
  }, {
    key: 'getOptions',
    value: function getOptions($map, settings) {
      var self = this;
      var $locations = $map.find(settings.selector.locations).find('li'),
          options = {
        map: {},
        locations: []
      };

      _jquery2.default.each(self.mapOptions, function (i, optionName) {
        var optionValue = $map.attr('data-' + optionName);
        if (undefined !== optionValue) {
          options.map[optionName] = optionValue;
        }
      });

      if ($locations.length > 0) {
        $locations.each(function (locationIndex, locationElement) {
          var $location = (0, _jquery2.default)(locationElement);

          options.locations[locationIndex] = {};
          _jquery2.default.each(self.locationOptions, function (optionIndex, optionName) {
            var optionValue = $location.attr('data-' + optionName);
            if (undefined !== optionValue) {
              options.locations[locationIndex][optionName] = optionValue;
            }
          });

          var content = _jquery2.default.trim($location.html());
          if (!content) {
            options.locations[locationIndex]['content'] = '';
          } else {
            options.locations[locationIndex]['content'] = content;
          }
        });
      }

      return options;
    }
  }]);

  return GoogleMap;
}();

module.exports = GoogleMap;

/***/ }),

/***/ 57:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

var _libWidget = __webpack_require__(2);

var _libWidget2 = _interopRequireDefault(_libWidget);

var _libSourceLoader = __webpack_require__(4);

var _libSourceLoader2 = _interopRequireDefault(_libSourceLoader);

var _GoogleMap = __webpack_require__(49);

var _GoogleMap2 = _interopRequireDefault(_GoogleMap);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var GoogleMapWidget = function (_Widget) {
  _inherits(GoogleMapWidget, _Widget);

  function GoogleMapWidget() {
    _classCallCheck(this, GoogleMapWidget);

    return _possibleConstructorReturn(this, (GoogleMapWidget.__proto__ || Object.getPrototypeOf(GoogleMapWidget)).apply(this, arguments));
  }

  _createClass(GoogleMapWidget, [{
    key: '_init',
    value: function _init() {
      _get(GoogleMapWidget.prototype.__proto__ || Object.getPrototypeOf(GoogleMapWidget.prototype), '_init', this).call(this);

      var self = this;

      _libSourceLoader2.default.loadScript('https://maps.google.com/maps/api/js?&key=' + self.$element.attr('data-key'), true, function () {
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

        setTimeout(function () {
          new _GoogleMap2.default(self.$element, { 'map': JSON.parse(self.$element.attr('data-settings')) });
        }, isMobile ? 1000 : 500);
      });
    }
  }]);

  return GoogleMapWidget;
}(_libWidget2.default);

exports.default = GoogleMapWidget;

/***/ })

});
//# sourceMappingURL=GoogleMapWidget.8.js.map?1b0bf510c86f19b6ecdd