'use strict';

import $ from 'jquery';
import Widget from 'lib-widget';

class ScrollToWidget extends Widget {
  _init() {
    super._init();
    
    let self = this;
    
    self.$element.on('click', function () {
      let scrollTo = self.$element.attr('data-scroll-to'),
          $target = $(scrollTo);
      
      if (!$target.length) {
        return false;
      }
  
      let targetTop = $target.offset().top,
        path = Math.abs($target.offset().top - $(window).scrollTop()),
        speed = Math.min(700, path);
  
      $('html, body').animate({scrollTop: targetTop - self.options.gap}, speed);
      return false;
    });
  }
}

ScrollToWidget.defaults.gap = 20;

export default ScrollToWidget;
