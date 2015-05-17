{{ content() }}

<div class="col-md-6" id="apartmentInfo" data-apartmentCode={{ apartmentCode }}>
{{ form(this.dispatcher.getParam("language")~"/reservation/edit/"~reservation.getReservationCode(), "onsubmit": "return validateForm()", "role": "form") }}

{{ t._("currentCheckIn") }} {{ reservation.getStartDate()}}
<div class="form-group">
New Check-in
{{ form.render("checkin", ["class": "form-control", "placeholder": "Check-in date"]) }}
</div>
{{ t._("currentCheckOut") }}  {{ reservation.getEndDate()}}
<div class="form-group">
New Check-out
{{ form.render("checkout", ["class": "form-control", "placeholder": "Check-out date"]) }}
</div>
{{ t._("currentPeople") }} {{ reservation.getPeople()}}
<div class="form-group">
New number of guests
{{ form.render("people", ["class": "form-control", "placeholder": "Number of guests"]) }}
</div>

<div class="form-group">
{{ submit_button("value": t._("bookThis"), "class": "btn btn-primary") }}
{{ endform() }}
<button type="button" class="btn btn-primary" onclick="priceCheck()"><?php echo $t->_("checkPrice") ?></button>
<button type="button" class="btn btn-primary" onclick="checkEditDates( {{ reservation.getReservationCode() }} )"><?php echo $t->_("checkDates") ?></button>
<div id="priceCheck"></div>
</div>
<div id="dateCheck">

</div>
</div>