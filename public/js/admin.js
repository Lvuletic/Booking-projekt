/**
 * Created by Luka on 04/05/15.
 */

$(function() {
    $(".seasonDates>.form-group>.form-control").not("#name").datepicker({
        dateFormat: "yy-mm-dd"
    }).val()
});

$(function() {
    $("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function(date){
            var selectedDate = new Date(date);
            var endDate = new Date(selectedDate.getTime() + 86400000);

            $("#end_date").datepicker("option", "minDate", endDate);
        }
    }).val()
});

$(function() {
    $("#end_date").datepicker({
        dateFormat: "yy-mm-dd"
    }).val()
});