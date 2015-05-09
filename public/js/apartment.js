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
    //console.log(realCode);
    $.ajax({
        url: "/booking/reservation/checkDate",
        type: "post",
        data: {"startDate" : checkin, "endDate" : checkout, "code" : code},
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
    var code = apartmentInfo.getAttribute("data-apartmentCode");
    var people = $("#people").val();
    $.ajax({
        url: "/booking/reservation/checkPrice",
        type: "post",
        data: {"startDate" : checkin, "endDate" : checkout, "code" : code, "people": people},
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