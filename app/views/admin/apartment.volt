
{% for unit in apartments %}

{{ form("Admin/saveUnit/"~unit.getCode(), "class": "form-inline", "role": "form") }}
<div class="row">
    <div class="col-md-1">
        Apartment {{ unit.getCode() }}
    </div>
    <div class="col-md-11">
        <div class="form-group">
        {{ forms.get("form"~unit.getCode()).label("size") }}
        {{ forms.get("form"~unit.getCode()).render("size", ["class": "form-control", "value": unit.getSize(), "placeholder": "Size"]) }}
        </div>

        <div class="form-group">
        {{ forms.get("form"~unit.getCode()).label("internet") }}
        {% if unit.getInternetAccess()==1 %}
        {{ forms.get("form"~unit.getCode()).render("internet", ["class": "form-control",  "checked": "true"]) }}
        {% else %}
        {{ forms.get("form"~unit.getCode()).render("internet", ["class": "form-control"]) }}
        {% endif %}
        </div>

        <div class="form-group">
        {{ forms.get("form"~unit.getCode()).label("airconditioning") }}
        {% if unit.getAirconditioning()==1 %}
        {{ forms.get("form"~unit.getCode()).render("airconditioning", ["class": "form-control",  "checked": "true"]) }}
        {% else %}
        {{ forms.get("form"~unit.getCode()).render("airconditioning", ["class": "form-control"]) }}
        {% endif %}
        </div>

        <div class="form-group">
        {{ forms.get("form"~unit.getCode()).label("bedrooms") }}
        {{ forms.get("form"~unit.getCode()).render("bedrooms", ["class": "form-control", "value": unit.getBedroomNumber(), "placeholder": "Bedrooms"]) }}
        </div>

        <div class="form-group">
        {{ forms.get("form"~unit.getCode()).label("bathrooms") }}
        {{ forms.get("form"~unit.getCode()).render("bathrooms", ["class": "form-control", "value": unit.getBathroomNumber(), "placeholder": "Bathrooms"]) }}
        </div>
    </div>
</div>

    <div class="form-group">
        {{ submit_button("value": "Save changes", "class": "btn btn-primary") }}
        </div>
        {{ endform() }}
{% endfor %}