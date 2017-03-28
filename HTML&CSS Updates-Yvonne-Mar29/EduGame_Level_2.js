                function initMap1() {
                    var map1 = new google.maps.Map(document.getElementById('map1'), {
                        zoom: 3,
                        center: {lat: 32.428, lng: 80.000},
                        mapTypeId: 'terrain'
                    });


                    //all the above code from https://developers.google.com/maps/documentation/javascript/examples/map-simple, https://developers.google.com/maps/documentation/javascript/examples/rectangle-simple

                    //below marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple, https://developers.google.com/maps/documentation/javascript/examples/marker-animations

                    var marker1 = new google.maps.Marker({
                        position: {lat: 23.594, lng: 78.963},
                        map: map1,
                        animation: google.maps.Animation.DROP,
                    });
                    var marker2 = new google.maps.Marker({
                        position: {lat: 34.939, lng: 64.710},
                        map: map1,
                        animation: google.maps.Animation.DROP,
                    });
                    //above marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple, https://developers.google.com/maps/documentation/javascript/examples/marker-animations

                    //below marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple
                    var contentString1 = '<div id="content">'+
                        '</div>'+
                        '<h1>Question 1 Hint:</h1>'+
                        '<p> ((15 + 350 + 55 + 30) * 2) / 3 </p>' +
                        '</div>';

                    var contentString2 = '<div id="content">'+
                        '</div>'+
                        '<h1>Question 2 Hint:</h1>'+
                        '<p> A = ½ (b * h) </p>' +
                        '</div>';


                    var infowindow1 = new google.maps.InfoWindow({
                        content: contentString1
                    });

                    var infowindow2 = new google.maps.InfoWindow({
                        content: contentString2
                    });

                    marker1.addListener('click', function() {
                        infowindow1.open(map1, marker1);
                    });

                    marker2.addListener('click', function() {
                        infowindow2.open(map1, marker2);
                    });

                    //above marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple

                    // Define the LatLng coordinates for the polygon's path - https://developers.google.com/maps/documentation/javascript/examples/polygon-simple.
                    var triangleCoords = [
                        {lat: 46.190, lng: 102.834},
                        {lat: 35.061, lng: 110.834},
                        {lat: 42.818, lng: 90.515},
                    ];

                    // Construct the polygon - https://developers.google.com/maps/documentation/javascript/examples/polygon-simple.
                    var Triangle = new google.maps.Polygon({
                        paths: triangleCoords,
                        strokeColor: '#ff0000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#ff0000',
                        fillOpacity: 0.35,
                    });
                    Triangle.setMap(map1);    
                }


                function initMap2() {
                    var map2 = new google.maps.Map(document.getElementById('map2'), {
                        center: {lat: 32.428, lng: 72.000},
                        zoom: 2,
                        mapTypeId: 'terrain'
                    });
                }
