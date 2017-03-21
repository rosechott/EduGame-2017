                function initMap1() {
                    var map1 = new google.maps.Map(document.getElementById('map1'), {
                        zoom: 3,
                        center: {lat: 32.428, lng: 110.000},
                        mapTypeId: 'terrain'
                    });


                    //all the above code from https://developers.google.com/maps/documentation/javascript/examples/map-simple, https://developers.google.com/maps/documentation/javascript/examples/rectangle-simple

                    //below marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple, https://developers.google.com/maps/documentation/javascript/examples/marker-animations

                    var marker1 = new google.maps.Marker({
                        position: {lat: 14.600, lng: 120.984},
                        map: map1,
                        animation: google.maps.Animation.DROP,
                    });

                    //above marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple, https://developers.google.com/maps/documentation/javascript/examples/marker-animations

                    //below marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple
                    var contentString1 = '<div id="content">'+
                        '</div>'+
                        '<h1>Question 1 Hint:</h1>'+
                        '<p> 9<sup>3</sup> / 3 </p>' +
                        '</div>';


                    var infowindow1 = new google.maps.InfoWindow({
                        content: contentString1
                    });

                    marker1.addListener('click', function() {
                        infowindow1.open(map1, marker1);
                    });

                    //above marker code from https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple

                    // Construct the circle - https://developers.google.com/maps/documentation/javascript/examples/circle-simple
                    var Circle = new google.maps.Circle({
                        strokeColor: '#0000ff',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#0000ff',
                        fillOpacity: 0.35,
                        center: {lat: 39.904, lng: 116.407},
                        radius: 400000
                    });
                    Circle.setMap(map1);    
                }


                function initMap2() {
                    var map2 = new google.maps.Map(document.getElementById('map2'), {
                       center: {lat: 32.428, lng: 72.000},
                        zoom: 2,
                        mapTypeId: 'terrain'
                    });
                }
