{{ content() }}
{{ form("admin/saveUnit/"~apartmentCode, "class": "form-horizontal", "role": "form") }}
<div class="row">
    <div class="col-md-1">
        Apartment {{ apartmentCode }}
    </div>
    <div class="col-md-11">
        <div class="form-group">
        {{ form.label("size", ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ form.render("size", ["class": "form-control", "value": apartmentSize, "placeholder": "Size"]) }}
        </div>
        </div>

        <div class="form-group">
        {{ form.label("rating", ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ form.render("rating", ["class": "form-control", "value": apartmentRating, "placeholder": "Rating"]) }}
        </div>
        </div>

        <div class="form-group">
        {{ form.label("category", ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ form.render("category", ["class": "form-control", "value": apartmentCategory, "placeholder": "Category"]) }}
        </div>
        </div>

        <div class="form-group">
        {{ form.label("bedrooms", ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ form.render("bedrooms", ["class": "form-control", "value": apartmentBedrooms, "placeholder": "Bedrooms"]) }}
        </div></div>

        <div class="form-group">
        {{ form.label("bathrooms", ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ form.render("bathrooms", ["class": "form-control", "value": apartmentBathrooms, "placeholder": "Bathrooms"]) }}
        </div>
        </div>

        {% for spec in specifications %}
        {% if spec.unitSpecification.getApartmentCode() == apartmentCode %}
        <div class="form-group">
        {{ forms.get("formSpec"~spec.specification.getCode()).label("value"~spec.specification.getCode(), ["class": "col-sm-2"]) }}
        <div class="col-sm-6">
        {{ forms.get("formSpec"~spec.specification.getCode()).render("value"~spec.specification.getCode(), ["class": "form-control", "value": spec.unitSpecification.getValue(), "placeholder": "Value"]) }}
        </div>
        <a class="btn btn-default" href="removeSpecification/{{ spec.unitSpecification.getCode() }}">Remove this specification</a>
        </div>
        {% endif %}
        {% endfor %}
        <div class="form-group">
        {{ submit_button("value": "Save changes", "class": "btn btn-default") }}
        {{ link_to("admin/add/"~apartmentCode, "Add new specification", "class": "btn btn-default") }}
         </div>
    </div>
</div>
{{ endform() }}

{{ form("admin/savePrice/"~apartmentCode, "class": "form-horizontal", "role": "form") }}
{% for row in prices %}
<div class="row">
<div class="col-md-1">
        Season {{ row.season.getName() }}
    </div>
     <div class="col-md-11">
         <div class="form-group">
         {{ forms.get("formPrice"~row.pricelist.getSeasonCode()).label("priceOne"~row.pricelist.getSeasonCode(), ["class": "col-sm-2"]) }}
         <div class="col-sm-6">
         {{ forms.get("formPrice"~row.pricelist.getSeasonCode()).render("priceOne"~row.pricelist.getSeasonCode(), ["class": "form-control", "value": row.pricelist.getPricePerson(), "placeholder": "Price for one"]) }}
         </div> </div>
         <div class="form-group">
         {{ forms.get("formPrice"~row.pricelist.getSeasonCode()).label("priceRoom"~row.pricelist.getSeasonCode(), ["class": "col-sm-2"]) }}
         <div class="col-sm-6">
         {{ forms.get("formPrice"~row.pricelist.getSeasonCode()).render("priceRoom"~row.pricelist.getSeasonCode(), ["class": "form-control", "value": row.pricelist.getPriceRoom(), "placeholder": "Price for more"]) }}
         </div> </div>
     </div>
     </div>

{% endfor %}
<div class="form-group">
        {{ submit_button("value": "Save prices", "class": "btn btn-default") }}
         </div>
{{ endform() }}

{{ form("admin/addImage/"~apartmentCode, "class": "form-inline", "enctype": "multipart/form-data", "role": "form") }}
<div class="row">
<div class="form-group">
{{ formImage.label("image", ["class": "col-sm-3"]) }}
<div class="col-sm-6">
{{ formImage.render("image", ["class": "form"]) }}
</div>
</div>
<div class="form-group">
{{ formImage.label("number", ["class": "col-sm-3"]) }}
<div class="col-sm-6">
{{ formImage.render("number", ["class": "form"]) }}
</div>
</div>
{{ submit_button("value": "Submit", "class": "btn btn-default") }}
</div>
{{ endform() }}

<br>
Images of apartment {{ apartmentCode }} <br>
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture1.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture2.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture3.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture4.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture5.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture6.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture7.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture8.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture9.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture10.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture11.jpg" width="250" height="230">
<img class="img-thumbnail" src="/booking/public/img/{{ apartmentCode }}/picture12.jpg" width="250" height="230">