{{ content() }}
<div class="col-md-12">
<div id="apartmentCarousel" class="carousel slide" data-ride="carousel">

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

  <a class="left carousel-control" href="#apartmentCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#apartmentCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div id="mySlider" class="carousel slide">
<div class="carousel-inner">
<div class="item active">
    <div class="row">
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="0"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture1.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="1"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture2.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="2"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture3.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="3"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture4.jpg" class="img-responsive"></a></div>
    </div>
</div>
<div class="item">
    <div class="row">
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="4"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture5.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="5"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture6.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="6"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture7.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="7"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture8.jpg" class="img-responsive"></a></div>
    </div>
</div>
<div class="item">
    <div class="row">
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="8"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture9.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="9"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture10.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="10"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture11.jpg" class="img-responsive"></a></div>
        <div class="col-xs-6 col-md-3" data-target="#apartmentCarousel" data-slide-to="11"><a href="#" class="thumbnail"><img src="/booking/public/img/{{ apartmentCode }}/picture12.jpg" class="img-responsive"></a></div>
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

<p id="apartmentInfo" data-apartmentCode={{ apartmentCode }}><?php echo $t->_("unitNumber") ?>: {{ apartmentCode }} <br>
<?php echo $t->_("size") ?>: {{ size }} <br>
<?php echo $t->_("rating") ?>: {{ rating }} <br>
<?php echo $t->_("category") ?>: {{ category }} <br>
<?php echo $t->_("bedrooms") ?>: {{ bedrooms }} <br>
<?php echo $t->_("bathrooms") ?>: {{ bathrooms }} <br>

{% for spec in specifications %}
{% if spec.unitSpecification.getApartmentCode() == apartmentCode %}
<?php echo $t->_($spec->specification->getName()) ?> - {{ spec.unitSpecification.getValue() }} <br>
{% endif %}
{% endfor %}


{% if availability == true %}
<?php echo $t->_("datesFree") ?>
{% else %}
<button type="button" class="btn btn-info" onclick="checkDates()"><?php echo $t->_("checkDates") ?></button>
{% endif %}
</p>
<div id="dateCheck">

</div>
</div>

<div class="col-md-6">
{{ form(this.dispatcher.getParam("language")~"/reservation/index/"~apartmentCode, "onsubmit": "return validateForm()", "role": "form") }}

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
{{ submit_button("value": t._("bookThis"), "class": "btn btn-primary") }}
{{ endform() }}
<button type="button" class="btn btn-primary" onclick="priceCheck()"><?php echo $t->_("checkPrice") ?></button>
<div id="priceCheck"></div>
</div>
</div>

{{ flashSession.output() }}


<div class="col-md-4">
<h3> PRICE LISTING </h3>
{% for row in seasonPrices %}
For period from {{ row.season.getStartDate() }} to {{ row.season.getEndDate() }} <br>
<?php echo $t->_("onePerDay") ?>: {{ row.pricelist.getPricePerson() }} <br>
<?php echo $t->_("morePerDay") ?>: {{ row.pricelist.getPriceRoom() }} <br> <br>
{% endfor %}
</div>

{{ form(this.dispatcher.getParam("language")~"/apartment/email/"~apartmentCode, "role": "form") }}
<div class="col-md-6">
<div class="form-group">
{{ emailForm.label("subject") }}
{{ emailForm.render("subject", ["class": "form-control", "placeholder": "Subject"]) }}
</div>
<div class="form-group">
{{ emailForm.label("textarea") }}
{{ emailForm.render("textarea", ["class": "form-control", "placeholder": "Check-out date"]) }}
</div>
<div class="form-group">
{{ submit_button("value": "Send", "class": "btn btn-primary") }}
{{ endform() }}
</div>
</div>