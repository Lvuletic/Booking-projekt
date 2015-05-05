
<div class="col-md-12">
<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner" role="listbox">
    <div class="item active"><img src="/booking/public/img/{{ apartmentCode }}/picture1.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture2.jpg" ></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture3.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture4.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture5.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture6.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture7.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture8.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture9.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture10.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture11.jpg"></div>
    <div class="item"><img src="/booking/public/img/{{ apartmentCode }}/picture12.jpg"></div>
  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div id="mySlider" class="carousel slide">
<div class="carousel-inner">
<div class="item active">
    <div class="row">
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="0"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture1.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="1"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture1.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="2"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture1.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="3"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture1.jpg" class="img-responsive"></a></div>
    </div>
</div>
<div class="item">
    <div class="row">
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="4"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture5.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="5"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture6.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="6"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture7.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="7"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture8.jpg" class="img-responsive"></a></div>
    </div>
</div>
<div class="item">
    <div class="row">
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="8"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture9.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="9"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture10.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="10"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture11.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#myCarousel" data-slide-to="11"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture12.jpg" class="img-responsive"></a></div>
    </div>
</div>
</div>
<a class="left carousel-control" href="#mySlider" data-slide="prev"><i class="fa fa-chevron-left fa-4"></i></a>
<a class="right carousel-control" href="#mySlider" data-slide="next"><i class="fa fa-chevron-right fa-4"></i></a>
</div>
</div>

<div class="col-md-8">
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam convallis sapien at commodo auctor.
Proin nec mauris nisl. Duis ut lectus id diam vestibulum porttitor at commodo diam. Nam a pharetra tellus.
Sed vel lacus quis sapien venenatis mollis ut ac odio. Donec condimentum enim vitae dapibus fringilla.
Sed aliquet suscipit ex, nec accumsan lectus blandit et. Ut velit purus, ullamcorper sodales hendrerit sed, laoreet sit amet enim.
Cras id tempor dolor, sed cursus elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
Proin volutpat sapien non sem porta faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
Nullam felis risus, tincidunt in posuere fringilla, auctor eget ipsum.

</p>
</div>

<div class="col-md-4">
<h3> FEATURE LIST </h3>
<p id="apartmentInfo">Apartment number: {{ apartmentCode }} <br>
Size: {{ size }} <br>
Internet access: {{ internet }} <br>
Air-conditioning: {{ airconditioning }} <br>
Bedrooms: {{ bedrooms }} <br>
Bathrooms: {{ bathrooms }} <br>
Availability: {{ availability }} <br>
{% if availability=="Yes" %}
All dates are possible for reservation
{% else %}
<button type="button" class="btn btn-info" onclick="checkDates()">Check available dates</button>
{% endif %}
</p>
<div id="dateCheck">

</div>
</div>

<div class="col-md-6">
{{ form("reservation/index/"~apartmentCode, "role": "form") }}

<div class="form-group">
{{ form.label("checkin") }}
{{ form.render("checkin", ["class": "form-control", "placeholder": "Check-in date"]) }}
</div>

<div class="form-group">
{{ form.label("checkout") }}
{{ form.render("checkout", ["class": "form-control", "placeholder": "Check-out date"]) }}
</div>

<div class="form-group">
{{ form.label("people") }}
{{ form.render("people", ["class": "form-control", "placeholder": "Number of guests"]) }}
</div>

<div class="form-group">
{{ submit_button("value": "Book this apartment", "class": "btn btn-primary") }}
</div>
<div id="buttonic">
<button type="button">cijene</button>
</div>
<div id="priceCheck">

</div>
</div>

<div>
Price for 2 people or more per day: {{ priceRoom }} <br>
Price for one person per day: {{ pricePerson }}
</div>


