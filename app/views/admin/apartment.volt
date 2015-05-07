{{ content() }}
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
        {{ forms.get("form"~unit.getCode()).label("bedrooms") }}
        {{ forms.get("form"~unit.getCode()).render("bedrooms", ["class": "form-control", "value": unit.getBedroomNumber(), "placeholder": "Bedrooms"]) }}
        </div>

        <div class="form-group">
        {{ forms.get("form"~unit.getCode()).label("bathrooms") }}
        {{ forms.get("form"~unit.getCode()).render("bathrooms", ["class": "form-control", "value": unit.getBathroomNumber(), "placeholder": "Bathrooms"]) }}
        </div>

        {% for spec in specifications %}
        {% if spec.unitSpecification.getApartmentCode() == unit.getCode() %}
        <div class="form-group">
        {{ forms.get("form"~unit.getCode()~"Spec"~spec.specification.getCode()).label("value"~spec.specification.getCode()) }}
        {{ forms.get("form"~unit.getCode()~"Spec"~spec.specification.getCode()).render("value"~spec.specification.getCode(), ["class": "form-control", "value": spec.unitSpecification.getValue(), "placeholder": "Value"]) }}
        </div>
        {% endif %}
        {% endfor %}
        <?php echo $this->tag->linkTo(array("admin/add/".$unit->getCode(), "Add new specification")) ?>
    </div>
</div>

    <div class="form-group">
        {{ submit_button("value": "Save changes", "class": "btn btn-primary") }}
        </div>
        {{ endform() }}
{% endfor %}