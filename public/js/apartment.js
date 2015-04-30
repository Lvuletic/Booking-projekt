/**
 * Created by Luka on 30/04/15.
 */


$(function() {
    $("#reserveDate").datepicker({
        dateFormat: "yy-mm-dd"
    }).val()
});


var $dp = $("<input type='text' />").hide().datepicker().appendTo('body');

$("#reservationDate").button().click(function(e) {
    if ($dp.datepicker('widget').is(':hidden')) {
        $dp.show().datepicker('show').hide();
        $dp.datepicker("widget").position({
            my: "left top",
            at: "right top",
            of: this
        });
    } else {
        $dp.hide();
    }

    //e.preventDefault();
});