{{ content() }}
{% for unit in apartments %}

<div class="row">
    <div class="col-md-1">
        Apartment {{ unit.getCode() }}
    </div>
    <div class="col-md-11">
        <img src="/booking/public/img/{{ unit.getCode() }}/picture1.jpg" width="350" height="300">

        <a class="btn btn-default" href="editApartment/{{ unit.getCode() }}">Edit apartment</a>

    </div>
</div>

{% endfor %}
<br>

{{ form("Admin/createApartment/", "class": "form-inline", "role": "form") }}
 <div class="row">
        <div class="form-group">
        {{ form.label("number") }}
        {{ form.render("number", ["class": "form-control", "placeholder": "Number"]) }}
        </div>
        <div class="form-group">
        {{ form.label("size") }}
        {{ form.render("size", ["class": "form-control", "placeholder": "Size"]) }}
        </div>
        <div class="form-group">
        {{ form.label("rating") }}
        {{ form.render("rating", ["class": "form-control", "placeholder": "Rating"]) }}
        </div>
        <div class="form-group">
        {{ form.label("category") }}
        {{ form.render("category", ["class": "form-control", "placeholder": "Category"]) }}
        </div>
        <div class="form-group">
        {{ form.label("bedrooms") }}
        {{ form.render("bedrooms", ["class": "form-control", "placeholder": "Bedrooms"]) }}
        </div>
        <div class="form-group">
        {{ form.label("bathrooms") }}
        {{ form.render("bathrooms", ["class": "form-control", "placeholder": "Bathrooms"]) }}
        </div>
        <div class="form-group">
        {{ submit_button("value": "Add new apartment", "class": "btn btn-default") }}
        </div>
 </div>
{{ endform() }}