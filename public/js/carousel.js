/**
 * Created by Luka on 30/04/15.
 */

$(document).ready(function() {
    $('#myCarousel').carousel({
        interval: 0
    });

    $('#myCarousel').on('slid.bs.carousel', function() {
        //alert("slid");
    });
});
