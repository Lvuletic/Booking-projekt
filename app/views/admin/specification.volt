{{ content() }}
{{ form("Admin/createSpecification/", "class": "form-inline", "role": "form") }}
<div class="row">

    <div class="col-md-11">
        <div class="form-group">
        {{ form.label("name") }}
        {{ form.render("name", ["class": "form-control", "placeholder": "Name"]) }}
        </div>
         <div class="form-group">
          {{ submit_button("value": "Add", "class": "btn btn-primary") }}
         </div>

    </div>
</div>


{{ endform() }}