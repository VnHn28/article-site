//Functions
function lazyLoadGoogleMap(canvas, addr) {
    $.getScript("//maps.google.com/maps/api/js?region=tw&language=zh-TW&sensor=true&callback=initializeMap")
    .done(function() {
        $.googleMap.initMap(canvas, addr);
    });
}

function initializeMap(canvas, addr) {
    $.googleMap.initMap(canvas, addr);
}

$(function() {
    var magz = {
        googleMap: {
            map: '',
            marker: '',
            defaultAddr: '臺北市中正區中山南路21-1號',
            initMap: function(canvas, addr) {
                canvas = canvas || 'map_canvas';
                addr = (String(addr).length) ? addr : $.googleMap.defaultAddr;

                var geocoder = new google.maps.Geocoder(),
                    lat,
                    lng,
                    $mapLink = $('.maplink'),
                    $mapNavigator = $('.map-navigator');

                geocoder.geocode({
                    'address': addr
                }, function (results, status) {
                    if(status == google.maps.GeocoderStatus.OK) {
                        lat = results[0].geometry.location.lat();
                        lng = results[0].geometry.location.lng();

                        var latlng = new google.maps.LatLng(lat, lng),
                            zoom = 17,
                            dir = {
                                start: '',
                                end: lat + ',' + lng
                            }

                        var mapOptions = {
                            zoom: zoom,
                            zoomControl: false,
                            draggable: false,
                            mapTypeControl: false,
                            scrollwheel: false,
                            streetViewControl: false,
                            center: latlng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };

                        $.googleMap.map = new google.maps.Map(
                            document.getElementById(canvas),
                            mapOptions
                        );

                        $.googleMap.marker = new google.maps.Marker({
                            draggable: false,
                            position: latlng,
                            map: $.googleMap.map
                        });

                        if ($mapLink.length) {
                            $mapLink.attr({
                                'href': 'https://www.google.com/maps/place/'+addr,
                                'target': '_blank'
                            });
                        }

                        if ($mapNavigator.length) {
                            if(navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(function(position) {
                                    dir.start = position.coords.latitude + ',' + position.coords.longitude;

                                    $mapNavigator.attr({
                                        'href': 'https://www.google.com/maps/dir/' + dir.start + '/' + dir.end
                                    }).removeClass('hide');

                                }, function() {
                                    $.googleMap.handleNoGeolocation(latlng);
                                });
                            } else {
                                $.googleMap.handleNoGeolocation(latlng);
                            }
                        }
                    }
                });
            },

            getAddressMarker: function(canvas, selector) {
                var map,
                    marker,
                    that = $(selector),
                    thatValue = that.val(),
                    addr = (thatValue.length) ? thatValue : $.googleMap.defaultAddr,
                    action = (window.orientation !== undefined) ? 'input' : 'keyup';

                if (window.google && google.maps) {
                    $.googleMap.initMap(canvas, addr);
                } else {
                    lazyLoadGoogleMap(canvas, addr);
                }

                var getAddressMarker = function() {
                    var val = that.val();
                    var address = (val.length) ? val : $.googleMap.defaultAddr;
                    var geocoder = new google.maps.Geocoder();

                    geocoder.geocode({
                        'address': address
                    }, function (results, status) {
                        if(status == google.maps.GeocoderStatus.OK) {
                           LatLng = results[0].geometry.location;
                           $.googleMap.map.setCenter(LatLng);
                           $.googleMap.marker.setPosition(LatLng);
                           $.googleMap.marker.setTitle(address);
                        }
                    });
                };

                $(document).on(action, selector, getAddressMarker);
            },

            handleNoGeolocation: function(latlng) {
                $.googleMap.map.setCenter(latlng);
                $('.map-navigator').remove();
            },

            run: function(canvas, addr) {
                if (window.google && google.maps) {
                    initializeMap(canvas, addr);
                } else {
                    lazyLoadGoogleMap(canvas, addr);
                }
            }
        },

        global: function() {
            var $switch = $('.header-menu-switch'),
                $menu = $('.header-menu'),
                $line = $('.js-share-line');

            $switch.on('click', function(e) {
                e.preventDefault();

                var _this = $(this);

                _this.toggleClass('active');

            });

            $line.on('click', function(e) {
                e.preventDefault();

                var _this = $(this),
                    thisData = _this.data(),
                    href;

                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                    href = "http://line.naver.jp/R/msg/text/?" + thisData.title + "%0D%0A" + thisData.url;
                } else {
                    href = "https://lineit.line.me/share/ui?url=" + encodeURIComponent(thisData.url);
                }

                window.open(href, '分享到 Line');
            });
        },

        adAction:function(){
           // alert('5')
           $("#ad_001_m").find('.close').on('click',function(e){
            e.preventDefault();
            $(this).parent().remove();
        });
        }
    };

    $.extend(true, magz);
    $.global();
    $.adAction();
});