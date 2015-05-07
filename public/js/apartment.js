/**
 * Created by Luka on 30/04/15.
 */


$(function() {
    $("#checkin").datepicker({
        dateFormat: "yy-mm-dd"
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
    var code = $("#apartmentInfo").text();
    var realCode = code.slice(18,21);
    //console.log(realCode);
    $.ajax({
        url: "/booking/reservation/checkDate",
        type: "post",
        data: {"startDate" : checkin, "endDate" : checkout, "code" : realCode},
        success: function(response) {
            console.log(response);
            if (response == true)
            {
                $("#dateCheck").html("Selected date range is available for reservation");
            } else  $("#dateCheck").html("Selected date range is not available for reservation");

        }
    });
}

function priceCheck()
{
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    var code = $("#apartmentInfo").text();
    var realCode = code.slice(18,21);
    var people = $("#people").val();
    $.ajax({
        url: "/booking/reservation/checkPrice",
        type: "post",
        data: {"startDate" : checkin, "endDate" : checkout, "code" : realCode, "people": people},
        success: function(response) {
            console.log(response);
            $("#priceCheck").html("Total price is:" + response);
        }
    })
}

function validateForm()
{
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    var people = $("#people").val();
    if (checkin == null || checkin == "") {
        alert("Check-in date must be entered");
        return false;
    }
    if (checkout == null || checkout == "") {
        alert("Check-out date must be entered");
        return false;
    }
    if (people == null || people == "") {
        alert("Number of guests must be entered");
        return false;
    }
}

document.getElementById("internet").addEventListener("change", selectedProduct)

function selectedProduct(){
    console.log(this.value);
}