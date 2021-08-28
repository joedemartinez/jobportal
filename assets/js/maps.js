(function($) {
    "use strict";

    function mainMap() {
        // Locations
        // ----------------------------------------------- //
        
		var markerIcon = {
			path: 'M19.9,0c-0.2,0-1.6,0-1.8,0C8.8,0.6,1.4,8.2,1.4,17.8c0,1.4,0.2,3.1,0.5,4.2c-0.1-0.1,0.5,1.9,0.8,2.6c0.4,1,0.7,2.1,1.2,3 c2,3.6,6.2,9.7,14.6,18.5c0.2,0.2,0.4,0.5,0.6,0.7c0,0,0,0,0,0c0,0,0,0,0,0c0.2-0.2,0.4-0.5,0.6-0.7c8.4-8.7,12.5-14.8,14.6-18.5 c0.5-0.9,0.9-2,1.3-3c0.3-0.7,0.9-2.6,0.8-2.5c0.3-1.1,0.5-2.7,0.5-4.1C36.7,8.4,29.3,0.6,19.9,0z M2.2,22.9 C2.2,22.9,2.2,22.9,2.2,22.9C2.2,22.9,2.2,22.9,2.2,22.9C2.2,22.9,3,25.2,2.2,22.9z M19.1,26.8c-5.2,0-9.4-4.2-9.4-9.4 s4.2-9.4,9.4-9.4c5.2,0,9.4,4.2,9.4,9.4S24.3,26.8,19.1,26.8z M36,22.9C35.2,25.2,36,22.9,36,22.9C36,22.9,36,22.9,36,22.9 C36,22.9,36,22.9,36,22.9z M13.8,17.3a5.3,5.3 0 1,0 10.6,0a5.3,5.3 0 1,0 -10.6,0',
			strokeOpacity: 0,
			strokeWeight: 1,
			fillColor: '#e33324',
			fillOpacity: 1,
			rotation: 0,
			scale: 1,
			anchor: new google.maps.Point(19, 50)
		}
		var ib = new InfoBox();
        function locationData(jobURL, companyLogo, companyName, jobTitle, verifiedBadge) {
            return ('' +
                '<a href="' + jobURL + '" class="utf-job-listing">' +
                '<div class="infoBox-close"><i class="icon-feather-x"></i></div>' +
                '<div class="utf-job-listing-details">' +
                '<div class="utf-job-listing-company-logo">' +
                '<div class="' + verifiedBadge + '-badge"></div>' +
                '<img src="' + companyLogo + '" alt="">' +
                '</div>' +
                '<div class="utf-job-listing-description">' +
                '<h4 class="utf-job-listing-company">' + companyName + '</h4>' +
                '<h3 class="utf-job-listing-title">' + jobTitle + '</h3>' +
                '</div>' +
                '</div>' +
                '</a>')
        }

        // Locations
        var locations = [
            [locationData('single-job-page.html', 'images/company_logo_1.png', "Afghanistan", 'IT Department Manager & Blogger-Entrepenour'), 36.13610021320376, -115.1312255859375, 1, markerIcon],
            [locationData('single-job-page.html', 'images/company_logo_2.png', "Afghanistan", 'IT Department Manager & Blogger-Entrepenour'), 36.10637081203522, -115.22872924804688, 2, markerIcon],
			[locationData('single-job-page.html', 'images/company_logo_3.png', "Afghanistan", 'IT Department Manager & Blogger-Entrepenour'), 37.788181, -122.461270, 3, markerIcon],
            [locationData('single-job-page.html', 'images/company_logo_4.png', "Afghanistan", 'IT Department Manager & Blogger-Entrepenour'), 37.750812, -122.471934, 4, markerIcon],
            [locationData('single-job-page.html', 'images/company_logo_5.png', "Afghanistan", 'IT Department Manager & Blogger-Entrepenour'), 40.7427837, -73.11445617675781, 5, markerIcon],
            [locationData('single-job-page.html', 'images/company_logo_6.png', "Afghanistan", 'IT Department Manager & Blogger-Entrepenour'), 40.70437865245596, -73.98674011230469, 6, markerIcon],
            [locationData('single-job-page.html', 'images/company_logo_7.png', "Afghanistan", 'IT Department Manager & Blogger-Entrepenour'), 40.94401669296697, -74.16938781738281, 7, markerIcon],
            [locationData('single-job-page.html', 'images/company_logo_8.png', "Afghanistan", 'IT Department Manager & Blogger-Entrepenour'), 41.79424986338271, -87.7093505859375, 8, markerIcon],
            [locationData('single-job-page.html', 'images/company_logo_9.png', "Afghanistan", 'IT Department Manager & Blogger-Entrepenour'), 41.76967281691741, -87.9510498046875, 9, markerIcon],            
        ];

        // Map Attributes
        // ----------------------------------------------- //

        var mapZoomAttr = $('#map').attr('data-map-zoom');
        var mapScrollAttr = $('#map').attr('data-map-scroll');

        if (typeof mapZoomAttr !== typeof undefined && mapZoomAttr !== false) {
            var zoomLevel = parseInt(mapZoomAttr);
        } else {
            var zoomLevel = 2;
        }

        if (typeof mapScrollAttr !== typeof undefined && mapScrollAttr !== false) {
            var scrollEnabled = parseInt(mapScrollAttr);
        } else {
            var scrollEnabled = false;
        }

        // Main Map
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: zoomLevel,
            scrollwheel: scrollEnabled,
            center: new google.maps.LatLng(37.754929, -122.429416),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            panControl: false,
            navigationControl: false,
            streetViewControl: false,
            gestureHandling: 'cooperative',
            styles: [{
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#747474"
                }, {
                    "lightness": "23"
                }]
            }, {
                "featureType": "poi.attraction",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#f38eb0"
                }]
            }, {
                "featureType": "poi.government",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ced7db"
                }]
            }, {
                "featureType": "poi.medical",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffa5a8"
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#c7e5c8"
                }]
            }, {
                "featureType": "poi.place_of_worship",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#d6cbc7"
                }]
            }, {
                "featureType": "poi.school",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#c4c9e8"
                }]
            }, {
                "featureType": "poi.sports_complex",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#b1eaf1"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{
                    "lightness": "100"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "off"
                }, {
                    "lightness": "100"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffd4a5"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffe9d2"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "all",
                "stylers": [{
                    "visibility": "simplified"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers": [{
                    "weight": "3.00"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "weight": "0.30"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#747474"
                }, {
                    "lightness": "36"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#e9e5dc"
                }, {
                    "lightness": "30"
                }]
            }, {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "lightness": "100"
                }]
            }, {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                    "color": "#d2e7f7"
                }]
            }]
        });

        // Infobox
        // ----------------------------------------------- //
        var boxText = document.createElement("div");
        boxText.className = 'map-box'
        var currentInfobox;
        var boxOptions = {
            content: boxText,
            disableAutoPan: false,
            alignBottom: true,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(-160, 0),
            zIndex: null,
            boxStyle: {
                width: "320px"
            },
            closeBoxMargin: "0",
            closeBoxURL: "",
            infoBoxClearance: new google.maps.Size(25, 25),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false,
        };

        var markerCluster, overlay, i;
        var allMarkers = [];
        var clusterStyles = [{
            textColor: 'white',
            url: '',
            height: 50,
            width: 50
        }];

        var markerIco;
        for (i = 0; i < locations.length; i++) {
            markerIco = locations[i][4];
            var overlaypositions = new google.maps.LatLng(locations[i][1], locations[i][2]),
                overlay = new CustomMarker(
                    overlaypositions,
                    map, {
                        marker_id: i
                    },
                    markerIco
                );
            allMarkers.push(overlay);
            google.maps.event.addDomListener(overlay, 'click', (function(overlay, i) {
                return function() {
                    ib.setOptions(boxOptions);
                    boxText.innerHTML = locations[i][0];
                    ib.close();
                    ib.open(map, overlay);
                    currentInfobox = locations[i][3];
                    google.maps.event.addListener(ib, 'domready', function() {
                        $('.infoBox-close').click(function(e) {
                            e.preventDefault();
                            ib.close();
                            $('.map-marker-container').removeClass('clicked infoBox-opened');
                        });
                    });
                }
            })(overlay, i));
        }

        // Marker Clusterer Init
        // ----------------------------------------------- //
        var options = {
            imagePath: 'images/',
            styles: clusterStyles,
            minClusterSize: 3
        };

        markerCluster = new MarkerClusterer(map, allMarkers, options);
        google.maps.event.addDomListener(window, "resize", function() {
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });

        // Custom User Interface Elements
        // ----------------------------------------------- //
        var zoomControlDiv = document.createElement('div');
        var zoomControl = new ZoomControl(zoomControlDiv, map);

        function ZoomControl(controlDiv, map) {
            zoomControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
            controlDiv.style.padding = '5px';
            controlDiv.className = "zoomControlWrapper";

            var controlWrapper = document.createElement('div');
            controlDiv.appendChild(controlWrapper);

            var zoomInButton = document.createElement('div');
            zoomInButton.className = "custom-zoom-in";
            controlWrapper.appendChild(zoomInButton);

            var zoomOutButton = document.createElement('div');
            zoomOutButton.className = "custom-zoom-out";
            controlWrapper.appendChild(zoomOutButton);

            google.maps.event.addDomListener(zoomInButton, 'click', function() {
                map.setZoom(map.getZoom() + 1);
            });

            google.maps.event.addDomListener(zoomOutButton, 'click', function() {
                map.setZoom(map.getZoom() - 1);
            });
        }

        $("#geoLocation, .utf-input-with-icon.location a").click(function(e) {
            e.preventDefault();
            geolocate();
        });

        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    map.setCenter(pos);
                    map.setZoom(12);
                });
            }
        }

    }

    var map = document.getElementById('map');
    if (typeof(map) != 'undefined' && map != null) {
        google.maps.event.addDomListener(window, 'load', mainMap);
    }

    // ---------------- Main Map / End ---------------- //

    // Single Listing Map
    // ----------------------------------------------- //
    function singleListingMap() {
        var myLatlng = new google.maps.LatLng({
            lng: $('#singleListingMap').data('longitude'),
            lat: $('#singleListingMap').data('latitude'),
        });
        var single_map = new google.maps.Map(document.getElementById('singleListingMap'), {
            zoom: 15,
            center: myLatlng,
            scrollwheel: false,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            panControl: false,
            navigationControl: false,
            streetViewControl: false,
            styles: [{
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#747474"
                }, {
                    "lightness": "23"
                }]
            }, {
                "featureType": "poi.attraction",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#f38eb0"
                }]
            }, {
                "featureType": "poi.government",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ced7db"
                }]
            }, {
                "featureType": "poi.medical",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffa5a8"
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#c7e5c8"
                }]
            }, {
                "featureType": "poi.place_of_worship",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#d6cbc7"
                }]
            }, {
                "featureType": "poi.school",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#c4c9e8"
                }]
            }, {
                "featureType": "poi.sports_complex",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#b1eaf1"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{
                    "lightness": "100"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "off"
                }, {
                    "lightness": "100"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffd4a5"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffe9d2"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "all",
                "stylers": [{
                    "visibility": "simplified"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers": [{
                    "weight": "3.00"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "weight": "0.30"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#747474"
                }, {
                    "lightness": "36"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#e9e5dc"
                }, {
                    "lightness": "30"
                }]
            }, {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "lightness": "100"
                }]
            }, {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                    "color": "#d2e7f7"
                }]
            }]
        });

        $('#streetView').click(function(e) {
            e.preventDefault();
            single_map.getStreetView().setOptions({
                visible: true,
                position: myLatlng
            });
            // $(this).css('display', 'none')
        });

        var zoomControlDiv = document.createElement('div');
        var zoomControl = new ZoomControl(zoomControlDiv, single_map);

        function ZoomControl(controlDiv, single_map) {
            zoomControlDiv.index = 1;
            single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
            controlDiv.style.padding = '5px';

            var controlWrapper = document.createElement('div');
            controlDiv.appendChild(controlWrapper);

            var zoomInButton = document.createElement('div');
            zoomInButton.className = "custom-zoom-in";
            controlWrapper.appendChild(zoomInButton);

            var zoomOutButton = document.createElement('div');
            zoomOutButton.className = "custom-zoom-out";
            controlWrapper.appendChild(zoomOutButton);

            google.maps.event.addDomListener(zoomInButton, 'click', function() {
                single_map.setZoom(single_map.getZoom() + 1);
            });

            google.maps.event.addDomListener(zoomOutButton, 'click', function() {
                single_map.setZoom(single_map.getZoom() - 1);
            });
        }

        var singleMapIco = "<i class='" + $('#singleListingMap').data('map-icon') + "'></i>";
        new CustomMarker(
            myLatlng,
            single_map, {
                marker_id: '1'
            },
            singleMapIco
        );
    }

    var single_map = document.getElementById('singleListingMap');
    if (typeof(single_map) != 'undefined' && single_map != null) {
        google.maps.event.addDomListener(window, 'load', singleListingMap);
    }

    // -------------- Single Listing Map / End -------------- //

    // Custom Map Marker
    // ----------------------------------------------- //
    function CustomMarker(latlng, map, args, markerIco) {
        this.latlng = latlng;
        this.args = args;
        this.markerIco = markerIco;
        this.setMap(map);
    }
    CustomMarker.prototype = new google.maps.OverlayView();
    CustomMarker.prototype.draw = function() {
        var self = this;
        var div = this.div;
        if (!div) {
            div = this.div = document.createElement('div');
            div.className = 'map-marker-container';

            div.innerHTML = '<div class="marker-container">' +
                '<div class="marker-card">' +
                '</div>' +
                '</div>'

            google.maps.event.addDomListener(div, "click", function(event) {
                $('.map-marker-container').removeClass('clicked infoBox-opened');
                google.maps.event.trigger(self, "click");
                $(this).addClass('clicked infoBox-opened');
            });

            if (typeof(self.args.marker_id) !== 'undefined') {
                div.dataset.marker_id = self.args.marker_id;
            }

            var panes = this.getPanes();
            panes.overlayImage.appendChild(div);
        }

        var point = this.getProjection().fromLatLngToDivPixel(this.latlng);

        if (point) {
            div.style.left = (point.x) + 'px';
            div.style.top = (point.y) + 'px';
        }
    };

    CustomMarker.prototype.remove = function() {
        if (this.div) {
            this.div.parentNode.removeChild(this.div);
            this.div = null;
            $(this).removeClass('clicked');
        }
    };
    CustomMarker.prototype.getPosition = function() {
        return this.latlng;
    };
})(this.jQuery);