
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

<a class="btn btn-primary" href="index/{{ item.getCode() }}"><?php echo $t->_("bookThis") ?></a>
</p>
</div>

{% endfor %}

