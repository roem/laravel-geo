(function () {
    $.fn.laravelGeo.registry.registerAdapter('google', function (id, payload) {
        var zoom = payload.data.zoom
        if (payload.data.adaptzoom) {
            if($(window).height() <= 1024 || $(window).width() <= 768) {
                zoom = zoom - 1;
            }

            if($(window).height() <= 768 || $(window).width() <= 480) {
                zoom = zoom - 1;
            }

            if($(window).height() <= 480 || $(window).width() <= 360) {
                zoom = zoom - 1;
            }
        }

        var mapCenterObject = new google.maps.LatLng(payload.data.latitude, payload.data.longitude)

        this.$mapData = {
            center: mapCenterObject,
            zoom: zoom,
            scrollwheel: payload.data.scrollwheel,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        if (payload.data.styles.data.length) {
            this.$mapData.styles = buildStyles(payload.data.styles.data)
        }

        if (payload.data.map_styles.data.length) {
            this.$mapData.mapTypeControlOptions = {
                scrollwheel: payload.data.scrollwheel,
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE]
            }

            $.each(payload.data.map_styles.data, function (index, mapStyle) {
                return addMapStyleToControlOptions(mapStyle)
            })

            this.$mapData.mapTypeId = this.$mapData.mapTypeControlOptions.mapTypeIds[0]
        }

        this.$mapObject = new google.maps.Map(document.getElementById(id), this.$mapData);

        if (payload.data.map_styles.data.length) {
            $.each(payload.data.map_styles.data, function (index, mapStyle) {
                return addMapStyleToMap(mapStyle)
            })
        }

        if (payload.data.markers.data.length) {
            $.each(payload.data.markers.data, function (index, marker) {
                return addMarker(marker)
            })
        }

        function addMarker(data) {
            var markerData = {
                title: data.title,
                position: new google.maps.LatLng(data.latitude, data.longitude),
                map: this.$mapObject
            }

            if(data.label) {
                markerData.label = data.label
            }

            if (typeof data.icon !== 'undefined') {
                markerData.icon = {
                    url: data.icon.data.image,
                    size: new google.maps.Size(data.icon.data.width, data.icon.data.height),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(data.icon.data.latitude, data.icon.data.longitude)
                }
                markerData.shape = data.icon.data.shape
            }

            var markerObject = new google.maps.Marker(markerData);

            if (typeof data.link !== 'undefined') {
                addLinkForMarker(markerObject, data.link.data)
            }

            if (typeof data.infowindow !== 'undefined') {
                addInfowindowToMarker(markerObject, data.infowindow.data)
            }

            return markerObject;
        }

        function addMapStyleToControlOptions(mapStyle) {
            this.$mapData.mapTypeControlOptions.mapTypeIds.unshift(mapStyle.slug)
        }

        function addMapStyleToMap(mapStyle) {
            this.$mapObject.mapTypes.set(mapStyle.slug, buildMapStyle(mapStyle))
        }

        function buildMapStyle(mapStyle) {
            return new google.maps.StyledMapType(buildStyles(mapStyle.styles.data), {
                name: mapStyle.title
            })
        }

        function buildStyles(data) {
            var styles = []

            $.each(data, function (index, style) {
                if (!style.featureType.length) {
                    delete style.featureType
                }

                if (!style.elementType.length) {
                    delete style.elementType
                }

                if (style.stylers.data.length) {
                    style.stylers = style.stylers.data
                }

                styles.push(style)
            })

            return styles;
        }

        function addLinkForMarker(marker, data) {
            google.maps.event.addListener(marker, 'click', (function () {
                if (data.target) {
                    window.open(data.href, data.target);
                } else {
                    window.location.href = data.href;
                }
            }));
        }

        function addInfowindowToMarker(marker, data) {
            var infowindowObject = new google.maps.InfoWindow({
                content: data.content
            });

            google.maps.event.addListener(marker, 'click', (function () {
                infowindowObject.open(this.$mapObject, marker);
            }));

            if (data.open) {
                infowindowObject.open(this.$mapObject, marker);
            }
        }

        $(window).on('resize', function () {
            this.$mapObject.setCenter(mapCenterObject);
        });
    })
})(jQuery);
