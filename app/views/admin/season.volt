{{ content() }}
{% for row in seasons %}

   {{ form("Admin/saveSeason/"~row.getCode(), "class": "form-inline", "role": "form") }}
<div class="row">
    <div class="col-md-2">
        Season {{ row.getName() }}
    </div>
    <div class="col-md-10">
    <div class="seasonDates">
        <div class="form-group">
        {{ forms.get("form"~row.getCode()).label("name") }}
        {{ forms.get("form"~row.getCode()).render("name", ["class": "form-control", "value": row.getName(), "placeholder": "Season name"]) }}
        </div>
        <div class="form-group">
        {{ forms.get("form"~row.getCode()).label("start_date"~row.getCode()) }}
        {{ forms.get("form"~row.getCode()).render("start_date"~row.getCode(), ["class": "form-control", "value": row.getStartDate(), "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ forms.get("form"~row.getCode()).label("end_date"~row.getCode()) }}
        {{ forms.get("form"~row.getCode()).render("end_date"~row.getCode(), ["class": "form-control", "value": row.getEndDate(), "placeholder": "End date"]) }}
        </div>
        <div class="form-group">
        {{ submit_button("value": "Save changes", "class": "btn btn-primary") }}
        </div>
    </div>
    </div>
</div>
    {{ endform() }}
{% endfor %}