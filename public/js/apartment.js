/**
 * Created by Luka on 30/04/15.
 */


$(function() {
    $("#reserveDate").datepicker({
        dateFormat: "yy-mm-dd"
    }).val()
});

$(function() {
    $( "#checkin").datepicker({
        dateFormat: "yy-mm-dd"
    }).val()
});

$(function() {
    $( "#checkout").datepicker({
        dateFormat: "yy-mm-dd"
    }).val()
});

$(function() {
    $("#availability").datepicker();
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

function checkDates()
{
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    var code = $("#apartmentCode").text();
    var realCode = code.slice(-3);
    $.ajax({
        url: "/booking/reservation/check",
        type: "post",
        data: {"startDate" : checkin, "endDate" : checkout, "code" : realCode},
        dataType: "json",
        success: function(response) {
            //console.log(response);
            $.each(response, function(i, val)
            {
                //console.log(val.start_date);
                if (realCode==val.apartment_code)
                {
                    var start = val.start_date;
                    var end = val.end_date;
                    if ((checkin<start && checkout<=start) || (checkin>=end && checkout>end))
                    {
                        $("#dateCheck").html("Selected date range is available for reservation");
                    } else {
                        $("#dateCheck").html("Selected date range is not available for reservation");
                        return false;
                    }
                }
            });

        }
    });
}
