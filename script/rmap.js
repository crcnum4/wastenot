var startPos;
var userLat=0;
var userLon=0;

function geoSuccess(position) {
    startPos = position;
    userLat = startPos.coords.latitude;
    userLon = startPos.coords.longitude;
  console.log(userLat,typeof userLat,userLon, typeof userLon);
  };

navigator.geolocation.getCurrentPosition(geoSuccess);


$('#renderMap').on('click', function(){
    console.log('click recovered');
 
var mymap = L.map('map').setView([startPos.coords.latitude, startPos.coords.longitude], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.mapbox-streets-v7',
    accessToken: 'pk.eyJ1IjoiZGFuaWVsZ29yaXMiLCJhIjoiY2luM2tmdXowMGJ5NXZxbHVka3JyNXduaiJ9.4m8lB-3NOFxhK4jjquJEjw'
}).addTo(mymap);

  var redIcon = L.icon({
    iconUrl: 'http://oi68.tinypic.com/2wdddw5.jpg',
    // shadowUrl: 'leaf-shadow.png',

    iconSize:     [41, 61], // size of the icon
    // shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    // shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
  var orangeIcon = L.icon({
    iconUrl: 'http://i67.tinypic.com/1r6tcm.png',
    // shadowUrl: 'leaf-shadow.png',

    iconSize:     [41, 61], // size of the icon
    // shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    // shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
  

  var yellowIcon = L.icon({
    iconUrl: 'http://i64.tinypic.com/2a5ni90.png',
    // shadowUrl: 'leaf-shadow.png',

    iconSize:     [41, 61], // size of the icon
    // shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    // shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
  
var greenIcon = L.icon({
    iconUrl: 'http://i64.tinypic.com/357io3s.png',
    // shadowUrl: 'leaf-shadow.png',

    iconSize:     [41, 61], // size of the icon
    // shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    // shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
  
      var marker = L.marker([startPos.coords.latitude, startPos.coords.longitude], {icon: redIcon}).addTo(mymap);
var marker2 = L.marker([startPos.coords.latitude+0.017, startPos.coords.longitude+0.021], {icon: orangeIcon}).addTo(mymap);
  var marker3 = L.marker([startPos.coords.latitude+0.025, startPos.coords.longitude+0.03], {icon: yellowIcon}).addTo(mymap);
  var marker4 = L.marker([startPos.coords.latitude+0.02, startPos.coords.longitude+0.02], {icon: greenIcon}).addTo(mymap);

var popup = L.popup()
    .setLatLng([userLat, userLon])
    .setContent("The Cheesecake Factory<button class='btn btn-default'>Claim</button>")
    .openOn(mymap);
})  
