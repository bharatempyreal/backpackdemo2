var properties = {
    "data": [
        // {
        //     "id": 1,
        //     "title": "Captial Ale House",
        //     "is_featured": true,
        //     'businesstype': 'Restaurant / Tavern',
        //     'date': '10 days ago',
        //     "rating": '<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>  <i class="fa fa-star"></i> <i class="fa fa-star-half-full"></i><span>( 4.5 Reviews )</span>  </div>',
        //     "latitude": 51.541599,
        //     "longitude": -0.112588,
        //     "address": "123 Kathal St. Tampa City",
        //     "image": "assets/img/properties/properties-list-1.jpg",
        //     "type_icon": "assets/img/favicon.png",
        //     "description": "(1) posting signs/decals on local houses (lawn, front door, and windows) and (2) Wear advertising apparel (hats, t-shi rts, etc.)"
        // },
        // {
        //     "id": 2,
        //     "title": "Benny Vitali’s",
        //     "is_featured": true,
        //     'businesstype': 'Pizza Restaurant',
        //     'date': '5 days ago',
        //     "rating": '<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>  <i class="fa fa-star"></i> <i class="fa fa-star-half-full"></i><span>( 4.5 Reviews )</span>  </div>',
        //     "latitude": 51.538395,
        //     "longitude": -0.097418,
        //     "address": "123 Kathal St. Tampa City",
        //     "image": "assets/img/properties/properties-list-2.jpg",
        //     "type_icon": "assets/img/favicon.png",
        //     "description": "(1) Wear advertising apparel (hats, t-shirts, etc.). "
        // },
        // {
        //     "id": 3,
        //     "title": "Rebellion Bourbon Bar & Kitchen",
        //     "is_featured": true,
        //     'businesstype': 'Restaurant / Bar',
        //     'date': '5 days ago',
        //     "rating": '<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>  <i class="fa fa-star"></i> <i class="fa fa-star-half-full"></i><span>( 4.5 Reviews )</span>  </div>',
        //     "latitude": 51.539212,
        //     "longitude": -0.118403,
        //     "address": "123 Kathal St. Tampa City",
        //     "image": "assets/img/properties/properties-list-3.jpg",
        //     "type_icon": "assets/img/favicon.png",
        //     "description": "(1) Vehicle wrap"
        // },
        // {
        //     "id": 4,
        //     "title": "Cowboy Jacks Fredericksburg",
        //     "is_featured": true,
        //     'businesstype': 'Restaurant / Bar',
        //     'date': '5 days ago',
        //     "rating": '<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>  <i class="fa fa-star"></i> <i class="fa fa-star-half-full"></i><span>( 4.5 Reviews )</span>  </div>',
        //     "latitude": 51.522340,
        //     "longitude": -0.037894,
        //     "address": "12334 33123 Kathal St. Tampa City",
        //     "image": "assets/img/properties/properties-list-1.jpg",
        //     "type_icon": "assets/img/favicon.png",
        //     "description": "(1) Wear advertising apparel (hats, t-shirts, etc.).  "
        // }
    ]
};

function drawInfoWindow(property) {
    var image = 'assets/img/logos/logo.png';
    if (property.image) {
        image = property.image
    }

    var title = 'N/A';
    if (property.title) {
        title = property.title
    }

    var address = '';
    if (property.address) {
        address = property.address
    }

    var description = '';
    if (property.description) {
        description = property.description
    }

    var price = 253.33;
    if (property.price) {
        price = property.price
    }

    var ibContent = '';
    ibContent =
        "<div class='map-properties'>" +
        "<div class='map-img'>" +
        "<img src='" + image + "'/><div class=\"price-ratings-box\">\n" +
        "                                    <p class=\"price\">$480.000</p>\n" +
        "                                    <div class=\"ratings\">\n" +
        "                                        <i class=\"fa fa-star\"></i>\n" +
        "                                        <i class=\"fa fa-star\"></i>\n" +
        "                                        <i class=\"fa fa-star\"></i>\n" +
        "                                        <i class=\"fa fa-star\"></i>\n" +
        "                                        <i class=\"fa fa-star-o\"></i>\n" +
        "                                    </div>\n" +
        "                                </div>" +
        "</div>" +
        "<div class='map-content'>" +
        "<h4><a href='properties-details.html'>" + title + "</a></h4>" +
        "<p class='address'> <i class='fa fa-map-marker'></i>" + address + "</p>" +
        "<p class='description'>" + description + "</p>" +
        "<div class='map-properties-fetures'> " +
        "</div>" +
        "</div>";
    return ibContent;
}

