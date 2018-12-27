'use strict';

import $ from 'jquery';
import Widget from 'lib-widget';

class RatingWidget extends Widget {
  _init() {
    super._init();
    
    let self = this,
      $infoFrom = self.$element.find('.rating-value-info .from');
    
    self.$element.on('click', 'input', function () {
      let val = $(this).val();
      
      self.$element.attr('data-value', val);
      $infoFrom.html(val);
    });
    
    self.$element.on('mouseover', 'label', function () {
      let val = $(this).find('input').val();
      
      self.$element.attr('data-hover', val);
      $infoFrom.html(val);
    });
    
    self.$element.on('mouseout', 'label', function () {
      self.$element.attr('data-hover', 0);
      $infoFrom.html(self.$element.attr('data-value'));
    });
  }
}

export default RatingWidget;
