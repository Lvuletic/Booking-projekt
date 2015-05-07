
{% for item in list %}
<div class="col-md-8">
  <img src="/booking/public/img/{{ item.getCode() }}/picture1.jpg" height="600" width="750">
</div>

<div class="col-md-4">
<h3> FEATURE LIST </h3>
<p>
Apartment number: {{ item.getCode() }} <br>
Size: {{ item.getSize() }} <br>
Bedrooms: {{ item.getBedroomNumber() }} <br>
Bathrooms: {{ item.getBathroomNumber() }} <br>
<a class="btn btn-primary" href="index/{{ item.getCode() }}">Book this apartment</a>
</p>
</div>

{% endfor %}

