{{ content() }}
{{ form("admin/saveSpecification/"~apartment.getCode(), "class": "form-inline", "role": "form") }}
<div class="row">
    <div class="col-md-1">
          Add a new specification for apartment {{ apartment.getCode() }}
    </div>
    <div class="col-md-11">
        <div class="form-group">
        {{ form.label("specs") }}
        {{ form.render("specs", ["class": "form-control"]) }}
        </div>
        <div class="form-group">
        {{ form.label("value") }}
        {{ form.render("value", ["class": "form-control", "placeholder": "Description"]) }}
        </div>
        <div class="form-group">
        {{ submit_button("value": "Add", "class": "btn btn-default") }}
        </div>
    </div>
</div>

{{ endform() }}