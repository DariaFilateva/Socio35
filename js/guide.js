function initMap(){var e=new google.maps.DirectionsService,n=new google.maps.DirectionsRenderer,t=new google.maps.Map(document.getElementById("map"),{zoom:15,center:{lat:59.089079,lng:37.919546}});n.setMap(t);var o=new google.maps.InfoWindow;calculateAndDisplayRoute(e,n)/*,menu(o)*/}function calculateAndDisplayRoute(e,n){for(var t=[],o={lat:startx,lng:starty},a={lat:finishx,lng:finishy},i=0;i<centerx.length;i++)t.push({location:{lat:centerx[i],lng:centery[i]},stopover:!0});e.route({origin:o,destination:a,waypoints:t,optimizeWaypoints:!0,travelMode:"DRIVING"},function(e,t){n.setDirections(e)})}