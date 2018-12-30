'use strict';

import $ from 'jquery';

class GoogleMap {
  constructor($element, settings) {
    this.$element = $element;
    this.isMobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
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
    this.settings = $.extend(true, {}, this.defaultSettings, settings);
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
    this.mapOptions = [
      'zoom',
      'styles'
    ];
    this.locationOptions = [
      'x',
      'y',
      'info-state',
      'marker-basic',
      'marker-active'
    ];
    
    this.init();
  }
  
  init() {
    let self = this,
      $map = this.$element,
      $viewport = $map.find(self.settings.selector.viewport),
      options = $.extend(
        true,
        {},
        self.defaultOptions,
        self.getOptions($map, self.settings)
      ),
      map = new google.maps.Map(
        $viewport[0],
        $.extend(
          true,
          {},
          self.settings.map,
          {
            center: new google.maps.LatLng(
              parseFloat(self.settings.map.center.y),
              parseFloat(self.settings.map.center.x)
            ),
          }
        )
        
      ),
      infoWindows = [],
      markers = [];
    
    $.each(options.locations, function (locationIndex, locationOptions) {
      markers[locationIndex] = new google.maps.Marker(
        {
          position: new google.maps.LatLng(
            parseFloat(locationOptions.y),
            parseFloat(locationOptions.x)),
          map: map,
          icon: locationOptions['marker-basic'],
          index: locationIndex
        }
      );
    
      if (locationOptions.content) {
        infoWindows[locationIndex] = new google.maps.InfoWindow({content: locationOptions.content});
      
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
  
    setTimeout(function(){
      var x = map.getZoom();
      var c = map.getCenter();
      google.maps.event.trigger(map, 'resize');
      map.setZoom(x);
      map.setCenter(c);
    }, 200);

    setTimeout(function(){
      var x = map.getZoom();
      var c = map.getCenter();
      google.maps.event.trigger(map, 'resize');
      map.setZoom(x);
      map.setCenter(c);
    }, 500);
  }
  
  getOptions($map, settings) {
    var self = this;
    var $locations = $map.find(settings.selector.locations).find('li'),
      options = {
        map: {},
        locations: []
      };
    
    $.each(self.mapOptions, function (i, optionName) {
      var optionValue = $map.attr('data-' + optionName);
      if (undefined !== optionValue) {
        options.map[optionName] = optionValue;
      }
    });
    
    if ($locations.length > 0) {
      $locations.each(function (locationIndex, locationElement) {
        var $location = $(locationElement);
        
        options.locations[locationIndex] = {};
        $.each(self.locationOptions, function (optionIndex, optionName) {
          var optionValue = $location.attr('data-' + optionName);
          if (undefined !== optionValue) {
            options.locations[locationIndex][optionName] = optionValue;
          }
        });
        
        var content = $.trim($location.html());
        if (!content) {
          options.locations[locationIndex]['content'] = '';
        } else {
          options.locations[locationIndex]['content'] = content;
        }
      });
    }
    
    return options;
  }
}

module.exports = GoogleMap;
