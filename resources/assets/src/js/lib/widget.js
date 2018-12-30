define(['jquery'],
function($      ) {
    var Widget = function ($element, options) {
        this.$element = $element;
        this.options = $.extend({}, Widget.defaults, this.$element.data(), options);
    };

    Widget.defaults = {};

    Widget.prototype._init = function () {};

    return Widget;
});
