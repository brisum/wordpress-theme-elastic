'use strict';

import Widget from 'lib-widget';
import SourceLoader from 'lib-source-loader';
import GoogleMap from 'GoogleMap';

class GoogleMapWidget extends Widget {
  _init() {
    super._init();
    
    let self = this;
    
    SourceLoader.loadScript(
      'https://maps.google.com/maps/api/js?&key=' + self.$element.attr('data-key'),
      true,
      function () {
        var isMobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
        
        setTimeout(function () {
          new GoogleMap(self.$element, {'map': JSON.parse(self.$element.attr('data-settings'))});
        }, isMobile ? 1000 : 500);
      }
    );
  }
}

export default GoogleMapWidget;

