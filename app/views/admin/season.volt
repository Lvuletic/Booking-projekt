

   {{ form("Admin/saveSeason/", "class": "form-inline", "role": "form") }}
<div class="row">
    <div class="col-md-1">
        Season 1
    </div>
    <div class="col-md-11">
    <div class="seasonDates">
        <div class="form-group">
        {{ form1.label("start_date1") }}
        {{ form1.render("start_date1", ["class": "form-control", "value": start1, "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ form1.label("end_date1") }}
        {{ form1.render("end_date1", ["class": "form-control", "value": end1, "placeholder": "End date"]) }}
        </div>
    </div>
    </div>
</div>    <div class="form-group">
              {{ submit_button("value": "Save changes", "class": "btn btn-primary") }}
              </div>
   {{ form("Admin/save/", "class": "form-inline", "role": "form") }}
<div class="row">
    <div class="col-md-1">
        Season 2
    </div>
    <div class="col-md-11">
    <div class="seasonDates">
        <div class="form-group">
        {{ form2.label("start_date2") }}
        {{ form2.render("start_date2", ["class": "form-control", "value": start2, "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ form2.label("end_date2") }}
        {{ form2.render("end_date2", ["class": "form-control", "value": end2, "placeholder": "End date"]) }}
        </div>
    </div>
    </div>
</div>    <div class="form-group">
              {{ submit_button("value": "Save changes", "class": "btn btn-primary") }}
              </div>
   {{ form("Admin/save/", "class": "form-inline", "role": "form") }}
<div class="row">
    <div class="col-md-1">
        Season 3
    </div>
     <div class="col-md-11">
     <div class="seasonDates">
        <div class="form-group">
        {{ form3.label("start_date3") }}
        {{ form3.render("start_date3", ["class": "form-control", "value": start3, "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ form3.label("end_date3") }}
        {{ form3.render("end_date3", ["class": "form-control", "value": end3, "placeholder": "End date"]) }}
        </div>
     </div>
     </div>
</div>    <div class="form-group">
              {{ submit_button("value": "Save changes", "class": "btn btn-primary") }}
              </div>
   {{ form("Admin/save/", "class": "form-inline", "role": "form") }}
<div class="row">
    <div class="col-md-1">
        Season 4
    </div>
     <div class="col-md-11">
     <div class="seasonDates">
        <div class="form-group">
        {{ form4.label("start_date4") }}
        {{ form4.render("start_date4", ["class": "form-control", "value": start4, "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ form4.label("end_date4") }}
        {{ form4.render("end_date4", ["class": "form-control", "value": end4, "placeholder": "End date"]) }}
        </div>
     </div>
     </div>
</div>
    <div class="form-group">
        {{ submit_button("value": "Save changes", "class": "btn btn-primary") }}
        </div>
    {{ endform() }}