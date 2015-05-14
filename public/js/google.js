/**
 * Created by Luka on 14/05/15.
 */

function initialize() {
    var canvas = document.getElementById("divMap");
    var coordinates = new google.maps.LatLng(45.324876, 14.451748);
    var setup = {
        center: coordinates,
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(canvas, setup);
    var oznaka = new google.maps.Marker({
        position : coordinates,
        map: map,
        title: "We are here"
    });
}
google.maps.event.addDomListener(window,"load",initialize);

