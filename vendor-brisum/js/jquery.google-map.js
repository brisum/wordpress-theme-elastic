;(function ($) {
    'use strict';

    var isMobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
    var defaultSettings = {
            selector: {
                viewport: '.google-map-viewport',
                locations: '.locations'
            },
            map: {
                scrollwheel: false,
                draggable: !isMobile,
                zoom: 16,
                styles: []
            },
            locations: []
        },
        mapOptions = [
            'zoom',
            'styles'
        ],
        locationOptions = [
            'x',
            'y',
            'info-state',
            'marker-basic',
            'marker-active'
        ],
        defaultOptions = {
            map: {
                center: {
                    x: 30.5393074,
                    y: 50.4267217
                },
                zoom: 14,
                styles: []
            },
            locations: []
        };

    function getOptions($map, settings) {
        var $locations = $map.find(settings.selector.locations).find('li'),
            options = {
                map: {},
                locations: []
            };

        $.each(mapOptions, function (i, optionName) {
            var optionValue = $map.attr('data-' + optionName);
            if (undefined !== optionValue) {
                options.map[optionName] = optionValue;
            }
        });

        if ($locations.length > 0) {
            $locations.each(function (locationIndex, locationElement) {
                var $location = $(locationElement);

                options.locations[locationIndex] = {};
                $.each(locationOptions, function (optionIndex, optionName) {
                    var optionValue = $location.attr('data-' + optionName);
                    if (undefined !== optionValue) {
                        options.locations[locationIndex][optionName] = optionValue;
                    }
                });

                var content = $.trim($location.html());
                if (!content) {
                    options.locations[locationIndex] = false;
                } else {
                    options.locations[locationIndex]['content'] = content;
                }
            });
        }

        return options;
    }

    $.fn.googleMap = function (settings) {
        settings = $.extend(true, {}, defaultSettings, settings);

        $(this).each(function () {
            var $map = $(this),
                $viewport = $map.find(settings.selector.viewport),
                options = $.extend(
                    true,
                    {},
                    defaultOptions,
                    settings,
                    getOptions($map, settings)
                ),
                map = new google.maps.Map($viewport[0], {
                    center: new google.maps.LatLng(
                        parseFloat(options.map.center.y),
                        parseFloat(options.map.center.x)
                    ),
                    scrollwheel: false,
                    styles: settings.map.styles,
                    zoom: parseInt(options.map.zoom)
                }),
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

                    if ('open' == locationOptions['info-state']) {
                        infoWindows[locationIndex].open(map, markers[locationIndex]);
                        markers[locationIndex].setIcon(locationOptions['marker-active']);
                    }
                }
            });

            google.maps.event.addDomListener(window, 'resize', function() {
                map.setCenter(new google.maps.LatLng(
                    parseFloat(options.map.center.y),
                    parseFloat(options.map.center.x)
                ));
            });

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
        });
    };
})(jQuery);
