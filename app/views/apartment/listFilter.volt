
{{ form("Apartment/list/", "class": "form-inline", "role": "form") }}
 <div class="row">
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

        {% for type in specFilter %}
        <div class="form-group">
        {{ forms.get("formFilter"~type.getCode()).label(type.getCode(), ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ forms.get("formFilter"~type.getCode()).render(type.getCode(), ["class": "form-control", "placeholder": "Value"]) }}
        </div>
        </div>
        {% endfor %}

        <div class="form-group">
        {{ submit_button("value": "Filter", "class": "btn btn-default") }}
        </div>
 </div>
{{ endform() }}



<?php foreach ($list as $unit=>$key)
{
     ?>
<div class="col-md-8">
  <img src="/booking/public/img/{{ key["code"] }}/picture1.jpg" height="600" width="750">
</div>

<div class="col-md-4">
<h3> FEATURE LIST </h3>
<p>
<?php echo $t->_("unitNumber") ?>: {{ key["code"] }} <br>
<?php echo $t->_("size") ?>: {{ key["size"]  }} <br>
<?php echo $t->_("rating") ?>: {{ key["rating"]  }} <br>
<?php echo $t->_("category") ?>: {{ key["category"]  }} <br>
<?php echo $t->_("bedrooms") ?>: {{ key["bedrooms"]  }} <br>
<?php echo $t->_("bathrooms") ?>: {{ key["bathrooms"]  }} <br>

{% for spec in specifications %}
{% if spec.unitSpecification.getApartmentCode() == key["code"] %}
<?php echo $t->_($spec->specification->getName()) ?> - {{ spec.unitSpecification.getValue() }} <br>
{% endif %}
{% endfor %}

<a class="btn btn-primary" href="index/{{ key["code"] }}"><?php echo $t->_("bookThis") ?></a>
</p>
</div>
<?php
} ?>



