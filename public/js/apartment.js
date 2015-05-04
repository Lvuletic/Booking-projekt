/**
 * Created by Luka on 30/04/15.
 */

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


function checkDates()
{
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    var code = $("#apartmentInfo").text();
    var realCode = code.slice(18,21);
    console.log(realCode);
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
