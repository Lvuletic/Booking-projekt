

   {{ form("Admin/season/", "class": "form-inline", "role": "form") }}
<div class="row">
    <div class="col-md-1">
        Season 1
    </div>
    <div class="col-md-11">
    <div class="seasonDates">
        <div class="form-group">
        {{ form.label("start_date1") }}
        {{ form.render("start_date1", ["class": "form-control", "value": start1, "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ form.label("end_date1") }}
        {{ form.render("end_date1", ["class": "form-control", "value": end1, "placeholder": "End date"]) }}
        </div>
    </div>
        <div class="form-group">
        {{ form.label("price_person1") }}
        {{ form.render("price_person1", ["class": "form-control", "value": price1, "placeholder": "Price for one person"]) }}
        </div>
        <div class="form-group">
        {{ form.label("price_room1") }}
        {{ form.render("price_room1", ["class": "form-control", "value": room1, "placeholder": "Price for the room"]) }}
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-1">
        Season 2
    </div>
    <div class="col-md-11">
    <div class="seasonDates">
        <div class="form-group">
        {{ form.label("start_date2") }}
        {{ form.render("start_date2", ["class": "form-control", "value": start2, "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ form.label("end_date2") }}
        {{ form.render("end_date2", ["class": "form-control", "value": end2, "placeholder": "End date"]) }}
        </div>
    </div>
        <div class="form-group">
        {{ form.label("price_person2") }}
        {{ form.render("price_person2", ["class": "form-control", "value": price2, "placeholder": "Price"]) }}
        </div>
        <div class="form-group">
        {{ form.label("price_room2") }}
        {{ form.render("price_room2", ["class": "form-control", "value": room2, "placeholder": "Price"]) }}
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-1">
        Season 3
    </div>
     <div class="col-md-11">
     <div class="seasonDates">
        <div class="form-group">
        {{ form.label("start_date3") }}
        {{ form.render("start_date3", ["class": "form-control", "value": start3, "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ form.label("end_date3") }}
        {{ form.render("end_date3", ["class": "form-control", "value": end3, "placeholder": "End date"]) }}
        </div>
     </div>
        <div class="form-group">
        {{ form.label("price_person3") }}
        {{ form.render("price_person3", ["class": "form-control", "value": price3, "placeholder": "Price"]) }}
        </div>
        <div class="form-group">
        {{ form.label("price_room3") }}
        {{ form.render("price_room3", ["class": "form-control", "value": room3, "placeholder": "Price"]) }}
        </div>

     </div>
</div>

<div class="row">
    <div class="col-md-1">
        Season 4
    </div>
     <div class="col-md-11">
     <div class="seasonDates">
        <div class="form-group">
        {{ form.label("start_date4") }}
        {{ form.render("start_date4", ["class": "form-control", "value": start4, "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ form.label("end_date4") }}
        {{ form.render("end_date4", ["class": "form-control", "value": end4, "placeholder": "End date"]) }}
        </div>
     </div>
        <div class="form-group">
        {{ form.label("price_person4") }}
        {{ form.render("price_person4", ["class": "form-control", "value": price4, "placeholder": "Price"]) }}
        </div>
        <div class="form-group">
        {{ form.label("price_room4") }}
        {{ form.render("price_room4", ["class": "form-control", "value": room4, "placeholder": "Price"]) }}
        </div>

     </div>
</div>
    <div class="form-group">
        {{ submit_button("value": "Save changes", "class": "btn btn-primary") }}
        </div>