function insertPropertyToArray(property, layout) {
    var image = 'assets/img/logos/logo.png';
    if (property.image) {
        image = property.image
    }

    var title = 'N/A';
    if (property.title) {
        title = property.title
    }

    var listing_for = 'Sale';
    if (property.listing_for) {
        listing_for = property.listing_for
    }

    var address = '';
    if (property.address) {
        address = property.address
    }

    var description = '';
    if (property.description) {
        description = property.description
    }


    var price = 253.33;
    if (property.price) {
        price = property.price
    }

    var is_featured = '';
    if (property.is_featured) {
        is_featured = '<span class="featured">Featured</span> ';
    }

    var date = '';
    if (property.date) {
        date = property.date;
    }

    var rating = '';
    if (property.rating) {
        rating = property.rating;
    }

    var businesstype = '';
    if (property.businesstype) {
        businesstype = property.businesstype;
    }

    var element = '';

    if(layout == 'grid'){
        element = '<div class="col-lg-6 col-md-6 col-sm-12 property-hover" id="'+property.id+'">\n' +
            '                        <div class="property-box">\n' +
            '                            <div class="property-thumbnail">\n' +
            '                                <a href="properties-details.html" class="property-img">\n' +
            '                                    <div class="listing-badges">\n' +
            '                                        '+is_featured+'\n' +
            '                                        <span class="listing-time">For '+listing_for+'</span>\n' +
            '                                    </div>\n' +
            '                                    <div class="price-box">$'+price+'<small>/mo</small></div>\n' +
            '                                    <img class="d-block w-100" src="'+image+'" alt="properties">\n' +
            '                                </a>\n' +
            '                            </div>\n' +
            '                            <div class="detail">\n' +
            '                                <h1 class="title">\n' +
            '                                    <a href="properties-details.html">'+title+'</a>\n' +
            '                                </h1>\n' +
            '                                <div class="location">\n' +
            '                                    <a href="properties-details.html">\n' +
            '                                        <i class="fa fa-map-marker"></i>'+address+'\n' +
            '                                    </a>\n' +
            '                                </div>\n' +
            '                                <ul class="facilities-list clearfix">\n' +
            '                                    <li>\n' +
            '                                        <i class="flaticon-square"></i> '+area+' sq ft\n' +
            '                                    </li>\n' +
            '                                    <li>\n' +
            '                                        <i class="flaticon-furniture"></i> '+bedroom+' Beds\n' +
            '                                    </li>\n' +
            '                                    <li>\n' +
            '                                        <i class="flaticon-holidays"></i> '+bathroom+' Baths\n' +
            '                                    </li>\n' +
            '                                    <li>\n' +
            '                                        <i class="flaticon-vehicle"></i> '+garage+' Garage\n' +
            '                                    </li>\n' +
            '                                    <li>\n' +
            '                                        <i class="flaticon-window"></i> '+balcony+' Balcony\n' +
            '                                    </li>\n' +
            '                                    <li>\n' +
            '                                        <i class="flaticon-monitor"></i> TV\n' +
            '                                    </li>\n' +
            '                                </ul>\n' +
            '                            </div>\n' +
            '                            <div class="footer clearfix">\n' +
            '                                <div class="pull-left days">\n' +
            '                                    <a><i class="fa fa-user"></i> '+businesstype+'</a>\n' +
            '                                </div>\n' +
            '                                <div class="pull-right">\n' +
            '                                    <a><i class="flaticon-time"></i> '+date+'</a>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                    </div>';
    }
    else{
        element = '<div class="property-box-2 map-property-box property-hover" id="'+property.id+'">\n' +
            '                    <div class="row">\n' +
            '                        <div class="col-lg-5 col-md-5 col-pad">\n' +
            '                            <a href="properties-details.html" class="property-img">\n' +
            '                                <img src="'+image+'" alt="properties" class="img-fluid">\n' +
            '                                <div class="price-box">$'+price+'<small>/mo</small></div>\n' +
            '                            </a>\n' +
            '                        </div>\n' +
            '                        <div class="col-lg-7 col-md-7 col-pad">\n' +
            '                            <div class="detail">\n' +
            '                                <h3 class="title">\n' +
            '                                    <a href="properties-details.html">'+title+'</a>\n' +
            '                                </h3>\n' +
                                                rating+'\n' +
            '                                <p class="location">\n' +
            '                                    <a href="properties-details.html">\n' +
            '                                        <i class="flaticon-location"></i>'+address+'\n' +
            '                                    </a>\n' +
            '                                </p>\n' +
            '                                <p class="description">\n' +
            '                                    <a href="properties-details.html">\n' +
            '                                        <i class="flaticon-location"></i>'+description+'\n' +
            '                                    </a>\n' +
            '                                </p>\n' +
            '                            </div>\n' +
            '                            <div class="footer clearfix">\n' +
            '                                <div class="pull-left days">\n' +
            '                                    <a><i class="fa fa-briefcase"></i> '+businesstype+'</a>\n' +
            '                                </div>\n' +
            '                                <div class="pull-right">\n' +
            '                                    <a><i class="flaticon-time"></i> '+date+'</a>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>';
    }
    return element;
}

