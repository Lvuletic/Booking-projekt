{{ content() }}
{% for unit in apartments %}

{{ form("Admin/saveUnit/"~unit.getCode(), "class": "form-horizontal", "role": "form") }}
<div class="row">
    <div class="col-md-1">
        Apartment {{ unit.getCode() }}
    </div>
    <div class="col-md-11">
        <div class="form-group">
        {{ forms.get("form"~unit.getCode()).label("size", ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ forms.get("form"~unit.getCode()).render("size", ["class": "form-control", "value": unit.getSize(), "placeholder": "Size"]) }}
        </div>
        </div>

        <div class="form-group">
        {{ forms.get("form"~unit.getCode()).label("bedrooms", ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ forms.get("form"~unit.getCode()).render("bedrooms", ["class": "form-control", "value": unit.getBedroomNumber(), "placeholder": "Bedrooms"]) }}
        </div></div>

        <div class="form-group">
        {{ forms.get("form"~unit.getCode()).label("bathrooms", ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ forms.get("form"~unit.getCode()).render("bathrooms", ["class": "form-control", "value": unit.getBathroomNumber(), "placeholder": "Bathrooms"]) }}
        </div></div>

        {% for spec in specifications %}
        {% if spec.unitSpecification.getApartmentCode() == unit.getCode() %}
        <div class="form-group">
        {{ forms.get("form"~unit.getCode()~"Spec"~spec.specification.getCode()).label("value"~spec.specification.getCode(), ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ forms.get("form"~unit.getCode()~"Spec"~spec.specification.getCode()).render("value"~spec.specification.getCode(), ["class": "form-control", "value": spec.unitSpecification.getValue(), "placeholder": "Value"]) }}
        </div>
        <a class="btn btn-default" href="removeSpecification/{{ spec.unitSpecification.getCode() }}">Remove this specification</a>
        </div>
        {% endif %}
        {% endfor %}
        <div class="form-group">
        {{ submit_button("value": "Save changes", "class": "btn btn-default") }} <a class="btn btn-default" href="add/{{ unit.getCode() }}">Add new specification</a>
         </div>

    </div>
</div>


        {{ endform() }}
{% endfor %}