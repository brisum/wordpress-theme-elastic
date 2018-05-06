/*
 * Common Height
 */

(function ($) {
    var commonHeight = {
        groups: {},
        mobWidth: 450,
        isDisabled: false,

        init: function () {
            Brisum.commonHeight.groups = {};

            $('.js-common-height').each(function (i, element) {
                var $element = $(element),
                    group = $element.attr('data-group');

                if (!group) {
                    group = 'undefined'
                }
                if (!Brisum.commonHeight.groups[group]) {
                    Brisum.commonHeight.groups[group] = [];
                }

                Brisum.commonHeight.groups[group].push($element);
            });
        },

        onResize: function() {
            var maxHeight = 0,
                height = 0,
                isMobView = $(window).width() <= Brisum.commonHeight.mobWidth;

            // optimization
            if (isMobView && Brisum.commonHeight.isDisabled) {
                return;
            }

            $.each(Brisum.commonHeight.groups, function (group, elements) {
                maxHeight = 0;
                height = 0;

                $.each(elements, function (i, $element) {
                    $element.height('auto');
                    height = $element.height();
                    if (height > maxHeight) {
                        maxHeight = height;
                    }
                });
                $.each(elements, function (i, $element) {
                    if (!isMobView) {
                        $element.height(maxHeight);
                    }
                });

                // optimization
                Brisum.commonHeight.isDisabled = isMobView;
            });
        }
    };

    window['Brisum'] = window['Brisum'] || {};
    window['Brisum'].commonHeight = commonHeight;

    $(document).ready(function () {
        Brisum.commonHeight.init();
        Brisum.commonHeight.onResize();

        setTimeout(function () { Brisum.commonHeight.onResize(); }, 1000);
        setTimeout(function () { Brisum.commonHeight.onResize(); }, 2000);
        setTimeout(function () { Brisum.commonHeight.onResize(); }, 3000);
        setTimeout(function () { Brisum.commonHeight.onResize(); }, 5000);
        setTimeout(function () { Brisum.commonHeight.onResize(); }, 10000);

        $(window).resize(function () {
            Brisum.commonHeight.onResize();
        });
    });
}(jQuery));
