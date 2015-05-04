
{% for item in list %}
<div class="col-md-8">

  <div class="carousel-inner">
  <img src="/booking/public/img/{{ item.getCode() }}/picture1.jpg">
  </div>

</div>

<div class="col-md-4">
<h3> FEATURE LIST </h3>
<p>
Apartment number: {{ item.getCode() }} <br>
Size: {{ item.getSize() }} <br>
{% if item.getInternetAccess() == 1 %}
Internet access: Yes <br>
{% else %}
Internet access: No <br>
{% endif %}
{% if item.getAirconditioning() == 1 %}
Air-conditioning: Yes <br>
{% else %}
Air-conditioning: No <br>
{% endif %}
Bedrooms: {{ item.getBedroomNumber() }} <br>
Bathrooms: {{ item.getBathroomNumber() }} <br>
{% if item.getAvailability() == 1 %}
Availability: Yes <br>
{% else %}
Availability: No <br>
{% endif %}
<a class="btn btn-primary" href="index/{{ item.getCode() }}">Book this apartment</a>
</p>
</div>

{% endfor %}

