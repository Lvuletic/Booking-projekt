/**
 * Created by Luka on 30/04/15.
 */


$(function() {
    $("#checkin").datepicker({
        minDate: "+1D",
        dateFormat: "yy-mm-dd",
        onSelect: function(date){
            var selectedDate = new Date(date);
            var endDate = new Date(selectedDate.getTime() + 86400000);

            $("#checkout").datepicker("option", "minDate", endDate);
        }
    }).val()
});

$(function() {
    $("#checkout").datepicker({
        dateFormat: "yy-mm-dd"
    }).val()
});

function checkDates()
{
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    var code = apartmentInfo.getAttribute("data-apartmentCode");
    var url = $(location).attr('href');
    var segments = url.split('/');
    var language = segments[4];
    console.log(segments);
    //console.log(realCode);
    $.ajax({
        url: "/booking/reservation/checkDate",
        type: "post",
        data: {"startDate" : checkin, "endDate" : checkout, "code" : code, "language" : language},
        success: function(response) {
            //console.log(response);
            $("#dateCheck").html(response);
        }
    });
}

function checkEditDates(reservationCode)
{
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    var code = apartmentInfo.getAttribute("data-apartmentCode");
    var url = $(location).attr('href');
    var segments = url.split('/');
    var language = segments[4];
    //console.log(segments);
    console.log(code);
    $.ajax({
        url: "/booking/reservation/checkDate",
        type: "post",
        data: {"startDate" : checkin, "endDate" : checkout, "code" : code, "language" : language, "reservationCode" : reservationCode},
        success: function(response) {
            console.log(response);
            $("#dateCheck").html(response);
        }
    });
}

function priceCheck()
{
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    var code = apartmentInfo.getAttribute("data-apartmentCode");
    var people = $("#people").val();
    var url = $(location).attr('href');
    var segments = url.split('/');
    var language = segments[4];
    //console.log(segments);
    $.ajax({
        url: "/booking/reservation/checkPrice",
        type: "post",
        data: {"startDate" : checkin, "endDate" : checkout, "code" : code, "people": people, "language" : language},
        success: function(response) {
            //console.log(response);
            $("#priceCheck").html(response);
        }
    })
}

function validateForm()
{
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    if (checkin == null || checkin == "") {
        alert("Check-in date must be entered");
        return false;
    }
    if (checkout == null || checkout == "") {
        alert("Check-out date must be entered");
        return false;
    }
}
