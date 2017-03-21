                function initMap1() {
                    var map1 = new google.maps.Map(document.getElementById('map1'), {
                        zoom: 3,
                        center: {lat: 32.428, lng: 48.000},
                        mapTypeId: 'terrain'
                    });


                    //all the above code from https://developers.google.com/maps/documentation/javascript/examples/map-simple, https://developers.google.com/maps/documentation/javascript/examples/rectangle-simple

                    //below marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple, https://developers.google.com/maps/documentation/javascript/examples/marker-animations

                    var marker1 = new google.maps.Marker({
                        position: {lat: 15.500, lng: 48.125},
                        map: map1,
                        animation: google.maps.Animation.DROP,
                    });
                    var marker2 = new google.maps.Marker({
                        position: {lat: 18.500, lng: -2.750},
                        map: map1,
                        animation: google.maps.Animation.DROP,
                    });
                    var marker3 = new google.maps.Marker({
                        position: {lat: 41.500, lng: 74.750},
                        map: map1,
                        animation: google.maps.Animation.DROP,
                    });
                    //above marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple, https://developers.google.com/maps/documentation/javascript/examples/marker-animations

                    //below marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple
                    var contentString1 = '<div id="content">'+
                        '</div>'+
                        '<h1>Hint 1:</h1>'+
                        '<p> Write out the problem as follows:  156 – 4 – 40 – 8 = ? </p>' +
                        '</div>';

                    var contentString2 = '<div id="content">'+
                        '</div>'+
                        '<h1>Hint 2:</h1>'+
                        '<p> Area of a quadrangle = Width * Length </p>' +
                        '</div>';

                    var contentString3 = '<div id="content">'+
                        '</div>'+
                        '<h1>Hint 3:</h1>'+
                        '<p> The interior angles of both squares and rectangles are 90 degrees.  One of these shapes has 4 sides of equal length, while the other has 2 sets of 2 sides of equal length. </p>' +
                        '</div>';

                    var infowindow1 = new google.maps.InfoWindow({
                        content: contentString1
                    });

                    var infowindow2 = new google.maps.InfoWindow({
                        content: contentString2
                    });
                    var infowindow3 = new google.maps.InfoWindow({
                        content: contentString3
                    });

                    marker1.addListener('click', function() {
                        infowindow1.open(map1, marker1);
                    });

                    marker2.addListener('click', function() {
                        infowindow2.open(map1, marker2);
                    });
                    marker3.addListener('click', function() {
                        infowindow3.open(map1, marker3);
                    });

                    //above marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple

                    // Define the LatLng coordinates for the polygon's path - https://developers.google.com/maps/documentation/javascript/examples/polygon-simple.
                    var rectangleCoords = [
                        {lat: 41.003, lng: 39.717},
                        {lat: 32.933, lng: 35.083},
                        {lat: 26.595, lng: 56.472},
                        {lat: 35.755, lng: 59.898},
                    ];

                    // Construct the polygon - https://developers.google.com/maps/documentation/javascript/examples/polygon-simple.
                    var Rectangle = new google.maps.Polygon({
                        paths: rectangleCoords,
                        strokeColor: '#000000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#000000',
                        fillOpacity: 0.35,
                    });
                    Rectangle.setMap(map1);    
                }


                function initMap2() {
                    var map2 = new google.maps.Map(document.getElementById('map2'), {
                        center: {lat: -34.397, lng: 150.644},
                        zoom: 8
                    });
                }
