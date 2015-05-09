/**
 * Created by Luka on 04/05/15.
 */

$(function() {
    $(".seasonDates>.form-group>.form-control").not("#name").datepicker({
        dateFormat: "yy-mm-dd"
    }).val()
});