function animatedMarkers(map, propertiesMarkers, properties, layout) {
    var bounds = map.getBounds();
    var propertiesArray = [];
    $.each(propertiesMarkers, function (key, value) {
        if (bounds.contains(propertiesMarkers[key].getLatLng())) {
            propertiesArray.push(insertPropertyToArray(properties.data[key], layout));
            setTimeout(function () {
                if (propertiesMarkers[key]._icon != null) {
                    propertiesMarkers[key]._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable bounce-animation marker-loaded';
                }
            }, key * 50);
        }
        else {
            if (propertiesMarkers[key]._icon != null) {
                propertiesMarkers[key]._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable';
            }
        }
    });
    $('.fetching-properties').html(propertiesArray);
}

function generateMap(latitude, longitude, mapProvider, layout) {

    var map = L.map('map', {
        center: [latitude, longitude],
        zoom: 14,
        scrollWheelZoom: false
    });

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    L.tileLayer.provider(mapProvider).addTo(map);
    var markers = L.markerClusterGroup({
        showCoverageOnHover: false,
        zoomToBoundsOnClick: false
    });
    var propertiesMarkers = [];

    $.each(properties.data, function (index, property) {
        var icon = '<img src="assets/img/logos/logo.png">';
        if (property.type_icon) {
            icon = '<img src="' + property.type_icon + '">';
        }
        var color = '';
        var markerContent =
            '<div class="map-marker ' + color + '">' +
            '<div class="icon">' +
            icon +
            '</div>' +
            '</div>';

        var _icon = L.divIcon({
            html: markerContent,
            iconSize: [36, 46],
            iconAnchor: [18, 32],
            popupAnchor: [130, -28],
            className: ''
        });

        var marker = L.marker(new L.LatLng(property.latitude, property.longitude), {
            title: property.title,
            icon: _icon
        });

        propertiesMarkers.push(marker);
        marker.bindPopup(drawInfoWindow(property));
        markers.addLayer(marker);
        marker.on('popupopen', function () {
            this._icon.className += ' marker-active';
        });
        marker.on('popupclose', function () {
            this._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable marker-loaded';
        });
    });

    map.addLayer(markers);
    animatedMarkers(map, propertiesMarkers, properties, layout);
    map.on('moveend', function () {
        animatedMarkers(map, propertiesMarkers, properties, layout);
    });

    $('.fetching-properties .property-hover').hover(
        function () {
            propertiesMarkers[$(this).attr('id') - 1]._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable marker-loaded marker-active';
        },
        function () {
            propertiesMarkers[$(this).attr('id') - 1]._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable marker-loaded';
        }
    );



    $('.geolocation').on("click", function () {
        map.locate({setView: true})
    });
    $('#map').removeClass('fade-map');
}
