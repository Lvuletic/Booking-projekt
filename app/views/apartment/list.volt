<div>
{{ form(this.dispatcher.getParam("language")~"/apartment/list/", "class": "form-inline", "role": "form") }}
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
        {{ selectStatic('category', ["Any": "Any", "A1": "A1", "A2": "A2", "A3": "A3", "A4": "A4", "A5": "A5", "S1": "S1", "S2": "S2", "S3": "S3"]) }}
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
        {{ forms.get("formFilter"~type.getCode()).label(type.getCode(), ["class": "checkbox"]) }}
        <div class="col-sm-6">
        {{ forms.get("formFilter"~type.getCode()).render(type.getCode(), ["class": "checkbox"]) }}
        </div>
        </div>
        {% endfor %}

        <div class="form-group">
        {{ submit_button("value": "Filter", "class": "btn btn-default") }}
        </div>
 </div>
{{ endform() }}
</div>
{% if list.count() == 0 %}
{{ t._("searchEmpty") }}
{% endif %}

<br>
<br>

{% for item in list %}
<div class="col-md-8">
  <img src="/booking/public/img/{{ item.getCode() }}/picture1.jpg" height="600" width="750">
</div>

<div class="col-md-4">
<h3> FEATURE LIST </h3>
<p>
<?php echo $t->_("unitNumber") ?>: {{ item.getCode() }} <br>
<?php echo $t->_("size") ?>: {{ item.getSize() }} <br>
<?php echo $t->_("rating") ?>: {{ item.getRating() }} <br>
<?php echo $t->_("category") ?>: {{ item.getCategory() }} <br>
<?php echo $t->_("bedrooms") ?>: {{ item.getBedroomNumber() }} <br>
<?php echo $t->_("bathrooms") ?>: {{ item.getBathroomNumber() }} <br>

{% for spec in specifications %}
{% if spec.unitSpecification.getApartmentCode() == item.getCode() %}
<?php echo $t->_($spec->specification->getName()) ?> - {{ spec.unitSpecification.getValue() }} <br>
{% endif %}
{% endfor %}

<?php echo $this->tag->linkTo(array($this->dispatcher->getParam("language")."/apartment/index/".$item->getCode(), $t->_("bookThis"), "class" => "btn btn-primary")) ?>

</p>
</div>

{% endfor %}
