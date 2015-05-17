{{ content() }}
   {{ form("admin/saveSeason/", "class": "form-inline", "role": "form") }}
{% for row in seasons %}

<div class="row">
    <div class="col-md-2">
        Season {{ row.getName() }}
    </div>
    <div class="col-md-10">
    <div class="seasonDates">
        <div class="form-group">
        {{ forms.get("form"~row.getCode()).label("name"~row.getCode()) }}
        {{ forms.get("form"~row.getCode()).render("name"~row.getCode(), ["class": "form-control", "value": row.getName(), "placeholder": "Season name"]) }}
        </div>
        <div class="form-group">
        {{ forms.get("form"~row.getCode()).label("start_date"~row.getCode()) }}
        {{ forms.get("form"~row.getCode()).render("start_date"~row.getCode(), ["class": "form-control", "value": row.getStartDate(), "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ forms.get("form"~row.getCode()).label("end_date"~row.getCode()) }}
        {{ forms.get("form"~row.getCode()).render("end_date"~row.getCode(), ["class": "form-control", "value": row.getEndDate(), "placeholder": "End date"]) }}
        </div>
        <?php echo $this->tag->linkTo(array("admin/deleteSeason/".$row->getCode(), "Delete", "class" => "btn btn-default")) ?>
    </div>
    </div>
</div>

{% endfor %}
  <div class="form-group">
  {{ submit_button("value": "Save changes", "class": "btn btn-default") }}
  </div>
{{ endform() }}

<br>
<br>

{{ form("admin/createSeason/", "class": "form-inline", "role": "form") }}

        <div class="form-group">
        {{ form.label("name") }}
        {{ form.render("name", ["class": "form-control", "id": "name", "placeholder": "Season name"]) }}
        </div>
        <div class="form-group">
        {{ form.label("start_date") }}
        {{ form.render("start_date", ["class": "form-control", "placeholder": "Start date"]) }}
        </div>
        <div class="form-group">
        {{ form.label("end_date") }}
        {{ form.render("end_date", ["class": "form-control", "placeholder": "End date"]) }}
        </div>
        <div class="form-group">
        {{ submit_button("value": "Add new season", "class": "btn btn-default") }}
        </div>


{{ endform() }}